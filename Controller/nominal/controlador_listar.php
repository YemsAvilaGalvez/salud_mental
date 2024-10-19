<?php

require '../../model/modelo_nominal.php';
$MCL = new Modelo_Nominal(); //instaciamops
$consulta = $MCL->Listar_Nominal(); //llamamos al modelo
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
