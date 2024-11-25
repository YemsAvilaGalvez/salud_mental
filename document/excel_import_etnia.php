<?php
require '../vendor/autoload.php';
require 'conn.php'; // Archivo de conexión

if (isset($_FILES['excel']) && $_FILES['excel']['error'] === UPLOAD_ERR_OK) {
    echo "Archivo recibido correctamente: " . $_FILES['excel']['name'];
} else {
    echo "Error al recibir el archivo.";
}


if (isset($_FILES['excel']) && $_FILES['excel']['error'] === UPLOAD_ERR_OK) {
    $inputFileName = $_FILES['excel']['tmp_name'];

    try {
        // Leer el archivo Excel
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($inputFileName);
        $spreadsheet = $reader->load($inputFileName);
        $cantidad = $spreadsheet->getActiveSheet()->toArray();

        foreach ($cantidad as $index => $row) {
            if (!empty($row[0])) {
                // Escapar los valores
                $Id_Etnia = mysqli_real_escape_string($mysqli, $row[0]);
                $Descripcion_Etnia = mysqli_real_escape_string($mysqli, $row[1]);

                // Crear consulta
                $consulta = "INSERT INTO etnia (Id_Etnia, Descripcion_Etnia) 
                             VALUES ('$row[0]', '$row[1]')";

                // Ejecutar consulta y comprobar errores
                if (!mysqli_query($mysqli, $consulta)) {
                    error_log("Error al insertar en la fila $index: " . mysqli_error($mysqli));
                } else {
                    error_log("Fila $index insertada correctamente.");
                }
            }
        }
        echo "Datos importados correctamente.";
    } catch (Exception $e) {
        error_log("Error al procesar el archivo Excel: " . $e->getMessage());
        echo "Error al procesar el archivo Excel.";
    }
} else {
    error_log("Error al recibir el archivo: " . ($_FILES['excel']['error'] ?? 'Archivo no enviado'));
    echo "Error al recibir el archivo.";
}
