<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

session_start();

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "sistema_turnos");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Validar y sanitizar email
$email = 'cegawon@hotmail.com';
if (!$email) {
    die("Correo inválido");
}

// Consulta segura con sentencia preparada
$stmt = $conexion->prepare("SELECT * FROM usuarios WHERE correo = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$resultado = $stmt->get_result();

if ($consulta = $resultado->fetch_assoc()) {
    $_SESSION['usuario'] = $consulta['usuario'];
    $_SESSION['id'] = $consulta['id'];
    $_SESSION['recuperar'] = 1;

    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;

        // ¡Importante! Usa variables de entorno para las credenciales
        $mail->Username = 'mariarodriguezxx20@gmail.com';
        $mail->Password = '77092836';

        $mail->SMTPSecure ='tls';
        $mail->Port = 587;

        $mail->setFrom($mail->Username, 'Soporte');
        $mail->addAddress($email);
        $mail->Subject = 'Recuperación de contraseña';

        // Lo ideal es enviar un token de recuperación, no la contraseña/id directamente
        $mail->Body = "Hola, haz clic en el siguiente enlace para recuperar tu contraseña:\n\n" .
                      "https://tusitio.com/recuperar.php?token=" . generarTokenSeguridad($consulta['id']);

        $mail->send();
        echo "<script>alert('Enlace de recuperación enviado a tu correo'); window.location.href='index.php';</script>";
    } catch (Exception $e) {
        echo "Error al enviar: {$mail->ErrorInfo}";
    }
} else {
    echo "<script>alert('Correo no encontrado'); window.location.href='index.html';</script>";
}

// Función para generar un token único (ejemplo básico)
function generarTokenSeguridad($user_id) {
    return hash('sha256', $user_id . uniqid('', true) . bin2hex(random_bytes(8)));
}
?>
