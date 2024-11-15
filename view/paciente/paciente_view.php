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
                        <form method="POST" enctype="multipart/form-data" id="form_cargar_paciente">
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

        $("#form_cargar_paciente").on('submit', function(e) {

            e.preventDefault();

            /*===================================================================*/
            //VALIDAR QUE SE SELECCIONE UN ARCHIVO
            /*===================================================================*/
            if ($("#filePaciente").get(0).files.length == 0) {
                Swal.fire({
                    position: 'center',
                    icon: 'warning',
                    title: 'Debe seleccionar un archivo (Excel).',
                    showConfirmButton: false,
                    timer: 2500
                })
            } else {

                /*===================================================================*/
                //VALIDAR QUE EL ARCHIVO SELECCIONADO SEA EN EXTENSION XLS O XLSX
                /*===================================================================*/
                var extensiones_permitidas = [".xls", ".xlsx", ".xml", ".csv"];
                var input_file_productos = $("#filePaciente");
                var exp_reg = new RegExp("([a-zA-Z0-9\s_\\-.\:])+(" + extensiones_permitidas.join('|') + ")$");

                if (!exp_reg.test(input_file_productos.val().toLowerCase())) {
                    Swal.fire({
                        position: 'center',
                        icon: 'warning',
                        title: 'Debe seleccionar un archivo con extensión .xls o .xlsx.',
                        showConfirmButton: false,
                        timer: 2500
                    })

                    return false;
                }

                var datos = new FormData($(form_cargar_paciente)[0]);

                $("#btnCargarPaciente").prop("disabled", true);
                /*
                $("#img_carga").attr("style", "display:block");
                $("#img_carga").attr("style", "height:200px");
                $("#img_carga").attr("style", "width:200px"); */

                $.ajax({
                    url: "../ajax/pacientes.ajax.php",
                    type: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(respuesta) {

                        console.log("respuesta",respuesta);
/*
                        if (respuesta['totalCategorias'] > 0 && respuesta['totalProductos'] > 0) {

                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Se registraron ' + respuesta['totalCategorias'] + ' categorías y ' + respuesta['totalProductos'] + 'productos correctamente!',
                                showConfirmButton: false,
                                timer: 2500
                            })

                            $("#btnCargar").prop("disabled", false);
                            $("#img_carga").attr("style", "display:none");
                        } else {

                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Se presento un error al momento de realizar el registro de categorías y/o productos!',
                                showConfirmButton: false,
                                timer: 2500
                            })

                            $("#btnCargar").prop("disabled", false);
                            $("#img_carga").attr("style", "display:none");

                        }*/
                    }
                });

            }
        })

    })
</script>