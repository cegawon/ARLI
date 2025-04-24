<?php
session_start();
if (empty($_SESSION['login'])) {
    header("Location: Index.html");
}
// Conexion a la base de datos
$conexion = new mysqli("localhost", "root", "", "sistema_turnos");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Operaciones CRUD
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'update') {
        $id = $_POST['id'];
        $cedula = $_POST['cedula'];
        $fecha_ingreso = $_POST['fecha_ingreso'];

        $sql = "UPDATE creditos SET cedula='$cedula', fecha_ingreso='$fecha_ingreso' WHERE id='$id'";

        if ($conexion->query($sql) === TRUE) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error", "message" => $conexion->error]);
        }
        exit;
    }

    if (isset($_POST['action']) && $_POST['action'] == 'delete') {
        $id = $_POST['id'];
        $sql = "DELETE FROM creditos WHERE id='$id'";

        if ($conexion->query($sql) === TRUE) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error", "message" => $conexion->error]);
        }
        exit;
    }
}

// Obtener usuarios
$result = $conexion->query("SELECT * FROM creditos");
$usuarios = [];
while ($row = $result->fetch_assoc()) {
    $usuarios[] = $row;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>ARLI - Ahorro Rotativo Mutual</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <meta content="Consulting Website Template Free Download" name="keywords">
    <meta content="Consulting Website Template Free Download" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Oswald:wght@200;300;400&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Data Table -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">    
</head>
<style>
    @media (min-width: 576px) {
        .titulo {
            margin-left: 300px;
        }
    }

    @media (max-width: 576px) {
        .titulo {
            margin-left: 100px;
        }
    }
</style>

<body>
    <!-- Top Bar Start -->
    <div class="top-bar d-none d-md-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="top-bar-left">
                        <div class="text">
                            <i class="far fa-clock"></i>
                            <h2>8:00 AM - 6:00 PM</h2>
                            <p>Lunes - Viernes</p>
                        </div>
                        <div class="text">
                            <i class="fa fa-phone-alt"></i>
                            <h2>3008334903</h2>
                            <p>Cita Previa</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="top-bar-right">
                        <div class="social">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Bar End -->

    <!-- Nav Bar Start -->
    <div class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a href="index.html" class="navbar-brand">AHORRO ROTATIVO MUTUAL</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto">
                    <a href="index.html" class="nav-item nav-link active">Inicio</a>
                    <a href="Nosotros.html" class="nav-item nav-link">Nosotros</a>
                    <a href="Servicios.html" class="nav-item nav-link">Servicios</a>
                    <a href="Logros.html" class="nav-item nav-link">Logros</a>
                    <a href="Nuestro_Equipo.html" class="nav-item nav-link">Nuestro Equipo</a>
                    <a href="Testimonios.html" class="nav-item nav-link">Testimonios</a>
                    <a href="Contacto.html" class="nav-item nav-link">Contacto</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Usuarios</a>
                        <div class="dropdown-menu">
                        <a href="Iniciar_Sesion.php" class="nav-link text-dark"><i class="fa fa-user-circle" aria-hidden="true" style="font-size: 20px;"></i> <b>Iniciar Sesión</b></a>         
                        <a href="Cerrar_Sesion.php" class="nav-link dropdown-item text-dark"><i class="fa fa-user-times" aria-hidden="true" style="font-size: 20px;"></i><b> Cerrar Sesión</b></a>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Nav Bar End -->
    <div class="m-5">
        <h2 class="text-center mb-4" style="margin-top: 150px;">CREDITOS APROBADOS</h2>
        <table id="example" class="display" style="width:80%">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Cédula</th>
                    <th class="text-center">Fecha Aprobado</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr class="text-center">
                        <td class="text-center"><?= $usuario['id'] ?></td>
                        <td class="text-center"><?= $usuario['cedula'] ?></td>
                        <td class="text-center"><?= $usuario['fecha_ingreso'] ?></td>
                        <td class="text-center">
                            <button class="btn btn-primary btn-sm editar" data-id="<?= $usuario['id'] ?>" data-cedula="<?= $usuario['cedula'] ?>" data-fecha_ingreso="<?= $usuario['fecha_ingreso'] ?>" data-bs-toggle="modal" data-bs-target="#modalEditar">Editar</button>
                            <button class="btn btn-danger btn-sm eliminar ms-2" data-id="<?= $usuario['id'] ?>">Eliminar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Javascript -->
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <div class="modal fade" id="modalEditar" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="titulo">
                        <h5 class="modal-title">Editar Aprobados</h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="formEditar">
                        <input type="hidden" id="editId" name="id">
                        <div class="row">
                            <div class="col-6">
                                <label>Cédula:</label>
                                <input type="text" id="editCedula" name="cedula" class="form-control">
                            </div>
                            <div class="col-6">
                                <label>Fecha Ingreso:</label>
                                <input type="date" id="editFecha_ingreso" name="fecha_ingreso" class="form-control">
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mt-3">Guardar Cambios</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Start -->
    <div class="footer" style="margin-top: 160px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="footer-contact">
                                <h2>Nuestras Oficinas</h2>
                                <p><i class="fa fa-map-marker-alt"></i>123 Street, Valledupar, Colombia</p>
                                <p><i class="fa fa-phone-alt"></i>+57 3008334903</p>
                                <p><i class="fa fa-envelope"></i>cegasoft@gmail.com</p>
                                <div class="footer-social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-youtube"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="footer-link">
                                <h2>Enlaces</h2>
                                <a href="">Terminos de Uso</a>
                                <a href="">Politicas de Privacidad</a>
                                <a href="">Cookies</a>
                                <a href="">Ayuda</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="footer-newsletter">
                        <h2>Correo Informativo</h2>
                        <p>
                            Suscribete para mantenerte al día de las noticias m'as relevantes.
                        </p>
                        <div class="form">
                            <input class="form-control" placeholder="Escribe tu Correo">
                            <button class="btn">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container copyright">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; <a href="#">ARLI</a>, Todos los Derechos Reservados.</p>
                </div>
                <div class="col-md-6">
                    <p>Realizado por <a href="https://htmlcodex.com">ARLI</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    

    <!-- Data Table -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>


    <script>
        $(document).on('click', '.editar', function() {
            $('#editId').val($(this).data('id'));
            $('#editCedula').val($(this).data('cedula'));
            $('#editFecha_ingreso').val($(this).data('fecha_ingreso'));
        });

        $('#formEditar').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '',
                type: 'POST',
                data: $(this).serialize() + '&action=update',
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        location.reload();
                    } else {
                        alert('Error al actualizar los datos: ' + response.message);
                    }
                },
                error: function() {
                    alert('Error en la solicitud AJAX');
                }
            });
        });

        $(document).on('click', '.eliminar', function() {
            if (confirm('¿Seguro que deseas eliminar este usuario?')) {
                let id = $(this).data('id');
                $.ajax({
                    url: '',
                    type: 'POST',
                    data: {
                        id: id,
                        action: 'delete'
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            location.reload();
                        } else {
                            alert('Error al eliminar: ' + response.message);
                        }
                    },
                    error: function() {
                        alert('Error en la solicitud AJAX');
                    }
                });
            }
        });
    </script>
</body>

</html>