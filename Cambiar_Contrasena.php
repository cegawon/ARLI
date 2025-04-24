<?php
// Conexion a la base de datos
$conexion = new mysqli("localhost", "root", "", "sistema_turnos");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Procesar la actualización de la contraseña
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['password1']==$_POST['password2']) {
        $id = $_POST['id'];
        $nueva_contraseña = password_hash($_POST['password1'], PASSWORD_BCRYPT);
        $sql = "UPDATE usuarios SET password='$nueva_contraseña' WHERE id= $id ";
        
    }
    if ($conexion->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Contraseña actualizada correctamente"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error al actualizar la contraseña"]);
    }
    exit;
}
$jaja = 8;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    .con{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
</style>
<body>
    <div class="container mt-5">
        <div class="card p-4 shadow">
            <h2 class="text-center mb-4">Actualizar Contraseña</h2>
            <form id="formActualizar" method="POST" class="text-center">
                <div class="con">
                    <div class="mb-3">
                        <input type="hidden" class="form-control" name="id" value=<?php echo $jaja; ?>>
                    </div>
                    <div class="mb-3 col-6">
                        <label class="form-label"><b>Nueva Contraseña</b></label>
                        <input type="password" class="form-control" name="password1" value=<?php echo $jaja; ?> required>
                    </div>
                    <div class="mb-3 col-6">
                        <label class="form-label"><b>Repetir Contraseña</b></label>
                        <input type="password" class="form-control" name="password2" value=<?php echo $jaja; ?> required>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary w-100">Actualizar</button>
                    </div>
                </div>
            </form>
            <div id="mensaje" class="alert mt-3 d-none text-center"></div>
        </div>
    </div>

    <script>
        $("#formActualizar").submit(function(event) {
    event.preventDefault();
    $.ajax({
        url: "", // El mismo archivo procesa la petición
        type: "POST",
        data: $(this).serialize(),
        dataType: "json",
        success: function(response) {
            let mensajeDiv = $("#mensaje");
            if (response.status === "success") {
                mensajeDiv.removeClass("d-none alert-danger").addClass("alert-success").text(response.message);
            } else {
                mensajeDiv.removeClass("d-none alert-success").addClass("alert-danger").text(response.message);
            }
            setTimeout(() => mensajeDiv.addClass("d-none"), 5000); // Oculta el mensaje después de 5 segundos
        }
    });
});

    </script>
</body>

</html>