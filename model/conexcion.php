<?php

/**
 * 
 */
class conexionBD
{

    public function conexionPDO()
    {
        # code...
        $host     =  'localhost';
        $usuario  =  'root';
        $clave    =  '';
        $dbname   =  'bdmental';
        try {
            $pdo = new PDO("mysql:host=$host; dbname=$dbname", $usuario, $clave);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->exec("set names utf8mb4");
            return $pdo;
        } catch (exception $e) {
            echo "La conexion ha fallado";
        }
    }

    function cerrar_conexion()
    {
        $this->$pdo = null;
    }
}
