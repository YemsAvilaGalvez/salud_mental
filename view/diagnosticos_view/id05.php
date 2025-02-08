<script src="../js/id05.js?rev=<?php echo time(); ?>"></script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>PORCENTAJE DE PERSONAS CON SINDROME PSICOTICO O TRASTORNO DEL ESPECTRO DE LA ESQUIZOFRENIA</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">ID05</li>
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
                        <table id="tabla_id05" class="table table-bordered table-striped">
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
                                    <th>C_med1</th>
                                    <th>C_med2</th>
                                    <th>C_med3</th>
                                    <th>C_med4</th>
                                    <th>C_med5</th>
                                    <th>C_med6</th>
                                    <th>Consulta Medica</th>
                                    <th>Eval.</th>
                                    <th>Evaluación Integral</th>
                                    <th>I_i1</th>
                                    <th>I_i2</th>
                                    <th>I_i3</th>
                                    <th>I_i4</th>
                                    <th>I_i5</th>
                                    <th>I_i6</th>
                                    <th>Intervenciones Individuales</th>
                                    <th>I_f1</th>
                                    <th>I_f2</th>
                                    <th>I_f3</th>
                                    <th>Intervenciones Familiares</th>
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
                                    <th>Psicoterapia Individual</th>
                                    <th>P_e1</th>
                                    <th>P_e2</th>
                                    <th>P_e3</th>
                                    <th>P_e4</th>
                                    <th>Psicoeducación</th>
                                    <th>V_d1</th>
                                    <th>V_d2</th>
                                    <th>V_d3</th>
                                    <th>Visita Domiciliaria</th>
                                    <th>inter_soc1</th>
                                    <th>inter_soc2</th>
                                    <th>inter_soc3</th>
                                    <th>Intervencion Social</th>
                                    <th>inter_comu1</th>
                                    <th>inter_comu2</th>
                                    <th>inter_comu3</th>
                                    <th>inter_comu4</th>
                                    <th>inter_comu5</th>
                                    <th>inter_comu6</th>
                                    <th>inter_comu7</th>
                                    <th>inter_comu8</th>
                                    <th>inter_comu9</th>
                                    <th>inter_comu10</th>
                                    <th>Integracion Comunitaria</th>
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
                                    <th>C_med1</th>
                                    <th>C_med2</th>
                                    <th>C_med3</th>
                                    <th>C_med4</th>
                                    <th>C_med5</th>
                                    <th>C_med6</th>
                                    <th>Consulta Medica</th>
                                    <th>Eval.</th>
                                    <th>Evaluación Integral</th>
                                    <th>I_i1</th>
                                    <th>I_i2</th>
                                    <th>I_i3</th>
                                    <th>I_i4</th>
                                    <th>I_i5</th>
                                    <th>I_i6</th>
                                    <th>Intervenciones Individuales</th>
                                    <th>I_f1</th>
                                    <th>I_f2</th>
                                    <th>I_f3</th>
                                    <th>Intervenciones Familiares</th>
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
                                    <th>Psicoterapia Individual</th>
                                    <th>P_e1</th>
                                    <th>P_e2</th>
                                    <th>P_e3</th>
                                    <th>P_e4</th>
                                    <th>Psicoeducación</th>
                                    <th>V_d1</th>
                                    <th>V_d2</th>
                                    <th>V_d3</th>
                                    <th>Visita Domiciliaria</th>
                                    <th>inter_soc1</th>
                                    <th>inter_soc2</th>
                                    <th>inter_soc3</th>
                                    <th>Intervencion Social</th>
                                    <th>inter_comu1</th>
                                    <th>inter_comu2</th>
                                    <th>inter_comu3</th>
                                    <th>inter_comu4</th>
                                    <th>inter_comu5</th>
                                    <th>inter_comu6</th>
                                    <th>inter_comu7</th>
                                    <th>inter_comu8</th>
                                    <th>inter_comu9</th>
                                    <th>inter_comu10</th>
                                    <th>Integracion Comunitaria</th>
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
    Listar_Id05();
</script>