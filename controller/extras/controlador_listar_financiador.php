<?php

require '../../model/modelo_extras.php';
$MP = new Modelo_Extras(); //instaciamops
$consulta = $MP->Listar_Financiador(); //llamamos al modelo
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
