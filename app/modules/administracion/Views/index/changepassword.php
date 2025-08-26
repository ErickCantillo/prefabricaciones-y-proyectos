<?php if ($this->error != '') {?>
    <div class="text-center error_login">
        <?= $this->error;?>
    </div>
    <br>
    <div class="text-center"><a href="/administracion" class="olvido">Back to Login</a></div>
<?php } else { ?>
    <?php if ($this->message != '') { ?>
        <div class="text-center mensaje_login">
            <?php echo $this->message; ?>
        </div>
        <br>
        <div class="text-center"><a href="/administracion" class="olvido">Back to Login</a></div>
    <?php } else { ?>
        <div class="box_password">
            <form  data-bs-toggle="validator" role="form" method="post" action="/administracion/index/changepassword">
                <input type="hidden" name="code" value="<?php echo $this->code; ?>" />
                <div class="form-group">
                    <div class="info-olvido"> <strong>USER:</strong> <?php echo $this->usuario; ?></div>
                </div>
                <div class="form-group">
                    <label class="control-label sr-only">Password:</label>
                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required value="" />
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label class="control-label sr-only">Repeat Password:</label>
                    <input type="password" name="re_password" class="form-control" data-match="#inputPassword" data-match-error="The two passwords are not the same"  value="" placeholder="Repeat Password" required/>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="text-center">
                    <button class="btn-azul-login" type="submit">Change Password</button>
                </div>
            </form>
        </div>
    <?php } ?>
<?php } ?>