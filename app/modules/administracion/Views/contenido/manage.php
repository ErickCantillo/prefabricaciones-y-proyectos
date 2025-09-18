<div class="modern-header">
	<div class="header-content">
		<div class="header-icon">
			<i class="fas fa-cogs"></i>
		</div>
		<h1 class="header-title"><?php echo $this->titlesection; ?></h1>
	</div>
</div>

<div class="modern-container">
	<form class="modern-form" enctype="multipart/form-data" method="post" action="<?php echo $this->routeform; ?>"
		data-bs-toggle="validator">
		<div class="form-content">
			<input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
			<input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">
			<?php if ($this->content->contenido_id) { ?>
				<input type="hidden" name="id" id="id" value="<?= $this->content->contenido_id; ?>" />
			<?php } ?>
			<?php
			if ($this->content->contenido_padre) {
				$padre = $this->content->contenido_padre;
			} else {
				$padre = $this->padre;
			}
			if ($this->content->contenido_tipo) {
				$tipo = $this->content->contenido_tipo;
			} else {
				$tipo = $this->tipo;
			}
			if ($this->content->contenido_seccion) {
				$seccion = $this->content->contenido_seccion;
			} else {
				$seccion = $this->seccion;
			}
			?>
			<div class="form-section">
				<div class="section-header">
					<h2 class="section-title">
						<i class="fas fa-layer-group"></i>
						Tipo de contenido
					</h2>
				</div>
				<div class="form-grid"
				</div>
				<input type="hidden" name="contenido_padre"
					value="<?php if ($this->content->contenido_padre) {
								echo $this->content->contenido_padre;
							} else {
								echo $this->padre;
							}  ?>">
				
				<div class="form-field">
					<label class="field-label">
						<i class="fas fa-toggle-on"></i>
						Activar Contenido
					</label>
					<input type="checkbox" name="contenido_estado" value="1" class="form-control switch-form"
						<?php if ($this->getObjectVariable($this->content, 'contenido_estado') == 1) {
							echo "checked";
						} ?>></input>
				</div>
				<?php if ($padre == 0 || $padre == '') { ?>
					<div class="form-field">
						<label class="field-label">
							<i class="fas fa-layer-group"></i>
							Sección
						</label>
						<div class="input-group modern-select">
							<select class="form-control" name="contenido_seccion" id="contenido_seccion" required>
								<option value="">Seleccionar...</option>
								<?php foreach ($this->list_contenido_seccion as $key => $value) { ?>
									<option
										<?php if ($this->getObjectVariable($this->content, "contenido_seccion") == $key) {
											echo "selected";
										} ?>
										value="<?php echo $key; ?>" /> <?= $value; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				<?php } else { ?>
					<input type="hidden" name="contenido_seccion" id="contenido_seccion" value="<?php echo $seccion; ?>">
				<?php } ?>
				<?php if ($this->mostrartipos == 1 || $padre == 0 || $padre == '') { ?>
					<div class="form-field">
						<label class="field-label">
							<i class="fas fa-tags"></i>
							Tipo
						</label>
						<div class="input-group modern-select">
							<select class="form-control" name="contenido_tipo" id="contenido_tipo" required
								onchange="aparecercolumna();">
								<option value="">Seleccionar...</option>
								<?php foreach ($this->list_contenido_tipo as $key => $value) { ?>
									<option <?php if ($this->getObjectVariable($this->content, "contenido_tipo") == $key) {
												echo "selected";
											} ?>
										value="<?php echo $key; ?>" /> <?= $value; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				<?php } else { ?>
					<input type="hidden" name="contenido_tipo" id="contenido_tipo" value="<?php echo $tipo; ?>">
				<?php } ?>
				<div class="form-field d-none">
					<label for="contenido_fecha" class="field-label">
						<i class="fas fa-calendar-alt"></i>
						Fecha
					</label>
					<div class="input-group modern-input">
						<input type="text"
							value="<?php if ($this->content->contenido_fecha) {
										echo $this->content->contenido_fecha;
									} else {
										echo date('d-m-Y');
									} ?>"
							name="contenido_fecha" id="contenido_fecha" class="form-control" data-provide="datepicker"
							data-date-format="dd-mm-yyyy" data-date-language="es" readonly>
					</div>
				</div>
				
				<div class="form-field <?php if ($this->content->contenido_padre == 0) { ?>d-none <?php } ?> si-banner si-seccion no-contenido si-carrousel no-acordion no-contenido2"
					<?php if ($tipo != 1 && $tipo != 2  && $tipo != 6) { ?> style="display: none;" <?php } ?>>
					<label class="field-label">
						<i class="fas fa-arrows-alt-h"></i>
						Distribución de Columnas
					</label>
					<div class="input-group modern-select">
						<select class="form-control" name="contenido_columna_espacios">
							<option value="">Seleccionar...</option>
							<?php foreach ($this->list_contenido_columna_espacios as $key => $value) { ?>
								<option
									<?php if ($this->getObjectVariable($this->content, "contenido_columna_espacios") == $key) {
										echo "selected";
									} ?>
									value="<?php echo $key; ?>" /> <?= $value; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				
				<div class="form-field no-banner no-carrousel no-acordion si-seccion">
					<label class="field-label">
						<i class="fas fa-align-center"></i>
						Alineación
					</label>
					<div class="input-group modern-select">
						<select class="form-control" name="contenido_columna_alineacion">
							<option value="">Seleccionar...</option>
							<?php foreach ($this->list_contenido_columna_alineacion as $key => $value) { ?>
								<option
									<?php if ($this->getObjectVariable($this->content, "contenido_columna_alineacion") == $key) {
										echo "selected";
									} ?>
									value="<?php echo $key; ?>" /> <?= $value; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>
			</div>
			
			<!-- Layout Section -->
			<div class="form-section row">
				<div class="section-header <?php if ($this->content->contenido_padre == 0) { ?>d-none <?php } ?> no-start no-colum">
					<h2 class="section-title">
						<i class="fas fa-th-large"></i>
						Layout
					</h2>
				</div>
				<?php if (($tipo != 4) || $this->contentpadre->contenido_tipo == 2) { ?>
					<div class="form-field column-layout <?php if ($this->content->contenido_padre == 0) { ?>d-none <?php } ?> no-colum">
						<label for="contenido_columna" class="field-label">
							<i class="fas fa-columns"></i>
							Distribución de Columnas
						</label>
						<div class="column-grid">
							<div class="column-option">
								<label class="radio-modern">
									<input type="radio" value="col-md-12" <?php if ($this->content->contenido_columna == 'col-md-12') { ?>
										checked <?php } ?> name="contenido_columna" class="radio-input">
									<div class="radio-visual">
										<img src="/skins/administracion/images/columna12.png" alt="12 columnas">
										<span class="column-label">12/12</span>
									</div>
								</label>
							</div>
							<div class="column-option">
								<label class="radio-modern">
									<input type="radio" value="col-md-6" <?php if ($this->content->contenido_columna == 'col-md-6') { ?>
										checked <?php } ?> name="contenido_columna" class="radio-input">
									<div class="radio-visual">
										<img src="/skins/administracion/images/columna6.png" alt="6 columnas">
										<span class="column-label">6/12</span>
									</div>
								</label>
							</div>
							<div class="column-option">
								<label class="radio-modern">
									<input type="radio" value="col-md-4" <?php if ($this->content->contenido_columna == 'col-md-4') { ?>
										checked <?php } ?> name="contenido_columna" class="radio-input">
									<div class="radio-visual">
										<img src="/skins/administracion/images/columna4.png" alt="4 columnas">
										<span class="column-label">4/12</span>
									</div>
								</label>
							</div>
							<div class="column-option">
								<label class="radio-modern">
									<input type="radio" value="col-md-3" <?php if ($this->content->contenido_columna == 'col-md-3') { ?>
										checked <?php } ?> name="contenido_columna" class="radio-input">
									<div class="radio-visual">
										<img src="/skins/administracion/images/columna3.png" alt="3 columnas">
										<span class="column-label">3/12</span>
									</div>
								</label>
							</div>
							<div class="column-option">
								<label class="radio-modern">
									<input type="radio" value="col-md-2" <?php if ($this->content->contenido_columna == 'col-md-2') { ?>
										checked <?php } ?> name="contenido_columna" class="radio-input">
									<div class="radio-visual">
										<img src="/skins/administracion/images/columna5.png" alt="2 columnas">
										<span class="column-label">2/12</span>
									</div>
								</label>
							</div>
							<div class="column-option no-carrousel2">
								<label class="radio-modern">
									<input type="radio" value="col-md-8" <?php if ($this->content->contenido_columna == 'col-md-8') { ?>
										checked <?php } ?> name="contenido_columna" class="radio-input">
									<div class="radio-visual">
										<img src="/skins/administracion/images/columna8.png" alt="8 columnas">
										<span class="column-label">8/12</span>
									</div>
								</label>
							</div>
							<div class="column-option no-carrousel2">
								<label class="radio-modern">
									<input type="radio" value="col-md-9" <?php if ($this->content->contenido_columna == 'col-md-9') { ?>
										checked <?php } ?> name="contenido_columna" class="radio-input">
									<div class="radio-visual">
										<img src="/skins/administracion/images/columna9.png" alt="9 columnas">
										<span class="column-label">9/12</span>
									</div>
								</label>
							</div>
						</div>
					</div>
				<?php } ?>
				<?php if ($tipo == 5 || $tipo == 6 || $this->contentpadre->contenido_tipo == 2) { ?>
					<div class="col-10 form-group no-banner no-seccion si-carrousel no-acordion si-contenido2 "
						<?php if (($tipo != 2 && $tipo != 4 && $tipo != 5 && $tipo != 6) || $tipo == 0) { ?> style="display: none;"
						<?php } ?>>
						<label for="contenido_disenio" class="control-label">Diseño del contenido</label>
						<div class="row">
							<div class="col-3">
								<label class="radio-disenio">
									<input type="radio" value="1" <?php if ($this->content->contenido_disenio == '1') { ?> checked <?php } ?>
										name="contenido_disenio" id="contenido_disenio" class="form-control">
									<span>
										<img src="/skins/administracion/images/forma1.png">
									</span>
								</label>
							</div>
							<div class="col-3">
								<label class="radio-disenio">
									<input type="radio" value="2" <?php if ($this->content->contenido_disenio == '2') { ?> checked <?php } ?>
										name="contenido_disenio" id="contenido_disenio" class="form-control">
									<span>
										<img src="/skins/administracion/images/forma2.png">
									</span>
								</label>
							</div>
							<div class="col-3">
								<label class="radio-disenio">
									<input type="radio" value="3" <?php if ($this->content->contenido_disenio == '3') { ?> checked <?php } ?>
										name="contenido_disenio" id="contenido_disenio" class="control-label">
									<span>
										<img src="/skins/administracion/images/forma3.png">
									</span>
								</label>
							</div>
							<div class="col-3">
								<label class="radio-disenio">
									<input type="radio" value="4" <?php if ($this->content->contenido_disenio == '4') { ?> checked <?php } ?>
										name="contenido_disenio" id="contenido_disenio" class="form-control">
									<span>
										<img src="/skins/administracion/images/forma4.png">
									</span>
								</label>
							</div>
							<div class="col-3">
								<label class="radio-disenio">
									<input type="radio" value="5" <?php if ($this->content->contenido_disenio == '5') { ?> checked <?php } ?>
										name="contenido_disenio" id="contenido_disenio" class="form-control">
									<span>
										<img src="/skins/administracion/images/forma5.png">
									</span>
								</label>
							</div>
						</div>
						<div class="help-block with-errors"></div>
					</div>
					<div class="col-2 form-group no-banner si-carrousel no-acordion si-contenido2"
						<?php if (isset($tipo) == false || ($tipo != 2 && $tipo != 4  && $tipo != 6)) { ?> style="display: none;"
						<?php } ?>>
						<label class="field-label">
							<i class="fas fa-border-style"></i>
							Border Layout
						</label>
						<input type="checkbox" class="form-control switch-form" name="contenido_borde" value="1"
							<?php if ($this->getObjectVariable($this->content, 'contenido_borde') == 1) {
								echo "checked";
							} ?>></input>
					</div>
				<?php } ?>
				<div class="col-12 no-start">
					<div class="section-header">
						<h2 class="section-title">
							<i class="fas fa-edit"></i>
							Información del contenido
						</h2>
					</div>
				</div>
				<div class="form-grid">
					<div class="form-field">
						<label for="contenido_titulo" class="field-label">
							<i class="fas fa-heading"></i>
							Título
						</label>
						<div class="input-group modern-input">
							<input type="text" value="<?= $this->content->contenido_titulo; ?>" name="contenido_titulo"
								id="contenido_titulo" class="form-control">
						</div>
					</div>
					
					<div class="form-field no-banner si-seccion no-carrousel no-acordion si-contenido2"
						<?php if ($tipo == 1 || $tipo == 6 || $tipo == 7  || $tipo == 0) { ?> style="display: none;" <?php } ?>>
						<label class="field-label">
							<i class="fas fa-eye"></i>
							Mostrar Título
						</label>
						<input type="checkbox" name="contenido_titulo_ver" value="1" class="form-control switch-form"
							<?php if ($this->getObjectVariable($this->content, 'contenido_titulo_ver') == 1) {
								echo "checked";
							} ?>></input>
					</div>
				</div>
				<div class="col-12 form-group no-banner si-seccion si-contenido no-carrousel  no-acordion  si-contenido2"
					<?php if ($tipo == 1 || $tipo == 4 || $tipo == 6 || $tipo == 7  || $tipo == 0) { ?> style="display: none;"
					<?php } ?>>
					<label for="contenido_imagen">Image</label>
					<input type="file" name="contenido_imagen" id="contenido_imagen" class="form-control  file-image"
						data-buttonName="btn-primary" accept="image/gif, image/jpg, image/jpeg, image/png">
					<div class="help-block with-errors"></div>
					<?php if ($this->content->contenido_imagen) { ?>
						<div id="imagen_contenido_imagen">
							<img src="/images/<?= $this->content->contenido_imagen; ?>" class="img-thumbnail thumbnail-administrator" />
							<div><button class="btn btn-danger btn-sm" type="button"
									onclick="eliminarImagen('contenido_imagen','<?php echo $this->route . "/deleteimage"; ?>')"><i
										class="glyphicon glyphicon-remove"></i> Delete Image</button></div>
						</div>
					<?php } ?>
				</div>
				<div class="col-4 form-group no-banner no-acordion no-carrousel si-seccion"
					<?php if ($tipo != 2 && $tipo != 4) { ?> style="display: none;" <?php } ?>>
					<label for="contenido_fondo_imagen"><?php if ($tipo == 4) { ?>Banner Image <?php } else { ?> Background Image
					<?php } ?></label>
					<input type="file" name="contenido_fondo_imagen" id="contenido_fondo_imagen" class="form-control  file-image"
						data-buttonName="btn-primary" accept="image/gif, image/jpg, image/jpeg, image/png">
					<div class="help-block with-errors"></div>
					<?php if ($this->content->contenido_fondo_imagen) { ?>
						<div id="imagen_contenido_fondo_imagen">
							<img src="/images/<?= $this->content->contenido_fondo_imagen; ?>"
								class="img-thumbnail thumbnail-administrator" />
							<div><button class="btn btn-danger btn-sm" type="button"
									onclick="eliminarImagen('contenido_fondo_imagen','<?php echo $this->route . "/deleteimage"; ?>')"><i
										class="glyphicon glyphicon-remove"></i> Delete Image</button></div>
						</div>
					<?php } ?>
				</div>
				<div class="col-4 form-group no-carrousel no-acordion no-carrousel si-seccion" <?php if ($tipo != 2) { ?>
					style="display: none;" <?php } ?>>
					<label class="control-label">Background Type</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rosado "><i class="far fa-list-alt"></i></span>
						</div>
						<select class="form-control" name="contenido_fondo_imagen_tipo">
							<option value="">Select...</option>
							<?php foreach ($this->list_contenido_fondo_imagen_tipo as $key => $value) { ?>
								<option
									<?php if ($this->getObjectVariable($this->content, "contenido_fondo_imagen_tipo") == $key) {
										echo "selected";
									} ?>
									value="<?php echo $key; ?>" /> <?= $value; ?></option>
							<?php } ?>
						</select>
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-4 form-group no-contenido no-banner si-seccion no-acordion si-carrousel si-contenido2"
					<?php if ($tipo != 2 && $tipo != 4 && $tipo != 5  && $tipo != 6) { ?> style="display: none;" <?php } ?>>
					<label for="contenido_fondo_color" class="control-label"><?php if ($tipo == 4) { ?> Caption Color
						<?php } else { ?> Background Color <?php } ?></label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-azul-claro "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->contenido_fondo_color; ?>" name="contenido_fondo_color"
							id="contenido_fondo_color" class="form-control colorpicker">
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 form-group no-banner no-carrousel no-seccion no-acordion si-contenido"
					<?php if ($tipo != 3) { ?> style="display: none;" <?php } ?>>
					<label for="contenido_introduccion" class="form-label">Introduction</label>
					<textarea name="contenido_introduccion" id="contenido_introduccion" class="form-control tinyeditor"
						rows="10"><?= $this->content->contenido_introduccion; ?></textarea>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 form-group no-banner si-seccion si-contenido si-carrousel si-acordion si-contenido2 no-start"
					<?php if (($tipo == 1 || $tipo == 0) && $this->contentpadre->contenido_tipo != 2) { ?> style="display: none;"
					<?php } ?>>
					<label for="contenido_descripcion" class="form-label">Description</label>
					<textarea name="contenido_descripcion" id="contenido_descripcion" class="form-control tinyeditor"
						rows="10"><?= $this->content->contenido_descripcion; ?></textarea>
					<div class="help-block with-errors"></div>
				</div>

				
			</div>
			<div class="row no-banner si-seccion si-contenido no-acordion no-carrousel si-contenido2"
				<?php if ($tipo == 1 || $tipo == 6 || $tipo == 7 || ($tipo == 0 && $this->contentpadre->contenido_tipo == 2)) { ?>
				style="display: none;" <?php } ?>>
				<div class="col-6 form-group no-start">
					<label for="contenido_enlace" class="control-label">Link</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde-claro "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->contenido_enlace; ?>" name="contenido_enlace"
							id="contenido_enlace" class="form-control">
						<div class="input-group-prepend">
							<span class="input-group-text">Open in </span>
							<select class="form-control" name="contenido_enlace_abrir">
								<?php foreach ($this->list_contenido_enlace_abrir as $key => $value) { ?>
									<option
										<?php if ($this->getObjectVariable($this->content, "contenido_enlace_abrir") == $key) {
											echo "selected";
										} ?>
										value="<?php echo $key; ?>" /> <?= $value; ?></option>
								<?php } ?>
							</select>
						</div>
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group no-start">
					<label for="contenido_vermas" class="control-label">Read more text</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rosado "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->contenido_vermas; ?>" name="contenido_vermas"
							id="contenido_vermas" class="form-control">
					</label>
					<div class="help-block with-errors"></div>
				</div>
			</div>
		</div>
		<div class="form-actions">
			<button class="btn btn-primary modern-btn" type="submit">
				<i class="fas fa-save"></i>
				Guardar
			</button>
			<a href="<?php echo $this->route; ?><?php if ($padre) {
													echo "?padre=" . $padre;
												} ?>"
				class="btn btn-secondary modern-btn">
				<i class="fas fa-times"></i>
				Cancelar
			</a>
		</div>
	</form>
</div>

<style>
/* Modern Header */
.modern-header {
	background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
	color: white;
	padding: 0.5rem 0;
	margin-bottom: 0.5rem;
	border-radius: 0 0 1rem 1rem;
	box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.header-content {
	display: flex;
	align-items: center;
	max-width: 1200px;
	margin: 0 auto;
	padding: 0 2rem;
}

.header-icon {
	background: rgba(255, 255, 255, 0.2);
	border-radius: 50%;
	width: 60px;
	height: 60px;
	display: flex;
	align-items: center;
	justify-content: center;
	margin-right: 1.5rem;
	font-size: 1.5rem;
}

.header-title {
	font-size: 2rem;
	font-weight: 600;
	margin: 0;
	text-transform: capitalize;
}

/* Modern Container */
.modern-container {
	/* max-width: 1200px; */
	margin: 0 auto;
	padding: 0 1rem;
}

.modern-form {
	background: white;
	border-radius: 1rem;
	box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
	overflow: hidden;
}

.form-content {
	padding: 2rem;
}

/* Form Sections */
.form-section {
	margin-bottom: 1rem;
}

.section-header {
	margin-bottom: 0.5rem;
	padding-bottom: 0.2rem;
	border-bottom: 2px solid #f8f9fa;
}

.section-title {
	font-size: 1.25rem;
	font-weight: 600;
	color: #495057;
	margin: 0;
	display: flex;
	align-items: center;
	gap: 0.75rem;
	text-transform: capitalize;
}

.section-title i {
	color: #667eea;
	background: rgba(102, 126, 234, 0.1);
	width: 40px;
	height: 40px;
	border-radius: 10px;
	display: flex;
	align-items: center;
	justify-content: center;
}

/* Form Grid */
.form-grid {
	display: grid;
	grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
	gap: 1.5rem;
	align-items: start;
}

/* Form Fields */
.form-field {
	margin-bottom: 1rem;
	display: flex;
	flex-direction: column;
	justify-content: flex-start;
}

.field-label {
	display: block;
	font-weight: 600;
	color: #495057;
	margin-bottom: 0.5rem;
	text-transform: capitalize;
	display: flex;
	align-items: center;
	gap: 0.5rem;
	min-height: 24px;
}

.field-label i {
	color: #667eea;
	width: 20px;
}

/* Alineación para campos con switches */
.form-field input[type="checkbox"].switch-form {
	margin-top: 0.5rem;
}

/* Asegurar que todos los form-fields tengan la misma altura base */
.form-grid .form-field {
	min-height: 80px;
	align-items: flex-start;
}

/* Modern Inputs */
.modern-input input,
.modern-select select {
	width: 100%;
	padding: 0.75rem 1rem;
	border: 2px solid #e9ecef;
	border-radius: 10px;
	font-size: 1rem;
	transition: all 0.3s ease;
	background: white;
}

.modern-input input:focus,
.modern-select select:focus {
	outline: none;
	border-color: #667eea;
	box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

/* Override existing styles */
body {
	background-color: #f8f9fa !important;
	overflow-x: hidden;
}

/* Clean typography */
label {
	text-transform: none !important;
}

.field-label {
	text-transform: none !important;
}

.section-title {
	text-transform: none !important;
}

.header-title {
	text-transform: none !important;
}
.column-layout {
	grid-column: 1 / -1;
}

.column-grid {
	display: grid;
	grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
	gap: 1rem;
	margin-top: 1rem;
}

.column-option {
	display: flex;
	justify-content: center;
}

.radio-modern {
	cursor: pointer;
	position: relative;
	display: block;
}

.radio-input {
	position: absolute;
	opacity: 0;
	cursor: pointer;
}

.radio-visual {
	display: flex;
	flex-direction: column;
	align-items: center;
	padding: 1rem;
	border: 2px solid #e9ecef;
	border-radius: 10px;
	transition: all 0.3s ease;
	background: white;
}

.radio-visual:hover {
	border-color: #667eea;
	transform: translateY(-2px);
	box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.radio-input:checked + .radio-visual {
	border-color: #667eea;
	background: rgba(102, 126, 234, 0.05);
}

.radio-visual img {
	width: 60px;
	height: auto;
	margin-bottom: 0.5rem;
}

.column-label {
	font-size: 0.875rem;
	font-weight: 600;
	color: #495057;
}

/* Form Actions */
.form-actions {
	background: #f8f9fa;
	padding: 1.5rem 2rem;
	display: flex;
	gap: 1rem;
	justify-content: flex-end;
}

.modern-btn {
	padding: 0.75rem 2rem;
	border-radius: 10px;
	font-weight: 600;
	text-decoration: none;
	border: none;
	cursor: pointer;
	transition: all 0.3s ease;
	display: inline-flex;
	align-items: center;
	gap: 0.5rem;
	font-size: 1rem;
}

.btn-primary.modern-btn {
	background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
	color: white;
}

.btn-primary.modern-btn:hover {
	transform: translateY(-2px);
	box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
}

.btn-secondary.modern-btn {
	background: #6c757d;
	color: white;
}

.btn-secondary.modern-btn:hover {
	background: #5a6268;
	transform: translateY(-2px);
	box-shadow: 0 4px 12px rgba(108, 117, 125, 0.3);
}

/* Responsive Design */
@media (max-width: 768px) {
	.header-content {
		flex-direction: column;
		text-align: center;
		gap: 1rem;
	}
	
	.header-icon {
		margin-right: 0;
	}
	
	.form-grid {
		grid-template-columns: 1fr;
	}
	
	.column-grid {
		grid-template-columns: repeat(2, 1fr);
	}
	
	.form-actions {
		flex-direction: column;
	}
	
	.modern-btn {
		justify-content: center;
	}
}

/* Override existing styles */
body {
	background-color: #f8f9fa !important;
	overflow-x: hidden;
}

/* Clean typography */
label {
	text-transform: none !important;
}

.field-label {
	text-transform: none !important;
}

.section-title {
	text-transform: none !important;
}

.header-title {
	text-transform: none !important;
}

/* Modern File Inputs */
.modern-file-input {
	position: relative;
	display: inline-block;
	width: 100%;
}

.modern-file-input input[type="file"] {
	position: absolute;
	left: -9999px;
}

.file-input-label {
	display: block;
	padding: 0.75rem 1rem;
	border: 2px dashed #e9ecef;
	border-radius: 10px;
	background: #f8f9fa;
	cursor: pointer;
	text-align: center;
	transition: all 0.3s ease;
	color: #6c757d;
}

.file-input-label:hover {
	border-color: #667eea;
	background: rgba(102, 126, 234, 0.05);
}

.file-input-label i {
	display: block;
	font-size: 2rem;
	margin-bottom: 0.5rem;
	color: #667eea;
}

/* Modern TextAreas */
.modern-textarea textarea {
	width: 100%;
	padding: 0.75rem 1rem;
	border: 2px solid #e9ecef;
	border-radius: 10px;
	font-size: 1rem;
	transition: all 0.3s ease;
	background: white;
	min-height: 120px;
	resize: vertical;
}

.modern-textarea textarea:focus {
	outline: none;
	border-color: #667eea;
	box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

/* Modern Color Picker */
.modern-colorpicker input {
	width: 100%;
	padding: 0.75rem 1rem;
	border: 2px solid #e9ecef;
	border-radius: 10px;
	font-size: 1rem;
	transition: all 0.3s ease;
	background: white;
}

.modern-colorpicker input:focus {
	outline: none;
	border-color: #667eea;
	box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

/* Image thumbnails */
.modern-thumbnail {
	border-radius: 10px;
	box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
	margin: 1rem 0;
	max-width: 200px;
}

.delete-image-btn {
	background: #dc3545;
	color: white;
	border: none;
	padding: 0.5rem 1rem;
	border-radius: 5px;
	margin-top: 0.5rem;
	cursor: pointer;
	transition: all 0.3s ease;
}

.delete-image-btn:hover {
	background: #c82333;
	transform: translateY(-1px);
}

/* Animations */
@keyframes slideIn {
	from {
		opacity: 0;
		transform: translateY(20px);
	}
	to {
		opacity: 1;
		transform: translateY(0);
	}
}

.form-section {
	animation: slideIn 0.6s ease forwards;
}

.form-section:nth-child(2) {
	animation-delay: 0.1s;
}

.form-section:nth-child(3) {
	animation-delay: 0.2s;
}
</style>