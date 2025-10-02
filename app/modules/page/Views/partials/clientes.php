<style>
    #myCarouselClientes {
        --f-carousel-gap: 2vw;
        --f-carousel-slide-width: 15vw;
        --f-carousel-slide-padding: 2vw;
    }


    .clientes-container {
        width: 100%;
        overflow: hidden;
        box-sizing: border-box;
        background-color: #fff;
    }

    .clientes-title {
        font-family: 'Helvetica', sans-serif;
        padding-bottom: 1vh;
        border-bottom: 2px solid #E3AE24;
    }

    .cliente-item img {
        filter: grayscale(100%);
        transition: filter 0.3s ease;
        width: 12vw;
        /* width: 100%; */
        /* height: auto; */
    }

    .cliente-item img:hover {
        filter: grayscale(0%);
    }
</style>
<section class="contenedor-seccion" style="background-color: #fff;">
    <div class="content-box">
        <h3 class="text-start clientes-title">Clientes</h3>

        <div class="clientes-container">

            <div class="f-carousel" id="myCarouselClientes">
                <?php foreach ($this->clientes as $cliente): ?>
                    <div class="f-carousel__slide">
                        <div class="cliente-item">
                            <img src="/images/<?php echo $cliente->cliente_imagen; ?>" alt="Imagen" title="<?php echo $cliente->nombre; ?>" />
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
</section>

<script>
    Carousel(document.getElementById("myCarouselClientes"), {
        // Your custom options
    }, {

        Autoscroll
    }).init();
</script>