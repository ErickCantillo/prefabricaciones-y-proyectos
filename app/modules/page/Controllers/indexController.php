<?php

/**
 *
 */

class Page_indexController extends Page_mainController
{

  public $botonactivo = 1;
  public function indexAction()
  {
    $this->_view->banner = $this->template->bannerPrincipalInd(1);
    $productoModel = new Administracion_Model_DbTable_Productos();
    $this->_view->productos = $productoModel->getList();
    $this->_view->contenido = $this->template->getContentseccion(1);
    

  }
  public function enviarsubAction()
  {

    // Recibir los datos enviados en formato JSON
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);
    
    // Verificar si la decodificación fue exitosa y si se recibieron los datos esperados
    $name = $this->sanitizarEntrada($data['name']);
    $phone = $this->sanitizarEntrada($data['phone']);
    $email = $this->sanitizarEntrada($data['email']);

    $company = $this->sanitizarEntrada($data['company']);
    if ($company && $company != "") {
      $res = [];
      $res['error'] = "Invalid token.";
      $res['status'] = "error";
      echo json_encode($res);
      exit;
    }

    $hash = $this->sanitizarEntrada($data['hash']);
    $hash2 = md5(date("Y-m-d"));
    if ($hash2 !== $hash) {
      $res = [];
      $res['error'] = "Invalid token.";
      $res['status'] = "error";
      echo json_encode($res);
      exit;
    }


    $g_recaptcha_response = $this->sanitizarEntrada($data['g-recaptcha-response']);
    if (!$this->verifyCaptcha($g_recaptcha_response)) {
      $res = [];
      $res['error'] = "Invalid token.";
      $res['status'] = "error";
      echo json_encode($res);
      exit;
    }



    if (!$name || !$phone || !$email) {
      $res = [];
      $res['error'] = "Required fields.";
      $res['status'] = "error";
      echo json_encode($res);
      exit;
    }



    $res = [];
    $res['status'] = "success";
    echo json_encode($res);
    exit;
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

  private function verifyCaptcha($response)
  {
    $secretKey = '6LfFDZskAAAAAOvo1878Gv4vLz3CjacWqy08WqYP';
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
      'secret' => $secretKey,
      'response' => $response
    );

    $options = array(
      'http' => array(
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($data)
      )
    );

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result);

    return $response->success;
  }
}
