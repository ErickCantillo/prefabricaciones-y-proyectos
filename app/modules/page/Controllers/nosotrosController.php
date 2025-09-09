<?php

class Page_nosotrosController extends Page_mainController
{
  public $botonactivo = 2;
  public function indexAction()
  {
    // $this->_view->banner = $this->template->banner(2);
    $this->_view->seccion = 2;
    $this->_view->contenido = $this->template->getContentseccion(2);
  }
}
