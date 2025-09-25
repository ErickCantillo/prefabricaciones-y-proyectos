<section class="hero-section" >
    <?php
    $heroHijos = $hero['hijos'];
    ?>
    <div class="hero-container">
        <?php include __DIR__ . '/HeroText.php'; ?>
    </div>

    <style>
        .hero-section {
            background-image: url('/images/<?php echo $hero['detalle']->contenido_fondo_imagen; ?>');
        }
    </style>
</section>  