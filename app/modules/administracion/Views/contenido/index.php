<!-- Título Principal Moderno -->
<h1 class="titulo-principal">
	<i class="fas fa-layer-group"></i>
	<?php echo $this->titlesection; ?>
</h1>

<div class="container-fluid">
	<!-- Formulario de Filtros Modernos -->
	<form action="<?php echo $this->route . ($this->padre ? "?padre=" . $this->padre : ""); ?>" method="post" id="modern-filter-form">
		<?php if ($this->padre): ?>
			<input type="hidden" name="padre" value="<?= $this->padre ?>">
		<?php endif; ?>
		<div class="content-dashboard">
			<div class="row">
				<!-- Filtro por Sección -->
				<div class="col-md-3 col-sm-6">
					<div class="modern-form-group">
						<label>Sección</label>
						<div class="modern-input-group">
							<div class="modern-input-icon">
								<i class="far fa-list-alt"></i>
							</div>
							<select class="modern-form-control" name="contenido_seccion">
								<option value="">Todas las secciones</option>
								<?php foreach ($this->list_contenido_seccion as $key => $value): ?>
									<option value="<?= $key; ?>"
										<?php if ($this->getObjectVariable($this->filters, 'contenido_seccion') == $key): ?>
										selected
										<?php endif; ?>>
										<?= $value; ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div>

				<!-- Filtro por Nombre -->
				<div class="col-md-3 col-sm-6">
					<div class="modern-form-group">
						<label>Buscar por nombre</label>
						<div class="modern-input-group">
							<div class="modern-input-icon">
								<i class="fas fa-search"></i>
							</div>
							<input type="text"
								class="modern-form-control"
								name="contenido_titulo"
								placeholder="Buscar contenido..."
								value="<?php echo $this->getObjectVariable($this->filters, 'contenido_titulo'); ?>">
						</div>
					</div>
				</div>

				<!-- Filtro por Fecha de Creación -->
				<div class="col-md-3 col-sm-6">
					<div class="modern-form-group">
						<label>Fecha de creación</label>
						<div class="modern-input-group">
							<div class="modern-input-icon">
								<i class="fas fa-calendar-alt"></i>
							</div>
							<input type="date"
								class="modern-form-control"
								name="contenido_fecha"
								value="<?php echo $this->getObjectVariable($this->filters, 'contenido_fecha'); ?>">
						</div>
					</div>
				</div>

				<!-- Botones de Control -->
				<div class="col-md-3 col-sm-6">
					<div class="modern-form-group">
						<label>&nbsp;</label>
						<div class="d-flex gap-2">
							<button type="submit" class="modern-btn modern-btn-primary">
								<i class="fas fa-filter"></i> Filtrar
							</button>
							<a class="modern-btn modern-btn-secondary" href="<?php echo $this->route; ?>?cleanfilter=1<?php if ($this->padre): ?>&padre=<?= $this->padre ?><?php endif; ?>">
								<i class="fas fa-eraser"></i> Limpiar
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>

	<!-- Filtros Activos -->
	<?php if (!empty($this->filters) && (
		$this->getObjectVariable($this->filters, 'contenido_seccion') != '' ||
		$this->getObjectVariable($this->filters, 'contenido_titulo') != '' ||
		$this->getObjectVariable($this->filters, 'contenido_fecha') != ''
	)): ?>
		<div class="row mt-3">
			<div class="col-12">
				<div class="alert alert-info">
					<strong><i class="fas fa-filter"></i> Filtros activos:</strong>
					<?php if ($this->getObjectVariable($this->filters, 'contenido_seccion') != ''): ?>
						<span class="badge bg-primary me-2">
							Sección: <?= $this->list_contenido_seccion[$this->getObjectVariable($this->filters, 'contenido_seccion')] ?>
						</span>
					<?php endif; ?>
					<?php if ($this->getObjectVariable($this->filters, 'contenido_titulo') != ''): ?>
						<span class="badge bg-success me-2">
							Título: <?= $this->getObjectVariable($this->filters, 'contenido_titulo') ?>
						</span>
					<?php endif; ?>
					<?php if ($this->getObjectVariable($this->filters, 'contenido_fecha') != ''): ?>
						<span class="badge bg-warning me-2">
							Fecha: <?= $this->getObjectVariable($this->filters, 'contenido_fecha') ?>
						</span>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<!-- Paginación Superior Moderna -->
	<div class="modern-pagination">
		<ul class="pagination justify-content-center">
			<?php
			$url = $this->route;
			if ($this->totalpages > 1):
				// Botón Anterior
				if ($this->page != 1):
					echo '<li class="page-item">
                            <a class="page-link" href="' . $url . '?page=' . ($this->page - 1) . '">
                                <i class="fas fa-chevron-left"></i> Anterior
                            </a>
                          </li>';
				endif;

				// Números de páginas con mejor lógica de mostrar
				$start = max(1, $this->page - 2);
				$end = min($this->totalpages, $this->page + 2);

				if ($start > 1):
					echo '<li class="page-item">
                            <a class="page-link" href="' . $url . '?page=1">1</a>
                          </li>';
					if ($start > 2):
						echo '<li class="page-item disabled">
                                <span class="page-link">...</span>
                              </li>';
					endif;
				endif;

				for ($i = $start; $i <= $end; $i++):
					if ($this->page == $i):
						echo '<li class="active page-item">
                                <span class="page-link">' . $this->page . '</span>
                              </li>';
					else:
						echo '<li class="page-item">
                                <a class="page-link" href="' . $url . '?page=' . $i . '">' . $i . '</a>
                              </li>';
					endif;
				endfor;

				if ($end < $this->totalpages):
					if ($end < $this->totalpages - 1):
						echo '<li class="page-item disabled">
                                <span class="page-link">...</span>
                              </li>';
					endif;
					echo '<li class="page-item">
                            <a class="page-link" href="' . $url . '?page=' . $this->totalpages . '">' . $this->totalpages . '</a>
                          </li>';
				endif;

				// Botón Siguiente
				if ($this->page != $this->totalpages):
					echo '<li class="page-item">
                            <a class="page-link" href="' . $url . '?page=' . ($this->page + 1) . '">
                                Siguiente <i class="fas fa-chevron-right"></i>
                            </a>
                          </li>';
				endif;
			endif;
			?>
		</ul>
	</div>
	<!-- Estadísticas y Controles Modernos -->
	<div class="content-dashboard">
		<!-- <div class="modern-stats-container">
			<div class="modern-stats-card">
				<div class="modern-stats-number"><?php echo $this->register_number; ?></div>
				<div class="modern-stats-label">Total de Registros</div>
			</div>
			<div class="modern-stats-card">
				<div class="modern-stats-number"><?php echo $this->page; ?></div>
				<div class="modern-stats-label">Página Actual</div>
			</div>
			<div class="modern-stats-card">
				<div class="modern-stats-number"><?php echo $this->totalpages; ?></div>
				<div class="modern-stats-label">Total de Páginas</div>
			</div>
		</div> -->
		
		<div class="row align-items-center">
			<!-- Contador de Registros -->
			<div class="col-md-4">
				<div class="d-flex align-items-center">
					<i class="fas fa-database me-2 text-primary"></i>
					<span class="fw-bold">Mostrando <?php echo count($this->lists); ?> de <?php echo $this->register_number; ?> registros</span>
				</div>
			</div>

			<!-- Selector de Registros por Página -->
			<div class="col-md-4 text-center">
				<div class="d-flex align-items-center justify-content-center">
					<label class="me-2 mb-0">Registros por página:</label>
					<select class="form-select form-select-sm selectpagination" style="width: auto;">
						<option value="20" <?php if ($this->pages == 20) echo 'selected'; ?>>20</option>
						<option value="30" <?php if ($this->pages == 30) echo 'selected'; ?>>30</option>
						<option value="50" <?php if ($this->pages == 50) echo 'selected'; ?>>50</option>
						<option value="100" <?php if ($this->pages == 100) echo 'selected'; ?>>100</option>
					</select>
				</div>
			</div>

			<!-- Botón Crear Nuevo -->
			<div class="col-md-4 text-end">
				<a class="modern-btn modern-btn-success"
					href="<?php echo $this->route . "/manage" . ($this->padre ? "?padre=" . $this->padre : ""); ?>">
					<i class="fas fa-plus"></i> Crear Nuevo
				</a>
			</div>
		</div>
	</div>
		<!-- Tabla de Contenidos Moderna -->
		<div class="modern-table-container">
			<table class="modern-table table table-hover">
				<thead>
					<tr>
						<th><i class="fas fa-tag me-2"></i>Sección</th>
						<th><i class="fas fa-heading me-2"></i>Título</th>
						<th><i class="fas fa-shapes me-2"></i>Tipo</th>
						<th width="120"><i class="fas fa-sort me-2"></i>Orden</th>
						<th width="180"><i class="fas fa-cogs me-2"></i>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($this->lists as $content): ?>
						<?php $id = $content->contenido_id; ?>
						<tr>
							<!-- Sección -->
							<td>
								<div class="d-flex align-items-center">
									<div class="content-type-indicator bg-primary"></div>
									<span class="fw-semibold"><?php echo $this->list_contenido_seccion[$content->contenido_seccion]; ?></span>
								</div>
							</td>

							<!-- Título -->
							<td>
								<div class="content-title-cell">
									<div class="content-main-title"><?php echo $content->contenido_titulo; ?></div>
									<div class="content-meta">ID: <?php echo $id; ?></div>
								</div>
							</td>

							<!-- Tipo -->
							<td>
								<span class="fw-semibold">
									<?php echo $this->list_contenido_tipo[$content->contenido_tipo]; ?>
								</span>
							</td>

							<!-- Controles de Orden -->
							<td>
								<div class="order-controls">
									<input type="hidden" id="<?= $id; ?>" value="<?= $content->orden; ?>">
									<button class="modern-action-btn btn-order-up up_table" title="Subir">
										<i class="fas fa-chevron-up"></i>
									</button>
									<button class="modern-action-btn btn-order-down down_table" title="Bajar">
										<i class="fas fa-chevron-down"></i>
									</button>
								</div>
							</td>

							<!-- Acciones -->
							<td>
								<div class="action-buttons">
									<!-- Botones específicos por tipo de contenido -->
									<?php if ($content->contenido_tipo == 1): ?>
										<a class="modern-action-btn btn-view"
											href="<?php echo $this->route; ?>?padre=<?= $id ?>"
											data-bs-toggle="tooltip"
											data-placement="top"
											title="Ver Banners">
											<i class="fas fa-images"></i>
										</a>
									<?php endif; ?>

									<?php if ($content->contenido_tipo == 2): ?>
										<a class="modern-action-btn btn-view"
											href="<?php echo $this->route; ?>?padre=<?= $id ?>"
											data-bs-toggle="tooltip"
											data-placement="top"
											title="Ver Columnas">
											<i class="fas fa-columns"></i>
										</a>
									<?php endif; ?>

									<?php if (in_array($content->contenido_tipo, [6, 7, 8])): ?>
										<a class="modern-action-btn btn-view"
											href="<?php echo $this->route; ?>?padre=<?= $id ?>"
											data-bs-toggle="tooltip"
											data-placement="top"
											title="Ver Elementos">
											<i class="fas fa-th-list"></i>
										</a>
									<?php endif; ?>

									<!-- Botón Editar -->
									<a class="modern-action-btn btn-edit"
										href="<?php echo $this->route; ?>/manage?id=<?= $id ?>"
										data-bs-toggle="tooltip"
										data-placement="top"
										title="Editar">
										<i class="fas fa-edit"></i>
									</a>

									<!-- Botón Eliminar (solo para nivel 1) -->
									<?php if ($_SESSION['kt_login_level'] == 1): ?>
										<button class="modern-action-btn btn-delete"
											data-bs-toggle="modal"
											data-bs-target="#modal<?php echo $id ?>"
											title="Eliminar">
											<i class="fas fa-trash"></i>
										</button>
									<?php endif; ?>
								</div>

								<!-- Modal de Confirmación de Eliminación Moderno -->
								<div class="modal fade"
									id="modal<?= $id ?>"
									tabindex="-1"
									aria-labelledby="modalLabel<?= $id ?>"
									aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
											<div class="modal-header border-0">
												<h5 class="modal-title d-flex align-items-center" id="modalLabel<?= $id ?>">
													<i class="fas fa-exclamation-triangle text-warning me-2"></i>
													Confirmar Eliminación
												</h5>
												<button type="button"
													class="btn-close"
													data-bs-dismiss="modal"
													aria-label="Close"></button>
											</div>
											<div class="modal-body text-center py-4">
												<div class="mb-3">
													<i class="fas fa-trash text-danger" style="font-size: 3rem;"></i>
												</div>
												<h6 class="mb-3">¿Está seguro que desea eliminar este registro?</h6>
												<p class="text-muted mb-0">
													<strong><?= $content->contenido_titulo ?></strong><br>
													Esta acción no se puede deshacer.
												</p>
											</div>
											<div class="modal-footer border-0 justify-content-center">
												<button type="button"
													class="modern-btn modern-btn-secondary"
													data-bs-dismiss="modal">
													<i class="fas fa-times"></i> Cancelar
												</button>
												<a class="modern-btn btn-delete-confirm"
													href="<?php echo $this->route; ?>/delete?id=<?= $id ?>&csrf=<?= $this->csrf; ?><?php if ($this->padre) echo "&padre=" . $this->padre; ?>"
													style="background: linear-gradient(135deg, #dc3545, #c82333); color: white;">
													<i class="fas fa-trash"></i> Eliminar
												</a>
											</div>
										</div>
									</div>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<!-- Información Final y Controles -->
		<div class="content-dashboard">
			<div class="row align-items-center">
				<!-- Contador de Registros -->
				<div class="col-md-6">
					<div class="d-flex align-items-center">
						<i class="fas fa-info-circle me-2 text-info"></i>
						<span class="fw-semibold">
							Se encontraron <?php echo $this->register_number; ?> registros en total
						</span>
					</div>
				</div>

				<!-- Botón Crear Nuevo -->
				<div class="col-md-6 text-end">
					<a class="modern-btn modern-btn-success"
						href="<?php echo $this->route . "/manage" . ($this->padre ? "?padre=" . $this->padre : ""); ?>">
						<i class="fas fa-plus"></i> Crear Nuevo Contenido
					</a>
				</div>
			</div>
		</div>

		<!-- Campos Ocultos para JavaScript -->
		<input type="hidden" id="csrf" value="<?php echo $this->csrf; ?>">
		<input type="hidden" id="order-route" value="<?php echo $this->route; ?>/order">
		<input type="hidden" id="page-route" value="<?php echo $this->route; ?>/changepage">
	</div>
	<!-- Paginación Inferior Moderna -->
	<div class="modern-pagination">
		<ul class="pagination justify-content-center">
			<?php
			$url = $this->route;
			if ($this->totalpages > 1):
				// Botón Anterior
				if ($this->page != 1):
					echo '<li class="page-item">
                            <a class="page-link" href="' . $url . '?page=' . ($this->page - 1) . '">
                                <i class="fas fa-chevron-left"></i> Anterior
                            </a>
                          </li>';
				endif;

				// Números de páginas con mejor lógica de mostrar
				$start = max(1, $this->page - 2);
				$end = min($this->totalpages, $this->page + 2);

				if ($start > 1):
					echo '<li class="page-item">
                            <a class="page-link" href="' . $url . '?page=1">1</a>
                          </li>';
					if ($start > 2):
						echo '<li class="page-item disabled">
                                <span class="page-link">...</span>
                              </li>';
					endif;
				endif;

				for ($i = $start; $i <= $end; $i++):
					if ($this->page == $i):
						echo '<li class="active page-item">
                                <span class="page-link">' . $this->page . '</span>
                              </li>';
					else:
						echo '<li class="page-item">
                                <a class="page-link" href="' . $url . '?page=' . $i . '">' . $i . '</a>
                              </li>';
					endif;
				endfor;

				if ($end < $this->totalpages):
					if ($end < $this->totalpages - 1):
						echo '<li class="page-item disabled">
                                <span class="page-link">...</span>
                              </li>';
					endif;
					echo '<li class="page-item">
                            <a class="page-link" href="' . $url . '?page=' . $this->totalpages . '">' . $this->totalpages . '</a>
                          </li>';
				endif;

				// Botón Siguiente
				if ($this->page != $this->totalpages):
					echo '<li class="page-item">
                            <a class="page-link" href="' . $url . '?page=' . ($this->page + 1) . '">
                                Siguiente <i class="fas fa-chevron-right"></i>
                            </a>
                          </li>';
				endif;
			endif;
			?>
		</ul>
	</div>
</div>