<?php
include_once 'conexion.php';

class Modelo_ds
{
    var $acceso;

    public function __construct()
    {
        $db = new conexionBD();
        $this->acceso = $db->conexionPDO();  // Llamamos al método conexionPDO() para obtener la conexión
    }

    function Total_registros()
    {
        $sql = "SELECT COUNT(*) AS Total_Registros FROM consolidado";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $resultado = $query->fetch(PDO::FETCH_ASSOC);
        if ($resultado && isset($resultado['Total_Registros'])) {
            return $resultado['Total_Registros'];  // Retornamos solo el valor total
        } else {
            return 0;  // En caso de no haber registros, devolvemos 0
        }
    }
}
?>
