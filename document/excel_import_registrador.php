<?php
require '../vendor/autoload.php';
require 'import_conexion.php';

class MyReadFilter implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter
{
    public function readCell(string $columnAddress, int $row, string $worksheetName = ''): bool
    {
        return $row > 1; // Leer todas las filas excepto la primera
    }
}

// Identificar el tipo de archivo y cargar el contenido
$inputFileName = $_FILES['excel']['tmp_name'];
$inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
$reader->setReadFilter(new MyReadFilter());
$spreadsheet = $reader->load($inputFileName);
$data = $spreadsheet->getActiveSheet()->toArray();

$batchSize = 1000; // Tamaño del lote
$batchData = [];
$rowCount = 0;

$mysqli->begin_transaction(); // Iniciar transacción

try {
    foreach ($data as $row) {
        // Rellenar valores faltantes
        for ($i = 0; $i < 7; $i++) {
            if (!isset($row[$i]) || empty($row[$i])) {
                $row[$i] = ($i >= 3 && $i <= 5) ? "Sin valor" : "NULL";
            }
        }

        // Escapar y preparar datos
        $Id_Registrador = $mysqli->real_escape_string(trim($row[0]));
        $Id_Tipo_Documento = $mysqli->real_escape_string(trim($row[1]));
        $Numero_Documento = $mysqli->real_escape_string(trim($row[2]));
        $Apellido_Paterno_Registrador = $mysqli->real_escape_string(trim($row[3]));
        $Apellido_Materno_Registrador = $mysqli->real_escape_string(trim($row[4]));
        $Nombres_Registrador = $mysqli->real_escape_string(trim($row[5]));
        $Fecha_Nacimiento = $mysqli->real_escape_string(trim($row[6]));

        // Agregar fila al lote
        $batchData[] = "(
            '$Id_Registrador',
            '$Id_Tipo_Documento',
            '$Numero_Documento',
            '$Apellido_Paterno_Registrador',
            '$Apellido_Materno_Registrador',
            '$Nombres_Registrador',
            '$Fecha_Nacimiento')";

        $rowCount++;

        // Ejecutar consulta en lotes al alcanzar el tamaño definido
        if ($rowCount % $batchSize === 0) {
            ejecutarInsert($mysqli, $batchData);
            $batchData = []; // Reiniciar el lote
        }
    }

    // Ejecutar consulta para el lote final
    if (!empty($batchData)) {
        ejecutarInsert($mysqli, $batchData);
    }

    $mysqli->commit(); // Confirmar transacción
    echo "Datos importados exitosamente.";
} catch (Exception $e) {
    $mysqli->rollback(); // Revertir cambios en caso de error
    echo "Error al importar los datos: " . $e->getMessage();
    error_log("Error al importar los datos: " . $e->getMessage());
}

$mysqli->close(); // Cerrar conexión

/**
 * Función para ejecutar la consulta INSERT en lotes
 */
function ejecutarInsert($mysqli, $batchData)
{
    $query = "INSERT INTO registrador (
        Id_Registrador,
        Id_Tipo_Documento,
        Numero_Documento,
        Apellido_Paterno_Registrador,
        Apellido_Materno_Registrador,
        Nombres_Registrador,
        Fecha_Nacimiento) VALUES " . implode(',', $batchData);

    if (!$mysqli->query($query)) {
        throw new Exception("Error al ejecutar el lote: " . $mysqli->error);
    }
}
