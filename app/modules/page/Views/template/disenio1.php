<?php

$backgroundColor = $contenido->contenido_fondo_color ?: $colorfondo;

$columnClass = $contenido->contenido_imagen ? 'col-contenido col-md-7' : 'col-contenido col-md-12';

$linkTarget = ($contenido->contenido_enlace_abrir == 1) ? '_blank' : '_self';

?>

<div class="caja-contenido-simple design-one" style="background-color: <?php echo $backgroundColor; ?>">

	<?php if ($contenido->contenido_titulo_ver == 1): ?>
		<h2><?php echo $contenido->contenido_titulo; ?></h2>
	<?php endif; ?>

	<div class="row">
		<div class="<?php echo $columnClass; ?>">
			<div class="descripcion">
				<?php echo $contenido->contenido_descripcion; ?>
			</div>

			<?php if ($contenido->contenido_archivo): ?>
				<div class="archivo text-center">
					<a href="/files/<?php echo $contenido->contenido_archivo; ?>" target="_blank">
						Descargar Archivo <i class="fas fa-download"></i>
					</a>
				</div>
			<?php endif; ?>

			<?php if ($contenido->contenido_enlace): ?>
				<div>
					<a href="<?php echo $contenido->contenido_enlace; ?>"
						class="btn btn-block btn-vermas"
						target="<?php echo $linkTarget; ?>">
						<?php echo 'Ver Más'; ?>
					</a>
				</div>
			<?php endif; ?>
		</div>

		<?php if ($contenido->contenido_imagen): ?>
			<div class="col-contenido col-md-5">
				<img src="/images/<?php echo $contenido->contenido_imagen; ?>"
					class="img-fluid"
					alt="<?php echo htmlspecialchars($contenido->contenido_titulo ?? ''); ?>">
			</div>
		<?php endif; ?>
	</div>
</div>