<?php

require '../../model/modelo_documento.php';
$MCL = new Modelo_Documento(); //instaciamops
$consulta = $MCL->Listar_Documento(); //llamamos al modelo
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
