<script src="../js/documento.js?rev=<?php echo time(); ?>"></script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tipo de Documento</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Tipo de Documento</li>
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
                        <h3 class="card-title">Lista de Tipo de Documento</h3>
                        <button class="btn btn-info btn-sm float-right" onclick="AbrirModalRegistroDocumento();"><i class="fas fa-plus"></i> Nuevo</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tabla_documento" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Id_Tipo_Documento</th>
                                    <th>Abrev_Tipo_Doc</th>
                                    <th>Descripcion_Tipo_Documento</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>


                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Id_Tipo_Documento</th>
                                    <th>Abrev_Tipo_Doc</th>
                                    <th>Descripcion_Tipo_Documento</th>
                                    <th>Acción</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->

            <!-- modal registrar -->
            <div class="modal fade" id="modal_registro_documento">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Registrar Tipo de Documento</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>ID Documento</label>
                                        <input type="text" class="form-control" placeholder="ID Documento" id="text_idDocumento">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Abreviatura</label>
                                        <input type="text" class="form-control" placeholder="Abreviatura de Documento" id="text_abreviatura">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <input type="text" class="form-control" placeholder="Descripción de Documento" id="text_descripcion">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <input type="file" id="text_archivo" class="form-control-sm"> <br>
                                        <br>
                                        <button type="button" onclick="cargar_excel();"
                                            class="btn btn-success btn-sm">Importar</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="LimpiarModalDocumento();">Cerrar</button>
                            <button type="button" class="btn btn-success" id="btnRegistrarDoc">Registrar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <!-- modal editar -->
            <div class="modal fade" id="modal_editar_documento">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Editar Tipo de Documento</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="text" id="text_iddocumento" hidden="">
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>ID Documento</label>
                                        <input type="text" class="form-control" placeholder="ID Documento" id="text_idDocumento_editar">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Abreviatura</label>
                                        <input type="text" class="form-control" placeholder="Abreviatura de Documento" id="text_abreviatura_editar">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <input type="text" class="form-control" placeholder="Descripción de Documento" id="text_descripcion_editar">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-success" onclick="ModificarDocumento();">Modificar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
<script>
    Listar_Documento();

    //validar que solo seleccione un archivo excel 
    document.getElementById("text_archivo").addEventListener("change", () => {
        var fileName = document.getElementById("text_archivo").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).
        toLowerCase();
        if (extFile == "xlsm" || extFile == "xls" || extFile == "xlsx" || extFile == "csv") {
            //TO DO 
        } else {
            Swal.fire("MENSAJE DE ADVERTENCIA",
                "SOLO SE ACEPTAN ARCHIVOS EXCEL - USTED SUBIO UN ARCHIVO CON EXTESION " + extFile, "warning");
            document.getElementById("text_archivo").value = "";
        }
    });

    /**************************************************
      IMPORTAR DESDE EXCEL
    ****************************************************/
    function cargar_excel() {
        let archivo = document.getElementById("text_archivo").value;
        if (archivo.length == 0) {
            return Swal.fire("Mensaje de Advertencia", "Selecciones un Archivo", "warning");
        }

        let formData = new FormData();
        let excel = $("#text_archivo")[0].files[0];
        formData.append('excel', excel);
        $.ajax({
            url: '../document/excel_import_documento.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(resp) {
                Swal.fire("Mensaje de Confirmacion", "Importacion de Productos Exitosa", "success")
                document.getElementById('text_archivo').value = "";
                tbl_documento.ajax.reload();
            }

        });
        return false;

    }

    $("#btnRegistrarDoc").on('click', function() {
        RegistrarDocumento();
    })
</script>