<?php

class View
{
    protected $_data;

    function __construct($data = array())
    {
        $this->_data = $data;
    }

    function __set($name, $value)
    {
        $this->_data[$name] = $value;
    }

    function __get($name)
    {
        return isset($this->_data[$name]) ? $this->_data[$name] : null;
    }

    public function getObjectVariable($object, $var)
    {
        if (isset($object) and isset($object->$var)) {
            return $object->$var;
        } else {
            return "";
        }
    }
    public function getRoutPHP($url, $parameter = '')
    {
        $rout = APP_PATH . $url;
        if (isset($rout) && file_exists($rout)) {
            ob_start();
            include($rout);
            $content = ob_get_clean();
            return $content;
        }
        return "";
    }
    public function render($filename)
    {
        if (is_readable($filename)) {
            $fileContents = file_get_contents($filename);
            return eval("?>" . $fileContents);
        } else {
            return "";
        }
    }

    public function id_youtube($url)
    {
        $patron = '%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x';
        $array = preg_match($patron, $url, $parte);
        if (false !== $array) {
            return $parte[1];
        }
        return false;
    }

    /**
     * Separa un enlace de red social que contiene URL y usuario separados por guión
     * @param string $socialLink - Enlace en formato "https://www.instagram.com/usuario/ - @usuario"
     * @return array - Array con 'url' y 'user', o array vacío si el enlace está vacío
     */
    public function parseSocialLink($socialLink)
    {
        // Validar que el enlace no esté vacío
        if (empty($socialLink) || trim($socialLink) === '') {
            return array('url' => '', 'user' => '');
        }

        // Buscar el guión separador
        $separator = ' - ';
        $position = strpos($socialLink, $separator);

        if ($position !== false) {
            // Si encontramos el separador, dividir la cadena
            $url = trim(substr($socialLink, 0, $position));
            $user = trim(substr($socialLink, $position + strlen($separator)));
        } else {
            // Si no hay separador, usar todo como URL y dejar usuario vacío
            $url = trim($socialLink);
            $user = '';
        }

        return array(
            'url' => $url,
            'user' => $user
        );
    }
}
