<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ficha Paciente</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active"> Ficha Paciente</li>
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
                        <h3 class="card-title">Listado del Paciente</h3>
                        <button class="btn btn-info btn-sm float-right" onclick="AbrirModalRegistroNominal();"><i class="fas fa-plus"></i> Nuevo</button>   
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="table1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                                <th>ID Paciente</th>
                                                <th>Tipo de Documento</th>
                                                <th>N° de Documento</th>
                                                <th>Apellido Paterno</th>
                                                <th>Apellido Materno</th>
                                                <th>Nombres</th>
                                                <th>Fecha de Nacimiento</th>
                                                <th>Genero</th>
                                                <th>Etnia</th>
                                                <th>Historia Clinica</th>
                                                <th>Ficha Familiar</th>
                                                <th>Ubigeo de Nacimiento</th>
                                                <th>Ubigeo Reniec</th>
                                                <th>Domicilio RENIEC</th>
                                                <th>Ubigeo Declarado</th>
                                                <th>Referencia de Domicilio</th>
                                                <th>Pais</th>
                                                <th>Establecimiento</th>
                                                <th>Fecha de Alta</th>
                                                <th>Fecha de Baja</th>
                                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                                <th>ID Paciente</th>
                                                <th>Tipo de Documento</th>
                                                <th>N° de Documento</th>
                                                <th>Apellido Paterno</th>
                                                <th>Apellido Materno</th>
                                                <th>Nombres</th>
                                                <th>Fecha de Nacimiento</th>
                                                <th>Genero</th>
                                                <th>Etnia</th>
                                                <th>Historia Clinica</th>
                                                <th>Ficha Familiar</th>
                                                <th>Ubigeo de Nacimiento</th>
                                                <th>Ubigeo Reniec</th>
                                                <th>Domicilio RENIEC</th>
                                                <th>Ubigeo Declarado</th>
                                                <th>Referencia de Domicilio</th>
                                                <th>Pais</th>
                                                <th>Establecimiento</th>
                                                <th>Fecha de Alta</th>
                                                <th>Fecha de Baja</th>
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
   <div class="modal fade bd-example-modal-lg" id="modal_registro_nominal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Registrar Paciente</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Nombre de usuario</label>
                                        <input type="text" class="form-control" placeholder="Nombre de usuario" id="text_usuario">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Contraseña</label>
                                        <input type="password" class="form-control" placeholder="Contraseña" id="text_clave">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Rol</label>
                                        <select class="select2" multiple="multiple" data-placeholder="Seleccione rol" id="select_rol" style="width: 100%;">
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-success" onclick="RegistrarUsuario();" >Registrar</button>
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
  const spanishLangOptions = {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sSearch":         "Buscar:",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    },
    "buttons": {
      "copy": "Copiar",
      "csv": "CSV",
      "excel": "Excel",
      "pdf": "PDF",
      "print": "Imprimir",
      "colvis": "Visibilidad de columnas"
    }
  };

  $(function () {
    for (let i = 1; i <= 8; i++) {
      $(`#table${i}`).DataTable({
        "responsive": true,
        "lengthChange": true, // Habilita el cambio de longitud
        "pageLength": 10, // Configuración predeterminada de entradas mostradas
        "lengthMenu": [10, 50, 100], // Opciones de cantidad de entradas
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        "language": spanishLangOptions
      }).buttons().container().appendTo(`#table${i}_wrapper .col-md-6:eq(0)`);
    }
  });
</script>

