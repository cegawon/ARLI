<?php
session_start();
$_SESSION['recuperar'] = 0;

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "sistema_turnos");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$correo = $_POST['correo'];
$cedula = $_POST['cedula'];

// Consulta segura con sentencia preparada
$resultado = $conexion->query("SELECT * FROM usuarios WHERE correo = '$correo' && cedula = $cedula ");


if ($consulta = $resultado->fetch_assoc()) {
    // Verificar contraseña con password_verify
   
        $_SESSION['rol'] = $consulta['rol'];
        $_SESSION['cedula'] = $consulta['cedula'];
        $_SESSION['nombre'] = $consulta['nombre'];
        $_SESSION['login'] = 1;
        header("Location: Bienvenidos.php");
        exit;
   
}

// Si no pasó la verificación, redirige a inicio de sesión
header("Location: iniciar_sesion.php");
exit;
?>

