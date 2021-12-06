<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="img/resources/ICONO-TAI.png">
    <title>Panel de Control: Información del Artesano</title>
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
                                <?php
                                #Cargar Imágen de Perfil del Administrador
                                include 'sql_query_php/connect_bd.php';
                                $consulta = mysqli_query($conexion, "SELECT admin_img FROM tai_admin WHERE admin_id = '" . $_SESSION['admin_id'] . "'");
                                $row_datos = mysqli_fetch_assoc($consulta);
                                if ($row_datos['admin_img'] == '') {
                                ?>
                                    <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                                <?php
                                } else {
                                ?>
                                    <img class="img-profile rounded-circle" src="<?php echo substr($row_datos['admin_img'], 3) ?>">
                                <?php
                                }
                                ?>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="admin_perfil.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Mi Perfil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="sql_query_php/admin_logout.php">
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


                    <?php
                    $artesano_id = $_POST['artesano_id'];
                    include 'sql_query_php/connect_bd.php';
                    $consulta = mysqli_query($conexion, "SELECT * FROM tai_artesano WHERE artesano_id = '" . $artesano_id . "'");
                    $row_datos = mysqli_fetch_assoc($consulta);
                    ?>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Artesano: <?php echo $row_datos['artesano_nombre'], " ", $row_datos['artesano_apellidos']; ?></h1>
                    <p>
                        <b>Nombre del Artesano:</b> <?php echo $row_datos['artesano_nombre'], " ", $row_datos['artesano_apellidos']; ?> <br>
                        <b>Teléfono:</b> <?php echo $row_datos['artesano_telefono']; ?> <br>
                        <b>Correo Electrónico:</b> <?php echo $row_datos['artesano_email']; ?> <br>
                        <b>Domicilio:</b> <?php echo $row_datos['artesano_dir_calle'], ", Ext. ", $row_datos['artesano_dir_numext'], ", Int. ", $row_datos['artesano_dir_numint'], ", ";
                                    $colonia = mysqli_query($conexion, "SELECT * FROM dir_colonias WHERE colonia_id = '" . $row_datos['artesano_dir_colonia'] . "'");
                                    $row_colonia = mysqli_fetch_assoc($colonia);
                                    echo "Col. ", $row_colonia['colonia_nombre'], ", C.P. ", $row_colonia['colonia_cp'], ", ";
                                    $municipio = mysqli_query($conexion, "SELECT * FROM dir_municipios WHERE municipio_id = '" . $row_colonia['colonia_muni_id'] . "'");
                                    $row_municipio = mysqli_fetch_assoc($municipio);
                                    echo $row_municipio['municipio_nombre'], ", ";
                                    $estado = mysqli_query($conexion, "SELECT * FROM dir_estados WHERE estado_id = '" . $row_municipio['municipio_estado_id'] . "'");
                                    $row_estado = mysqli_fetch_assoc($estado);
                                    echo $row_estado['estado_nombre'], ", México.";
                                    ?> <br>
                        <b>Referencia de Dirección:</b> <?php echo $row_datos['artesano_dir_ref']; ?>
                    <form action="sql_query_php/admin_artesano_update.php" method="POST">
                        <input type="hidden" name="artesano_id" value="<?php echo $artesano_id; ?>">
                        <b>Estatus:</b>
                        <select class="custom-select" name="artesano_estatus" required>
                            <option value="">Selecciona el Estatus del Artesano</option>
                            <option value="1" <?php if ($row_datos['artesano_estatus'] == '1') {
                                                    echo 'selected';
                                                } ?> style="color: green;" >Activo</option>
                            <option value="2" <?php if ($row_datos['artesano_estatus'] == '2') {
                                                    echo 'selected';
                                                } ?> style="color: orange;" >Penalizado</option>
                            <option value="3" <?php if ($row_datos['artesano_estatus'] == '3') {
                                                    echo 'selected';
                                                } ?> style="color: red;" >Inactivo</option>
                        </select>
                        <div align="center"><br>
                            <button type="submit" class="btn btn-warning btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </span>
                                <span class="text">Actualizar Datos</span>
                            </button>
                        </div>
                    </form>
                    </p>
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
</body>

</html>