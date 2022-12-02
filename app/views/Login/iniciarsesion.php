<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>INNOVATESC | Inicio Sesión</title>
    <link rel="icon" type="image/png" href="<?= ASSETS ?>/img/icon.png">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= ASSETS ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= ASSETS ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= ASSETS ?>/dist/css/adminlte.min.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="<?= ASSETS ?>/css/main.css"/>
    <!-- ICONO -->
    <link rel="icon" type="image/png" href="<?= ASSETS ?>/img/icon.png">
    
</head>
</body>
<body class="hold-transition register-page DivFondo">
    <?php if (isset($_SESSION["msg_wrong"]) && count($_SESSION["msg_wrong"]) > 0) { ?>
        <div class="w-100 row">
            <div class="col-sm-12 col-md-6 m-auto">
                <div class="alert alert-danger" role="alert">
                    <?php foreach ($_SESSION["msg_wrong"] as $fila) { ?>
                        <p class=" mb-0">* <?= $fila ?></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="register-box">
        <div class="card card-outline card-danger">
            <div class="card-header text-center m-2">
            <img src ="<?= ASSETS?>/img/INNOVATE SC.png" width ="180" ><hr>
                <h3><ion-icon name="person-outline"></ion-icon>&nbsp; 
                    <?= (!$data['sesion_splash'])?'INICIAR SESION':'INICIANDO SESION' ?>
                </h3>
            </div>
            <div class="card-body">
                <?php if (!$data['sesion_splash']) { ?>
                    <form method="POST">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="usuario" placeholder="Usuario">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                            <div class="d-block w-100">
                                <span class="text-danger msg_error" id="usuario__error"><?= isset($data['errores']['usuario']) ? $data['errores']['usuario'] : '' ?></span>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="contrasena" placeholder="Contraseña" value="">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            <div class="d-block w-100">
                                <span class="text-danger msg_error" id="contrasena__error"><?= isset($data['errores']['contrasena']) ? $data['errores']['contrasena'] : '' ?></span>
                            </div>
                        </div>

                        <div class="social-auth-links text-center">
                            <button type="submit" class="btn btn-block btn-primary">
                                Ingresar
                                <i class="fas fa-sign-in-alt"></i>
                            </button>
                        </div>

                    </form>
                <?php } else { ?>
                    <h2 class="text-center text-info"><b>BIENVENIDO</b></h2>
                    <p class="text-center" style="font-size: 20px;"> <?= $_SESSION['NOMBRE_USUARIO'] ?></p>
                <?php } ?>
                
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="<?= ASSETS ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= ASSETS ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= ASSETS ?>/dist/js/adminlte.min.js"></script>
    <!-- ICONOS -->
    <script type="module" src="https://unpkg.com/ionicons@5.1.2/dist/ionicons/ionicons.esm.js"></script>
</body>

</html>