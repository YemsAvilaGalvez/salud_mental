<script src="../js/documento.js?rev=<?php echo time(); ?>"></script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tipo de Documento</h1>
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
                        <h3 class="card-title">Lista de Documentos</h3>
                        <button type="button" class="btn btn-primary float-right" onclick="AbrirModalRegistrarDocumento();">
                            Agregar
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tabla_documento" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Abreviatura</th>
                                    <th>Descripción</th>
                                </tr>
                            </thead>

                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Abreviatura</th>
                                    <th>Descripción</th>
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

        <!-- modal editar usuario -->
        <div class="modal fade" id="modal_registrar_documento">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Agregar Documento</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" id="text_idusuario_editar" hidden="">
                                <div class="form-group">
                                    <label for="exampleInputFile">Importar excel</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="text_archivo">
                                            <label class="custom-file-label" for="exampleInputFile">Seleccionar archivo</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" onclick="cargar_excel();">Guardar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

<script>
    Listar_Documento();

    $(function() {
        bsCustomFileInput.init();
    });

    //validar que solo seleccione un archivo excel 
    document.getElementById("text_archivo").addEventListener("change", () => {
        var fileName = document.getElementById("text_archivo").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).
        toLowerCase();
        if (extFile == "xlsm" || extFile == "xls" || extFile == "xlsx") {
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
            url: '../EXCEL/excel_import.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(resp) {
                Swal.fire("Mensaje de Confirmacion", "Importacion de Productos Exitosa", "success")
                document.getElementById('text_archivo').value = "";


            }

        });
        return false;

    }
</script>