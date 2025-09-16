
<ul class="modern-nav-menu">
  <?php if (Session::getInstance()->get('kt_login_level') == '1') { ?>
    <li class="nav-item <?php if ($this->botonpanel == 1) { ?>active<?php } ?>">
      <a href="/administracion/panel" class="nav-link">
        <div class="nav-icon">
          <i class="fas fa-info-circle"></i>
        </div>
        <span class="nav-text">Información de la Página</span>
        <div class="nav-indicator"></div>
      </a>
    </li>
  <?php } ?>
  <li class="nav-item <?php if ($this->botonpanel == 2) { ?>active<?php } ?>">
    <a href="/administracion/publicidad" class="nav-link">
      <div class="nav-icon">
        <i class="far fa-images"></i>
      </div>
      <span class="nav-text">Administrador de Publicidad</span>
      <div class="nav-indicator"></div>
    </a>
  </li>
  <li class="nav-item <?php if ($this->botonpanel == 3) { ?>active<?php } ?>">
    <a href="/administracion/contenido" class="nav-link">
      <div class="nav-icon">
        <i class="fas fa-file-invoice"></i>
      </div>
      <span class="nav-text">Administrador de Contenidos</span>
      <div class="nav-indicator"></div>
    </a>
  </li>
  <?php if (Session::getInstance()->get('kt_login_level') == '1') { ?>
    <li class="nav-item <?php if ($this->botonpanel == 4) { ?>active<?php } ?>">
      <a href="/administracion/usuario" class="nav-link">
        <div class="nav-icon">
          <i class="fas fa-users"></i>
        </div>
        <span class="nav-text">Gestión de Usuarios</span>
        <div class="nav-indicator"></div>
      </a>
    </li>
  <?php } ?>
</ul>