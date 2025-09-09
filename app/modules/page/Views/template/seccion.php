<section id="<?php echo $contenedor->contenido_id ?>" class="
		id_<?php echo $contenedor->contenido_id ?> 
		<?php echo $contenedor->contenido_columna; ?> 
		contenedor-seccion 
		<?php if ($contenedor->contenido_fondo_imagen_tipo == 2) { ?>dinamica<?php } ?>" 
	style="background-image:url(/images/<?php echo $contenedor->contenido_fondo_imagen; ?>);   background-size: cover; background-color:<?php echo $contenedor->contenido_fondo_color; ?> ;">
	<div class="content-box">
		<?php if ($contenedor->contenido_titulo_ver == 1) { ?>
			<h2><?php echo $contenedor->contenido_titulo; ?></h2>
		<?php } ?>
		<?php if ($contenedor->contenido_introduccion != "") { ?>
			<div class="descripcion-seccion"><?php echo $contenedor->contenido_introduccion; ?></div>
		<?php } ?>

		<?php if ($contenedor->contenido_descripcion) { ?>
			<div class="descripcion-seccion "><?php echo $contenedor->contenido_descripcion; ?></div>
		<?php } ?>
		<?php if ($contenedor->contenido_enlace) { ?>
			<div class="boton">
				<a href="<?php echo $contenedor->contenido_enlace; ?>" <?php if ($contenedor->contenido_enlace_abrir == 1) { ?>target="_blank" <?php } ?> <?php if ($contenedor->contenedor_enlace_abrir == 1) { ?> target="_blank" <?php } ?>
					class="btn btn-vermas">
					<?php if ($contenedor->contenedor_vermas) { ?> <?php echo $contenedor->contenido_vermas; ?> <?php } else { ?>VER
						MÁS<?php } ?></a>
			</div>
		<?php } ?>
		<?php if (is_countable($rescontenido['hijos']) && count($rescontenido['hijos']) > 0) { ?>
			<div
				class=" row 
	<?php switch ($contenedor->contenido_columna_alineacion) {
				case 2: ?>justify-content-center text-center<?php break;
														case 3: ?> justify-content-end text-end<?php break;
																							case 4: ?>justify-content-between text-between<?php break;
																																case 5: ?>justify-content-around<?php break;
																																default: ?>justify-content-start text-start<?php break;
																																} ?>
	<?php if ($contenedor->contenido_columna_espacios == 2 || $contenedor->contenido_columna_espacios == 4) { ?> no-gutters <?php } ?>">

				<?php foreach ($rescontenido['hijos'] as $key => $rescolumna): ?>
					<?php $columna = $rescolumna['detalle']; ?>
					<div class="columna-seccion <?php echo $columna->contenido_columna; ?>">
						<?php 
							if ($columna->contenido_tipo == 5) {
								$contenido = $columna;
								include APP_PATH . "modules/page/Views/template/disenio" . $columna->contenido_disenio . ".php";
							} else if ($columna->contenido_tipo == 6) {
								$carrousel = $rescolumna['hijos']; 
								$disenio = APP_PATH . "modules/page/Views/template/disenio" . $columna->contenido_disenio . ".php";
					?>
							<div
								class="<?php if ($columna->contenido_columna_espacios == 1 || $columna->contenido_columna_espacios == 3) { ?>con-espacios<?php } ?>">
								<?php include(APP_PATH . "modules/page/Views/template/carrousel.php"); ?>
							</div>
						<?php } else if ($columna->contenido_tipo == 7) { ?>
							<?php $acordioncontent = $rescolumna['hijos']; ?>
							<?php include(APP_PATH . "modules/page/Views/template/acordion.php"); ?>
						<?php } else if ($columna->contenido_tipo == 8) { ?>
							<?php $slidercontent = $rescolumna['hijos']; ?>
							<?php include(APP_PATH . "modules/page/Views/template/slider.php"); ?>
						<?php } ?>
					</div>
				<?php endforeach ?>
			</div>
		<?php } ?>
	</div>
</section>