<?php

class Page_productosController extends Page_mainController
{
  public $botonactivo = 2;
  public function indexAction()
  {
    $this->_view->banner = $this->template->banner(3);
    $this->_view->seccion = 3;
    $this->_view->contenido = $this->template->getContentseccion(3, 'Productos');
  }
}
