<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="img/resources/ICONO-TAI.png">
    <title>Panel de Control: Productos</title>
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

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Productos</h1>
                    <p class="mb-4">La siguiente tabla permite observar los productos registrados y cambiar su <b>Estatus</b>. <br>
                    <ul>
                        <li>En Revisión: <i>El producto está en espera de ser aprobado para ponerse en venta</i>. </li>
                        <li>Activo: <i>El producto se encuentra a la venta</i>. </li>
                        <li>Pausado: <i>El producto no tiene inventario pero aún se producirán más de él</i>. </li>
                        <li>Descontinuado: <i style="color: red;">El producto ya no se venderá ni producirá más</i>. </li>
                    </ul>
                    </p> <br>
                    <?php
                        include("sql_query_php/errores.php");
                    ?>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabla de Productos</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th>Artesano</th>
                                            <th>Estatus</th>
                                            <th>Editar</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th>Artesano</th>
                                            <th>Estatus</th>
                                            <th>Editar</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        include 'sql_query_php/connect_bd.php';

                                        $consulta = mysqli_query($conexion, "SELECT * FROM tai_producto");
                                        while ($row = mysqli_fetch_array($consulta)) {
                                        ?><tr>
                                                <td> <?php echo $row[1]; ?> </td>
                                                <td> $ <?php echo $row[2]; ?> MXN</td>
                                                <td> <?php 
                                                    $consulta_artesano = mysqli_query($conexion, "SELECT * FROM tai_artesano WHERE artesano_id = '$row[7]'");
                                                    $row_artesano = mysqli_fetch_assoc($consulta_artesano);
                                                    echo $row_artesano['artesano_nombre'], " ", $row_artesano['artesano_apellidos'];
                                                ?> </td>
                                                <?php
                                                        if ($row[6] == 0) {
                                                            echo "<td style='color:blue'>En revisión</td>";
                                                        } else if ($row[6] == 1) {
                                                            echo "<td style='color:green'>Activo</td>";
                                                        } else if ($row[6] == 2) {
                                                            echo "<td style='color:orange'>Pausado</td>";
                                                        } else {
                                                            echo "<td style='color:red'>Descontinuado</td>";
                                                        }
                                                        ?>
                                                <td align="center">
                                                    <form action="admin_producto_info.php" method="POST">
                                                        <input type="hidden" name="producto_id" value="<?php echo $row[0]; ?>">
                                                        <button type="submit" class="btn btn-info btn-icon-split">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-info-circle"></i>
                                                            </span>
                                                            <span class="text">Administrar</span>
                                                        </button>
                                                    </form>
                                                </td>
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