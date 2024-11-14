<?php

class PacientesControlador{

    static public function ctrCargarPaciente($filePacientes){
        $respuesta = PacienteModelo::mdlCargarPaciente($filePacientes);
        return $respuesta;
    }
}