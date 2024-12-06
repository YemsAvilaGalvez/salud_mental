<?php

require '../../model/modelo_diagnostico.php';
$MP = new Modelo_Diagnostico(); //instaciamops
$consulta = $MP->Listar_Id03_R(); //llamamos al modelo
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
