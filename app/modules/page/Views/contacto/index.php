<style>
  header {
    position: sticky;
    background-color: #FFF;
    border-bottom: 1px solid var(--gris-claro);
  }

  body {
    height: auto;
  }


</style>
<?php echo $this->banner ?>
<div class="contenido-contacto contenido-interna">

  <div class="row justify-content-center">
    <div class="col-12 col-lg-6 order-2 order-lg-1">
      <div class="card shadow-lg">
        <div class="card-header bg-azul text-white">
          <h4 class="mb-0">  Informacion de Contacto</h4>
        </div>
        <div class="card-body">
          <form action="/page/contacto/enviarcontacto" method="post" id="form-contacto">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="name" class="form-label">Nombre completo *</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Ingrese su nombre completo"
                    required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="phone" class="form-label">Telefono *</label>
                  <input type="number" name="phone" class="form-control" id="phone" placeholder="Ingrese su telefono"
                    required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="email" class="form-label">Correo electrónico *</label>
                  <input type="email" name="email" class="form-control" id="email"
                    placeholder="Ingrese su correo electrónico" required>
                </div>
              </div>
              
            </div>

            <div class="mb-3">
              <label for="message" class="form-label">Mensaje *</label>
              <textarea name="message" class="form-control" id="message" rows="5"
                placeholder="Mensaje:" required></textarea>
            </div>

            <!-- Campo honeypot oculto -->
            <input type="hidden" name="company" class="form-control" placeholder="Company">
            <input name="hash" type="hidden" value="<?php echo md5(date("Y-m-d")); ?>" />
            <div class="mb-3 d-flex gap-2 align-items-center">
              <input type="checkbox" required name="privacy" id="privacy">
              <label for="privacy" data-bs-toggle="modal" data-bs-target="#modalPoliticas" role="button"><?= $this->len['accept_privacy_policy'] ?></label>
            </div>

            <div class="g-recaptcha mb-3" data-sitekey="6LfFDZskAAAAAE2HmM7Z16hOOToYIWZC_31E61Sr"></div>

            <div class="d-flex justify-content-center">
              <button type="submit" id="submit-btn-contacto" class="btn-azul">
                Enviar Mensaje
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-6 order-1 order-lg-2">
      <div>
        <?= print_r($this->infopage, true) ?>
    </div>

  </div>
</div>
<div class="modal fade modalPoliticas" id="modalPoliticas" tabindex="-1" aria-labelledby="modalPoliticasLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <?php echo $this->infopage->info_pagina_titulo_legal ?>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body bg-white pb-1">

        <?php echo $this->infopage->info_pagina_descripcion_legal ?>
      </div>
      <div class="modal-footer bg-white border-0 pt-0">
        <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal"><?= $this->len['close'] ?></button>
        <button type="button" class="btn btn-primary d-none">Save changes</button>
      </div>
    </div>
  </div>
</div>
 <?php echo $this->contenido ?>
</div>
