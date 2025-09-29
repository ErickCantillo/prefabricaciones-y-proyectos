<h1 class="titulo-principal py-2"><i class="fas fa-file-invoice"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
	<form action="<?php echo $this->route; ?><?php if ($this->padre) {
													echo "?padre=" . $this->padre;
												} ?>" method="post">
		<div class="content-dashboard">
			<div class="row">
				<div class="col-3">
					<label for="" class="form-label">Sección</label>
					<label class="input-group">
						<span class="input-group-text input-icono"><i class="far fa-list-alt"></i></span>
						<select class="form-select" name="contenido_seccion">
							<option value="">Todas</option>
							<?php foreach ($this->list_contenido_seccion as $key => $value) : ?>
								<option value="<?= $key; ?>" <?php if ($this->getObjectVariable($this->filters, 'contenido_seccion') ==  $key) {
																	echo "selected";
																} ?>><?= $value; ?></option>
							<?php endforeach ?>
						</select>
					</label>
				</div>
				<div class="col-3">
					<label for="" class="form-label">Título</label>
					<label class="input-group">
						<span class="input-group-text input-icono"><i class="fas fa-pencil-alt"></i></span>
						<input type="text" class="form-control" name="contenido_titulo" value="<?php echo $this->getObjectVariable($this->filters, 'contenido_titulo') ?>">
					</label>
				</div>
				<div class="col-2">
					<label class="form-label">&nbsp;</label>
					<label class="input-group">
						<button type="submit" class="btn w-100 btn-azul"> <i class="fas fa-filter"></i> Filtrar</button>
					</label>
				</div>
				<div class="col-2">
					<label class="form-label">&nbsp;</label>
					<label class="input-group">
						<a class="btn w-100 btn-azul-claro " href="<?php echo $this->route; ?>?cleanfilter=1"> <i class="fas fa-eraser"></i> Limpiar Filtro</a>
					</label>
				</div>
			</div>
		</div>
	</form>
	<div align="center">
		<ul class="pagination justify-content-center">
			<?php
			if ($this->page != 1)
				echo '<li class="page-item" ><a class="page-link"  href="' . $url . '?page=' . ($this->page - 1) . '"> &laquo; Anterior </a></li>';
			for ($i = 1; $i <= $this->totalpages; $i++) {
				if ($this->page == $i)
					echo '<li class="active page-item"><a class="page-link">' . $this->page . '</a></li>';
				else
					echo '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . $i . '">' . $i . '</a></li>  ';
			}
			if ($this->page != $this->totalpages)
				echo '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . ($this->page + 1) . '">Siguiente &raquo;</a></li>';
			?>
		</ul>
	</div>
	<div class="content-dashboard">
		<div class="franja-paginas">
			<div class="row align-items-center">
				<div class="col-5">
					<div class="titulo-registro">Se encontraron <?php echo $this->register_number; ?> Registros</div>
				</div>
				<div class="col-5 d-flex align-items-center">
					<div class="texto-paginas me-2">Registros por página:</div>
					<select class="form-select form-select-sm selectpagination" style="width: auto;">
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
				<div class="col-2 text-end">
					<a class="btn btn-sm btn-success" href="<?php echo $this->route . "\manage"; ?><?php if ($this->padre) {
																										echo "?padre=" . $this->padre;
																									} ?>">
						<i class="fas fa-plus-square"></i> Crear Nuevo
					</a>
				</div>
			</div>
		</div>
		<div class="content-table">
			<table class=" table table-striped  table-hover table-administrator text-left">
				<thead>
					<tr>
						<td>Sección</td>
						<td>Título</td>
						<td>Tipo</td>
						<td width="100">Orden</td>
						<td width="150"></td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($this->lists as $content) { ?>
						<?php $id =  $content->contenido_id; ?>
						<tr>
							<td><?php echo $this->list_contenido_seccion[$content->contenido_seccion]; ?></td>
							<td><?php echo $content->contenido_titulo; ?></td>
							<td><?php echo $this->list_contenido_tipo[$content->contenido_tipo]; ?></td>
							<td>
								<input type="hidden" id="<?= $id; ?>" value="<?= $content->orden; ?>"></input>
								<button class="up_table btn btn-primary btn-sm"><i class="fas fa-angle-up"></i></button>
								<button class="down_table btn btn-primary btn-sm"><i class="fas fa-angle-down"></i></button>
							</td>
							<td class="text-right">
								<div>
									<?php if ($content->contenido_tipo == 1) { ?>
										<a class="btn btn-rosado btn-sm" href="<?php echo $this->route; ?>?padre=<?= $id ?>" data-bs-toggle="tooltip" data-placement="top" title="Banners"><i class="fas fa-images"></i></a>
									<?php } ?>
									<?php if ($content->contenido_tipo == 2) { ?>
										<a class="btn btn-rosado btn-sm" href="<?php echo $this->route; ?>?padre=<?= $id ?>" data-bs-toggle="tooltip" data-placement="top" title="Columnas"><i class="fas fa-columns"></i></a>
									<?php } ?>
									<?php if ($content->contenido_tipo == 6 || $content->contenido_tipo == 7) { ?>
										<a class="btn btn-rosado btn-sm" href="<?php echo $this->route; ?>?padre=<?= $id ?>" data-bs-toggle="tooltip" data-placement="top" title="Elementos"><i class="fas fa-plus-square"></i></a>
									<?php } ?>
									<?php if ($content->contenido_tipo == 3  && $content->contenido_enlace_abrir == 2) { ?>
										<a class="btn btn-rosado btn-sm" href="<?php echo $this->route; ?>?padre=<?= $id ?>" data-bs-toggle="tooltip" data-placement="top" title="interna"><i class="fas fa-plus-square"></i></a>
									<?php } ?>
									<a class="btn btn-azul btn-sm" href="<?php echo $this->route; ?>/manage?id=<?= $id ?>" data-bs-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-pen-alt"></i></a>
									<span data-bs-toggle="tooltip" data-placement="top" title="Eliminar"><a class="btn btn-rojo btn-sm" data-bs-toggle="modal" data-bs-target="#modal<?= $id ?>"><i class="fas fa-trash-alt"></i></a></span>
								</div>
								<!-- Modal -->
								<div class="modal fade text-left" id="modal<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
												<button type="button" class="close btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<div class="">¿Esta seguro de eliminar este registro?</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancelar</button>
												<a class="btn btn-danger" href="<?php echo $this->route; ?>/delete?id=<?= $id ?>&csrf=<?= $this->csrf; ?><?php if ($this->padre) {
																																							echo "&padre=" . $this->padre;
																																						} ?>">Eliminar</a>
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
		<input type="hidden" id="csrf" value="<?php echo $this->csrf ?>"><input type="hidden" id="order-route" value="<?php echo $this->route; ?>/order"><input type="hidden" id="page-route" value="<?php echo $this->route; ?>/changepage">
	</div>
	<div align="center">
		<ul class="pagination justify-content-center">
			<?php
			$url = $this->route;
			if ($this->totalpages > 1) {
				if ($this->page != 1)
					echo '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . ($this->page - 1) . '"> &laquo; Anterior </a></li>';
				for ($i = 1; $i <= $this->totalpages; $i++) {
					if ($this->page == $i)
						echo '<li class="active page-item"><a class="page-link">' . $this->page . '</a></li>';
					else
						echo '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . $i . '">' . $i . '</a></li>  ';
				}
				if ($this->page != $this->totalpages)
					echo '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . ($this->page + 1) . '">Siguiente &raquo;</a></li>';
			}
			?>
		</ul>
	</div>
</div>