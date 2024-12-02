<?php
require 'vendor/autoload.php';
require 'r_conexion.php';

use PhpOffice\PhpSpreadsheet\Reader\IReadFilter;

class MyReadFilter implements IReadFilter
{
    public function readCell(string $columnAddress, int $row, string $worksheetName = ''): bool
    {
        // Leer todas las filas excepto la primera
        return $row > 1;
    }
}

$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
$inputFileName = $_FILES['excel']['tmp_name'];

$inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);

$reader->setReadFilter(new MyReadFilter());
$spreadsheet = $reader->load($inputFileName);
$cantidad = $spreadsheet->getActiveSheet()->toArray();

$batchSize = 1000; // Tamaño del lote
$batchData = []; // Array temporal para lotes

foreach ($cantidad as $row) {
    if ($row[0] != '') {
        // Asegúrate de que todos los valores se escapen correctamente
        $batchData[] = "(
            '" . $mysqli->real_escape_string($row[0]) . "',
            '" . $mysqli->real_escape_string($row[1]) . "',
            '" . $mysqli->real_escape_string($row[2]) . "',
            '" . $mysqli->real_escape_string($row[3]) . "',
            '" . $mysqli->real_escape_string($row[4]) . "',
            '" . $mysqli->real_escape_string($row[5]) . "',
            '" . $mysqli->real_escape_string($row[6]) . "',
            '" . $mysqli->real_escape_string($row[7]) . "',
            '" . $mysqli->real_escape_string($row[8]) . "',
            '" . $mysqli->real_escape_string($row[9]) . "',
            '" . $mysqli->real_escape_string($row[10]) . "',
            '" . $mysqli->real_escape_string($row[11]) . "',
            '" . $mysqli->real_escape_string($row[12]) . "',
            '" . $mysqli->real_escape_string($row[13]) . "',
            '" . $mysqli->real_escape_string($row[14]) . "',
            '" . $mysqli->real_escape_string($row[15]) . "',
            '" . $mysqli->real_escape_string($row[16]) . "',
            '" . $mysqli->real_escape_string($row[17]) . "',
            '" . $mysqli->real_escape_string($row[18]) . "',
            '" . $mysqli->real_escape_string($row[19]) . "',
            '" . $mysqli->real_escape_string($row[20]) . "',
            '" . $mysqli->real_escape_string($row[21]) . "',
            '" . $mysqli->real_escape_string($row[22]) . "',
            '" . $mysqli->real_escape_string($row[23]) . "',
            '" . $mysqli->real_escape_string($row[24]) . "',
            '" . $mysqli->real_escape_string($row[25]) . "',
            '" . $mysqli->real_escape_string($row[26]) . "',
            '" . $mysqli->real_escape_string($row[27]) . "',
            '" . $mysqli->real_escape_string($row[28]) . "',
            '" . $mysqli->real_escape_string($row[29]) . "',
            '" . $mysqli->real_escape_string($row[30]) . "',
            '" . $mysqli->real_escape_string($row[31]) . "',
            '" . $mysqli->real_escape_string($row[32]) . "',
            '" . $mysqli->real_escape_string($row[33]) . "',
            '" . $mysqli->real_escape_string($row[34]) . "',
            '" . $mysqli->real_escape_string($row[35]) . "',
            '" . $mysqli->real_escape_string($row[36]) . "',
            '" . $mysqli->real_escape_string($row[37]) . "',
            '" . $mysqli->real_escape_string($row[38]) . "',
            '" . $mysqli->real_escape_string($row[39]) . "',
            '" . $mysqli->real_escape_string($row[40]) . "',
            '" . $mysqli->real_escape_string($row[41]) . "',
            '" . $mysqli->real_escape_string($row[42]) . "',
            '" . $mysqli->real_escape_string($row[43]) . "',
            '" . $mysqli->real_escape_string($row[44]) . "',
            '" . $mysqli->real_escape_string($row[45]) . "',
            '" . $mysqli->real_escape_string($row[46]) . "',
            '" . $mysqli->real_escape_string($row[47]) . "',
            '" . $mysqli->real_escape_string($row[48]) . "',
            '" . $mysqli->real_escape_string($row[49]) . "',
            '" . $mysqli->real_escape_string($row[50]) . "',
            '" . $mysqli->real_escape_string($row[51]) . "',
            '" . $mysqli->real_escape_string($row[52]) . "',
            '" . $mysqli->real_escape_string($row[53]) . "',
            '" . $mysqli->real_escape_string($row[54]) . "',
            '" . $mysqli->real_escape_string($row[55]) . "',
            '" . $mysqli->real_escape_string($row[56]) . "',
            '" . $mysqli->real_escape_string($row[57]) . "',
            '" . $mysqli->real_escape_string($row[58]) . "',
            '" . $mysqli->real_escape_string($row[59]) . "',
            '" . $mysqli->real_escape_string($row[60]) . "',
            '" . $mysqli->real_escape_string($row[61]) . "',
            '" . $mysqli->real_escape_string($row[62]) . "',
            '" . $mysqli->real_escape_string($row[63]) . "',
            '" . $mysqli->real_escape_string($row[64]) . "',
            '" . $mysqli->real_escape_string($row[65]) . "',
            '" . $mysqli->real_escape_string($row[66]) . "',
            '" . $mysqli->real_escape_string($row[67]) . "',
            '" . $mysqli->real_escape_string($row[68]) . "',
            '" . $mysqli->real_escape_string($row[69]) . "',
            '" . $mysqli->real_escape_string($row[70]) . "',
            '" . $mysqli->real_escape_string($row[71]) . "',
            '" . $mysqli->real_escape_string($row[72]) . "'
        )";

        // Imprimir la consulta SQL para depuración
        echo "Consulta SQL: " . $batchData[count($batchData) - 1] . "<br>";

        if (count($batchData) >= $batchSize) {
            // Realizar la inserción por lotes
            $consulta = "INSERT INTO consolidado (
                Id_Cita, Anio, Mes, Dia, Fecha_Atencion, Lote, Num_Pag, Num_Reg, Id_Ups, Descripcion_Ups, Descripcion_Sector, Descripcion_Disa, Descripcion_Red,
                Descripcion_MicroRed, Codigo_Unico, Nombre_Establecimiento, Abrev_Tipo_Doc_Paciente, Numero_Documento_Paciente, Apellido_Paterno_Paciente,
                Apellido_Materno_Paciente, Nombres_Paciente, Fecha_Nacimiento_Paciente, Genero, Id_Etnia, Descripcion_Etnia, Historia_Clinica, Ficha_Familiar,
                Id_Financiador, Descripcion_Financiador, Descripcion_Pais, Abrev_Tipo_Doc_Personal, Numero_Documento_Personal, Apellido_Paterno_Personal,
                Apellido_Materno_Personal, Nombres_Personal, Fecha_Nacimiento_Personal, Id_Condicion, Descripcion_Condicion, Id_Profesion, Descripcion_Profesion,
                Id_Colegio, Descripcion_Colegio, Numero_Colegiatura, Abrev_Tipo_Doc_Registrador, Numero_Documento_Registrador, Apellido_Paterno_Registrador,
                Apellido_Materno_Registrador, Nombres_Registrador, Fecha_Nacimiento_Registrador, Id_Condicion_Establecimiento, Id_Condicion_Servicio, Edad_Reg,
                Tipo_Edad, Anio_Actual_Paciente, Mes_Actual_Paciente, Dia_Actual_Paciente, Id_Turno, Codigo_Item, Descripcion_Item, Tipo_Diagnostico, Valor_Lab,
                Id_Correlativo, Peso, Talla, Hemoglobina, Perimetro_Abdominal, Perimetro_Cefalico, Descripcion_Otra_Condicion, Fecha_Ultima_Regla,
                Fecha_Solicitud_Hb, Fecha_Resultado_Hb, Fecha_Registro, Fecha_Modificacion
            ) VALUES " . implode(',', $batchData);

            // Depuración de la consulta final antes de ejecutarla
            echo "Consulta Final: " . $consulta . "<br>";

            if (!$mysqli->query($consulta)) {
                echo "Error al insertar datos: " . $mysqli->error;
            }

            // Limpiar el array temporal
            $batchData = [];
        }
    }
}

// Insertar cualquier dato restante
if (!empty($batchData)) {
    $consulta = "INSERT INTO consolidado (
       Id_Cita, Anio, Mes, Dia, Fecha_Atencion, Lote, Num_Pag, Num_Reg, Id_Ups, Descripcion_Ups, Descripcion_Sector, Descripcion_Disa, Descripcion_Red,
                Descripcion_MicroRed, Codigo_Unico, Nombre_Establecimiento, Abrev_Tipo_Doc_Paciente, Numero_Documento_Paciente, Apellido_Paterno_Paciente,
                Apellido_Materno_Paciente, Nombres_Paciente, Fecha_Nacimiento_Paciente, Genero, Id_Etnia, Descripcion_Etnia, Historia_Clinica, Ficha_Familiar,
                Id_Financiador, Descripcion_Financiador, Descripcion_Pais, Abrev_Tipo_Doc_Personal, Numero_Documento_Personal, Apellido_Paterno_Personal,
                Apellido_Materno_Personal, Nombres_Personal, Fecha_Nacimiento_Personal, Id_Condicion, Descripcion_Condicion, Id_Profesion, Descripcion_Profesion,
                Id_Colegio, Descripcion_Colegio, Numero_Colegiatura, Abrev_Tipo_Doc_Registrador, Numero_Documento_Registrador, Apellido_Paterno_Registrador,
                Apellido_Materno_Registrador, Nombres_Registrador, Fecha_Nacimiento_Registrador, Id_Condicion_Establecimiento, Id_Condicion_Servicio, Edad_Reg,
                Tipo_Edad, Anio_Actual_Paciente, Mes_Actual_Paciente, Dia_Actual_Paciente, Id_Turno, Codigo_Item, Descripcion_Item, Tipo_Diagnostico, Valor_Lab,
                Id_Correlativo, Peso, Talla, Hemoglobina, Perimetro_Abdominal, Perimetro_Cefalico, Descripcion_Otra_Condicion, Fecha_Ultima_Regla,
                Fecha_Solicitud_Hb, Fecha_Resultado_Hb, Fecha_Registro, Fecha_Modificacion
    ) VALUES " . implode(',', $batchData);

    // Depuración de la consulta final antes de ejecutarla
    echo "Consulta Final: " . $consulta . "<br>";

    if (!$mysqli->query($consulta)) {
        echo "Error al insertar datos: " . $mysqli->error;
    }
}

echo "Datos insertados correctamente.";
