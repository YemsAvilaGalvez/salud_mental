<?php
//comunica con el servidor para consultar
require_once 'modelo_conexion.php';

/**
 * 
 */
class Modelo_Personal extends conexionBD
{

    /**************************************************
 		       LISTAR PACIENTE
     **************************************************/
    public function Listar_Personal()
    {
        $c = conexionBD::conexionPDO();
        $sql = "CALL SP_LISTAR_PERSONAL()";
        $arreglo = array();
        $query = $c->prepare($sql); //mandamos el precedure
        //$query ->bindParam(1,$usuario);//enviamos los parametros seguun la posicion
        $query->execute();
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $resp) {
            $arreglo["data"][] = $resp; //almacenando los datos del arreglo
        }
        return $arreglo;
        conexionBD::cerrar_conexion();
    }
}
