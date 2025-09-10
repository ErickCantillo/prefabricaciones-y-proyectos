<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?>
	<?php if ($this->padre > 0 && $this->publicidadpadre->publicidad_nombre) { ?>
		<small class="text-muted"> - Sub-banners of: <?php echo $this->publicidadpadre->publicidad_nombre; ?></small>
	<?php } ?>
</h1>
<div class="container-fluid">
	<?php if ($this->padre > 0) { ?>
		<a class="btn btn-sm btn-secondary my-2" href="<?php echo $this->route; ?>">
			<i class="fas fa-arrow-left"></i> Back to Main Banners
		</a>
	<?php } ?>
	<form action="<?php echo $this->route; ?>" method="post">
		<div class="content-dashboard">
			<div class="row">
				<div class="col-2">
					<label>Section</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono fondo-cafe "><i class="far fa-list-alt"></i></span>
						</div>
						<select class="form-control" name="publicidad_seccion">
							<option value="">All</option>
							<?php foreach ($this->list_publicidad_seccion as $key => $value) : ?>
								<option value="<?= $key; ?>" <?php if ($this->getObjectVariable($this->filters, 'publicidad_seccion') ==  $key) {
																								echo "selected";
																							} ?>><?= $value; ?></option>
							<?php endforeach ?>
						</select>
					</label>
				</div>
				<div class="col-2">
					<label>Name</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono fondo-azul-claro "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" class="form-control" name="publicidad_nombre" value="<?php echo $this->getObjectVariable($this->filters, 'publicidad_nombre') ?>"></input>
					</label>
				</div>
				<!-- <div class="col-2">
					<label>Date</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rosado "><i class="fas fa-calendar-alt"></i></span>
						</div>
						<input type="text" class="form-control" name="publicidad_fecha" value="<?php echo $this->getObjectVariable($this->filters, 'publicidad_fecha') ?>"></input>
					</label>
				</div> -->
				<!--<div class="col-2">
		            <label>Image</label>
		            <label class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text input-icono fondo-azul " ><i class="fas fa-pencil-alt"></i></span>
							</div>
		            <input type="text" class="form-control" name="publicidad_imagen" value="<?php echo $this->getObjectVariable($this->filters, 'publicidad_imagen') ?>"></input>
		            </label>
				</div>
				<div class="col-2">
		            <label>Responsive Image</label>
		            <label class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text input-icono fondo-azul " ><i class="fas fa-pencil-alt"></i></span>
							</div>
		            <input type="text" class="form-control" name="publicidad_imagenresponsive" value="<?php echo $this->getObjectVariable($this->filters, 'publicidad_imagenresponsive') ?>"></input>
		            </label>
				</div>-->

				<div class="col-2">

					<label>Video</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono fondo-rojo-claro "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" class="form-control" name="publicidad_video" value="<?php echo $this->getObjectVariable($this->filters, 'publicidad_video') ?>"></input>

					</label>
				</div>
				<div class="col-2">
					<label>Status</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono fondo-verde "><i class="far fa-list-alt"></i></span>
						</div>
						<select class="form-control" name="publicidad_estado">
							<option value="">All</option>
							<?php foreach ($this->list_publicidad_estado as $key => $value) : ?>
								<option value="<?= $key; ?>" <?php if ($this->getObjectVariable($this->filters, 'publicidad_estado') ==  $key) {
																								echo "selected";
																							} ?>><?= $value; ?></option>
							<?php endforeach ?>
						</select>
					</label>
				</div>
				<div class="col-2">
					<label>&nbsp;</label>
					<button type="submit" class="btn btn-block btn-azul"> <i class="fas fa-filter"></i> Filter</button>
				</div>
				<div class="col-2">
					<label>&nbsp;</label>
					<a class="btn btn-block btn-azul-claro " href="<?php echo $this->route; ?>?cleanfilter=1"> <i class="fas fa-eraser"></i> Clear Filter</a>
				</div>
			</div>
		</div>
	</form>
	<div align="center">
		<ul class="pagination justify-content-center">
			<?php
			$url = $this->route;
			if ($this->totalpages > 1) {
				if ($this->page != 1)
					echo '<li class="page-item" ><a class="page-link"  href="' . $url . '?page=' . ($this->page - 1) . '"> &laquo; Previous </a></li>';
				for ($i = 1; $i <= $this->totalpages; $i++) {
					if ($this->page == $i)
						echo '<li class="active page-item"><a class="page-link">' . $this->page . '</a></li>';
					else
						echo '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . $i . '">' . $i . '</a></li>  ';
				}
				if ($this->page != $this->totalpages)
					echo '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . ($this->page + 1) . '">Next &raquo;</a></li>';
			}
			?>
		</ul>
	</div>
	<div class="content-dashboard">
		<div class="franja-paginas">
			<div class="row">
				<div class="col-5">
					<div class="titulo-registro">Found <?php echo $this->register_number; ?> records</div>
				</div>
				<div class="col-2 text-end">
					<div class="texto-paginas">Records per Page:</div>
				</div>
				<div class="col-1">
					<select class="form-control form-control-sm selectpagination">
						<option value="20" <?php if ($this->pages == 20) {
																	echo 'selected';
																} ?>>20</option>
						<option value="30" <?php if ($this->pages == 30) {
																	echo 'selected';
																} ?>>30</option>
						<option value="50" <?php if ($this->pages == 50) {
																	echo 'selected';
																} ?>>50</option>
						<option value="100" <?php if ($this->pages == 100) {
																	echo 'selected';
																} ?>>100</option>
					</select>
				</div>
				<div class="col-4">
					<div class="text-end">
						<a class="btn btn-sm btn-success" href="<?php echo $this->route . "/manage"; ?><?php if ($this->padre) {
																																															echo "?padre=" . $this->padre;
																																														} ?>">
							<i class="fas fa-plus-square"></i>
							<?php if ($this->padre > 0) { ?>
								Create Sub-Banner
							<?php } else { ?>
								Create New
							<?php } ?>
						</a>

					</div>
				</div>
			</div>
		</div>
		<div class="content-table">
			<table class=" table table-striped  table-hover table-administrator text-left">
				<thead>
					<tr>
						<td>Section</td>
						<td>Name</td>
						<td>Date</td>
						<td>Image</td>
						<!--<td>Responsive Image</td>-->
						<td>Video</td>
						<td>Status</td>
						<?php if ($this->padre == 0) { ?>
							<td>Sub-Banners</td>
						<?php } ?>
						<td width="100">Order</td>
						<td width="150"></td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($this->lists as $content) { ?>
						<?php $id =  $content->publicidad_id; ?>
						<tr>
							<td><?= $this->list_publicidad_seccion[$content->publicidad_seccion]; ?>
							<td><?= $content->publicidad_nombre; ?></td>
							<td><?= $content->publicidad_fecha; ?></td>
							<td>
								<?php if ($content->publicidad_imagen) { ?>
									<img src="/images/<?= $content->publicidad_imagen; ?>" class="img-thumbnail thumbnail-administrator" />
								<?php } ?>
								<!--<div><?= $content->publicidad_imagen; ?></div>-->
							</td>
							<!--<td>-->
							<!--<?php if ($content->publicidad_imagenresponsive) { ?>
								<img src="/images/<?= $content->publicidad_imagenresponsive; ?>"  class="img-thumbnail thumbnail-administrator" />
							<?php } ?>-->
							<!--<div><?= $content->publicidad_imagenresponsive; ?></div>-->
							<!--</td>-->
							<td>
								<?php $content->publicidad_video = str_replace("https://www.youtube.com/watch?v=", "", $content->publicidad_video); ?>
								<?php if ($content->publicidad_video != "") { ?>
									<iframe class="img-thumbnail thumbnail-administrator" muted width="100" height="100" src="https://www.youtube.com/embed/<?php echo $content->publicidad_video; ?>?rel=0&amp;autoplay=0&mute=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
								<?php } ?>


							</td>
							<td><?= $this->list_publicidad_estado[$content->publicidad_estado]; ?>
							</td>
							<?php if ($this->padre == 0) { ?>
								<td class="text-center">
									<?php if (isset($content->sub_banners_count) && $content->sub_banners_count > 0) { ?>
										<a class="btn btn-info btn-sm" href="<?php echo $this->route; ?>?padre=<?= $content->publicidad_id ?>" data-bs-toggle="tooltip" data-placement="top" title="View <?= $content->sub_banners_count ?> sub-banner(s)">
											<i class="fas fa-list"></i> <?= $content->sub_banners_count ?>
										</a>
									<?php } else { ?>
										<a class="btn btn-outline-secondary btn-sm" href="<?php echo $this->route; ?>?padre=<?= $content->publicidad_id ?>" data-bs-toggle="tooltip" data-placement="top" title="Create sub-banners">
											<i class="fas fa-plus"></i> 0
										</a>
									<?php } ?>
								</td>
							<?php } ?>
							<td>
								<input type="hidden" id="<?= $id; ?>" value="<?= $content->orden; ?>"></input>
								<button class="up_table btn btn-primary btn-sm"><i class="fas fa-angle-up"></i></button>
								<button class="down_table btn btn-primary btn-sm"><i class="fas fa-angle-down"></i></button>
							</td>
							<td class="text-end">
								<div>
									<?php if ($content->publicidad_padre == 0 && $content->publicidad_seccion == 1) { ?>
										<a class="btn btn-rosado btn-sm" href="<?php echo $this->route; ?>?padre=<?= $id ?>" data-bs-toggle="tooltip" data-placement="top" title="Elements"><i class="fas fa-plus-square"></i></a>
									<?php } ?>
									<a class="btn btn-azul btn-sm" href="<?php echo $this->route; ?>/manage?id=<?= $id ?>" data-bs-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pen-alt"></i></a>
									<?php if ($_SESSION['kt_login_level'] == 1) { ?><span data-bs-toggle="tooltip" data-placement="top" title="Delete"><a class="btn btn-rojo btn-sm" data-bs-toggle="modal" data-bs-target="#modal<?= $id ?>"><i class="fas fa-trash-alt"></i></a></span><?php } ?>

								</div>
								<!-- Modal -->
								<div class="modal fade text-left" id="modal<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="myModalLabel">Delete Record</h4>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											</div>
											<div class="modal-body">
												<div class="">Are you sure you want to delete this record?</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
												<a class="btn btn-danger" href="<?php echo $this->route; ?>/delete?id=<?= $id ?>&csrf=<?= $this->csrf; ?><?php echo ''; ?>">Delete</a>
											</div>
										</div>
									</div>
								</div>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<div class="franja-paginas" style="border-top: 1px solid #CCCCCC;margin-top: 2%;">
			<div class="row" style="padding-top: 1%;">
				<div class="col-5">
					<div class="titulo-registro">Found <?php echo $this->register_number; ?> records</div>
				</div>
				<div class="col-2 text-end">
					<div class="texto-paginas">Records per Page:</div>
				</div>
				<div class="col-1">
					<select class="form-control form-control-sm selectpagination">
						<option value="20" <?php if ($this->pages == 20) {
																	echo 'selected';
																} ?>>20</option>
						<option value="30" <?php if ($this->pages == 30) {
																	echo 'selected';
																} ?>>30</option>
						<option value="50" <?php if ($this->pages == 50) {
																	echo 'selected';
																} ?>>50</option>
						<option value="100" <?php if ($this->pages == 100) {
																	echo 'selected';
																} ?>>100</option>
					</select>
				</div>
				<div class="col-4">
					<div class="text-end">
						<a class="btn btn-sm btn-success" href="<?php echo $this->route . "/manage"; ?><?php if ($this->padre) {
																																															echo "?padre=" . $this->padre;
																																														} ?>">
							<i class="fas fa-plus-square"></i>
							<?php if ($this->padre > 0) { ?>
								Create Sub-Banner
							<?php } else { ?>
								Create New
							<?php } ?>
						</a>
						<?php if ($this->padre > 0) { ?>
							<a class="btn btn-sm btn-secondary ms-2" href="<?php echo $this->route; ?>">
								<i class="fas fa-arrow-left"></i> Back to Main Banners
							</a>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<input type="hidden" id="csrf" value="<?php echo $this->csrf ?>"><input type="hidden" id="order-route" value="<?php echo $this->route; ?>/order"><input type="hidden" id="page-route" value="<?php echo $this->route; ?>/changepage">
	</div>
	<div align="center">
		<ul class="pagination justify-content-center">
			<?php
			$url = $this->route;
			if ($this->totalpages > 1) {
				if ($this->page != 1)
					echo '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . ($this->page - 1) . '"> &laquo; Previous </a></li>';
				for ($i = 1; $i <= $this->totalpages; $i++) {
					if ($this->page == $i)
						echo '<li class="active page-item"><a class="page-link">' . $this->page . '</a></li>';
					else
						echo '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . $i . '">' . $i . '</a></li>  ';
				}
				if ($this->page != $this->totalpages)
					echo '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . ($this->page + 1) . '">Next &raquo;</a></li>';
			}
			?>
		</ul>
	</div>
</div>