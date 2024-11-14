<?php
require_once 'modelo_conexion.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

class PacienteModelo{
    static public function mdlCargarPaciente($filePacientes){
        $nombreArchivo = $filePacientes['tmp_name'];
        $documento = IOFactory::load($nombreArchivo);

        $hojaDocumento = $documento -> getSheet(1);
        $numeroFilasDocumento = $hojaDocumento->getHighestDataRow();

        var_dump($numeroFilasDocumento);
    }
}   