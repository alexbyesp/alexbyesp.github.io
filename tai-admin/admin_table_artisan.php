<!DOCTYPE html>
<html lang="es">

<head>
    <title>Panel de Control: Artesanos</title>
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <?php
            include 'admin_menu_style.php';
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['admin_nombre']; ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
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

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Artesanos</h1>
                    <p class="mb-4">La siguiente tabla permite observar los artesanos registrados y la posibilidad de cambiar su <b>Estatus</b>. <br>
                            <ul>
                                <li>En Revisión: <i>El artesano está en espera de la aprobación de su cuenta</i>. </li>
                                <li>Activo: <i>La cuenta del artesano está activa</i>. </li>
                                <li>Penalizado: <i>La cuenta del artesano se encuentra suspendida por haber incumplido alguna regla</i>. </li>
                                <li>Inactivo: <i style="color: red;">El artesano está dado de baja</i>. </li>
                            </ul>
                    </p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabla de Artesanos</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Foto</th>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Teléfono</th>
                                            <th>Correo Electrónico</th>
                                            <th>Estatus</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Foto</th>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Teléfono</th>
                                            <th>Correo Electrónico</th>
                                            <th>Estatus</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        include 'sql_query_php/connect_bd.php';

                                        $consulta = mysqli_query($conexion, "SELECT * FROM tai_artesano");
                                        while ($row = mysqli_fetch_array($consulta)) {
                                        ?><tr>
                                                <td> <?php echo $row[6]; ?> </td>
                                                <td> <?php echo $row[1]; ?> </td>
                                                <td> <?php echo $row[2]; ?> </td>
                                                <td> <?php echo $row[3]; ?> </td>
                                                <td> <?php echo $row[4]; ?> </td>
                                                <td> <select name="" class="custom-select">
                                                        <option value="0" <?php if ($row[12] == '0'){ echo 'selected'; }?>>En Revisión</option>
                                                        <option value="1" <?php if ($row[12] == '1'){ echo 'selected'; }?>>Activo</option>
                                                        <option value="2" <?php if ($row[12] == '2'){ echo 'selected'; }?>>Penalizado</option>
                                                        <option value="3" <?php if ($row[12] == '3'){ echo 'selected'; }?>>Inactivo</option>
                                                    </select> </td>
                                            </tr><?php
                                                }
                                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; TAI COMMERCE: Administrador <i>2021</i></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>