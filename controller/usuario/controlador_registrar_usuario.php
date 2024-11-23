<?php

require '../../model/modelo_usuario.php';
$MU = new Modelo_Usuario(); //instaciamops
$usuario = htmlspecialchars($_POST['u'], ENT_QUOTES, 'UTF-8');
$clave = password_hash($_POST['c'], PASSWORD_DEFAULT, ['cost' => 12]);
$rol = htmlspecialchars($_POST['r'], ENT_QUOTES, 'UTF-8');

$consulta = $MU->Registrar_Usuario($usuario, $clave, $rol); //llamamos al modelo
echo $consulta;

