<?php
session_start();
$_SESSION['login'] = 0;

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "sistema_turnos");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Consulta segura con sentencia preparada
$stmt = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = ?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$resultado = $stmt->get_result();

if ($consulta = $resultado->fetch_assoc()) {
    // Verificar contraseña con password_verify
    if (password_verify($contrasena, $consulta['password'])) {
        $_SESSION['rol'] = $consulta['rol'];
        $_SESSION['cedula'] = $consulta['cedula'];
        $_SESSION['nombre'] = $consulta['nombre'];
        $_SESSION['login'] = 1;
        header("Location: Bienvenidos.php");
        exit;
    }
}

// Si no pasó la verificación, redirige a inicio de sesión
header("Location: iniciar_sesion.php");
exit;
?>

