<?php
include_once '../model/modelo_ds.php';

$ds = new Modelo_ds();

if ($_POST['funcion'] == 'total_registros') {
    $total = $ds->Total_registros();  // Obtenemos el total de registros
    echo json_encode(['total_registros' => $total]);  // Devolvemos la respuesta en formato JSON
}

if ($_POST['funcion'] == 'total_pacientes_unicos') {
    $totalPacientesUnicos = $ds->Total_pacientes_unicos();  // Obtenemos el total de pacientes únicos
    echo json_encode(['total_pacientes_unicos' => $totalPacientesUnicos]);  // Devolvemos la respuesta en formato JSON
}

if ($_POST['funcion'] == 'total_pacientes_intervencion') {
    $pacientesIntervencion = $ds->Total_pacientes_intervencion();  // Obtenemos los pacientes de intervención
    
    // Creamos una respuesta JSON con los datos de los pacientes y el total
    echo json_encode([
        'pacientes_intervencion' => $pacientesIntervencion['pacientes_intervencion'],  // Los primeros 10 pacientes
        'total_intervencion' => $pacientesIntervencion['total_intervencion']  // El total de registros de intervención
    ]);
}


?>
