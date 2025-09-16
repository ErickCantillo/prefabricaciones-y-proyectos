<?php
$navbar = $this->contenidos[0]['hijos'];
include __DIR__ . '/Components/NavBar.php';
// if ($this->seccion != 1) {
// 	var_dump($this->seccion	);
// 	include __DIR__ . '/Components/Breadcrumb.php';
// }

foreach ($this->contenidos as $key => $rescontenido) {
	if($key > 0) {
		
	$contenedor = $rescontenido['detalle'];
	if ($contenedor->contenido_tipo == 1) {
		include(APP_PATH . "modules/page/Views/template/bannersimple.php");
	} else if ($contenedor->contenido_tipo == 2 || $contenedor->contenido_tipo == 3) {
		include(APP_PATH . "modules/page/Views/template/seccion.php");
	}
}
}
