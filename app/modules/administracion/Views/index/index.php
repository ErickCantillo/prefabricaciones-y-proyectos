<form autocomplete="off" action="/administracion/loginuser" method="post">
  <div class="row">
    <div class="col-12">
      <h2>
        <span>Module</span><br>
        <span>ADMINISTRATION</span><br>
        <span>WELCOME</span>
      </h2>
    </div>
    <div class="form-group mt-4">
      <label class="control-label sr-only">User</label>
      <div class="input-group">
        <input type="text" class="form-control login-input" id="user" name="user" placeholder="User" required>
        <div class="help-block with-errors"></div>
      </div>
    </div>
    <div class="form-group my-4">
      <label class="control-label sr-only">Password</label>
      <div class="input-group">
        <input type="password" class="form-control login-input" id="password" name="password" placeholder="Password" required>
        <div class="help-block with-errors"></div>
      </div>
    </div>
    <?php if ($this->error_login) { ?>
      <div class="error_login"><?php echo $this->error_login; ?></div>
    <?php } ?>
    <input type="hidden" id="csrf" name="csrf" value="<?php echo $this->csrf; ?>" />
    <div class="text-center"><button class="btn-azul-login" type="submit">Enter</button></div>
    <div class="text-center mt-2"><a href="/administracion/index/olvido" class="olvido">Forgot your password?</a></div>
  </div>
</form>