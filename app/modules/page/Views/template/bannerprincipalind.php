<div class="slider-principal" data-aos="">
  <div id="carouselprincipal<?php echo $this->seccionbanner; ?>" class="carousel slide carousel-fade"
    data-bs-ride="carousel">

    <?php if (count($this->banners) >= 2) { ?>

      <div class="carousel-indicators">
        <?php foreach ($this->banners as $key => $banner) { ?>

          <button type="button" data-bs-target="#carouselprincipal<?php echo $this->seccionbanner; ?>"
            data-bs-slide-to="<?php echo $key ?>" <?php if ($key == 0) { ?>class="active" aria-current="true" <?php } ?>
            aria-label="Slide <?php echo $key + 1 ?>"></button>

        <?php } ?>

      </div>
    <?php } ?>

    <div class="carousel-inner">
      <?php foreach ($this->banners as $key => $banner) { ?>
        <div class="carousel-item <?php if ($key == 0) { ?>active <?php } ?>">

          <?php if ($this->id_youtube($banner->publicidad_video) != false) { ?>
          
            <div class="fondo-imagen-principal fondo-imagen-principal-video">

              <a href="<?php echo $banner->publicidad_video; ?>" data-fancybox="video-gallery">

                <img src="/images/<?php echo $banner->publicidad_imagen; ?>" alt="Banner image <?php echo $banner->publicidad_nombre; ?>"
                  class="d-none d-md-block img-banner">
                <img src="/images/<?php echo $banner->publicidad_imagenresponsive; ?>"
                  alt="Banner image <?php echo $banner->publicidad_nombre; ?>" class="d-block d-md-none img-banner">
                <div class="play-icon">▶️</div>
              </a>
            </div>

          <?php } else { ?>

            <div class="fondo-imagen d-none d-md-flex justify-content-center align-items-center">

              <?php if ($banner->mostrarinfo != 1 && $banner->publicidad_enlace) { ?>
                <a href="<?php echo $banner->publicidad_enlace; ?>" <?php echo $banner->publicidad_tipo_enlace == 1 ? 'target="_blank"' : ''; ?> class="w-100">

                <?php } ?>

                <img src="/images/<?php echo $banner->publicidad_imagen; ?>"
                  alt="Banner image <?php echo $banner->publicidad_nombre; ?>" class="img-banner">



                <?php if ($banner->mostrarinfo != 1 && $banner->publicidad_enlace) { ?>
                </a>
              <?php } ?>
              <?php if ($banner->mostrarinfo == 1) { ?>
                <div class="contenido-banner">
                  <div class="container">
                    <div class="info-banner">

                      <?php echo $banner->publicidad_descripcion; ?>
                      <?php if ($banner->publicidad_enlace) { ?>
                        <a href="<?php echo $banner->publicidad_enlace; ?>" <?php echo $banner->publicidad_tipo_enlace == 1 ? 'target="_blank"' : ''; ?> class="btn-blue">
                          <?php echo $banner->publicidad_texto_enlace ? $banner->publicidad_texto_enlace : 'See more'; ?>
                        </a>
                      <?php } ?>
                    </div>
                    <?php if (is_countable($banner->subBanners) && count($banner->subBanners) > 0) { ?>
                      <div class="sub-banners-content">
                        <h3 class="mt-4 titulo-sub-banners">
                          <i class="fa-regular fa-circle-check"></i>
                          <?php echo $this->len['our_services']; ?>
                        </h3>
                        <div class="sub-banners row gap-2">
                          <?php foreach ($banner->subBanners as $subBanner) { ?>
                            <div class="sub-banner col-6 col-md-4 col-lg-3 ">
                              <a class="shadow" href="<?php echo $subBanner->publicidad_enlace; ?>" <?php echo $subBanner->publicidad_tipo_enlace == 1 ? 'target="_blank"' : ''; ?>>
                                <img src="/images/<?php echo $subBanner->publicidad_imagen; ?>"
                                  alt="Imagen sub-banner <?php echo $subBanner->publicidad_nombre; ?>" class="img-subbanner">
                                <div class="contenido-sub-banner">
                                  <span class="texto-sub-banner">
                                    <?php echo $subBanner->publicidad_texto_enlace ? $subBanner->publicidad_texto_enlace : 'See more'; ?>
                                  </span>
                                  <span class="icono-sub-banner">
                                    <i class="fa-solid fa-angle-right"></i>
                                  </span>

                                </div>
                              </a>
                            </div>
                          <?php } ?>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              <?php } ?>
            </div>

            <div class="fondo-imagen-responsive d-md-none d-flex justify-content-center align-items-center">
              <?php if ($banner->mostrarinfo != 1 && $banner->publicidad_enlace) { ?>
                <a href="<?php echo $banner->publicidad_enlace; ?>" <?php echo $banner->publicidad_tipo_enlace == 1 ? 'target="_blank"' : ''; ?> class="w-100">

                <?php } ?>

                <img src="/images/<?php echo $banner->publicidad_imagenresponsive; ?>" alt=""
                  class="img-responsive-principal">
                <?php if ($banner->mostrarinfo != 1 && $banner->publicidad_enlace) { ?>
                </a>
              <?php } ?>
              <?php if ($banner->mostrarinfo == 1) { ?>
                <div class="contenido-banner">
                  <div class="container">
                    <div class="info-banner">

                      <?php echo $banner->publicidad_descripcion; ?>
                      <?php if ($banner->publicidad_enlace) { ?>
                        <a href="<?php echo $banner->publicidad_enlace; ?>" <?php echo $banner->publicidad_tipo_enlace == 1 ? 'target="_blank"' : ''; ?> class="btn-blue">
                          <?php echo $banner->publicidad_texto_enlace ? $banner->publicidad_texto_enlace : 'See more'; ?>
                        </a>
                      <?php } ?>
                    </div>
                    <?php if (is_countable($banner->subBanners) && count($banner->subBanners) > 0) { ?>
                      <div class="sub-banners-responsive">
                        <h3 class="mt-4 titulo-sub-banners">
                          <i class="fa-regular fa-circle-check"></i>
                          <?php echo $this->len['our_services']; ?>
                        </h3>
                        <div class="sub-banners row gap-0 gap-lg-2">
                          <?php foreach ($banner->subBanners as $subBanner) { ?>
                            <div class="sub-banner col-6 col-md-4 col-lg-2 ">
                              <a class="shadow" href="<?php echo $subBanner->publicidad_enlace; ?>" <?php echo $subBanner->publicidad_tipo_enlace == 1 ? 'target="_blank"' : ''; ?>>
                                <img src="/images/<?php echo $subBanner->publicidad_imagen; ?>"
                                  alt="Imagen sub-banner <?php echo $subBanner->publicidad_nombre; ?>" class="img-subbanner">
                                <div class="contenido-sub-banner">
                                  <span class="texto-sub-banner">
                                    <?php echo $subBanner->publicidad_texto_enlace ? $subBanner->publicidad_texto_enlace : 'See more'; ?>
                                  </span>
                                  <span class="icono-sub-banner">
                                    <i class="fa-solid fa-angle-right"></i>
                                  </span>

                                </div>
                              </a>
                            </div>
                          <?php } ?>
                        </div>
                      </div>

                    <?php } ?>
                  </div>
                </div>
              <?php } ?>

            </div>

          <?php } ?>



        </div>
      <?php } ?>
    </div>
    <?php if (count($this->banners) >= 2) { ?>

      <button type="button" class="carousel-control-prev"
        data-bs-target="#carouselprincipal<?php echo $this->seccionbanner; ?>" data-bs-slide="prev">

        <i class="fa-solid fa-chevron-left carousel-control-prev-icono"></i>
      </button>
      <button type="button" class="carousel-control-next"
        data-bs-target="#carouselprincipal<?php echo $this->seccionbanner; ?>" data-bs-slide="next">

        <i class="fa-solid fa-chevron-right carousel-control-next-icono"></i>
      </button>
    <?php } ?>

  </div>
</div>

<script>
  Fancybox.bind('[data-fancybox]', {
    Html: {
      youtube: {
        controls: 1,
        rel: 1,
        fs: 1
      }
    }
  });

  // Inicializar carousel manualmente si es necesario
  document.addEventListener('DOMContentLoaded', function() {
    var carouselId = 'carouselprincipal<?php echo $this->seccionbanner; ?>';
    var carouselElement = document.getElementById(carouselId);
    if (carouselElement) {
      var carousel = new bootstrap.Carousel(carouselElement, {
        interval: 5000,
        wrap: true,
        ride: 'carousel'
      });
    }
  });
</script>