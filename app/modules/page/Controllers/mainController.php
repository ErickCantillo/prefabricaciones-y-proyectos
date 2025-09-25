<?php 

/**
*
*/


define('ROOT_PATH', dirname(__DIR__));
class Page_mainController extends Controllers_Abstract
{
	public $template;

	public $botonactivo ;
	public $len;
	

	public function init()
	{
		$this->setLayout('page_page');
		$this->template = new Page_Model_Template_Template($this->_view);
		
		// Inicializar $informacion como objeto antes de usarlo
		$infoModel = new Page_Model_DbTable_Informacion();

		// $informacion->info_pagina_descripcion = '';
		// $informacion->info_pagina_tags = '';
		// $informacion->info_pagina_scripts = '';
		$informacion = $infoModel->getList();

		$this->_view->infopage = $informacion;

		$this->getLayout()->setData("meta_description", $informacion->info_pagina_descripcion);
		$this->getLayout()->setData("meta_keywords", $informacion->info_pagina_tags);
		$this->getLayout()->setData("scripts", $informacion->info_pagina_scripts);
		

		$header = $this->_view->getRoutPHP('modules/page/Views/partials/header.php');
		$this->getLayout()->setData("header",$header);
		
		$footer = $this->_view->getRoutPHP('modules/page/Views/partials/footer.php');
		$this->getLayout()->setData("footer",$footer);
		$adicionales = $this->_view->getRoutPHP('modules/page/Views/partials/adicionales.php');
		$this->getLayout()->setData("adicionales",$adicionales);
		// $this->usuario();

	}


	// public function usuario(){
	// 	$userModel = new Core_Model_DbTable_User();
	// 	$user = $userModel->getById(Session::getInstance()->get("kt_login_id"));
	// 	if($user->user_id == 1){
	// 		$this->editarpage = 1;
	// 	}
	// }

} 