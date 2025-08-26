<div class="text-center">
	Please enter your email address and
	you will receive a link to create a new password.
</div>
<br>
<form  autocomplete="off" action="/administracion/loginuser/forgotpassword" method="post" >
    <div class="form-group " >
        <label class="control-label sr-only">Mail</label>
        <div class="input-group">
            <i class="fas fa-envelope icon-input-left"></i>
            <input type="email" class="form-control" id="email" name="email" placeholder="Mail" required>
            <div class="help-block with-errors"></div>
        </div>
    </div>
    <?php if($this->error_olvido){ ?>
        <div class="error_login"><?php echo $this->error_olvido; ?></div>
    <?php } ?>
    <?php if($this->mensaje_olvido){ ?>
        <div class="mensaje_login"><?php echo $this->mensaje_olvido; ?></div>
    <?php } ?>
    <input type="hidden" id="csrf" name="csrf" value="<?php echo $this->csrf; ?>" />
    <div class="text-center"><a href="/administracion" class="olvido">Back to login</a></div>
    <div class="text-center"><button  class="btn-azul-login" type="submit">Submit</button></div>
</form>