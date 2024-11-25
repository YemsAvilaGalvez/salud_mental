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

        $Id_Registrador                 = !empty($datos[0])  ? ($datos[0]) : '';
        $Id_Tipo_Documento           = !empty($datos[1])  ? ($datos[1]) : '';
        $Numero_Documento            = !empty($datos[2])  ? ($datos[2]) : '';
        $Apellido_Paterno_Registrador   = !empty($datos[3])  ? ($datos[3]) : '';
        $Apellido_Materno_Registrador   = !empty($datos[4])  ? ($datos[4]) : '';
        $Nombres_Registrador            = !empty($datos[5])  ? ($datos[5]) : '';
        $Fecha_Nacimiento            = !empty($datos[6])  ? ($datos[6]) : '';

        $insertarData = "INSERT INTO registrador( 
                Id_Registrador,
                Id_Tipo_Documento,
                Numero_Documento,
                Apellido_Paterno_Registrador,
                Apellido_Materno_Registrador,
                Nombres_Registrador,
                Fecha_Nacimiento
                
            ) VALUES(
                '$Id_Registrador',
                '$Id_Tipo_Documento',
                '$Numero_Documento',
                '$Apellido_Paterno_Registrador',
                '$Apellido_Materno_Registrador',
                '$Nombres_Registrador',
                '$Fecha_Nacimiento'
                
            )";
        mysqli_query($mysqli, $insertarData);
    }

    $i++;
}
echo '<p style="text-aling:center; color:#333;">Total de Registros: ' . $cantidad_regist_agregados . '</p>';
?>

<a href="index.php">Atras</a>