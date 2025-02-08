<script src="../js/id10.js?rev=<?php echo time(); ?>"></script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>INTERVENCIONES BREVES MOTIVACIONALES PARA PERSONAS CON CONSUMO PERJUDICIAL DE ALCOHOL Y TABACO</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">ID10</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista de Pacientes con Diagnostico Tipo D</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool text-black" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tabla_id10" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Red</th>
                                    <th>MicroRed</th>
                                    <th>Nombre Establecimiento</th>
                                    <th>Nombre Completo</th>
                                    <th>DNI</th>
                                    <th>Código único</th>
                                    <th>Año</th>
                                    <th>Mes</th>
                                    <th>Diagnostico</th>
                                    <th>Eval.</th>
                                    <th>Evaluación Interdiciplinaria</th>
                                    <th>Cons_1</th>
                                    <th>Consejería</th>
                                    <th>I_b1</th>
                                    <th>I_b2</th>
                                    <th>I_b3</th>
                                    <th>I_b4</th>
                                    <th>Intervención Breve</th>
                                    <th>Total de Actividades</th>
                                    <th>Cumplimiento</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Red</th>
                                    <th>MicroRed</th>
                                    <th>Nombre Establecimiento</th>
                                    <th>Nombre Completo</th>
                                    <th>DNI</th>
                                    <th>Código único</th>
                                    <th>Año</th>
                                    <th>Mes</th>
                                    <th>Diagnostico</th>
                                    <th>Eval.</th>
                                    <th>Evaluación Interdiciplinaria</th>
                                    <th>Cons_1</th>
                                    <th>Consejería</th>
                                    <th>I_b1</th>
                                    <th>I_b2</th>
                                    <th>I_b3</th>
                                    <th>I_b4</th>
                                    <th>Intervención Breve</th>
                                    <th>Total de Actividades</th>
                                    <th>Cumplimiento</th>
                                </tr>
                            </tfoot>
                        </table>
                        <style>
                            /* Estilo para marcar filas en rojo */
                            .highlight-red {
                                background-color: #ffcccc !important;
                            }

                            /* Fila en amarillo para 60% <= Cumplimiento < 99% */
                            .highlight-yellow {
                                background-color: #ffffcc !important;
                                /* Amarillo claro */
                            }
                        </style>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
<script>
    Listar_Id10();
</script>