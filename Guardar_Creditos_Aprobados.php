<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_turnos";

$conn = new mysqli($servername, $username, $password, $dbname);

$_SESSION['aprobado'] = 0;
$cedula = $_POST['cedula'];
$fecha_ingreso = $_POST['fecha_ingreso'];
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$resultados = mysqli_query($conn,"select  *from usuarios where cedula = '$cedula'");
if ($resultados->num_rows > 0) {
    $sql = "INSERT INTO creditos (cedula, fecha_ingreso) VALUES ('$cedula', '$fecha_ingreso')";
    $_SESSION['aprobado'] = 1;    

    if ($conn->query($sql) === TRUE) {
        header("location:Creditos_Aprobados.php");
    } 
}
else {
    header("location:Creditos_Aprobados.php");

}
$conn->close();
?>
