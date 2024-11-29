<?php


require '../../model/modelo_documento.php';

$MP = new Modelo_Documento(); 
$id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
$abreviatura = htmlspecialchars($_POST['abreviatura'], ENT_QUOTES, 'UTF-8');
$descripcion = htmlspecialchars($_POST['descripcion'], ENT_QUOTES, 'UTF-8');


$consulta = $MP->Registrar_Documento($id, $abreviatura, $descripcion); //llamamos al modelo
echo $consulta;

