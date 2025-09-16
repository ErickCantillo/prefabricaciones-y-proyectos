
<div class="header-bx">
  <div class="header-bx-left">
    <!-- <div class="nav-brand">
    </div> -->
    <div class="menu-toggler">
      <i class="fas fa-bars"></i>
    </div>
  </div>
  <div class="header-bx-center">
    <img src="/skins/administracion/images/logo-new.png" alt="">
  </div>
  <div class="header-bx-right">
    <div class="user-info-wrapper">
      <div class="user-avatar">
        <i class="fa-solid fa-user"></i>
      </div>
      <div class="user-details">
        <span class="user-greeting">Hola,</span>
        <span class="user-name"><?php echo $_SESSION['kt_login_name']; ?></span>
      </div>
      <div class="logout-wrapper">
      <a href="/administracion/loginuser/logout" class="logout-btn">
        <i class="fas fa-sign-out-alt"></i>
      </a>
    </div>
    </div>
    
  </div>
</div>