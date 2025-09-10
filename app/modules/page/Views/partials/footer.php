<section class="footer-section">
  <div class="container">
    <div class="col-12">
        <img src="/images/LogoFooter.png" alt="Logo Alobien" class="img-fluid d-block m-auto">
      </div>
    <div class="row gap-3 gap-lg-0 mt-2">
      
      <?php $infopageModel = new Page_Model_DbTable_Informacion();
      $infopage = $infopageModel->getById(1);
      ?>

    <div class="col-12 col-lg-4">
        <h5 class="footer-title">LINKS</h5>
        <div class="info">
          <ul class="footer-links">
            <li><a href="/" class="footer-link">Inicio</a></li>
            <li><a href="/page/nosotros" class="footer-link">Nosotros</a></li>
            <li><a href="#" class="footer-link">Productos</a></li>
            <li><a href="#" class="footer-link">Servicios</a></li>
            <li><a href="#" class="footer-link">Galería</a></li>
            <li><a href="#" class="footer-link">Clientes</a></li>
            <li><a href="#" class="footer-link">Contáctenos</a></li>
          </ul>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <h5 class="footer-title">CONTACTO</h5>
        <div class="info">
          <a class="footer-link" href="tel:(601) 756 6621">Tel: (601) 756 6621</a>
        </div>
      </div>

      <div class="col-12 col-lg-4">
        <h5 class="footer-title">DIRECCIÓN</h5>
        <div class="text-start">
          <p>Autop. Medellín un Km abajo rio Bogotá <br> (Occidente), <br>Cota Cundinamarca, Colombia</p>
        </div>
      </div>
      <div class="col-12">
        <hr>
        <span class="text-center d-block">
           <?php echo date('Y'); ?> - Todos los derechos reservados - Política de Datos
        </span>
      </div>
    </div>
  </div>
</section>