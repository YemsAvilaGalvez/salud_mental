<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title> Xeloro - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="style/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="style/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="style/assets/css/theme.min.css" rel="stylesheet" type="text/css" />

</head>
<?php 
session_start();
if (!empty($_SESSION['us_tipo'])) {
  header("Location: Controller/LoginController.php");
}
else{
  session_destroy();
?>
<body>
    <div>
        <div class="container">
            <div class="row ">
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="d-flex align-items-center min-vh-100">
                        <div class="w-100 d-block bg-white shadow-lg rounded my-5">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center mb-5">
                                            <a href="index.html" class="text-dark font-size-22 font-family-secondary">
                                                <i class="mdi mdi-alpha-x-circle"></i> <b>PANEL DE ACCESO</b>
                                            </a>
                                        </div>
                                        <h1 class="h5 mb-1">¡BIENVENIDO DE NUEVO!</h1>
                                        <p class="text-muted mb-4">Ingrese sus credenciales para acceder al panel de administración.</p>
                                        <form class="user" action="Controller/LoginController.php" method="post">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="nombre_usu" placeholder="Usuario">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password_usu" placeholder="Contraseña">
                                            </div>
                                            <button type="submit" class="btn btn-success btn-block waves-effect waves-light">Sign In</button>
                                        </form>

                                        <!-- end row -->
                                    </div> <!-- end .padding-5 -->
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div> <!-- end .w-100 -->
                    </div> <!-- end .d-flex -->
                </div> <!-- end col-->
            </div> <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- jQuery  -->
    <script src="style/assets/js/jquery.min.js"></script>
    <script src="style/assets/js/bootstrap.bundle.min.js"></script>
    <script src="style/assets/js/metismenu.min.js"></script>
    <script src="style/assets/js/waves.js"></script>
    <script src="style/assets/js/simplebar.min.js"></script>

    <!-- App js -->
    <script src="style/assets/js/theme.js"></script>

</body>
</html>
<?php 

}
?>