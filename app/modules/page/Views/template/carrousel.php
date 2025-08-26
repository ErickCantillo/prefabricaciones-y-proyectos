	<div class='carouselsection'>
		<div class='left_scroll caja-control carrr'> <i class="fas fa-chevron-left"></i> </div>

		<div class="carousel_inner carr">

			<ul>
				<?php $colorfondo = $columna->contenido_fondo_color; ?>
				<?php foreach ($carrousel as $key => $contenidoItem) : ?>
					<?php $contenido = $contenidoItem['detalle']; ?>
					<li>

						<?php include($disenio); ?>
					</li>
				<?php endforeach ?>
			</ul>
		</div>
		<div class='right_scroll carrr caja-control'> <i class="fas fa-chevron-right"></i> </div>
	</div>
	
	<script>
	$(document).ready(function() {
		$('.carouselsection').carousel({
			quantity: 3,
			sizes: {
				'900': 3,
				'600': 2,
				'400': 1
			},
			pause: 5000,
			auto: true
		});
	});
	</script>