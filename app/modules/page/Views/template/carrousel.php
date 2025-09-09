<div class="carouselsection" style="background-color:<?php echo $colorfondo; ?> padding: 5rem;">
	<div id="miCarrusel" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-inner">
			<?php $colorfondo = $columna->contenido_fondo_color; ?>
			<?php foreach ($carrousel as $key => $contenidoItem) : ?>
				<?php $contenido = $contenidoItem['detalle']; ?>

				<div class="carousel-item m-2 <?= $key === 0 ? 'active' : '' ?>">

					<?php include $disenio; ?>

				</div>
			<?php endforeach ?>
		</div>

		<button class="carousel-control-prev" data-bs-target="#miCarrusel" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Anterior</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#miCarrusel" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Siguiente</span>
		</button>
	</div>
</div>




<!-- <div class='left_scroll caja-control carrr'> <i class="fas fa-chevron-left"></i> </div>

		<div class="carousel_inner carr">

			<ul>
				
			</ul>
		</div>
		<div class='right_scroll carrr caja-control'> <i class="fas fa-chevron-right"></i> </div> -->