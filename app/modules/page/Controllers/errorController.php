<?php

class page_errorController extends Controllers_Abstract
{

    public function init()
    {
        $this->setLayout('page_error');

        // $header = $this->_view->getRoutPHP('modules/page/Views/partials/header.php');
        // $this->getLayout()->setData("header", $header);

        $footer = $this->_view->getRoutPHP('modules/page/Views/partials/footer.php');
        $this->getLayout()->setData("footer", $footer);
    }
    public function indexAction()
    {
        $error = $this->sanitizarEntrada($_GET['error'] ?? 'An unknown error occurred.');
        $this->_view->contenido = 'error';
        $this->_view->error = $error;
        
        return $this->_view->getRoutPHP("modules/page/Views/template/error.php");
        
    }

    public function sanitizarEntrada($value)
  {

    $currentValue = trim($value);
    $currentValue = stripslashes($currentValue);
    $currentValue = htmlspecialchars($currentValue, ENT_QUOTES, 'UTF-8');
    $currentValue = strip_tags($currentValue);
    $currentValue = preg_replace('/[\x00-\x1F\x7F]/u', '', $currentValue);
    return $currentValue;
  }
}
