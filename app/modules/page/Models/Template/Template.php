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

	public function getContentseccion($seccion)
	{
		
		$contenidoModel = new Page_Model_DbTable_Contenido();
		$contenidos = [];
		// Obtener contenidos principales de la sección
		$rescontenidos = $contenidoModel->getList(
			"contenido_estado='1' AND contenido_seccion = '$seccion' AND contenido_padre = '0' OR contenido_titulo like 'navBar'", 
			"orden ASC"
		);
		
		foreach ($rescontenidos as $key => $contenido) {
			$contenidos[$key] = [
				'detalle' => $contenido,
				'hijos' => $this->buildContentHierarchy($contenidoModel, $contenido->contenido_id, 1)
			];
		}
		$this->_view->contenidos = $contenidos;
		$this->_view->seccion = $seccion;
		
		return $this->_view->getRoutPHP("modules/page/Views/template/contenedor.php");
	}

	/**
	 * Construye la jerarquía de contenidos de forma recursiva
	 * @param object $contenidoModel Modelo de contenido
	 * @param string $padreId ID del contenido padre
	 * @param int $nivel Nivel actual de profundidad (para control de recursión)
	 * @param int $maxNivel Nivel máximo permitido (por defecto 6)
	 * @return array Estructura jerárquica de contenidos
	 */
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
	
		
		// print_r($banners);
		return $this->_view->getRoutPHP("modules/page/Views/template/bannerprincipalind.php");
	}
	public function banner($seccion)
	{
		$this->_view->seccionbanner = $seccion;


		return $this->_view->getRoutPHP("modules/page/Views/template/bannerinternas.php");
	}
}