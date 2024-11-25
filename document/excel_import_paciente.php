<?php
require('conn.php');
$tipo       = $_FILES['excel']['type'];
$tamanio    = $_FILES['excel']['size'];
$archivotmp = $_FILES['excel']['tmp_name'];
$lineas     = file($archivotmp);

$i = 0;

foreach ($lineas as $linea) {
    $cantidad_registros = count($lineas);
    $cantidad_regist_agregados =  ($cantidad_registros - 1);

    if ($i != 0) {

        $datos = explode(",", $linea);

        $Id_Paciente  =                 !empty($datos[0])  ? ($datos[0]) : '';
        $Id_Tipo_Documento  =           !empty($datos[1])  ? ($datos[1]) : '';
        $Numero_Documento =             !empty($datos[2])  ? ($datos[2]) : '';
        $Apellido_Paterno_Paciente  =   !empty($datos[3])  ? ($datos[3]) : '';
        $Apellido_Materno_Paciente  =   !empty($datos[4])  ? ($datos[4]) : '';
        $Nombres_Paciente =             !empty($datos[5])  ? ($datos[5]) : '';
        $Fecha_Nacimiento =             !empty($datos[6])  ? ($datos[6]) : '';
        $Genero  =                      !empty($datos[7])  ? ($datos[7]) : '';
        $Id_Etnia  =                    !empty($datos[8])  ? ($datos[8]) : '';
        $Historia_Clinica =             !empty($datos[9])  ? ($datos[9]) : '';
        $Ficha_Familiar  =              !empty($datos[10])  ? ($datos[10]) : '';
        $Ubigeo_Nacimiento  =           !empty($datos[11])  ? ($datos[11]) : '';
        $Ubigeo_Reniec =                !empty($datos[12])  ? ($datos[12]) : '';
        $Domicilio_Reniec =             !empty($datos[13])  ? ($datos[13]) : '';
        $Ubigeo_Declarado  =            !empty($datos[14])  ? ($datos[14]) : '';
        $Domicilio_Declarado =          !empty($datos[15])  ? ($datos[15]) : '';
        $Referencia_Domicilio  =        !empty($datos[16])  ? ($datos[16]) : '';
        $Id_Pais  =                     !empty($datos[17])  ? ($datos[17]) : '';
        $Id_Establecimiento =           !empty($datos[18])  ? ($datos[18]) : '';
        $Fecha_Alta =                   !empty($datos[19])  ? ($datos[19]) : '';
        $Fecha_Modificacion =           !empty($datos[20])  ? ($datos[20]) : '';

        $insertar = "INSERT INTO paciente( 
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
            Fecha_Modificacion
        ) VALUES(
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
            '$Fecha_Modificacion'

        )";
        mysqli_query($mysqli, $insertar);
    }

    echo '<div>' . $i . "). " . $linea . '</div>';
    $i++;
}


echo '<p style="text-aling:center; color:#333;">Total de Registros: ' . $cantidad_regist_agregados . '</p>';

?>

<a href="index.php">Atras</a>