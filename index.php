<?php
session_start();
if (isset($_SESSION['S_IDUSUARIO'])) { //si existe
    header('Location: view/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Salud Mental</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plantilla/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plantilla/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="plantilla/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>


                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Nombre" id="text_usuario">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" id="text_clave">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                recordar
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block" onclick="Inciar_Sesion()">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plantilla/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- alert -->
    <script src="utilitarios/sweetalert.js"></script>
    <!-- AdminLTE App -->
    <script src="plantilla/dist/js/adminlte.min.js"></script>
    <!-- js de usuario -->
    <script src="js/usuario.js?rev=<?php echo time(); ?>"></script>

    <script>
        $('#text_clave').keypress(function(e) {
            if (e.which == 13) {
                Inciar_Sesion();
            }
        });

        $('#text_usuario').trigger('focus');



        const rmcheck = document.getElementById('remember');
        usuarioinput = document.getElementById('text_usuario');
        passinput = document.getElementById('text_clave');

        if (localStorage.checkbox && localStorage.checkbox !== "") {
            rmcheck.setAttribute("checked", "checked");
            usuarioinput.value = localStorage.usuario;
            passinput.value = localStorage.pass;
        } else {
            rmcheck.removeAttribute("checked");
            usuarioinput.value = "";
            passinput.value = "";
        }
    </script>
</body>

</html>