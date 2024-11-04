<?php
require 'vendor/autoload.php';
require '../conexion_reportes/r_conexion.php';
//$mysqli = new mysqli('localhost','root','','dbsertec');
class MyReadFilter implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter {

    public function readCell($columnAddress, $row, $worksheetName = '') {
        // Read title row and rows 20 - 30
        if ($row>1 ) {
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
$reader->setReadFilter( new MyReadFilter() );

/**  Load $inputFileName to a Spreadsheet Object  **/
$spreadsheet = $reader->load($inputFileName);
$cantidad = $spreadsheet->getActiveSheet()->toArray();
foreach($cantidad as $row){

	if ($row[0] !='') {
		$consulta = "INSERT INTO documento(abreviatura_doc,descripcion_doc) VALUES 
		('$row[0]','$row[1]')";

		$resul = $mysqli->query($consulta);

	}
	
}


?>