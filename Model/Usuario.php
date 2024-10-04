<?php
include_once 'Conexion.php';
class Usuario
{
    var $objetos;
    var $acceso;
    public function __construct()
    {
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }
    function Loguearse($nombre_usu, $password_usu)
    {
        $sql = "SELECT * FROM usuario  where nombre_usu=:nombre_usu and password_usu=:password_usu	";
        $query  = $this->acceso->prepare($sql);
        $query->execute(array(':nombre_usu' => $nombre_usu, ':password_usu' => $password_usu));
        $this->objetos = $query->fetchall();
        return $this->objetos;
    }
}