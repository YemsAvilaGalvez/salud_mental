<?php

require '../../model/modelo_paciente.php';
$MCL = new Modelo_Paciente(); //instaciamops
$consulta = $MCL->Listar_Paciente(); //llamamos al modelo
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
