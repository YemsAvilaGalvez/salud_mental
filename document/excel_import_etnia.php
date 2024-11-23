<?php
require 'vendor/autoload.php';
require 'conn.php';
//$mysqli = new mysqli('localhost','root','','dbsertec');
class MyReadFilter implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter
{

    public function readCell($columnAddress, $row, $worksheetName = '')
    {
        // Read title row and rows 20 - 30
        if ($row > 1) {
            return true;
        }
        return false;
    }
}
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
$inputFileName = $_FILES['excel']['tmp_name'];     //'producto.xlsx';

/**  Identify the type of $inputFileName  **/
$inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
/**  Create a new Reader of the type that has been identified  **/

$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);

//leo la funcion para obtener los datos de una celda en especifica
$reader->setReadFilter(new MyReadFilter());

/**  Load $inputFileName to a Spreadsheet Object  **/
$spreadsheet = $reader->load($inputFileName);
$cantidad = $spreadsheet->getActiveSheet()->toArray();
foreach ($cantidad as $row) {

    if ($row[0] != '') {
        $consulta = "INSERT INTO INSERT INTO cpms (Codigo_Item,Descripcion_Item) VALUES 
		('$row[0]','$row[1]','$row[2]')";

        $resul = $mysqli->query($consulta);
    }
}
