<?php

require '../../model/modelo_documento.php';
$MP = new Modelo_Documento(); //instaciamops
$consulta = $MP->Listar_Documento(); //llamamos al modelo
if ($consulta) {
    echo json_encode($consulta);
} else {
    echo '{
			"sEcho" : 1,
			"iTotalRecords":"0",
			"iTotalDisplayRecords": "0",
			"aaData": []

		}';
}
