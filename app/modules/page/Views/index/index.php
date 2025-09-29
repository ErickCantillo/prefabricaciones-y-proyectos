<style>
  .info-no-home {
    display: none;
  }

  .offcanvas-body .navbar-nav {
    justify-content: start !important;
  }
</style>
<?php echo $this->banner ?>
<div class="contenido-home">
  <?php echo $this->contenido ?>
  <?php include(APP_PATH . "modules/page/Views/partials/clientes.php"); ?>
</div>
