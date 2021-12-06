<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="img/resources/ICONO-TAI.png">
    <title>Panel de Control: Información del Producto</title>
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
                    $producto_id = $_POST['producto_id'];
                    include 'sql_query_php/connect_bd.php';
                    $consulta = mysqli_query($conexion, "SELECT * FROM tai_producto WHERE producto_id = '" . $producto_id . "'");
                    $row_datos = mysqli_fetch_assoc($consulta);
                    ?>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Producto: <?php echo $row_datos['producto_nombre']; ?></h1>
                    <p>
                        <b>Nombre del Producto:</b> <?php echo $row_datos['producto_nombre']; ?> <br>
                        <b>Precio:</b> $ <?php echo $row_datos['producto_precio']; ?> MXN<br>
                        <b>SKU (Número/Código de referencia):</b> <?php echo $row_datos['producto_SKU']; ?> <br>
                        <b>Descripción:</b> <?php echo $row_datos['producto_descrip']; ?> <br>
                        <b>Stock:</b> <?php echo $row_datos['producto_stock']; ?> <br>
                        <b>Estatus:</b> <?php
                                        if ($row_datos['producto_estatus'] == 0) {
                                            echo "En revisión";
                                        } else if ($row_datos['producto_estatus'] == 1) {
                                            echo "Activo";
                                        } else if ($row_datos['producto_estatus'] == 2) {
                                            echo "Pausado";
                                        } else {
                                            echo "Descontinuado";
                                        }
                                        ?> <br>
                        <b>Artesano:</b> <?php
                                            $consulta_artesano = mysqli_query($conexion, "SELECT * FROM tai_artesano WHERE artesano_id = '" . $row_datos['producto_artesano_id'] . "'");
                                            $row_artesano = mysqli_fetch_assoc($consulta_artesano);
                                            echo $row_artesano['artesano_nombre'], " ", $row_artesano['artesano_apellidos'];
                                            ?> <br>
                        <b>Categoría:</b> <?php
                                            $consulta_categoria = mysqli_query($conexion, "SELECT * FROM tai_prod_categoria WHERE categoria_id = '" . $row_datos['producto_categoria_id'] . "'");
                                            $row_categoria = mysqli_fetch_assoc($consulta_categoria);
                                            echo $row_categoria['categoria_nombre'];
                                            ?> <br>
                        <?php
                        if ($row_datos['producto_estatus'] == '0') {
                        ?>
                    <form action="sql_query_php/admin_producto_update.php" method="POST">
                        <input type="hidden" name="producto_id" value="<?php echo $producto_id; ?>">

                        <b>Estatus:</b>
                        <select class="custom-select" name="producto_estatus" required>
                            <option value="">Selecciona el Estatus del Producto</option>
                            <option value="1" style="color: green;">Activo</option>
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
                        <?php
                        }
                        ?>
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