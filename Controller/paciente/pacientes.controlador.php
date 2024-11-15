<?php

class PacientesControlador{

    static public function ctrCargaMasivaProductos($filePacientes){
        
        $respuesta = PacienteModelo::mdlCargarPaciente($filePacientes);
        
        return $respuesta;
    }
}