<script src="../js/extras.js?rev=<?php echo time(); ?>"></script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    Extras
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Extras</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <!-- ./row -->
        <div class="row">
            <div class="col-12">
            </div>
        </div>
        <!-- ./row -->
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="Etina-tab" data-toggle="pill" href="#Etina-content" role="tab" aria-controls="Etina-content" aria-selected="true">Etina</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Documento-tab" data-toggle="pill" href="#Documento-content" role="tab" aria-controls="Documento-content" aria-selected="false">Documento</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Financiador-tab" data-toggle="pill" href="#Financiador-content" role="tab" aria-controls="Financiador-content" aria-selected="false">Financiador</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="CPMS-tab" data-toggle="pill" href="#CPMS-content" role="tab" aria-controls="CPMS-content" aria-selected="false">CPMS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Profesion-tab" data-toggle="pill" href="#Profesion-content" role="tab" aria-controls="Profesion-content" aria-selected="false">Profesión</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="CondicionContrato-tab" data-toggle="pill" href="#CondicionContrato-content" role="tab" aria-controls="CondicionContrato-content" aria-selected="false">Condición Contrato</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Colegio-tab" data-toggle="pill" href="#Colegio-content" role="tab" aria-controls="Colegio-content" aria-selected="false">Colegio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="UPS-tab" data-toggle="pill" href="#UPS-content" role="tab" aria-controls="UPS-content" aria-selected="false">UPS</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="tab-pane fade show active" id="Etina-content" role="tabpanel" aria-labelledby="Etina-tab">
                                <!-- Contenido para la pestaña Etina -->

                                <div class="card-body" style="display: block;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-default">
                                                <div class="card-header">
                                                    <h3 class="card-title"><b>Registro Etnia: </b><small><em>Añada un archivo excel para rebir registros a la </em> Base de Datos.</small></h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="text_excel_etnia" accept=".xls, .xlsx, .csv">
                                                            <label class="custom-file-label" for="exampleInputFile"><span>Agregar archivo <i><b>Etnia</b></i> </span></label>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-block btn-outline-primary mt-3" onclick="cargar_excel_etnia();">Registrar</button>
                                                </div>
                                                <!-- /.card-body -->

                                            </div>
                                            <!-- /.card -->
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>

                                <table id="tabla_etnia" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Id_Etnia</th>
                                            <th>Descripcion_Etnia
                                            </th>
                                            <th>Acción</th>

                                        </tr>
                                    </thead>


                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Id_Etnia</th>
                                            <th>Descripcion_Etnia
                                            </th>
                                            <th>Acción</th>

                                        </tr>
                                    </tfoot>
                                </table>


                            </div>

                            <div class="tab-pane fade" id="Documento-content" role="tabpanel" aria-labelledby="Documento-tab">
                                <!-- Contenido para la pestaña Documento -->
                                <div class="card-body" style="display: block;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-default">
                                                <div class="card-header">
                                                    <h3 class="card-title"><b>Registro Documento: </b><small><em>Añada un archivo excel para rebir registros a la </em> Base de Datos.</small></h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="text_excel_documento" accept=".xls, .xlsx, .csv">
                                                            <label class="custom-file-label" for="exampleInputFile"><span>Agregar archivo <i><b>Tipo de Documento </b></i> </span></label>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-block btn-outline-primary mt-3" onclick="cargar_excel_documento();">Registrar</button>

                                                </div>
                                                <!-- /.card-body -->

                                            </div>
                                            <!-- /.card -->
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>

                                <table id="tabla_documento" class="table table-bordered table-hover">
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

                            <div class="tab-pane fade" id="Financiador-content" role="tabpanel" aria-labelledby="Financiador-tab">
                                <!-- Contenido para la pestaña Financiador -->
                                <div class="card-body" style="display: block;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-default">
                                                <div class="card-header">
                                                    <h3 class="card-title"><b>Registro Financiador: </b><small><em>Añada un archivo excel para rebir registros a la </em> Base de Datos.</small></h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="text_excel_financiador" accept=".xls, .xlsx, .csv">
                                                            <label class="custom-file-label" for="exampleInputFile"><span>Agregar archivo <i><b>Financiador</b></i> </span></label>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-block btn-outline-primary mt-3" onclick="cargar_excel_financiador();">Registrar</button>

                                                </div>
                                                <!-- /.card-body -->

                                            </div>
                                            <!-- /.card -->
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>

                                <table id="tabla_financiador" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Id_Financiador</th>
                                            <th>Descripcion_Financiador</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>


                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Id_Financiador</th>
                                            <th>Descripcion_Financiador</th>
                                            <th>Acción</th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>

                            <div class="tab-pane fade" id="CPMS-content" role="tabpanel" aria-labelledby="CPMS-tab">
                                <!-- Contenido para la pestaña CPMS -->
                                <div class="card-body" style="display: block;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-default">
                                                <div class="card-header">
                                                    <h3 class="card-title"><b>Registro CPMS: </b><small><em>Añada un archivo excel para rebir registros a la </em> Base de Datos.</small></h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="text_excel_cpms" accept=".xls, .xlsx, .csv">
                                                            <label class="custom-file-label" for="exampleInputFile"><span>Agregar archivo <i><b>CPMS</b></i> </span></label>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-block btn-outline-primary mt-3" onclick="cargar_excel_cpms();">Registrar</button>

                                                </div>
                                                <!-- /.card-body -->

                                            </div>
                                            <!-- /.card -->
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>

                                <table id="tabla_cmps" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Codigo_Item</th>
                                            <th>Descripcion_Item</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>


                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Codigo_Item</th>
                                            <th>Descripcion_Item</th>
                                            <th>Acción</th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>

                            <div class="tab-pane fade" id="Profesion-content" role="tabpanel" aria-labelledby="Profesion-tab">
                                <!-- Contenido para la pestaña Profesión -->
                                <div class="card-body" style="display: block;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-default">
                                                <div class="card-header">
                                                    <h3 class="card-title"><b>Registro Profesión: </b><small><em>Añada un archivo excel para rebir registros a la </em> Base de Datos.</small></h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                                            <label class="custom-file-label" for="exampleInputFile"><span>Agregar archivo <i><b>Profesión</b></i> </span></label>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-block btn-outline-primary mt-3" onclick="">Registrar</button>

                                                </div>
                                                <!-- /.card-body -->

                                            </div>
                                            <!-- /.card -->
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>

                                <table id="table5" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Id_Profesion</th>
                                            <th>Descripcion_Profesion</th>
                                            <th>Id_Colegio</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>


                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Id_Profesion</th>
                                            <th>Descripcion_Profesion</th>
                                            <th>Id_Colegio</th>
                                            <th>Acción</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="CondicionContrato-content" role="tabpanel" aria-labelledby="CondicionContrato-tab">
                                <!-- Contenido para la pestaña Condición Contrato -->
                                <div class="card-body" style="display: block;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-default">
                                                <div class="card-header">
                                                    <h3 class="card-title"><b>Registro Condicion de Contrato: </b><small><em>Añada un archivo excel para rebir registros a la </em> Base de Datos.</small></h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                                            <label class="custom-file-label" for="exampleInputFile"><span>Agregar archivo <i><b>Condicion de Contrato</b></i> </span></label>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-block btn-outline-primary mt-3" onclick="">Registrar</button>

                                                </div>
                                                <!-- /.card-body -->

                                            </div>
                                            <!-- /.card -->
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>

                                <table id="table6" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Id_Condicion</th>
                                            <th>Descripcion_Condicion</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>


                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Id_Condicion</th>
                                            <th>Descripcion_Condicion</th>
                                            <th>Acción</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="Colegio-content" role="tabpanel" aria-labelledby="Colegio-tab">
                                <!-- Contenido para la pestaña Colegio -->
                                <div class="card-body" style="display: block;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-default">
                                                <div class="card-header">
                                                    <h3 class="card-title"><b>Registro Colegio: </b><small><em>Añada un archivo excel para rebir registros a la </em> Base de Datos.</small></h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                                            <label class="custom-file-label" for="exampleInputFile"><span>Agregar archivo <i><b>Colegio</b></i> </span></label>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-block btn-outline-primary mt-3" onclick="">Registrar</button>

                                                </div>
                                                <!-- /.card-body -->

                                            </div>
                                            <!-- /.card -->
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>

                                <table id="table7" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Id_Colegio</th>
                                            <th>Descripcion_Colegio</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>


                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Id_Colegio</th>
                                            <th>Descripcion_Colegio</th>
                                            <th>Acción</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="UPS-content" role="tabpanel" aria-labelledby="UPS-tab">
                                <!-- Contenido para la pestaña UPS -->
                                <div class="card-body" style="display: block;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-default">
                                                <div class="card-header">
                                                    <h3 class="card-title"><b>Registro UPS: </b><small><em>Añada un archivo excel para rebir registros a la </em> Base de Datos.</small></h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                                            <label class="custom-file-label" for="exampleInputFile"><span>Agregar archivo <i><b>UPS</b></i> </span></label>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-block btn-outline-primary mt-3" onclick="">Registrar</button>

                                                </div>
                                                <!-- /.card-body -->

                                            </div>
                                            <!-- /.card -->
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>

                                <table id="table8" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Id_Ups</th>
                                            <th>Descripcion_Ups</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>


                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Id_Ups</th>
                                            <th>Descripcion_Ups</th>
                                            <th>Acción</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

<script>
    $(function() {
        bsCustomFileInput.init();
    });
    Listar_Etnia();
    Listar_Documento();
    Listar_Financiador();
    Listar_Cpms();

    /**************************************************
    IMPORTAR DESDE EXCEL
    ****************************************************/
    function cargar_excel_etnia() {
        // Obtener el archivo seleccionado
        let archivo = document.getElementById("text_excel_etnia").files[0];
        if (!archivo) {
            return Swal.fire("Mensaje de Advertencia", "Seleccione un archivo", "warning");
        }

        let formData = new FormData();
        formData.append('excel', archivo); // Añadir el archivo al FormData

        // Realizar la solicitud AJAX
        $.ajax({
            url: '../document/excel_import_etnia.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(resp) {
                Swal.fire("Mensaje de Confirmación", "Importación de productos exitosa", "success");
                document.getElementById('text_excel_etnia').value = null; // Limpiar el campo
                // Recargar la página
                tbl_etnia.ajax.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Error", "Hubo un problema al procesar la solicitud: " + errorThrown, "error");
            }
        });

        return false; // Prevenir comportamiento predeterminado
    }
    
    function cargar_excel_documento() {
        // Obtener el archivo seleccionado
        let archivo = document.getElementById("text_excel_documento").files[0];
        if (!archivo) {
            return Swal.fire("Mensaje de Advertencia", "Seleccione un archivo", "warning");
        }

        let formData = new FormData();
        formData.append('excel', archivo); // Añadir el archivo al FormData

        // Realizar la solicitud AJAX
        $.ajax({
            url: '../document/excel_import_documento.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(resp) {
                Swal.fire("Mensaje de Confirmación", "Importación de productos exitosa", "success");
                document.getElementById('text_excel_documento').reset(); // Limpiar el campo
                // Recargar la página
                tbl_documento.ajax.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Error", "Hubo un problema al procesar la solicitud: " + errorThrown, "error");
            }
        });

        return false; // Prevenir comportamiento predeterminado
    }

    function cargar_excel_financiador() {
        // Obtener el archivo seleccionado
        let archivo = document.getElementById("text_excel_financiador").files[0];
        if (!archivo) {
            return Swal.fire("Mensaje de Advertencia", "Seleccione un archivo", "warning");
        }

        let formData = new FormData();
        formData.append('excel', archivo); // Añadir el archivo al FormData

        // Realizar la solicitud AJAX
        $.ajax({
            url: '../document/excel_import_financiador.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(resp) {
                Swal.fire("Mensaje de Confirmación", "Importación de productos exitosa", "success");
                document.getElementById('text_excel_financiador').reset(); // Limpiar el campo
                // Recargar la página
                tbl_financiador.ajax.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Error", "Hubo un problema al procesar la solicitud: " + errorThrown, "error");
            }
        });

        return false; // Prevenir comportamiento predeterminado
    }

    function cargar_excel_cpms() {
        // Obtener el archivo seleccionado
        let archivo = document.getElementById("text_excel_cpms").files[0];
        if (!archivo) {
            return Swal.fire("Mensaje de Advertencia", "Seleccione un archivo", "warning");
        }

        let formData = new FormData();
        formData.append('excel', archivo); // Añadir el archivo al FormData

        // Realizar la solicitud AJAX
        $.ajax({
            url: '../document/excel_import_cpms.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(resp) {
                Swal.fire("Mensaje de Confirmación", "Importación de productos exitosa", "success");
                document.getElementById('text_excel_cpms').reset(); // Limpiar el campo
                // Recargar la página
                tbl_cpms.ajax.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Error", "Hubo un problema al procesar la solicitud: " + errorThrown, "error");
            }
        });

        return false; // Prevenir comportamiento predeterminado
    }
</script>