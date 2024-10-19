<?php

require '../../model/modelo_registrador.php';
$MCL = new Modelo_Registrador(); //instaciamops
$consulta = $MCL->Listar_Registrador(); //llamamos al modelo
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
