<!--
    Nombre: Página de Inicio de Sesión del Artesano
    Programador: Cristian Yavin Cortes Lugo
-->
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Panel de Control: Inicio</title>
    <link href="css/art_info_home.css" rel="stylesheet" type="text/css">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <?php
            include 'art_menu_style.php';
            ?>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['artesano_nombre']; ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="art_home.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Mi Perfil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Salir
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!--=======================================================================================-->
                    <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Bienvenid@ <?php echo $_SESSION['artesano_nombre']; ?></h1>
                    <p class="mb-4">Mantén tus datos actualizados para que los usuarios puedan encontrarte.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Foto de perfil</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <!--incluir apartado de foto de perfil aqui-->
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Datos personales</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td>Nombre</td>
                                            <td><input type="text" class="form-control form-control-user" name="artesano_nombre"
                                            value="<?php echo $_SESSION['artesano_nombre']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Apellidos</td>
                                            <td><input type="text" class="form-control form-control-user" name="artesano_apellidos"
                                            value="<?php echo $_SESSION['artesano_nombre']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Teléfono</td>
                                            <td><input type="text" class="form-control form-control-user" name="artesano_nombre"
                                            value="<?php echo $_SESSION['artesano_nombre']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Correo Electrónico</td>
                                            <td><input type="text" class="form-control form-control-user" name="artesano_nombre"
                                            value="<?php echo $_SESSION['artesano_nombre']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Calle</td>
                                            <td><input type="text" class="form-control form-control-user" name="artesano_nombre"
                                            value="<?php echo $_SESSION['artesano_nombre']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Numero exterior</td>
                                            <td><input type="text" class="form-control form-control-user" name="artesano_nombre"
                                            value="<?php echo $_SESSION['artesano_nombre']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Numero interiro</td>
                                            <td><input type="text" class="form-control form-control-user" name="artesano_nombre"
                                            value="<?php echo $_SESSION['artesano_nombre']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Colonia</td>
                                            <td><input type="text" class="form-control form-control-user" name="artesano_nombre"
                                            value="<?php echo $_SESSION['artesano_nombre']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Municipio</td>
                                            <td><input type="text" class="form-control form-control-user" name="artesano_nombre"
                                            value="<?php echo $_SESSION['artesano_nombre']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Estado</td>
                                            <td><input type="text" class="form-control form-control-user" name="artesano_nombre"
                                            value="<?php echo $_SESSION['artesano_nombre']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Referencias</td>
                                            <td><input type="text" class="form-control form-control-user" name="artesano_nombre"
                                            value="<?php echo $_SESSION['artesano_nombre']; ?>"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                    <!--========================================================================================-->
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; TAI COMMERCE: Artesano <i>2021</i></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
</body>

</html>