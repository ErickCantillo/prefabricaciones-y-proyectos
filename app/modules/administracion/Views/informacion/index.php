<div class="container-fluid">
	<form enctype="multipart/form-data" method="post" action="<?php echo $this->routeform;?>" data-bs-toggle="validator">
		<input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
		<input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">
		<?php if ($this->content->info_pagina_id) { ?>
			<input type="hidden" name="id" id="id" value="<?= $this->content->info_pagina_id; ?>" />
		<?php }?>

		<div class="row">
			<div class="col-6">
				<div class="row">
					<div class="col-12">
						<a id="redes" name="redes"></a>
						<div class="div-dashboard">
							<h2>
								<i class="fas fa-comment-dots"></i> Redes Sociales
							</h2>
							<div class="container-fluid my-3">
								<div class="row">
									<div class="col-6 mb-3">
										<div class="input-group">
											<span class="input-group-text input-icono fondo-facebook" ><i class="fab fa-facebook-f"></i></span>
											<input type="text" value="<?= $this->content->info_pagina_facebook; ?>" name="info_pagina_facebook" id="info_pagina_facebook" class="form-control"   >
										</div>
									</div>
									<div class="col-6 mb-3">
										<div class="input-group">
											<span class="input-group-text input-icono fondo-instagram" ><i class="fab fa-instagram"></i></span>
											<input type="text" value="<?= $this->content->info_pagina_instagram; ?>" name="info_pagina_instagram" id="info_pagina_instagram" class="form-control"   >
										</div>
									</div>
									<div class="col-6 mb-3">
										<div class="input-group">
											<span class="input-group-text input-icono fondo-twitter" ><i class="fab fa-x-twitter"></i></span>
											<input type="text" value="<?= $this->content->info_pagina_twitter; ?>" name="info_pagina_twitter" id="info_pagina_twitter" class="form-control"   >
										</div>
									</div>
									<div class="col-6 mb-3">
										<div class="input-group">
											<span class="input-group-text input-icono fondo-pinterest" ><i class="fab fa-pinterest"></i></span>
											<input type="text" value="<?= $this->content->info_pagina_pinterest; ?>" name="info_pagina_pinterest" id="info_pagina_pinterest" class="form-control"   >
										</div>
									</div>
									<div class="col-6 mb-3">
										<div class="input-group">
											<span class="input-group-text input-icono fondo-youtube" ><i class="fab fa-youtube"></i></span>
											<input type="text" value="<?= $this->content->info_pagina_youtube; ?>" name="info_pagina_youtube" id="info_pagina_youtube" class="form-control"   >
										</div>
									</div>
									<div class="col-6 mb-3">
										<div class="input-group">
											<span class="input-group-text input-icono fondo-tiktok" ><i class="fab fa-tiktok"></i></span>
											<input type="text" value="<?= $this->content->info_pagina_flickr; ?>" name="info_pagina_flickr" id="info_pagina_flickr" class="form-control"   >
										</div>
									</div>
									<div class="col-6 mb-3">
										<div class="input-group">
											<span class="input-group-text input-icono fondo-linkedin" ><i class="fab fa-linkedin"></i></span>
											<input type="text" value="<?= $this->content->info_pagina_linkedin; ?>" name="info_pagina_linkedin" id="info_pagina_linkedin" class="form-control"   >
										</div>
									</div>
									<div class="col-6 mb-3 d-none">
										<div class="input-group">
											<span class="input-group-text input-icono fondo-google" ><i class="fab fa-google-plus-g"></i></span>
											<input type="text" value="<?= $this->content->info_pagina_google; ?>" name="info_pagina_google" id="info_pagina_google" class="form-control"   >
										</div>
									</div>
									<div class="col-6 mb-3">
										<div class="input-group">
											<span class="input-group-text input-icono fondo-whatsapp" ><i class="fab fa-whatsapp"></i></span>
											<input type="text" value="<?= $this->content->info_pagina_whatsapp; ?>" name="info_pagina_whatsapp" id="info_pagina_whatsapp" class="form-control"   >
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12">
						<a id="maps" name="maps"></a>
						<div class="div-dashboard">
							<h2>
								<i class="fas fa-location"></i> Google Maps
							</h2>
							<div class="container-fluid my-3">
								<div class="row">
									<div class="col-4 mb-3">
										<label for="info_pagina_latitud"  class="form-label">Latitud:</label>
										<div class="input-group">
											<span class="input-group-text input-icono-grande" ><i class="fas fa-map-marker-alt"></i></span>
											<input type="text" value="<?= $this->content->info_pagina_latitud; ?>" name="info_pagina_latitud" id="info_pagina_latitud" class="form-control"   >
										</div>
									</div>
									<div class="col-4 mb-3">
										<label for="info_pagina_longitud"  class="form-label">Longitud:</label>
										<div class="input-group">
											<span class="input-group-text input-icono-grande" ><i class="fas fa-globe"></i></span>
											<input type="text" value="<?= $this->content->info_pagina_longitud; ?>" name="info_pagina_longitud" id="info_pagina_longitud" class="form-control"   >
										</div>
									</div>
									<div class="col-4 mb-3">
										<label for="info_pagina_zoom"  class="form-label">Zoom:</label>
										<div class="input-group">
											<span class="input-group-text input-icono-grande" ><i class="fas fa-search-plus"></i></span>
											<input type="text" value="<?= $this->content->info_pagina_zoom; ?>" name="info_pagina_zoom" id="info_pagina_zoom" class="form-control"   >
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12">
						<a id="seo" name="seo"></a>
						<div class="div-dashboard">
							<h2>
								<i class="fas fa-spinner"></i> Archivo SEO
							</h2>
							<div class="container-fluid my-3">
								<div class="row">
									<div class="col-12 mb-3">
										<h5> Descripción: </h5>
										<div class="input-group">
											<span class="input-group-text input-icono-grande" ><i class="fas fa-file-alt"></i></span>
											<input name="info_pagina_descripcion" id="info_pagina_descripcion" class="form-control" value="<?= $this->content->info_pagina_descripcion; ?>">
										</div>
									</div>
									<div class="col-12 mb-3">
										<h5> Tags: </h5>
										<div class="input-group">
											<span class="input-group-text input-icono-grande" ><i class="fas fa-tags"></i></span>
											<input name="info_pagina_tags" id="info_pagina_tags" class="form-control" value="<?= $this->content->info_pagina_tags; ?>">
										</div>
									</div>
									<div class="col-12 mb-3">
										<h5> Archivos SEO: </h5>
										<div class="contenedor-informacion">
											<div class="contenido d-flex">
												<input type="file" name="info_pagina_robot" id="info_pagina_robot" class="form-control  file-robot" data-buttonName="btn-primary" onchange="validardocumento('info_pagina_robot');" accept="text/plain" >
												<input type="file" name="info_pagina_sitemap" id="info_pagina_sitemap" class="form-control  file-sitemap" data-buttonName="btn-primary" onchange="validardocumento('info_pagina_sitemap');" accept="text/xml" >
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 d-none">
						<a id="metricas" name="metricas"></a>
						<div class="div-dashboard">
							<h2>
								<i class="fas fa-chart-line"></i> Script métricas
							</h2>
							<br>
							<div class="pading-dashboard">
								<div class="row">
									<div class="col-12 mb-3">

										<div class="input-group">
											<span class="input-group-text d-flex justify-content-center align-items-center" ><i class="fas fa-chart-line"></i></span>
											<textarea name="info_pagina_metricas" id="info_pagina_metricas"   class="form-control" rows="10"   ><?= $this->content->info_pagina_metricas; ?></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-6">
				<div class="row">
					<div class="col-12">
						<a id="contactenos" name="contactenos"></a>
						<div class="div-dashboard">
							<h2>
								<i class="fas fa-book"></i> Información de Contáctenos
							</h2>
							<div class="container-fluid my-3">
								<div class="row">
									<div class="col-6 mb-3">
										<label for="info_pagina_telefono"  class="form-label">Teléfonos:</label>
										<div class="input-group">
											<span class="input-group-text input-icono" ><i class="fas fa-phone"></i></span>
											<input name="info_pagina_telefono" id="info_pagina_telefono"   class="form-control" value="<?= $this->content->info_pagina_telefono; ?>" >
										</div>
									</div>
									<div class="col-6 mb-3">
										<label for="info_pagina_correos_contacto" class="form-label" >Correo Contacto:</label>
										<div class="input-group">
											<span class="input-group-text input-icono" ><i class="fas fa-envelope"></i></span>
											<input name="info_pagina_correos_contacto" id="info_pagina_correos_contacto" class="form-control" value="<?= $this->content->info_pagina_correos_contacto; ?>" >
										</div>
									</div>
									<div class="col-12 mb-3">
										<label for="info_pagina_direccion_contacto" class="form-label" >Dirección:</label>
										<div class="input-group">
											<span class="input-group-text input-icono" ><i class="fas fa-map-marked-alt"></i></span>
											<input name="info_pagina_direccion_contacto" id="info_pagina_direccion_contacto" class="form-control" value="<?= $this->content->info_pagina_direccion_contacto; ?>" >
										</div>
									</div>
									<div class="col-6 mb-3">
										<label for="info_pagina_informacion_contacto" class="form-label" >Información Contacto:</label>
										<textarea name="info_pagina_informacion_contacto" id="info_pagina_informacion_contacto"   class="form-control tinyeditor" rows="10"   ><?= $this->content->info_pagina_informacion_contacto; ?></textarea>
									</div>
									<div class="col-6 mb-3">
										<label for="info_pagina_informacion_contacto_footer"  class="form-label">Información Contacto Footer:</label>
										<textarea name="info_pagina_informacion_contacto_footer" id="info_pagina_informacion_contacto_footer"   class="form-control tinyeditor" rows="10"   ><?= $this->content->info_pagina_informacion_contacto_footer; ?></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12">
						<a id="configcorreo" name="configcorreo"></a>
						<div class="div-dashboard">
							<h2>
								<i class="fas fa-envelope"></i> Configuración Envio Correo
							</h2>
							<div class="container-fluid my-3">
								<div class="row">
									<div class="col-12">
										<table class="table table-bordered table-striped">
											<tbody>
												<tr>
													<th scope="row">Host</th>
													<td>
														<input class="input_correo form-control" type="text" name="info_pagina_host" id="info_pagina_host" value="<?= $this->content->info_pagina_host; ?>" required>
													</td>

												</tr>
												<tr>
													<th scope="row">Puerto</th>
													<td>
														<input class="input_correo form-control" type="number" name="info_pagina_port" id="info_pagina_port" value="<?= $this->content->info_pagina_port; ?>" required>

													</td>

												</tr>
												<tr>
													<th scope="row">Usuario</th>
													<td>
														<input class="input_correo form-control" type="text" name="info_pagina_username" id="info_pagina_username" value="<?= $this->content->info_pagina_username; ?>" required>

													</td>

												</tr>
												<tr>
													<th scope="row">Password</th>
													<td>
														<input class="input_correo form-control" type="password" name="info_pagina_password" id="info_pagina_password" value="<?= $this->content->info_pagina_password; ?>" required>

													</td>

												</tr>

												<tr>
													<th scope="row">Correo remitente</th>
													<td>
														<input class="input_correo form-control" type="text" name="info_pagina_correo_remitente" id="info_pagina_correo_remitente" value="<?= $this->content->info_pagina_correo_remitente; ?>" required>

													</td>

												</tr>
												<tr>
													<th scope="row">Nombre remitente</th>
													<td>
														<input class="input_correo form-control" type="text" name="info_pagina_nombre_remitente" id="info_pagina_nombre_remitente" value="<?= $this->content->info_pagina_nombre_remitente; ?>" required>

													</td>

												</tr>
												<tr>
													<th scope="row">Copia</th>
													<td>
														<input class="input_correo form-control" type="text" name="info_pagina_correo_oculto" id="info_pagina_correo_oculto" value="<?= $this->content->info_pagina_correo_oculto; ?>">

													</td>

												</tr>
											</tbody>
										</table>

									</div>
									<div class="col-2">&nbsp</div>


								</div>
							</div>
						</div>
					</div>
					<div class="col-12">
						<a id="scripts" name="scripts"></a>
						<div class="div-dashboard">
							<h2>
								<i class="fas fa-code"></i> Scripts Head
							</h2>
							<br>
							<div class="pading-dashboard">
								<div class="row">
									<div class="col-12 mb-3">
										<div class="input-group">
											<span class="input-group-text" ><i class="fas fa-shield-alt"></i></span>
											<textarea name="info_pagina_scripts" id="info_pagina_scripts"   class="form-control" rows="10"   ><?= $this->content->info_pagina_scripts; ?></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		

		

		

		

		

		<div class="botones-acciones">
			<button class="btn btn-guardar" type="submit">Guardar</button>
			<a href="/administracion/panel" class="btn btn-cancelar">Cancelar</a>
		</div>
	</form>
</div>