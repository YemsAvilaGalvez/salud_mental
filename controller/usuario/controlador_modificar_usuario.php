<?php

require '../../model/modelo_usuario.php';
$ruta = "";
$MU = new Modelo_Usuario(); //instaciamops
$id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
$usuario = htmlspecialchars($_POST['usuario'], ENT_QUOTES, 'UTF-8');
$rol = htmlspecialchars($_POST['rol'], ENT_QUOTES, 'UTF-8');

$consulta = $MU->Modificar_Usuario($id, $usuario, $rol); //parametros de los campos de arriba //llamamos al modelo
echo $consulta;
