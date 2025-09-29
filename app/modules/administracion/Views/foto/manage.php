
<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
	<form class="text-left" enctype="multipart/form-data" method="post" action="<?php echo $this->routeform;?>"  data-bs-toggle="validator">
		<div class="content-dashboard">
			<input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
			<input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">
			<?php if ($this->content->id) { ?>
				<input type="hidden" name="id" id="id" value="<?= $this->content->id; ?>" />
			<?php }?>
			<div class="row">
				
				<div class="col-12 form-group">
					<label for="foto_titulo"  class="control-label">foto_titulo</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->foto_titulo; ?>" name="foto_titulo" id="foto_titulo" class="form-control"  required >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 form-group">
					<label for="foto_descripcion" class="form-label" >foto_descripcion</label>
					<textarea name="foto_descripcion" id="foto_descripcion"   class="form-control tinyeditor" rows="10"   ><?= $this->content->foto_descripcion; ?></textarea>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 form-group">
					<label for="foto_path" >foto_path</label>
					<input type="file" name="foto_path" id="foto_path" class="form-control  file-image" data-buttonName="btn-primary" accept="image/gif, image/jpg, image/jpeg, image/png"  <?php if(!$this->content->id){ echo 'required'; } ?>>
					<div class="help-block with-errors"></div>
					<?php if($this->content->foto_path) { ?>
						<div id="imagen_foto_path">
							<img src="/images/<?= $this->content->foto_path; ?>"  class="img-thumbnail thumbnail-administrator" />
							<div><button class="btn btn-danger btn-sm" type="button" onclick="eliminarImagen('foto_path','<?php echo $this->route."/deleteimage"; ?>')"><i class="glyphicon glyphicon-remove" ></i> Eliminar Imagen</button></div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="botones-acciones">
			<button class="btn btn-guardar" type="submit">Guardar</button>
			<a href="<?php echo $this->route; ?>" class="btn btn-cancelar">Cancelar</a>
		</div>
	</form>
</div>