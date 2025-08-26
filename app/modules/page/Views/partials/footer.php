<section class="footer-section">
  <div class="container">
    <div class="row gap-3 gap-lg-0">
      <div class="col-12 col-lg-4">
        <img src="/images/logo.png" alt="Logo Alobien" class="img-fluid d-block m-auto">
      </div>
      <?php $infopageModel = new Page_Model_DbTable_Informacion();
      $infopage = $infopageModel->getById(1);
      ?>


      <div class="col-12 col-lg-4 text-center text-lg-center">
        <h5>CONTÁCTO</h5>
        <div class="info">
          <span class="info-footer d-flex gap-2 align-items-center justify-content-center justify-content-lg-center">

            <?php echo $infopage->info_pagina_correos_contacto ?>
          </span>
          <span class="info-footer d-flex gap-2 align-items-center justify-content-center justify-content-lg-center">

            <?php echo $infopage->info_pagina_telefono ?>
          </span>

          

          <span class="info-footer d-flex gap-2 align-items-center justify-content-center justify-content-lg-center">

            <?php echo $infopage->info_pagina_direccion_contacto ?>
          </span>
        </div>
      </div>
      <div class="col-12 col-lg-4 text-center text-lg-center">
        <h5>SÍGUENOS EN:</h5>
        <div class="icons-redes d-flex text-center text-lg-center justify-content-center">

          <?php if ($infopage->info_pagina_youtube) {
            $youtube_data = $this->parseSocialLink($infopage->info_pagina_youtube);
            if (!empty($youtube_data['url'])) { ?>
              <a href="<?php echo $youtube_data['url']; ?>" target="_blank" class="d-flex gap-2 align-items-center justify-content-center justify-content-lg-center">
                <i class="fa-brands fa-youtube"></i>
                <!-- <?php echo !empty($youtube_data['user']) ? $youtube_data['user'] : $youtube_data['url']; ?> -->
              </a>
          <?php }
          } ?>

          <?php if ($infopage->info_pagina_instagram) {
            $instagram_data = $this->parseSocialLink($infopage->info_pagina_instagram);
            if (!empty($instagram_data['url'])) { ?>
              <a href="<?php echo $instagram_data['url']; ?>" target="_blank" class="d-flex gap-2 align-items-center justify-content-center justify-content-lg-center">
                <i class="fa-brands fa-instagram"></i>
              </a>
          <?php }
          } ?>

          <?php if ($infopage->info_pagina_facebook) {
            $facebook_data = $this->parseSocialLink($infopage->info_pagina_facebook);
            if (!empty($facebook_data['url'])) { ?>
              <a href="<?php echo $facebook_data['url']; ?>" target="_blank" class="d-flex gap-2 align-items-center justify-content-center justify-content-lg-center">
                <i class="fa-brands fa-facebook-f"></i>
              </a>
          <?php }
          } ?>

          <?php if ($infopage->info_pagina_linkedin) {
            $linkedin_data = $this->parseSocialLink($infopage->info_pagina_linkedin);
            if (!empty($linkedin_data['url'])) { ?>
              <a href="<?php echo $linkedin_data['url']; ?>" target="_blank" class="d-flex gap-2 align-items-center justify-content-center justify-content-lg-center">
                <i class="fa-brands fa-linkedin-in"></i>
              </a>
          <?php }
          } ?>

          <?php if ($infopage->info_pagina_x) {
            $x_data = $this->parseSocialLink($infopage->info_pagina_x);
            if (!empty($x_data['url'])) { ?>
              <a href="<?php echo $x_data['url']; ?>" target="_blank" class="d-flex gap-2 align-items-center justify-content-center justify-content-lg-center">
                <i class="fa-brands fa-x-twitter"></i>
              </a>
          <?php }
          } ?>

          <?php if ($infopage->info_pagina_pinterest) {
            $pinterest_data = $this->parseSocialLink($infopage->info_pagina_pinterest);
            if (!empty($pinterest_data['url'])) { ?>
              <a href="<?php echo $pinterest_data['url']; ?>" target="_blank" class="d-flex gap-2 align-items-center justify-content-center justify-content-lg-center">
                <i class="fa-brands fa-pinterest-p"></i>
              </a>
          <?php }
          } ?>

          <?php if ($infopage->info_pagina_flickr) {
            $flickr_data = $this->parseSocialLink($infopage->info_pagina_flickr);
            if (!empty($flickr_data['url'])) { ?>
              <a href="<?php echo $flickr_data['url']; ?>" target="_blank" class="d-flex gap-2 align-items-center justify-content-center justify-content-lg-center">
                <i class="fa-brands fa-flickr"></i>
              </a>
          <?php }
          } ?>

          <?php if ($infopage->info_pagina_tiktok) {
            $tiktok_data = $this->parseSocialLink($infopage->info_pagina_tiktok);
            if (!empty($tiktok_data['url'])) { ?>
              <a href="<?php echo $tiktok_data['url']; ?>" target="_blank" class="d-flex gap-2 align-items-center justify-content-center justify-content-lg-center">
                <i class="fa-brands fa-tiktok"></i>
              </a>
          <?php }
          } ?>

        </div>
      </div>
      <div class="col-12">
        <hr>
        <span class="text-center d-block">
          &copy;<?= $this->len['all_rights_reserved'] ?> Filsa <?php echo date('Y'); ?>
        </span>
      </div>
    </div>
  </div>
</section>