<?php
include_once '../Model/Usuario.php';

session_start();
$nombre_usu  = $_POST['nombre_usu'];
$password_usu  = $_POST['password_usu'];
$usuario = new Usuario();

if (!empty($_SESSION['usuario'])) {
    // Si el usuario ya está logueado, redirigir a la vista principal
    header("Location: ../Views/index.php");
} else {
    // Verificar credenciales del usuario
    $usuario->Loguearse($nombre_usu, $password_usu);

    if (!empty($usuario->objetos)) {
        foreach ($usuario->objetos as $objeto) {
            // Almacenar los datos del usuario en la sesión
            $_SESSION['usuario'] = $objeto->id_usuario;
            $_SESSION['nombre_us'] = $objeto->nombre_us;
        }
        // Redirigir a la vista principal tras un inicio de sesión exitoso
        header("Location: ../Views/index.php");
    } else {
        // Si las credenciales no son válidas, redirigir al inicio
        header("Location: ../index.php");
    }
}
