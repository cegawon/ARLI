<?php
session_start();
if (empty($_SESSION['login'])) {
    header("Location: Index.html");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>ARLI - Ahorro Rotativo Mutual</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Consulting Website Template Free Download" name="keywords">
    <meta content="Consulting Website Template Free Download" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Oswald:wght@200;300;400&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

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

    <div class="container" style="margin-top: 150px;">
        <div class="card shadow p-4">
            <h2 class="text-center mb-4">Registro de Usuario</h2>
            <form id="registroForm" action="guardar_usuario.php" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Nombre Completo</label>
                        <input type="text" class="form-control" name="nombre" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Cédula</label>
                        <input type="text" class="form-control" name="cedula" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label class="form-label">Dirección</label>
                        <input type="text" class="form-control" name="direccion" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" name="correo" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label class="form-label">Empresa</label>
                        <input type="text" class="form-control" name="empresa">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Cargo</label>
                        <input type="text" class="form-control" name="cargo">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label class="form-label">Tipo de Contrato</label>
                        <select class="form-control" name="contrato">
                            <option value="Fijo">Término Fijo</option>
                            <option value="Indefinido">Término Indefinido</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Fecha de Ingreso</label>
                        <input type="date" class="form-control" name="fecha_ingreso">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label class="form-label">Estado Civil</label>
                        <select class="form-control" name="estado_civil">
                            <option value="Soltero">Soltero</option>
                            <option value="Casado">Casado</option>
                            <option value="Divorciado">Divorciado</option>
                            <option value="Viudo">Viudo</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Número de Hijos</label>
                        <input type="number" class="form-control" name="num_hijos" min="0">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label class="form-label">Usuario</label>
                        <input type="text" class="form-control" name="usuario" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="form-label">Rol</label>
                        <select class="form-control" name="rol">
                            <option value="Libranza">Libranza</option>
                            <option value="Empleado">Empleado</option>
                            <option value="Empresario">Empresario</option>
                            <?php
                            if ($_SESSION['rol'] == 'Administrador') {
                            ?>
                                <option value="Comercial">Comercial</option>
                                <option value="Administrador">Administrador</option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-4 w-100">Registrar</button>
            </form>
            <div id="mensaje" class="alert alert-success mt-3 text-center d-none" role="alert">
                ¡Los datos fueron guardados de forma exitosa!
            </div>
        </div>
    </div>
    <!-- Footer Start -->
    <div class="footer">
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

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
        document.getElementById("registroForm").addEventListener("submit", function(event) {
            event.preventDefault();
            fetch("guardar_cliente.php", {
                method: "POST",
                body: new FormData(this)
            }).then(response => response.text()).then(data => {
                document.getElementById("mensaje").classList.remove("d-none");
                setTimeout(() => {
                    document.getElementById("mensaje").classList.add("d-none");
                    location.reload();
                }, 3000);
            });
        });
    </script>
</body>

</html>