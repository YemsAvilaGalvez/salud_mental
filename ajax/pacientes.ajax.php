<?php

require_once '../Controller/paciente/pacientes.controlador.php';
require_once '../Model/pacientes.modelo.php';
require_once '../vendor/autoload.php';

class ajaxPacientes
{

    public $filePacientes;

    public function ajaxCargarPacientes()
    {
        $respuesta = PacientesControlador::ctrCargarPaciente($this->filePacientes);

        echo json_encode($respuesta);
    }
}

if(isset($_FILES)){
    $archivo_paciente = new ajaxPacientes();
    $archivo_paciente -> filePacientes = $_FILES['filePaciente'];
    $archivo_paciente -> ajaxCargarPacientes();
}