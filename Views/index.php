<?php

session_start();

// Verificar si la sesión está iniciada
if (!empty($_SESSION['usuario'])) {
    // Si la sesión está activa, el código continuará 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> Xeloro - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="../style/assets/images/favicon.ico">

    <!-- Plugins css -->
    <link href="../style/plugins/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="../style/plugins/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="../style/plugins/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="../style/plugins/datatables/select.bootstrap4.css" rel="stylesheet" type="text/css" />

    <!-- Dropify css -->
    <link href="../style/plugins/dropify/dropify.min.css" rel="stylesheet" type="text/css" />


    <!-- Plugins css -->
    <link href="../style/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
    <link href="../style/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
    <link href="../style/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="../style/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css" />
    <link href="../style/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" />
    <link href="../style/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="../style/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../style/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../style/assets/css/theme.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">
        <div class="header-border"></div>
        <header id="page-topbar">
            <div class="navbar-header">

                <div class="d-flex align-items-left">
                    <button type="button" class="btn btn-sm mr-2 d-lg-none px-3 font-size-16 header-item waves-effect"
                        id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                    <div class="dropdown d-none d-sm-inline-block">
                        <div class="dropdown-menu">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                Application
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                Software
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                EMS System
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                CRM App
                            </a>
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center">

                    <div class="dropdown d-none d-sm-inline-block ml-2">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="mdi mdi-magnify"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                            aria-labelledby="page-header-search-dropdown">

                            <form class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..."
                                            aria-label="Recipient's username">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block ml-2">
                        <button type="button" class="btn header-item waves-effect"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="../style/assets/images/users/avatar-2.jpg"
                                alt="Header Avatar">
                            <span class="d-none d-sm-inline-block ml-1">Donald M.</span>
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </button>


                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                href="javascript:void(0)">
                                Configuración
                            </a>

                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                href="javascript:void(0)">
                                <span>Profile</span>
                                <span>
                                    <span class="badge badge-pill badge-warning">1</span>
                                </span>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                href="javascript:void(0)">
                                Settings
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                href="javascript:void(0)">
                                <span>Lock Account</span>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                href="../Controller/Logout.php">
                                <span>Log Out</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <div class="navbar-brand-box">
                    <a href="index.html" class="logo">
                        <i class="mdi mdi-album"></i>
                        <span>
                            Xeloro
                        </span>
                    </a>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">

                        <li>
                            <a href="index.php" class="waves-effect"><i class="mdi mdi-home-analytics"></i><span>Dashboard</span></a>
                        </li>

                        <li>
                            <a href="#" class="waves-effect" onclick="cargar_contenido('contenido_principal','pacientes/pacientes_view.php')"><i class="mdi mdi-home-analytics"></i><span>Pacientes</span></a>
                        </li>

                        <li>
                            <a href="#" class="waves-effect" onclick="cargar_contenido('contenido_principal','personal/personal_view.php')"><i class="mdi mdi-home-analytics"></i><span>Personal</span></a>
                        </li>

                        <li>
                            <a href="#" class="waves-effect" onclick="cargar_contenido('contenido_principal','registrador/registrador_view.php')"><i class="mdi mdi-home-analytics"></i><span>Registrador</span></a>
                        </li>

                        <li>
                            <a href="#" class="waves-effect" onclick="cargar_contenido('contenido_principal','consolidado/consolidado_view.php')"><i class="mdi mdi-home-analytics"></i><span>Consolidado</span></a>
                        </li>

                        <li>
                            <a href="#" class="waves-effect" onclick="cargar_contenido('contenido_principal','seguimiento/seguimiento_view.php')"><i class="mdi mdi-home-analytics"></i><span>Seguimiento</span></a>
                        </li>

                        <li>
                            <a href="#" class="waves-effect" onclick="cargar_contenido('contenido_principal','fichaTecnica/ficha_view.php')"><i class="mdi mdi-home-analytics"></i><span>Ficha Técnica</span></a>
                        </li>

                        <li>
                            <a href="#" class="waves-effect" onclick="cargar_contenido('contenido_principal','usuario/usuario_view.php')"><i class="mdi mdi-home-analytics"></i><span>Usuarios</span></a>
                        </li>

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content" id="contenido_principal">

            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <h5 class="card-title mb-0">N° Pacientes</h5>
                                    </div>
                                    <div class="row d-flex align-items-center mb-4">
                                        <div class="col-8">
                                            <h2 class="d-flex align-items-center mb-0">
                                                12
                                            </h2>
                                        </div>
                                        <div class="col-4 text-right">
                                            <span class="text-muted">12 %<i
                                                    class="mdi mdi-arrow-up text-success"></i></span>
                                        </div>
                                    </div>

                                    <div class="progress shadow-sm" style="height: 5px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 57%;">
                                        </div>
                                    </div>
                                </div>
                                <!--end card body-->
                            </div><!-- end card-->
                        </div> <!-- end col-->

                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <h5 class="card-title mb-0">N° Personal</h5>
                                    </div>
                                    <div class="row d-flex align-items-center mb-4">
                                        <div class="col-8">
                                            <h2 class="d-flex align-items-center mb-0">
                                                15
                                            </h2>
                                        </div>
                                        <div class="col-4 text-right">
                                            <span class="text-muted">18.71% <i
                                                    class="mdi mdi-arrow-down text-danger"></i></span>
                                        </div>
                                    </div>

                                    <div class="progress shadow-sm" style="height: 5px;">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 57%;">
                                        </div>
                                    </div>
                                </div>
                                <!--end card body-->
                            </div><!-- end card-->
                        </div> <!-- end col-->

                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <h5 class="card-title mb-0">N° Pacientes con Atención Incompleta</h5>
                                    </div>
                                    <div class="row d-flex align-items-center mb-4">
                                        <div class="col-8">
                                            <h2 class="d-flex align-items-center mb-0">
                                                $784.62
                                            </h2>
                                        </div>
                                        <div class="col-4 text-right">
                                            <span class="text-muted">57% <i
                                                    class="mdi mdi-arrow-up text-success"></i></span>
                                        </div>
                                    </div>

                                    <div class="progress shadow-sm" style="height: 5px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 57%;">
                                        </div>
                                    </div>
                                </div>
                                <!--end card body-->
                            </div>
                            <!--end card-->
                        </div> <!-- end col-->

                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <h5 class="card-title mb-0">N° Pacientes con Atención Completa</h5>
                                    </div>
                                    <div class="row d-flex align-items-center mb-4">
                                        <div class="col-8">
                                            <h2 class="d-flex align-items-center mb-0">
                                                1,15,187
                                            </h2>
                                        </div>
                                        <div class="col-4 text-right">
                                            <span class="text-muted">17.8% <i
                                                    class="mdi mdi-arrow-down text-danger"></i></span>
                                        </div>
                                    </div>

                                    <div class="progress shadow-sm" style="height: 5px;">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 57%;"></div>
                                    </div>
                                </div>
                                <!--end card body-->
                            </div><!-- end card-->
                        </div> <!-- end col-->
                    </div>
                    <!-- end row-->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            2020 © Xeloro.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-right d-none d-sm-block">
                                Design & Develop by Myra
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Overlay-->
    <div class="menu-overlay"></div>


    <!-- jQuery  -->
    <script src="../style/assets/js/jquery.min.js"></script>
    <script src="../style/assets/js/bootstrap.bundle.min.js"></script>
    <script src="../style/assets/js/metismenu.min.js"></script>
    <script src="../style/assets/js/waves.js"></script>
    <script src="../style/assets/js/simplebar.min.js"></script>

    <!-- third party js -->
    <script src="../style/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../style/plugins/datatables/dataTables.bootstrap4.js"></script>
    <script src="../style/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="../style/plugins/datatables/responsive.bootstrap4.min.js"></script>
    <script src="../style/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="../style/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="../style/plugins/datatables/buttons.html5.min.js"></script>
    <script src="../style/plugins/datatables/buttons.flash.min.js"></script>
    <script src="../style/plugins/datatables/buttons.print.min.js"></script>
    <script src="../style/plugins/datatables/dataTables.keyTable.min.js"></script>
    <script src="../style/plugins/datatables/dataTables.select.min.js"></script>
    <script src="../style/plugins/datatables/pdfmake.min.js"></script>
    <script src="../style/plugins/datatables/vfs_fonts.js"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="../style/assets/pages/datatables-demo.js"></script>

    <!--dropify-->
    <script src="../style/plugins/dropify/dropify.min.js"></script>

    <!-- Init js-->
    <script src="../style/assets/pages/fileuploads-demo.js"></script>

    <!-- Plugins js -->
    <script src="../style/plugins/autonumeric/autoNumeric-min.js"></script>
    <script src="../style/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="../style/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
    <script src="../style/plugins/moment/moment.js"></script>
    <script src="../style/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="../style/plugins/select2/select2.min.js"></script>
    <script src="../style/plugins/switchery/switchery.min.js"></script>
    <script src="../style/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
    <script src="../style/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>

    <!-- App js -->
    <script src="../style/assets/js/theme.js"></script>

    <script>
        /** cargar las vistas */
        function cargar_contenido(id, vista) {
            $("#" + id).load(vista);
        }
    </script>

</body>

</html>
<?php


} else {
    // Si no hay sesión, redirigir al inicio
    header("Location: ../../index.php");
    exit();
}
?>