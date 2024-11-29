<script src="../js/nominal.js?rev=<?php echo time(); ?>"></script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Consolidado</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Consolidado</li>
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
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="exampleInputFile">Paciente</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="filePaciente" name="filePaciente">
                                            <label class="custom-file-label" for="exampleInputFile">Subir Archivo</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="button" class="btn btn-block btn-primary" onclick="ConsolidarPaciente();">Consolidar Información</button>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="exampleInputFile">Personal</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="filePersonal" name="filePersonal">
                                            <label class="custom-file-label" for="exampleInputFile">Subir Archivo</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="button" class="btn btn-block btn-primary" onclick="ConsolidarPersonal();">Consolidar Información</button>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="exampleInputFile">Registrador</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="fileRegistrador" name="fileRegistrador">
                                            <label class="custom-file-label" for="exampleInputFile">Subir Archivo</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="button" class="btn btn-block btn-primary" onclick="ConsolidarRegistrador();">Consolidar Información</button>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="exampleInputFile">Nominal</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="fileNominal" name="fileNominal">
                                            <label class="custom-file-label" for="exampleInputFile">Subir Archivo</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="button" class="btn btn-block btn-primary" onclick="ConsolidarNominal();">Consolidar Información</button>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tabla_consolidado" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Cita</th>
                                        <th>Año</th>
                                        <th>Mes</th>
                                        <th>Dia</th>
                                        <th>Fecha de Atención</th>
                                        <th>Lote</th>
                                        <th>N° Pag</th>
                                        <th>N° Región</th>
                                        <th>ID UPS</th>
                                        <th>Descripción UPS</th>
                                        <th>Descripción Sector</th>
                                        <th>Descripción Disa</th>
                                        <th>Descripción Red</th>
                                        <th>Descripción MicroRed</th>
                                        <th>Codigo Unico</th>
                                        <th>Nombre Establecimiento</th>
                                        <th>Abrev Tipo de Documento Paciente</th>
                                        <th>N° de Documento Paciente</th>
                                        <th>Apellido Paterno Paciente</th>
                                        <th>Apellido Materno Paciente</th>
                                        <th>Nombres Paciente</th>
                                        <th>Fecha de Nacimiento Paciente</th>
                                        <th>Genero</th>
                                        <th>ID Etnia</th>
                                        <th>Historia Clinica</th>
                                        <th>Ficha Familiar</th>
                                        <th>ID Financiador</th>
                                        <th>Descripción Financiador</th>
                                        <th>Descripción Pais</th>
                                        <th>Abrev Tipo de Documento Personal</th>
                                        <th>N° de Documento Personal</th>
                                        <th>Apellido Paterno Personal</th>
                                        <th>Apellido Materno Personal</th>
                                        <th>Nombres Personal</th>
                                        <th>Fecha de Nacimiento Personal</th>
                                        <th>ID Condicion</th>
                                        <th>Descripcion Condicion</th>
                                        <th>ID Profesion</th>
                                        <th>Descripcion Profesion</th>
                                        <th>ID Colegio</th>
                                        <th>Descripcion Colegio</th>
                                        <th>N° de Colegiatura</th>
                                        <th>Abrev Tipo de Documento Registrador</th>
                                        <th>N° de Documento Registrador</th>
                                        <th>Apellido Paterno Registrador</th>
                                        <th>Apellido Materno Registrador</th>
                                        <th>Nombres Registrador</th>
                                        <th>Fecha de Nacimiento Registrador</th>
                                        <th>ID Condicion Establecimiento</th>
                                        <th>ID Condicion Servicio</th>
                                        <th>Edad Reg</th>
                                        <th>Año Acutal Paciente</th>
                                        <th>Mes Acutal Paciente</th>
                                        <th>Dia Acutal Paciente</th>
                                        <th>ID Turno</th>
                                        <th>Codigo Item</th>
                                        <th>Descripcion Item</th>
                                        <th>Tipo de Diagnostico</th>
                                        <th>valor Lab</th>
                                        <th>ID Correlativo</th>
                                        <th>Peso</th>
                                        <th>Talla</th>
                                        <th>Hemoglobina</th>
                                        <th>Talla</th>
                                        <th>Talla</th>
                                        <th>Talla</th>
                                        <th>Talla</th>
                                        <th>Talla</th>
                                        <th>Tipo de Diagnostico</th>
                                        <th>Perimetro Abdominal</th>
                                        <th>Perimetro Cefalico</th>
                                        <th>ID otra Condición</th>
                                        <th>Fecha Ultima Regla</th>
                                        <th>Fecha Solicitud HB</th>
                                        <th>Fecha Registro</th>
                                        <th>Fecha Modificación</th>
                                    </tr>
                                </thead>

                                <tfoot>
                                    <tr>
                                        <th>ID Cita</th>
                                        <th>Año</th>
                                        <th>Mes</th>
                                        <th>Dia</th>
                                        <th>Fecha de Atención</th>
                                        <th>Lote</th>
                                        <th>N° Pag</th>
                                        <th>N° Región</th>
                                        <th>ID UPS</th>
                                        <th>Descripción UPS</th>
                                        <th>Descripción Sector</th>
                                        <th>Descripción Disa</th>
                                        <th>Descripción Red</th>
                                        <th>Descripción MicroRed</th>
                                        <th>Codigo Unico</th>
                                        <th>Nombre Establecimiento</th>
                                        <th>Abrev Tipo de Documento Paciente</th>
                                        <th>N° de Documento Paciente</th>
                                        <th>Apellido Paterno Paciente</th>
                                        <th>Apellido Materno Paciente</th>
                                        <th>Nombres Paciente</th>
                                        <th>Fecha de Nacimiento Paciente</th>
                                        <th>Genero</th>
                                        <th>ID Etnia</th>
                                        <th>Historia Clinica</th>
                                        <th>Ficha Familiar</th>
                                        <th>ID Financiador</th>
                                        <th>Descripción Financiador</th>
                                        <th>Descripción Pais</th>
                                        <th>Abrev Tipo de Documento Personal</th>
                                        <th>N° de Documento Personal</th>
                                        <th>Apellido Paterno Personal</th>
                                        <th>Apellido Materno Personal</th>
                                        <th>Nombres Personal</th>
                                        <th>Fecha de Nacimiento Personal</th>
                                        <th>ID Condicion</th>
                                        <th>Descripcion Condicion</th>
                                        <th>ID Profesion</th>
                                        <th>Descripcion Profesion</th>
                                        <th>ID Colegio</th>
                                        <th>Descripcion Colegio</th>
                                        <th>N° de Colegiatura</th>
                                        <th>Abrev Tipo de Documento Registrador</th>
                                        <th>N° de Documento Registrador</th>
                                        <th>Apellido Paterno Registrador</th>
                                        <th>Apellido Materno Registrador</th>
                                        <th>Nombres Registrador</th>
                                        <th>Fecha de Nacimiento Registrador</th>
                                        <th>ID Condicion Establecimiento</th>
                                        <th>ID Condicion Servicio</th>
                                        <th>Edad Reg</th>
                                        <th>Año Acutal Paciente</th>
                                        <th>Mes Acutal Paciente</th>
                                        <th>Dia Acutal Paciente</th>
                                        <th>ID Turno</th>
                                        <th>Codigo Item</th>
                                        <th>Descripcion Item</th>
                                        <th>Tipo de Diagnostico</th>
                                        <th>valor Lab</th>
                                        <th>ID Correlativo</th>
                                        <th>Peso</th>
                                        <th>Talla</th>
                                        <th>Hemoglobina</th>
                                        <th>Talla</th>
                                        <th>Talla</th>
                                        <th>Talla</th>
                                        <th>Talla</th>
                                        <th>Talla</th>
                                        <th>Tipo de Diagnostico</th>
                                        <th>Perimetro Abdominal</th>
                                        <th>Perimetro Cefalico</th>
                                        <th>ID otra Condición</th>
                                        <th>Fecha Ultima Regla</th>
                                        <th>Fecha Solicitud HB</th>
                                        <th>Fecha Registro</th>
                                        <th>Fecha Modificación</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->

                    </div>

                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

<script>
    $(function() {
        bsCustomFileInput.init();
    });

    /**************************************************
    IMPORTAR DESDE EXCEL
    ****************************************************/
    function ConsolidarPaciente() {
        // Obtener el archivo seleccionado
        let archivo = document.getElementById("filePaciente").files[0];
        if (!archivo) {
            return Swal.fire("Mensaje de Advertencia", "Seleccione un archivo", "warning");
        }

        let formData = new FormData();
        formData.append('excel', archivo); // Añadir el archivo al FormData

        // Realizar la solicitud AJAX
        $.ajax({
            url: '../document/excel_import_paciente.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(resp) {
                Swal.fire("Mensaje de Confirmación", "Importación de productos exitosa", "success");
                document.getElementById('filePaciente').value = null; // Limpiar el campo
                // Recargar la página
                tbl_consolidado.ajax.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Error", "Hubo un problema al procesar la solicitud: " + errorThrown, "error");
            }
        });

        return false; // Prevenir comportamiento predeterminado
    }

    function ConsolidarPersonal() {
        // Obtener el archivo seleccionado
        let archivo = document.getElementById("filePersonal").files[0];
        if (!archivo) {
            return Swal.fire("Mensaje de Advertencia", "Seleccione un archivo", "warning");
        }

        let formData = new FormData();
        formData.append('excel', archivo); // Añadir el archivo al FormData

        // Realizar la solicitud AJAX
        $.ajax({
            url: '../document/excel_import_personal.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(resp) {
                Swal.fire("Mensaje de Confirmación", "Importación de productos exitosa", "success");
                document.getElementById('filePersonal').value = null; // Limpiar el campo
                // Recargar la página
                tbl_consolidado.ajax.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Error", "Hubo un problema al procesar la solicitud: " + errorThrown, "error");
            }
        });

        return false; // Prevenir comportamiento predeterminado
    }

    function ConsolidarRegistrador() {
        // Obtener el archivo seleccionado
        let archivo = document.getElementById("fileRegistrador").files[0];
        if (!archivo) {
            return Swal.fire("Mensaje de Advertencia", "Seleccione un archivo", "warning");
        }

        let formData = new FormData();
        formData.append('excel', archivo); // Añadir el archivo al FormData

        // Realizar la solicitud AJAX
        $.ajax({
            url: '../document/excel_import_registrador.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(resp) {
                Swal.fire("Mensaje de Confirmación", "Importación de productos exitosa", "success");
                document.getElementById('fileRegistrador').value = null; // Limpiar el campo
                // Recargar la página
                tbl_consolidado.ajax.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Error", "Hubo un problema al procesar la solicitud: " + errorThrown, "error");
            }
        });

        return false; // Prevenir comportamiento predeterminado
    }

    function ConsolidarNominal() {
        // Obtener el archivo seleccionado
        let archivo = document.getElementById("fileNominal").files[0];
        if (!archivo) {
            return Swal.fire("Mensaje de Advertencia", "Seleccione un archivo", "warning");
        }

        let formData = new FormData();
        formData.append('excel', archivo); // Añadir el archivo al FormData

        // Realizar la solicitud AJAX
        $.ajax({
            url: '../document/excel_import_nominal.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(resp) {
                Swal.fire("Mensaje de Confirmación", "Importación de productos exitosa", "success");
                document.getElementById('fileNominal').value = null; // Limpiar el campo
                // Recargar la página
                tbl_consolidado.ajax.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Error", "Hubo un problema al procesar la solicitud: " + errorThrown, "error");
            }
        });

        return false; // Prevenir comportamiento predeterminado
    }
</script>