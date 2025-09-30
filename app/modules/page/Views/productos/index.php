<style>
  .productos-container {
    padding: 4vh 4vw;
    background-color: white;
  }

  .producto-card {
    display: flex;
    background: white;
    /* border-radius: 8px; */
    overflow: hidden;
    border: 4px solid white;
    box-shadow: 1px 1px 12px rgba(0, 0, 0, 0.35);
    height: 25vh;
    margin-bottom: 20px;
  }

  .producto-imagen {
    flex: 0 0 30%;
  }

  .producto-imagen img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  .producto-contenido {
    flex: 1;
    padding: 2vh 1.8vw;
    display: flex;
    flex-direction: column;
    justify-content: center;
    background-color: #E3AE24;
    color: white;
  }

  .producto-titulo {
    font-size: 3vh;
    font-weight: 900;
    font-family: "Helvetica", sans-serif;
    color: black;
    margin-bottom: 15px;
    text-transform: uppercase;
  }

  .producto-descripcion {
    font-size: 2.3vh;
    line-height: 1.4;
    /* margin-bottom: 20px; */
    flex-grow: 1;
  }

  .producto-boton {
    background: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 10px 20px;
    border-radius: 25px;
    text-decoration: none;
    font-size: 14px;
    text-align: center;
    transition: background 0.3s ease;
    align-self: flex-start;
  }

  .producto-boton:hover {
    background: rgba(0, 0, 0, 0.9);
    color: white;
    text-decoration: none;
  }

  @media (max-width: 768px) {
    .producto-card {
      flex-direction: column;
      height: auto;
    }

    .producto-imagen {
      flex: none;
      height: 150px;
    }
  }
</style>
<?php echo $this->banner ?>
<div class="contenido-productos contenido-interna ">
  <div class="productos-container">
    <div class="row justify-content-center">
        <!-- TODO: Añadir un buscador -->
      <?php
      foreach ($this->productos as $producto) { ?>
        <div class="col-sm-12 col-md-6 mb-3">
          <div class="producto-card">
            <div class="producto-imagen" >
              <img src="/images/<?php echo $producto->imagen; ?>" alt="">
              <!-- style="background-image: url('/images/<?php echo $producto->imagen; ?>');" -->
            </div>
            <div class="producto-contenido">
              <h3 class="producto-titulo"><?php echo $producto->titulo; ?></h3>
              <p class="producto-descripcion"><?php echo $producto->descripcion; ?></p>
              <div class="w-100 d-flex justify-content-end">
                <a href="#" class="ver-mas-product-list">Ver más</a>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  <?php echo $this->contenido ?>
      <?php include(APP_PATH . "modules/page/Views/partials/clientes.php"); ?>
</div>