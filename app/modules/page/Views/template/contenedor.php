<?php
$navbar = $this->contenidos[0]['hijos'];
include __DIR__ . '/Components/NavBar.php';
$hero = $this->contenidos[1];

include __DIR__ . '/Components/Hero.php';

for ($i = 2 ; $i < count($this->contenidos); $i++) {
	$contenedor = $this->contenidos[$i]['detalle'];
	$rescontenido = $this->contenidos[$i];
	if($contenedor->contenido_tipo == 1 ){
		include APP_PATH."modules/page/Views/template/bannersimple.php";
	} else if($contenedor->contenido_tipo == 2 || $contenedor->contenido_tipo == 3){
		include APP_PATH."modules/page/Views/template/seccion.php";
	}
	}
?>