<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="img/resources/ICONO-TAI.png">
    <title>Panel de Control: Editar Categoría</title>
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
                                    if($row_datos['admin_img'] == ''){
                                        ?>
                                            <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                                        <?php
                                    }else{
                                        ?>
                                            <img class="img-profile rounded-circle" src="<?php echo substr($row_datos['admin_img'],3) ?>">
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
                    $categoria_id = $_POST['categoria_id'];
                    include 'sql_query_php/connect_bd.php';
                    $consulta = mysqli_query($conexion, "SELECT * FROM tai_prod_categoria WHERE categoria_id = '" . $categoria_id . "'");
                    $row_datos = mysqli_fetch_assoc($consulta);
                    ?>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Categoría: <?php echo $row_datos['categoria_nombre']; ?></h1>
                    <form action="sql_query_php/admin_categoria_update.php" method="POST">
                        <input type="hidden" name="categoria_id" value="<?php echo $row_datos['categoria_id']; ?>">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Nombre:</label>
                                <input name="categoria_nombre" type="text" class="form-control" value="<?php echo $row_datos['categoria_nombre']; ?>" placeholder="Nombre de la Categoría" required maxlength="20">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Descripción:</label>
                                <textarea name="categoria_desc" class="form-control" rows="5" placeholder="Descripción" required maxlength="255"><?php echo $row_datos['categoria_desc']; ?></textarea>
                            </div>
                        </div>
                        <div align="center"><br>
                            <button type="submit" class="btn btn-warning btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </span>
                                <span class="text">Actualizar Categoría</span>
                            </button>
                        </div>
                    </form>
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