<?php

class Page_galeriaController extends Page_mainController
{
  public $botonactivo = 2;
  public function indexAction()
  {
    $this->_view->banner = $this->template->banner(5);
    $this->_view->seccion = 5;
    $this->_view->contenido = $this->template->getContentseccion(5, 'Nosotros');
  }
}
