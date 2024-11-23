<?php
//comunica con el servidor para consultar
require_once 'modelo_conexcion.php';

/**
 * 
 */
class Modelo_Extras extends conexionBD
{

    /**************************************************
 		       LISTAR LOS ETNIA
     **************************************************/
    public function Listar_Etnia()
    {
        $c = conexionBD::conexionPDO();
        $sql = "CALL SP_LISTAR_ETNIA()";
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
