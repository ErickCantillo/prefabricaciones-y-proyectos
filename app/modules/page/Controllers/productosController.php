<?php

class Page_productosController extends Page_mainController
{
  public $botonactivo = 2;
  public function indexAction()
  {
    $this->_view->banner = $this->template->banner(3);
    $this->_view->seccion = 3;
    $this->_view->contenido = $this->template->getContentseccion(3, 'Productos');
    $productoModel = new Administracion_Model_DbTable_Productos();
    $this->_view->productos = $productoModel->getList();
    // $this->_view->render('productos/index');

  }
}
