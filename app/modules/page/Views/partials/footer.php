<section class="footer-section">
  <div class="row gap-lg-0 mt-2 d-flex align-items-center">
    <div class="col-12 col-lg-3">
      <img src="/images/LogoFooter.png" alt="Logo Alobien" class="img-fluid d-block m-auto">
    </div>

    <?php $infopageModel = new Page_Model_DbTable_Informacion();
    $infopage = $infopageModel->getById(1);
    ?>
    <div class="col-12 col-lg-8 row mx-lg-4">
      
      <div class="col-12 col-lg-4">
      <h5 class="footer-title">Enlaces</h5>
      <div class="info">
        <ul class="footer-links">
          <li><a href="/" class="footer-link">Inicio</a></li>
          <li><a href="/page/nosotros" class="footer-link">Nosotros</a></li>
          <li><a href="/page/productos" class="footer-link">Productos</a></li>
          <li><a href="/page/servicios" class="footer-link">Servicios</a></li>
          <li><a href="/page/galeria" class="footer-link">Galería</a></li>
          <li><a href="/page/clientes" class="footer-link">Clientes</a></li>
          <li><a href="/page/contacto" class="footer-link">Contáctenos</a></li>
        </ul>
      </div>
    </div>
    <div class="col-12 col-lg-4">
      <h5 class="footer-title">CONTACTO</h5>
      <div class="info">
        <a class="footer-link" href="tel:(601) 756 6621">Tel: 601 756 6621</a>
      </div>
    </div>

    <div class="col-12 col-lg-4">
      <h5 class="footer-title">DIRECCIÓN</h5>
      <div class="text-start footer-link">
        <p>Autop. Medellín un Km abajo rio Bogotá <br> (Occidente), <br>Cota Cundinamarca, Colombia</p>
      </div>
    </div>
    </div>
  </div>
  <div class="col-12">
      <hr>
      <span class="text-center d-block">
        Todos los derechos reservados <?= date('Y'); ?>  - Desarrollado por Omega Soluciones Web
      </span>
    </div>
</section>