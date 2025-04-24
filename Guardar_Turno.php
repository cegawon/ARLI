<?php
session_start();

$servername = "localhost";
$username = "root";  // Cambia según tu configuración
$password = "";
$dbname = "sistema_turnos";

$grupo_final = 1;
$contar = 0;
$turno = 0;
$estado = 'Inactivo';

date_default_timezone_set('America/Bogota'); // Zona horaria de Colombia
$fecha_actual = date("Y-m-d H:i:s"); // Formato: año-mes-día hora:minutos:segundos

/**********  Conexión a la base de datos  ***********/
$conexion = new mysqli($servername, $username, $password, $dbname);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

/**********  Consultar Si Él Usuario Tiene Un Turno Activo  ***********/
$resultados = mysqli_query($conexion,"select *from turnos where cedula = $_SESSION[cedula]");

while($consulta = mysqli_fetch_array($resultados))
{
  if ($consulta['estado'] == 'Activo') {
    $estado = $consulta['estado'];
  }
  
}

/**********  Consultar cual es Ultimo Grupo  ***********/
$resultados = mysqli_query($conexion,"select *from turnos");

while($consulta = mysqli_fetch_array($resultados))
{
  $grupo_final = $consulta['grupo'];
}

/**********  Contar Los Turnos Escogidos  ***********/
$resultados = mysqli_query($conexion,"select *from turnos");

while($consulta = mysqli_fetch_array($resultados))
{
    if ($grupo_final ==  $consulta['grupo']) {
       $contar = $contar + 1; 
    }  
}

/**********  Consultar Si EL Turno Ya Fue Escogido  ***********/
$resultados = mysqli_query($conexion,"select *from turnos");

while($consulta = mysqli_fetch_array($resultados))
{
  if ($grupo_final == $consulta['grupo'] & $consulta['turno'] == $_POST['turno'] & $contar < 12) {
    $turno = 1;
  }
}

/**********  Consultar Si hay Menos de 12 Turnos Escogidos  ***********/
if ($contar < 12 & $turno == 0 & $estado == 'Inactivo') {
    
    mysqli_query($conexion,"insert into turnos (cedula, turno, grupo, estado, fecha_seleccion) values ($_SESSION[cedula], $_POST[turno], $grupo_final,'Activo', '$fecha_actual')"); 

    echo "El Turno Fue Guardado Satisfactoriamente.";
}

/**********  Consultar Si hay Más de 12 Turnos Escogidos  ***********/
if ($contar == 12 & $turno == 0 & $estado == 'Inactivo'){
    $grupo_final = $grupo_final + 1;
    mysqli_query($conexion,"insert into turnos (cedula, turno, grupo, estado, fecha_seleccion) values ($_SESSION[cedula], $_POST[turno], $grupo_final, 'Activo','$fecha_actual')");  

    echo "El Turno Fue Guardado Satisfactoriamente.";
}
/**********  Consultar Si Ya el Turno Fue Escogido  ***********/    
if ($turno == 1){
    echo "El Turno YA Fue Escogido.";
}

/**********  Consultar Si Ya el Turno Fue Escogido  ***********/    
if ($turno == 0 &  $estado == 'Activo'){
  echo "El Usuario Ya Escogio Su Turno.";
}
    $conexion->close();
?>
