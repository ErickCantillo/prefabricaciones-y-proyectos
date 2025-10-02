<div class="" style="background-color:<?php echo $colorfondo; ?> padding: 5rem;">
	<div id="myCarousel" class="f-carousel miCarrusel">
		<!-- <div class="carousel-inner miCarrusel-inner"> -->
		<?php $colorfondo = $columna->contenido_fondo_color; ?>
		<?php foreach ($this->productos as $key => $producto) : ?>

			<div class="f-carousel__slide">
				<div>
					<div class="item-products">
						<img src="<?php echo '/images/' . $producto->imagen; ?>" alt="">
						<div class="item-products-text">
							<h3><?php echo $producto->titulo; ?></h3>
							<p><?php 
								$descripcion = $producto->descripcion;
								$palabras = explode(' ', $descripcion);
								if (count($palabras) > 20) {
									echo implode(' ', array_slice($palabras, 0, 20)) . '...';
								} else {
									echo $descripcion;
								}
							?></p>
						</div>
						<p class="product-ver-mas">
							<a href="/page/productos">
								<span class="btn-ver-mas-black">
									Ver más
								</span>
							</a>
						</p>
					</div>
				</div>

			</div>



		<?php endforeach ?>

	</div>
</div>


<script>
	Carousel(document.getElementById("myCarousel"), {
		// Your custom options
	}, {
		Arrows
	}).init();
</script>