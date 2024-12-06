<?php
include_once '../model/modelo_ds.php';

$libros = new Modelo_ds();

if ($_POST['funcion'] == 'total_registros') {
    $total = $libros->Total_registros();  // Obtenemos el total de registros
    echo json_encode(['total_registros' => $total]);  // Devolvemos la respuesta en formato JSON
}
?>
