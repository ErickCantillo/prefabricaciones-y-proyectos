<?php

class Page_contactoController extends Page_mainController
{
  public $botonactivo = 5;

  public function indexAction()
  {
    $this->_view->banner = $this->template->banner(7);
    // $this->_view->contenido = $this->template->getContentseccion(5);
  }

  public function enviarcontactoAction()
  {
  
      // Configurar headers para respuesta JSON

      header('Content-Type: application/json');

      // Recibir y validar datos JSON
      $input = file_get_contents('php://input');
      $data = json_decode($input, true);


      if (json_last_error() !== JSON_ERROR_NONE) {
        $this->sendJsonResponse('error', 'Invalid JSON format');
      }



      $formData = $this->sanitizeFormData($data);
      $validationResult = $this->validateRequest($formData, $data);
      if (!$validationResult['valid']) {
        $this->sendJsonResponse('error', $validationResult['message']);
      }


      if (!$this->validateRequiredFields($formData)) {
        $this->sendJsonResponse('error', 'All fields are required');
      }
    

      // Enviar email
      
          $mailResult = $this->sendContactEmail($formData);
        if (!$mailResult) {
          $this->sendJsonResponse('error', 'Error sending email');
        }
      


      $this->sendJsonResponse('success', 'Message sent successfully');
    
  }

  private function sanitizeFormData($data)
  {
    return [
      'name' => $this->sanitizarEntrada($data['name'] ?? ''),
      'phone' => $this->sanitizarEntrada($data['phone'] ?? ''),
      'email' => $this->sanitizarEntrada($data['email'] ?? ''),
      'reason' => $this->sanitizarEntrada($data['reason'] ?? ''),
      'message' => $this->sanitizarEntrada($data['message'] ?? ''),
      'company' => $this->sanitizarEntrada($data['company'] ?? '')
    ];
  }

  private function validateRequest($formData, $rawData)
  {
    // Verificar campo honeypot (anti-spam)
    if (!empty($formData['company'])) {
      return ['valid' => false, 'message' => 'Invalid token'];
    }

    // Verificar hash de seguridad
    $hash = $this->sanitizarEntrada($rawData['hash'] ?? '');
    $expectedHash = md5(date("Y-m-d"));
    if ($expectedHash !== $hash) {
      return ['valid' => false, 'message' => 'Invalid token'];
    }

    // Verificar reCAPTCHA
    $recaptchaResponse = $this->sanitizarEntrada($rawData['g-recaptcha-response'] ?? '');
    if (!$this->verifyCaptcha($recaptchaResponse)) {
      return ['valid' => false, 'message' => 'Invalid captcha'];
    }

    return ['valid' => true, 'message' => ''];
  }

  private function validateRequiredFields($formData)
  {
    $requiredFields = ['name', 'phone', 'email', 'reason', 'message'];
    foreach ($requiredFields as $field) {
      if (empty($formData[$field])) {
        return false;
      }
    }

    return true;
  }

  private function sendContactEmail($formData)
  {
    try {
      $mail = new Core_Model_Sendingemail($this->_view);
      $mailResponse = $mail->sendMailContactForm($formData);
      $this->sendJsonResponse('success', 'Message response: ' . $mailResponse);
      return $mailResponse !== 2; // 2 indica error según el código original
    } catch (Exception $e) {
      error_log('Email sending error: ' . $e->getMessage());
      return false;
    }
  }

  private function sendJsonResponse($status, $message, $data = null)
  {
    echo json_encode(['status' => $status]);
    $response = [
      'status' => $status,
      'message' => $message
    ];

    if ($data !== null) {
      $response['data'] = $data;
    }

    if ($status === 'error') {
      $response['error'] = $message;
    }

    // Limpiar cualquier output previo
    if (ob_get_level()) {
      ob_clean();
    }

    // Enviar headers adicionales para asegurar respuesta JSON
    header('Content-Type: application/json; charset=utf-8');
    header('Cache-Control: no-cache, must-revalidate');

    echo json_encode($response, JSON_UNESCAPED_UNICODE);
    die();
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
