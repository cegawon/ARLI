<?php
    session_start();
    if (empty($_SESSION['login'])) {
        header("Location: Index.html");
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> 
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Consulting Website Template Free Download" name="keywords">
    <meta content="Consulting Website Template Free Download" name="description">
    <title>ARLI - Ahorro Rotativo Mutual</title>    
        
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
    <style>
        .turno-seleccionado {
            background-color: #07A6F0 !important;
            color: white !important;
        }
    </style>
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

    <div class="container" style="margin-top: 170px;">
        <h1 class="text-center">Selecciona un Turno</h1>
        <div class="row mt-4" id="turnos-container">
            <!-- Botones generados dinámicamente -->
        </div>
        <div class="text-center mt-4">
            <button class="btn btn-primary" id="confirmar-turno" disabled>Confirmar Turno</button>
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
        document.addEventListener("DOMContentLoaded", function() {
            const turnosContainer = document.getElementById("turnos-container");
            const confirmarBtn = document.getElementById("confirmar-turno");
            let turnoSeleccionado = null;

            for (let i = 1; i <= 12; i++) {
                const colDiv = document.createElement("div");
                colDiv.className = "col-4 mb-3";
                
                const button = document.createElement("button");
                button.className = "btn btn-outline-primary w-100";
                button.textContent = `Turno ${i}`;
                button.dataset.turno = i;
                
                button.addEventListener("click", function() {
                    if (turnoSeleccionado) {
                        turnoSeleccionado.classList.remove("turno-seleccionado");
                    }
                    button.classList.add("turno-seleccionado");
                    turnoSeleccionado = button;
                    confirmarBtn.disabled = false;
                });
                
                colDiv.appendChild(button);
                turnosContainer.appendChild(colDiv);
            }

            confirmarBtn.addEventListener("click", function() {
                if (turnoSeleccionado) {
                    fetch('guardar_turno.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: `turno=${turnoSeleccionado.dataset.turno}`
                    })
                    .then(response => response.text())
                    .then(data => alert(data))
                    .catch(error => console.error('Error:', error));
                }
            });
        });
    </script>
</body>
</html>
