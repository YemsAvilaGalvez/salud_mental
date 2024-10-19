<?php

require '../../model/modelo_personal.php';
$MCL = new Modelo_Personal(); //instaciamops
$consulta = $MCL->Listar_Personal(); //llamamos al modelo
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
