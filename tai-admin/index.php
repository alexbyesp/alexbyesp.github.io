<!--
    Nombre: Página de Inicio de Sesión del Administrador
    Programador: Emmanuel Alejandro Zamudio Esparza
-->

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="img/resources/ICONO-TAI.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrador: Inicio de Sesión</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">¡Bienvenido Administrador!</h1>
                                    </div>
                                    <form class="user" method="POST" action="sql_query_php/admin_login.php">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                name="admin_email" aria-describedby="emailHelp"
                                                placeholder="Ingresa tu cuenta de Correo Electrónico">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="admin_pass" placeholder="Contraseña">
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Entrar">
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <p>Si olvidaste tu contraseña o tu correo registrado por favor contacta al Administrador de Base de Datos de TAI:
                                            <i>Emmanuel Alejandro Zamudio Esparza (alexesparzalex@gmail.com)</i>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>