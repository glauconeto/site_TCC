<style>
    footer {
        margin-top: 0px;
    }
</style>

<div class="py-5 text-center align-items-center d-flex" style="background-image: linear-gradient(to left bottom, rgba(189, 195, 199, .75), rgba(44, 62, 80, .75)); background-size: 100%;">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form action="" method="post">
                    <h1><i class="fa fa-user" aria-hidden="true"></i></h1>
                    <h1 class="h3 mb-3 fw-normal">Registro</h1>
                    <div class="form-group">
                        <label>Nome de usuário</label>
                        <input type="text" name="username" id="floatingInput" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" style="width: 500px;left: 450px;position: sticky;">
                        <span class="invalid-feedback"><?php echo $username_err; ?></span>
                    </div>    
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" id="floatingInput" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                        <span class="invalid-feedback"><?php echo $password_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Confirmar senha</label>
                        <input type="password" name="confirm_password" id="floatingInput" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>" style="width: 500px;left: 450px;position: sticky;">
                        <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                    </div>
                    <button type="submit" class="btn btn-success">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>