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

        $Id_Personal                 = !empty($datos[0])  ? ($datos[0]) : '';
        $Id_Tipo_Documento           = !empty($datos[1])  ? ($datos[1]) : '';
        $Numero_Documento            = !empty($datos[2])  ? ($datos[2]) : '';
        $Apellido_Paterno_Personal   = !empty($datos[3])  ? ($datos[3]) : '';
        $Apellido_Materno_Personal   = !empty($datos[4])  ? ($datos[4]) : '';
        $Nombres_Personal            = !empty($datos[5])  ? ($datos[5]) : '';
        $Fecha_Nacimiento            = !empty($datos[6])  ? ($datos[6]) : '';
        $Id_Condicion                = !empty($datos[7])  ? ($datos[7]) : '';
        $Id_Profesion                = !empty($datos[8])  ? ($datos[8]) : '';
        $Id_Colegio                  = !empty($datos[9])  ? ($datos[9]) : '';
        $Numero_Colegiatura          = !empty($datos[10])  ? ($datos[10]) : '';
        $Id_Establecimiento          = !empty($datos[11])  ? ($datos[11]) : '';
        $Fecha_Alta                  = !empty($datos[12])  ? ($datos[12]) : '';
        $Fecha_Baja                  = !empty($datos[13])  ? ($datos[13]) : '';


            $insertarData = "INSERT INTO personal( 
                Id_Personal,
                Id_Tipo_Documento,
                Numero_Documento,
                Apellido_Paterno_Personal,
                Apellido_Materno_Personal,
                Nombres_Personal,
                Fecha_Nacimiento,
                Id_Condicion,
                Id_Profesion,
                Id_Colegio,
                Numero_Colegiatura,
                Id_Establecimiento,
                Fecha_Alta,
                Fecha_Baja
                
            ) VALUES(
                '$Id_Personal',
                '$Id_Tipo_Documento',
                '$Numero_Documento',
                '$Apellido_Paterno_Personal',
                '$Apellido_Materno_Personal',
                '$Nombres_Personal',
                '$Fecha_Nacimiento',
                '$Id_Condicion',
                '$Id_Profesion',
                '$Id_Colegio',
                '$Numero_Colegiatura',
                '$Id_Establecimiento',
                '$Fecha_Alta',
                '$Fecha_Baja'
                
            )";
            mysqli_query($mysqli, $insertarData);
    }

    $i++;
}
echo '<p style="text-aling:center; color:#333;">Total de Registros: ' . $cantidad_regist_agregados . '</p>';
?>

<a href="index.php">Atras</a>