
<ul>
  <?php if (Session::getInstance()->get('kt_login_level') == '1') { ?>
    <li <?php if ($this->botonpanel == 1) { ?>class="activo" <?php } ?>>
      <a href="/administracion/panel">
        <i class="fas fa-info-circle"></i> 
        Page Information
      </a>
    </li>
  <?php } ?>
 
  <li <?php if ($this->botonpanel == 3) { ?>class="activo" <?php } ?>>
    <a href="/administracion/contenido">
      <i class="fas fa-file-invoice"></i> 
     Administrador de Contenidos
    </a>

  <?php if (Session::getInstance()->get('kt_login_level') == '1') { ?>
    <li <?php if ($this->botonpanel == 4) { ?>class="activo" <?php } ?>>
      <a href="/administracion/usuario">
        <i class="fas fa-users"></i> 
        Manage Users
      </a>
    </li>
  <?php } ?>
</ul>