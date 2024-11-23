<?php
require 'serverside.php';
//llamamos al getobtener del serverside
$table_data->getObtnerListadoUsario('view_listar_usuario', 'id_usuario', array('id_usuario', 'nombre_usu', 'password_usu', 'id_rol', 'estado_usu', 'nombre_rol'));
