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
        // Rellenar valores faltantes con valores predeterminados
        for ($i = 0; $i < 41; $i++) {
            if (!isset($row[$i]) || empty($row[$i])) {
                $row[$i] = "NULL"; // Valor por defecto para campos vacíos
            }
        }

        // Escapar y preparar datos
        $Id_Cita = $mysqli->real_escape_string(trim($row[0]));
        $Anio = $mysqli->real_escape_string(trim($row[1]));
        $Mes = $mysqli->real_escape_string(trim($row[2]));
        $Dia = $mysqli->real_escape_string(trim($row[3]));
        $Fecha_Atencion = $mysqli->real_escape_string(trim($row[4]));
        $Lote = $mysqli->real_escape_string(trim($row[5]));
        $Num_Pag = $mysqli->real_escape_string(trim($row[6]));
        $Num_Reg = $mysqli->real_escape_string(trim($row[7]));
        $Id_Ups = $mysqli->real_escape_string(trim($row[8]));
        $Id_Establecimiento = $mysqli->real_escape_string(trim($row[9]));
        $Id_Paciente = $mysqli->real_escape_string(trim($row[10]));
        $Id_Personal = $mysqli->real_escape_string(trim($row[11]));
        $Id_Registrador = $mysqli->real_escape_string(trim($row[12]));
        $Id_Financiador = $mysqli->real_escape_string(trim($row[13]));
        $Id_Condicion_Establecimiento = $mysqli->real_escape_string(trim($row[14]));
        $Id_Condicion_Servicio = $mysqli->real_escape_string(trim($row[15]));
        $Edad_Reg = $mysqli->real_escape_string(trim($row[16]));
        $Tipo_Edad = $mysqli->real_escape_string(trim($row[17]));
        $Anio_Actual_Paciente = $mysqli->real_escape_string(trim($row[18]));
        $Mes_Actual_Paciente = $mysqli->real_escape_string(trim($row[19]));
        $Dia_Actual_Paciente = $mysqli->real_escape_string(trim($row[20]));
        $Id_Turno = $mysqli->real_escape_string(trim($row[21]));
        $Codigo_Item = $mysqli->real_escape_string(trim($row[22]));
        $Tipo_Diagnostico = $mysqli->real_escape_string(trim($row[23]));
        $Valor_Lab = $mysqli->real_escape_string(trim($row[24]));
        $Id_Correlativo = $mysqli->real_escape_string(trim($row[25]));
        $Peso = $mysqli->real_escape_string(trim($row[26]));
        $Talla = $mysqli->real_escape_string(trim($row[27]));
        $Hemoglobina = $mysqli->real_escape_string(trim($row[28]));
        $Perimetro_Abdominal = $mysqli->real_escape_string(trim($row[29]));
        $Perimetro_Cefalico = $mysqli->real_escape_string(trim($row[30]));
        $Id_Otra_Condicion = $mysqli->real_escape_string(trim($row[31]));
        $Fecha_Ultima_Regla = $mysqli->real_escape_string(trim($row[32]));
        $Fecha_Solicitud_Hb = $mysqli->real_escape_string(trim($row[33]));
        $Fecha_Resultado_Hb = $mysqli->real_escape_string(trim($row[34]));
        $Fecha_Registro = $mysqli->real_escape_string(trim($row[35]));
        $Fecha_Modificacion = $mysqli->real_escape_string(trim($row[36]));
        $Id_Pais = $mysqli->real_escape_string(trim($row[37]));
        $gruporiesgo_desc = $mysqli->real_escape_string(trim($row[38]));
        $condicion_gestante = $mysqli->real_escape_string(trim($row[39]));
        $peso_pregestacional = $mysqli->real_escape_string(trim($row[40]));
        $Id_dosis = $mysqli->real_escape_string(trim($row[41]));
        $renipress = $mysqli->real_escape_string(trim($row[42]));
        $Id_Institucion_Edu = $mysqli->real_escape_string(trim($row[43]));
        $Id_AplicacionOrigen = $mysqli->real_escape_string(trim($row[44]));
        $Alerta = $mysqli->real_escape_string(trim($row[45]));

        // Agregar fila al lote
        $batchData[] = "(
            '$Id_Cita',
            '$Anio',
            '$Mes',
            '$Dia',
            '$Fecha_Atencion',
            '$Lote',
            '$Num_Pag',
            '$Num_Reg',
            '$Id_Ups',
            '$Id_Establecimiento',
            '$Id_Paciente',
            '$Id_Personal',
            '$Id_Registrador',
            '$Id_Financiador',
            '$Id_Condicion_Establecimiento',
            '$Id_Condicion_Servicio',
            '$Edad_Reg',
            '$Tipo_Edad',
            '$Anio_Actual_Paciente',
            '$Mes_Actual_Paciente',
            '$Dia_Actual_Paciente',
            '$Id_Turno',
            '$Codigo_Item',
            '$Tipo_Diagnostico',
            '$Valor_Lab',
            '$Id_Correlativo',
            '$Peso',
            '$Talla',
            '$Hemoglobina',
            '$Perimetro_Abdominal',
            '$Perimetro_Cefalico',
            '$Id_Otra_Condicion',
            '$Fecha_Ultima_Regla',
            '$Fecha_Solicitud_Hb',
            '$Fecha_Resultado_Hb',
            '$Fecha_Registro',
            '$Fecha_Modificacion',
            '$Id_Pais',
            '$gruporiesgo_desc',
            '$condicion_gestante',
            '$peso_pregestacional',
            '$Id_dosis',
            '$renipress',
            '$Id_Institucion_Edu',
            '$Id_AplicacionOrigen',
            '$Alerta')";

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
    $query = "INSERT INTO nominal (
        Id_Cita, Anio, Mes, Dia, Fecha_Atencion, Lote, Num_Pag, Num_Reg, Id_Ups, Id_Establecimiento, Id_Paciente, 
        Id_Personal, Id_Registrador, Id_Financiador, Id_Condicion_Establecimiento, Id_Condicion_Servicio, Edad_Reg, 
        Tipo_Edad, Anio_Actual_Paciente, Mes_Actual_Paciente, Dia_Actual_Paciente, Id_Turno, Codigo_Item, 
        Tipo_Diagnostico, Valor_Lab, Id_Correlativo, Peso, Talla, Hemoglobina, Perimetro_Abdominal, 
        Perimetro_Cefalico, Id_Otra_Condicion, Fecha_Ultima_Regla, Fecha_Solicitud_Hb, Fecha_Resultado_Hb, 
        Fecha_Registro, Fecha_Modificacion, Id_Pais, gruporiesgo_desc, condicion_gestante, peso_pregestacional, 
        Id_dosis, renipress, Id_Institucion_Edu, Id_AplicacionOrigen, Alerta) 
        VALUES " . implode(',', $batchData);

    if (!$mysqli->query($query)) {
        throw new Exception("Error al ejecutar el lote: " . $mysqli->error);
    }
}
