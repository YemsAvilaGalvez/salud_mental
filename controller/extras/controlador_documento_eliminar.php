<?php

require '../../model/modelo_documento.php';
$MMA = new Modelo_Documento(); //instaciamops
$id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
$consulta = $MMA->Eliminar_Documento($id); //llamamos al metodo del modelo
echo $consulta;
