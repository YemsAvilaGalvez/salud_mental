<?php

require '../../model/modelo_usuario.php';
$ruta = "";
$MU = new Modelo_Usuario(); //instaciamops
$id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
$usuario = htmlspecialchars($_POST['usuario'], ENT_QUOTES, 'UTF-8');
//$usuario= password_hash($_POST['usuario'],PASSWORD_DEFAULT,['cost'=>12]);

$consulta = $MU->Modificar_Usuario($id, $usuario); //parametros de los campos de arriba //llamamos al modelo
echo $consulta;
