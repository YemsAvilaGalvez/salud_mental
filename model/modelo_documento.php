<?php
//comunica con el servidor para consultar
require_once 'conexion.php';

/**
 * 
 */
class Modelo_Documento extends conexionBD
{

    /**************************************************
 		       LISTAR LOS DOCUMENTO
     **************************************************/
    public function Listar_Documento()
    {
        $c = conexionBD::conexionPDO();
        $sql = "CALL SP_LISTAR_DOCUMENTO()";
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

    /**************************************************
 		    		   REGISTRAR PRODUCTO
     **************************************************/
    public function Registrar_Documento($id, $abreviatura, $descripcion)
    {
        $c = conexionBD::conexionPDO();

        $sql = "CALL SP_REGISTRAR_DOCUMENTO(?,?,?)";
        $query = $c->prepare($sql); //mandamos el precedure
        $query->bindParam(1, $id); //enviamos los parametros seguun la posicion
        $query->bindParam(2, $abreviatura);
        $query->bindParam(3, $descripcion);

        $resultado = $query->execute();
        if ($row = $query->fetchColumn()) {
            return $row;
        }

        conexionBD::cerrar_conexion();
    }

    /**************************************************
 		       MODIFICAR DOCUMENTO
     **************************************************/
    public function Modificar_Documento($id, $idDocumento, $abreviatura, $descripcion) //viene del controlador
    {
        $c = conexionBD::conexionPDO();

        $sql = "CALL SP_MODIFICAR_DOCUMENTO(?,?,?,?)";
        $query = $c->prepare($sql); //mandamos el precedure

        $query->bindParam(1, $id); //enviamos los parametros seguun la posicion del procedure
        $query->bindParam(2, $idDocumento);
        $query->bindParam(3, $abreviatura);
        $query->bindParam(4, $descripcion);
        $resultado = $query->execute();
        //cuando en el procedure retorna 1 o 2 (GUARDAR)
        if ($row = $query->fetchColumn()) {
            return $row;
        }

        conexionBD::cerrar_conexion();
    }

    /**************************************************
 		       ELIMINAR LA DOCUMENTO
     **************************************************/
    public function Eliminar_Documento($id) //viene del controlador
    {
        $c = conexionBD::conexionPDO();

        $sql = "CALL SP_ELIMINAR_DOCUMENTO(?)";
        $query = $c->prepare($sql); //mandamos el precedure
        $query->bindParam(1, $id); //enviamos los parametros seguun la posicion del procedure
        $resultado = $query->execute();
        //solo de usa cuando no se retorna un valor en el procedure(actualizar)
        if ($resultado) {
            return 1;
        } else {
            return 0;
        }
        conexionBD::cerrar_conexion();
    }
}
