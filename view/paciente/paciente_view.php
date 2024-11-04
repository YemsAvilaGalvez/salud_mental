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
                        <h3 class="card-title">Lista de Paciente</h3>
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

        <!-- modal editar usuario -->
        <div class="modal fade" id="modal_editar_paciente">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Editar Usuario</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" id="text_idpaciente_editar" hidden="">
                                <label for="exampleInputEmail1">Usuario</label>
                                <input type="text" class="form-control" id="text_usuario_editar" placeholder="">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" onclick="ModificarUsuario();">Guardar</button>
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
    Listar_Paciente();
</script>