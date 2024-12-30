<script src="../js/id02.js?rev=<?php echo time(); ?>"></script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>TRATAMIENTO ESPECIALIZADO DE PERSONAS AFECTADAS POR VIOLENCIA SEXUAL DE 18 AÑOS A MAS </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">ID02</li>
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
                        <table id="tabla_id02" class="table table-bordered table-striped">
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
                                    <th>C_med1</th>
                                    <th>C_med2</th>
                                    <th>C_med3</th>
                                    <th >Consulta Medica</th>
                                    <th>P_e1</th>
                                    <th>P_e2</th>
                                    <th>P_e3</th>
                                    <th >Psicoeducación</th>
                                    <th>P_i1</th>
                                    <th>P_i2</th>
                                    <th>P_i3</th>
                                    <th>P_i4</th>
                                    <th>P_i5</th>
                                    <th>P_i6</th>
                                    <th>P_i7</th>
                                    <th>P_i8</th>
                                    <th>P_i9</th>
                                    <th>P_i10</th>
                                    <th>P_i11</th>
                                    <th>P_i12</th>
                                    <th >Psicoterapia Individual</th>
                                    <th>I_f1</th>
                                    <th>I_f2</th>
                                    <th>I_f3</th>
                                    <th>I_f4</th>
                                    <th >Intervenciones Familiares</th>
                                    <th>V_d1</th>
                                    <th>V_d2</th>
                                    <th >Visita Domiciliaria</th>
                                    <th>M_s1</th>
                                    <th>M_s2</th>
                                    <th>M_s3</th>
                                    <th >Movilización Social</th>
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
                                    <th>C_med1</th>
                                    <th>C_med2</th>
                                    <th>C_med3</th>
                                    <th >Consulta Medica</th>
                                    <th>P_e1</th>
                                    <th>P_e2</th>
                                    <th>P_e3</th>
                                    <th >Psicoeducación</th>
                                    <th>P_i1</th>
                                    <th>P_i2</th>
                                    <th>P_i3</th>
                                    <th>P_i4</th>
                                    <th>P_i5</th>
                                    <th>P_i6</th>
                                    <th>P_i7</th>
                                    <th>P_i8</th>
                                    <th>P_i9</th>
                                    <th>P_i10</th>
                                    <th>P_i11</th>
                                    <th>P_i12</th>
                                    <th >Psicoterapia Individual</th>
                                    <th>I_f1</th>
                                    <th>I_f2</th>
                                    <th>I_f3</th>
                                    <th>I_f4</th>
                                    <th >Intervenciones Familiares</th>
                                    <th>V_d1</th>
                                    <th>V_d2</th>
                                    <th >Visita Domiciliaria</th>
                                    <th>M_s1</th>
                                    <th>M_s2</th>
                                    <th>M_s3</th>
                                    <th >Movilización Social</th>
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
    Listar_Id02();
</script>