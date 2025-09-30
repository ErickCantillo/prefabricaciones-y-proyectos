<style>

  .contenido-contacto {
    background: #f9f9f9;
    min-height: 100vh;
    padding: 0;
  }

  .contacto-container {
    display: flex;
    min-height: 100vh;
    overflow: hidden;
  }

  .contacto-imagen {
    flex: 1;
    background-image: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,0.1)), url('/images/ImagenContacto.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    min-height: 50vh;
  }

  .contacto-formulario {
    flex: 1;
    background: #f9f9f9;
    padding: 2vh 4vw;
  }

  .formulario-wrapper {
    width: 100%;
    max-width: 500px;
  }

  .contacto-titulo {
    color: var(--gris-medio);
    font-size: 20px;
    font-weight: 400;
    line-height: 1.4;
    /* margin-bottom: 40px; */
    text-align: left;
  }

  .form-group {
    margin-bottom: 1vh;
    position: relative;
  }

  .form-label {
    color: var(--secondary-color);
    font-size: 16px;
    font-weight: 500;
    margin-bottom: 8px;
    display: block;
  }

  .form-control {
    width: 100%;
    padding: 15px 18px;
    border: 2px solid #e8e8e8;
    border-radius: 8px;
    font-size: 15px;
    background: #fafafa;
    transition: all 0.3s ease;
    color: #333;
  }

  .form-control::placeholder {
    color: #E3AE24;
    font-weight: 500;
    font-size: 15px;
  }

  .form-control:focus {
    outline: none;
    border-color: #E3AE24;
    background: #ffffff;
    box-shadow: 0 0 0 3px rgba(227, 174, 36, 0.1);
  }

  .form-control.textarea {
    resize: vertical;
    /* min-height: 120px; */
    font-family: inherit;
  }

  .checkbox-container {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    margin: 25px 0;
  }

  .checkbox-container input[type="checkbox"] {
    width: 18px;
    height: 18px;
    margin: 0;
    cursor: pointer;
  }

  .checkbox-label {
    color: var(--gris-medio);
    font-size: 14px;
    line-height: 1.4;
    cursor: pointer;
    flex: 1;
  }

  .checkbox-label a {
    color: var(--tertiary-color);
    text-decoration: none;
  }

  .checkbox-label a:hover {
    text-decoration: underline;
  }

  .btn-enviar {
    background: var(--secondary-color);
    color: #fff;
    border: none;
    padding: 15px 40px;
    font-size: 16px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .btn-enviar:hover {
    background: #e09e00;
    transform: translateY(-1px);
  }

  .btn-enviar:disabled {
    background: #cccccc;
    cursor: not-allowed;
    transform: none;
  }

  .recaptcha-container {
    margin: 25px 0;
  }

  /* Responsive */
  @media (max-width: 768px) {
    .contacto-container {
      flex-direction: column;
    }

    .contacto-imagen {
      min-height: 40vh;
      flex: none;
    }

    .contacto-formulario {
      padding: 30px 20px;
      min-height: 60vh;
    }

    .contacto-titulo {
      font-size: 18px;
      /* margin-bottom: 30px; */
      text-align: center;
    }
  }

  /* Loader styles */
  .loader-bx {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    z-index: 9999;
    justify-content: center;
    align-items: center;
  }

  .loader-bx.show {
    display: flex;
  }

  .loader {
    width: 40px;
    height: 40px;
    border: 4px solid #f3f3f3;
    border-top: 4px solid var(--secondary-color);
    border-radius: 50%;
    animation: spin 1s linear infinite;
  }

  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }
</style>

<?php echo $this->banner ?>
<div class="contenido-contacto contenido-interna">
  <?php echo $this->contenido ?>
  
  <div class="contacto-container">
    <!-- Imagen lateral -->
    <div class="contacto-imagen"></div>
    
    <!-- Formulario de contacto -->
    <div class="contacto-formulario">
      <div class="formulario-wrapper">
        <p class="contacto-titulo">
          Nos importa lo que tienes para decirnos;<br>
          déjanos tus datos y con gusto te contactaremos
        </p>
        
        <form id="form-contacto" action="/page/contacto/enviarcontacto" method="POST">
          <div class="form-group">
            <input type="text" id="name" name="name" class="form-control" placeholder="Nombre:" required>
          </div>
          
          <div class="form-group">
            <input type="tel" id="phone" name="phone" class="form-control" placeholder="Teléfono:" required>
          </div>
          
          <div class="form-group">
            <input type="email" id="email" name="email" class="form-control" placeholder="Email:" required>
          </div>
          
          <div class="form-group">
            <textarea id="message" name="message" class="form-control textarea" rows="2" placeholder="Mensaje:" required></textarea>
          </div>
          
          <!-- reCAPTCHA -->
          <div class="recaptcha-container">
            <div class="g-recaptcha" data-sitekey="6LfxqrIqAAAAANl4yG6lKGP3bwCgJg5XGLa5TmRX"></div>
          </div>
          
          <!-- Checkbox de políticas -->
          <div class="checkbox-container">
            <input type="checkbox" id="politicas" name="politicas" required>
            <label for="politicas" class="checkbox-label">
              Acepto y he leído la <a href="#" data-bs-toggle="modal" data-bs-target="#modalPoliticas">política de tratamiento de datos</a>
            </label>
          </div>
          
          <button type="submit" class="btn-enviar" id="submit-btn">ENVIAR</button>
        </form>
      </div>
    </div>
  </div>
  
  <!-- Loader -->
  <div class="loader-bx">
    <div class="loader"></div>
  </div>
</div>

<!-- Modal de Políticas -->
<div class="modal fade modalPoliticas" id="modalPoliticas" tabindex="-1" aria-labelledby="modalPoliticasLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalPoliticasLabel">Política de Tratamiento de Datos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Aquí va el contenido de la política de tratamiento de datos de la empresa...</p>
        <!-- El contenido real debe ser proporcionado por el cliente -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Script para reCAPTCHA -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>