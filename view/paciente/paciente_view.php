<script src="../js/paciente.js?rev=<?php echo time(); ?>"></script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Paciente</h1>
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
                        <h3 class="card-title mb-4">Lista de Paciente</h3>
                        <form method="POST" enctype="multipart/form-data" id="cargar_paciente">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="filePaciente" id="filePaciente" accept=".xls, .xlsx, .xml, .csv">
                                        <label class="custom-file-label" for="exampleInputFile">Subir Archivo</label>
                                    </div>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default btn-block" id="btnCargarPaciente">Importar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tabla_paciente" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Documento</th>
                                    <th>N° Documento</th>
                                    <th>Nombre</th>
                                    <th>Fecha Nacimiento</th>
                                    <th>Genero</th>
                                    <th>Etnia</th>
                                    <th>Ubigeo Nacimiento</th>
                                    <th>Ubigeo Reniec</th>
                                    <th>Domicilio Reniec</th>
                                    <th>Ubigeo Declarado</th>
                                    <th>Domicilio Declarado</th>
                                    <th>Referencia Domicilio</th>
                                    <th>País</th>
                                    <th>Establecimiento</th>
                                    <th>Fecha de Alta</th>
                                    <th>Fecha de Modificación</th>
                                </tr>
                            </thead>

                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Documento</th>
                                    <th>N° Documento</th>
                                    <th>Nombre</th>
                                    <th>Fecha Nacimiento</th>
                                    <th>Genero</th>
                                    <th>Etnia</th>
                                    <th>Ubigeo Nacimiento</th>
                                    <th>Ubigeo Reniec</th>
                                    <th>Domicilio Reniec</th>
                                    <th>Ubigeo Declarado</th>
                                    <th>Domicilio Declarado</th>
                                    <th>Referencia Domicilio</th>
                                    <th>País</th>
                                    <th>Establecimiento</th>
                                    <th>Fecha de Alta</th>
                                    <th>Fecha de Modificación</th>
                                </tr>
                            </tfoot>
                        </table>
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
    Listar_Paciente();

    $(function() {
        bsCustomFileInput.init();
    });


    $(document).ready(function() {
        $('#cargar_paciente').on('submit', function(e) {
            e.preventDefault()
            /** validar que se seleccione un archivo */
            if ($('#filePaciente').get(0).files.length == 0) {
                Swal.fire({
                    position: 'center',
                    icon: 'warning',
                    title: 'Debe seleccionar un archivo EXCEL.',
                    showConfirmButton: false,
                    timer: 2500
                })
            } else {
                /** validar el formato de archivo */
                var extensiones_permitidas = ['.xls', '.xlsx', '.xml', '.csv']
                var input_file_pacientes = $('#filePaciente')
                var exp_reg = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + extensiones_permitidas.join('|') + ")$")

                if (!exp_reg.test(input_file_pacientes.val().toLowerCase())) {
                    Swal.fire({
                        position: 'center',
                        icon: 'warning',
                        title: 'Debe seleccionar un archivo con extensión .xls, .xlsx, .xml o .csv',
                        showConfirmButton: false,
                        timer: 2500
                    })

                    return false
                }
                var datos = new FormData($(cargar_paciente)[0])

                $('#btnCargarPaciente').prop('disabled',true)

                $.ajax({
                    url: 'ajax/pacientes.ajax.php',
                    type: 'POST',
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(respuesta){
                        console.log("respuesta",respuesta)
                    }
                })
            }
        })
    })
</script>