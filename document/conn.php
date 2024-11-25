<?php
$usuario  = "root";
$password = "";
$servidor = "localhost";
$basededatos = "bdmental";

// Crear la conexión con estilo orientado a objetos
$mysqli = new mysqli($servidor, $usuario, $password, $basededatos);

// Verificar si hay errores en la conexión
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

// Configurar collation
$mysqli->query("SET SESSION collation_connection ='utf8mb4_general_ci'");
