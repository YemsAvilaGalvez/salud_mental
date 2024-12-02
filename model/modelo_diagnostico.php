<?php
//comunica con el servidor para consultar
require_once 'conexion.php';

/**
 * 
 */
class Modelo_Diagnostico extends conexionBD
{

    /**************************************************
 		       LISTAR LOS CONSOLIDADO
     **************************************************/
    public function Listar_Id01()
    {
        $c = conexionBD::conexionPDO();
        $sql = "CALL SP_LISTAR_ID01()";
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

    public function Listar_Id02()
    {
        $c = conexionBD::conexionPDO();
        $sql = "CALL SP_LISTAR_ID02()";
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

    public function Listar_Id03()
    {
        $c = conexionBD::conexionPDO();
        $sql = "CALL SP_LISTAR_ID03()";
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

    public function Listar_Id04()
    {
        $c = conexionBD::conexionPDO();
        $sql = "CALL SP_LISTAR_ID04()";
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
