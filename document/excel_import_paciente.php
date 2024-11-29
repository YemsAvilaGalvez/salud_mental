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

$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
$inputFileName = $_FILES['excel']['tmp_name'];

/** Identificar el tipo de archivo **/
$inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);

// Aplicar el filtro de lectura personalizado
$reader->setReadFilter(new MyReadFilter());

/** Cargar el archivo en un objeto Spreadsheet **/
$spreadsheet = $reader->load($inputFileName);
$data = $spreadsheet->getActiveSheet()->toArray();

// Variables para procesamiento por lotes
$batchSize = 1000;
$batchData = [];
$rowCount = 0;

$mysqli->begin_transaction(); // Iniciar transacción

try {
    foreach ($data as $row) {
        // Rellenar valores faltantes con valores predeterminados
        for ($i = 0; $i < 21; $i++) {
            if (!isset($row[$i]) || empty($row[$i])) {
                $row[$i] = ($i >= 3 && $i <= 5) ? "Sin valor" : "NULL"; // Rellenar campos string con "Sin valor" o numéricos con "NULL"
            }
        }

        // Escapar los datos
        $Id_Paciente = $mysqli->real_escape_string(trim($row[0]));
        $Id_Tipo_Documento = $mysqli->real_escape_string(trim($row[1]));
        $Numero_Documento = $mysqli->real_escape_string(trim($row[2]));
        $Apellido_Paterno_Paciente = $mysqli->real_escape_string(trim($row[3]));
        $Apellido_Materno_Paciente = $mysqli->real_escape_string(trim($row[4]));
        $Nombres_Paciente = $mysqli->real_escape_string(trim($row[5]));
        $Fecha_Nacimiento = $mysqli->real_escape_string(trim($row[6]));
        $Genero = $mysqli->real_escape_string(trim($row[7]));
        $Id_Etnia = $mysqli->real_escape_string(trim($row[8]));
        $Historia_Clinica = $mysqli->real_escape_string(trim($row[9]));
        $Ficha_Familiar = $mysqli->real_escape_string(trim($row[10]));
        $Ubigeo_Nacimiento = $mysqli->real_escape_string(trim($row[11]));
        $Ubigeo_Reniec = $mysqli->real_escape_string(trim($row[12]));
        $Domicilio_Reniec = $mysqli->real_escape_string(trim($row[13]));
        $Ubigeo_Declarado = $mysqli->real_escape_string(trim($row[14]));
        $Domicilio_Declarado = $mysqli->real_escape_string(trim($row[15]));
        $Referencia_Domicilio = $mysqli->real_escape_string(trim($row[16]));
        $Id_Pais = $mysqli->real_escape_string(trim($row[17]));
        $Id_Establecimiento = $mysqli->real_escape_string(trim($row[18]));
        $Fecha_Alta = $mysqli->real_escape_string(trim($row[19]));
        $Fecha_Modificacion = $mysqli->real_escape_string(trim($row[20]));

        // Agregar al lote
        $batchData[] = "(
            '$Id_Paciente',
            '$Id_Tipo_Documento',
            '$Numero_Documento',
            '$Apellido_Paterno_Paciente',
            '$Apellido_Materno_Paciente',
            '$Nombres_Paciente',
            '$Fecha_Nacimiento',
            '$Genero',
            '$Id_Etnia',
            '$Historia_Clinica',
            '$Ficha_Familiar',
            '$Ubigeo_Nacimiento',
            '$Ubigeo_Reniec',
            '$Domicilio_Reniec',
            '$Ubigeo_Declarado',
            '$Domicilio_Declarado',
            '$Referencia_Domicilio',
            '$Id_Pais',
            '$Id_Establecimiento',
            '$Fecha_Alta',
            '$Fecha_Modificacion')";

        $rowCount++;

        // Procesar lote al alcanzar el tamaño definido
        if ($rowCount % $batchSize === 0) {
            if (!empty($batchData)) {
                $query = "INSERT INTO paciente (
                    Id_Paciente,
                    Id_Tipo_Documento,
                    Numero_Documento,
                    Apellido_Paterno_Paciente,
                    Apellido_Materno_Paciente,
                    Nombres_Paciente,
                    Fecha_Nacimiento,
                    Genero,
                    Id_Etnia,
                    Historia_Clinica,
                    Ficha_Familiar,
                    Ubigeo_Nacimiento,
                    Ubigeo_Reniec,
                    Domicilio_Reniec,
                    Ubigeo_Declarado,
                    Domicilio_Declarado,
                    Referencia_Domicilio,
                    Id_Pais,
                    Id_Establecimiento,
                    Fecha_Alta,
                    Fecha_Modificacion) VALUES "
                    . implode(',', $batchData);
                $mysqli->query($query);
                $batchData = [];
            }
        }
    }

    // Procesar datos restantes
    if (!empty($batchData)) {
        $query = "INSERT INTO paciente (
            Id_Paciente,
            Id_Tipo_Documento,
            Numero_Documento,
            Apellido_Paterno_Paciente,
            Apellido_Materno_Paciente,
            Nombres_Paciente,
            Fecha_Nacimiento,
            Genero,
            Id_Etnia,
            Historia_Clinica,
            Ficha_Familiar,
            Ubigeo_Nacimiento,
            Ubigeo_Reniec,
            Domicilio_Reniec,
            Ubigeo_Declarado,
            Domicilio_Declarado,
            Referencia_Domicilio,
            Id_Pais,
            Id_Establecimiento,
            Fecha_Alta,
            Fecha_Modificacion) VALUES "
            . implode(',', $batchData);
        $mysqli->query($query);
    }

    $mysqli->commit(); // Confirmar transacción
    echo "Datos importados exitosamente.";
} catch (Exception $e) {
    $mysqli->rollback(); // Revertir cambios en caso de error
    echo "Error al importar los datos: " . $e->getMessage();
    error_log("Error al importar los datos: " . $e->getMessage());
}

// Cierre de conexión
$mysqli->close();
