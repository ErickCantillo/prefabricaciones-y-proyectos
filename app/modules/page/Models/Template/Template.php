<?php

/**
 * 
 */
class Page_Model_Template_Template
{
	protected $_view;
	protected $seccion;
	function __construct($view)
	{
		$this->_view = $view;
	}

	public function getContentseccion($seccion, $page = 'Inicio')
	{
		
		$contenidoModel = new Page_Model_DbTable_Contenido();
		$contenidos = [];
		// Obtener contenidos principales de la sección
		$rescontenidos = $contenidoModel->getList(
			"contenido_estado='1' AND contenido_seccion = '$seccion' AND contenido_padre = '0' or contenido_titulo like 'navBar' or contenido_id = 36", 
			"orden ASC"
		);
		foreach ($rescontenidos as $key => $contenido) {
			$contenidos[$key] = [
				'detalle' => $contenido,
				'hijos' => $this->buildContentHierarchy($contenidoModel, $contenido->contenido_id, 1)
			];
		}
		$this->_view->contenidos = $contenidos;
		$this->_view->page = $page;
		$this->_view->seccion = $seccion;
		
		return $this->_view->getRoutPHP("modules/page/Views/template/contenedor.php");
	}

	private function buildContentHierarchy($contenidoModel, $padreId, $nivel = 1, $maxNivel = 6)
	{
		// Prevenir recursión infinita
		if ($nivel > $maxNivel) {
			return [];
		}

		$hijos = $contenidoModel->getList(
			"contenido_estado='1' AND contenido_padre = '$padreId'", 
			"orden ASC"
		);

		if (empty($hijos)) {
			return [];
		}

		$estructura = [];
		foreach ($hijos as $key => $hijo) {
			$estructura[$key] = [
				'detalle' => $hijo,
				'hijos' => $this->buildContentHierarchy($contenidoModel, $hijo->contenido_id, $nivel + 1, $maxNivel)
			];
			// Mantener compatibilidad con el array plano para niveles específicos
			$contenidos = isset($this->_view->contenidos) ? $this->_view->contenidos : [];
			$contenidos['hijos_' . $hijo->contenido_id] = $estructura[$key]['hijos'];
			$this->_view->contenidos = $contenidos;
		}

		return $estructura;
	}

	public function bannerPrincipalInd($seccion)
	{
		$this->_view->seccionbanner = $seccion;
	
		$publicidadModel = new Page_Model_DbTable_Publicidad();
		$banners = $publicidadModel->getList("publicidad_seccion = '$seccion' AND publicidad_estado = '1' AND publicidad_padre = '0'", "orden ASC");
		foreach($banners as $banner){
			$subBanners = $publicidadModel->getList("publicidad_seccion = '$seccion' AND publicidad_estado = '1' AND publicidad_padre = '$banner->publicidad_id'", "orden ASC");
			$banner->subBanners = $subBanners;
		}
		$this->_view->banners = $banners;
		return $this->_view->getRoutPHP("modules/page/Views/template/bannerprincipalind.php");
	}
	public function banner($seccion)
	{
		$this->_view->seccionbanner = $seccion;
		$publicidadModel = new Page_Model_DbTable_Publicidad();
		$this->_view->banners = $publicidadModel->getList("publicidad_seccion = '$seccion' AND publicidad_estado = '1'", "orden ASC");
		return $this->_view->getRoutPHP("modules/page/Views/template/bannerinternas.php");
	}
}