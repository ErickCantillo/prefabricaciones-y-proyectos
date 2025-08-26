<header class="main-header">
    <nav class="navbar">
        <div class="nav-container">
            <div>
                <img class="nav-logo" src="/images/<?= $navbar[0]['detalle']->contenido_fondo_imagen ?>" alt="Zaphire Logo">
            </div>

            <ul class="nav-menu">
                <?php for ($i = 1; $i < count($navbar); $i++): ?>
                    <li class="nav-item"><a href="/" class="nav-link"><?= $navbar[$i]['detalle']->contenido_titulo ?></a></li>
                <?php endfor; ?>
                <li class="nav-item"><a href="/contact" class="nav-link nav-contact">Contáctanos</a></li>
            </ul>

            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>
    </nav>

</header>