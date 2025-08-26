<div class="caja-contenido-simple design-two" style="background-color: <?php if ($contenido->contenido_fondo_color) {
	echo $contenido->contenido_fondo_color;
} else if ($colorfondo) {
	echo $colorfondo;
} ?>">
	<?php if ($contenido->contenido_titulo_ver == 1) { ?>
		<h2><?php echo $contenido->contenido_titulo; ?></h2>
	<?php } ?>
	<div class="row">
		<?php if ($contenido->contenido_imagen) { ?>
			<div class="col-contenido  col-md-5">
				<img src="/images/<?php echo $contenido->contenido_imagen; ?>" class="img-fluid">
			</div>
		<?php } ?>
		<div <?php if ($contenido->contenido_imagen) { ?>class="col-contenido  col-md-7" <?php } else { ?>class="col-contenido  col-sm-12" <?php } ?>>
			<div class="descripcion">
				<?php echo $contenido->contenido_descripcion; ?>
			</div>


			<?php if ($contenido->contenido_enlace) { ?>
				<div>
					<a href="<?php echo $contenido->contenido_enlace; ?>" class="btn btn-block btn-vermas" <?php if ($contenido->contenido_enlace_abrir == 1) { ?> target="blank"
						<?php } ?>>
						<?php if ($contenido->contenido_vermas) { ?>		<?php echo $contenido->contenido_vermas; ?>	<?php } else { ?>Ver
							Más<?php } ?></a>
				</div>
			<?php } ?>

		</div>

	</div>
</div>