<?php

require '../../model/modelo_consolidado.php';
$MP = new Modelo_Consolidado(); //instaciamops
$consulta = $MP->Listar_Consolidado(); //llamamos al modelo
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
