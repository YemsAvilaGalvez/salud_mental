<?php 

	require '../../model/modelo_consolidado.php';
	$MU = new Modelo_Consolidado();//instaciamops
	//$id_consolidado= htmlspecialchars($_POST['id_consolidado'],ENT_QUOTES,'UTF-8');	
	$consulta = $MU->Eliminar_Consolidado();//llamamos al metodo del modelo
	echo $consulta;

 ?>


