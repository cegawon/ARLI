<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_turnos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];
$cedula = $_POST['cedula'];
$direccion = $_POST['direccion'];
$correo = $_POST['correo'];
$empresa = $_POST['empresa'];
$cargo = $_POST['cargo'];
$contrato = $_POST['contrato'];
$fecha_ingreso = $_POST['fecha_ingreso'];
$estado_civil = $_POST['estado_civil'];
$num_hijos = $_POST['num_hijos'];
$usuario = $_POST['usuario'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$rol = $_POST['rol'];

$sql = "INSERT INTO usuarios (nombre, cedula, direccion, correo, empresa, cargo, contrato, fecha_ingreso, estado_civil, num_hijos, usuario, password, rol) 
        VALUES ('$nombre', '$cedula', '$direccion', '$correo', '$empresa', '$cargo', '$contrato', '$fecha_ingreso', '$estado_civil', '$num_hijos', '$usuario', '$password', '$rol')";

if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "error: " . $conn->error;
}

$conn->close();
?>
