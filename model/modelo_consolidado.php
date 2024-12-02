<?php
//comunica con el servidor para consultar
require_once 'conexion.php';

/**
 * 
 */
class Modelo_Consolidado extends conexionBD
{

    /**************************************************
 		       LISTAR LOS CONSOLIDADO
     **************************************************/
    public function Listar_Consolidado()
    {
        $c = conexionBD::conexionPDO();
        $sql = "CALL SP_LISTAR_CONSOLIDADO()";
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
