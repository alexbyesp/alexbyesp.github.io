<!--
    Nombre: Página de Inicio de Sesión del Artesano
    Programador: Cristian Yavin Cortes Lugo
-->
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Panel de Control: Ventas</title>
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['cliente_nombre']; ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="art_home.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Mi Perfil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="sql_query_php/art_logout.php">
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
                    <h1 class="h3 mb-2 text-gray-800">Mis Ventas</h1>
                    <p class="mb-4">Lleva el control de tus ventas, fechas y envíos.</p>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Datos de orden</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Orden</th>
                                            <th>Producto</th>
                                            <th>Cliente</th>
                                            <th>Cantidad</th>
                                            <th>Fecha y Hora</th>
                                            <th>Dirección de envió</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                        <?php
                                        include 'sql_query_php/connec_bd.php';
                                        $consulta = mysqli_query($conexion, "SELECT * FROM tai_venta_productos WHERE venta_prod_id IN (SELECT producto_id FROM tai_producto WHERE producto_artesano_id = '" . $_SESSION['artesano_id'] . "')");

                                        while ($mostrar = mysqli_fetch_array($consulta)){        
                                        ?>
                                    </thead>
                                        <?php
                                            $consulta2 = mysqli_query($conexion, "SELECT producto_nombre FROM tai_producto WHERE producto_id = '" . $mostrar['venta_prod_id'] . "'");
                                            $row_datos = mysqli_fetch_assoc($consulta2);
                                        ?>
                                        <?php
                                            $consulta3 = mysqli_query($conexion, "SELECT cliente_nombre FROM tai_cliente WHERE cliente_id = (SELECT orden_cli_id FROM tai_venta_orden WHERE orden_id = '" . $mostrar['venta_prod_orden_id'] . "')");
                                            $row_datos2 = mysqli_fetch_assoc($consulta3);
                                        ?>
                                        <?php
                                            $consulta4 = mysqli_query($conexion, "SELECT direc_cli_calle FROM tai_cliente_direc WHERE direc_cli_id = (SELECT orden_cli_dir_id FROM tai_venta_orden WHERE orden_id = '" . $mostrar['venta_prod_orden_id'] . "')");
                                            $row_datos3 = mysqli_fetch_assoc($consulta4);
                                        ?>
                                        <?php
                                            $consulta5 = mysqli_query($conexion, "SELECT colonia_nombre FROM dir_colonias WHERE colonia_id = (SELECT direc_cli_colonia FROM tai_cliente_direc WHERE direc_cli_id = (SELECT orden_cli_dir_id FROM tai_venta_orden WHERE orden_id = '" . $mostrar['venta_prod_orden_id'] . "'))");
                                            $row_datos4 = mysqli_fetch_assoc($consulta5);
                                        ?>
                                        <?php
                                            $consulta6 = mysqli_query($conexion, "SELECT municipio_nombre FROM dir_municipios WHERE municipio_id = (SELECT colonia_muni_id FROM dir_colonias WHERE colonia_id = (SELECT direc_cli_colonia FROM tai_cliente_direc WHERE direc_cli_id = (SELECT orden_cli_dir_id FROM tai_venta_orden WHERE orden_id = '" . $mostrar['venta_prod_orden_id'] . "')))");
                                            $row_datos5 = mysqli_fetch_assoc($consulta6);
                                        ?>
                                        <?php
                                            $consulta7 = mysqli_query($conexion, "SELECT estado_nombre FROM dir_estados WHERE estado_id = (SELECT municipio_estado_id FROM dir_municipios WHERE municipio_id = (SELECT colonia_muni_id FROM dir_colonias WHERE colonia_id = (SELECT direc_cli_colonia FROM tai_cliente_direc WHERE direc_cli_id = (SELECT orden_cli_id FROM tai_venta_orden WHERE orden_id = '" . $mostrar['venta_prod_orden_id'] . "'))))");
                                            $row_datos6 = mysqli_fetch_assoc($consulta7);
                                        ?>
                                        <?php
                                            $consulta8 = mysqli_query($conexion, "SELECT orden_total FROM tai_venta_orden WHERE orden_id = '" . $mostrar['venta_prod_orden_id'] . "'");
                                            $row_datos7 = mysqli_fetch_assoc($consulta8);
                                        ?>
                                        <?php
                                            $consulta9 = mysqli_query($conexion, "SELECT orden_fecha FROM tai_venta_orden WHERE orden_id = '" . $mostrar['venta_prod_orden_id'] . "'");
                                            $row_datos8 = mysqli_fetch_assoc($consulta9);
                                        ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $mostrar['venta_prod_orden_id'] ?></td>
                                            <td><?php echo $row_datos['producto_nombre'] ?></td>
                                            <td><?php echo $row_datos2['cliente_nombre'] ?></td>
                                            <td><?php echo $mostrar['venta_prod_cantidad'] ?></td>
                                            <td><?php echo $row_datos8['orden_fecha'] ?></td>
                                            <td><?php echo $row_datos3['direc_cli_calle'] ?>, <?php echo $row_datos4['colonia_nombre'] ?>, <?php echo $row_datos5['municipio_nombre'] ?>, <?php echo $row_datos6['estado_nombre'] ?></td>
                                            <td><?php echo $row_datos7['orden_total'] ?></td>
                                            <td>
                                                <a href="#" class="btn btn-success btn-icon-split">
                                                    <span class="icon text-white-50">
                                                    <i class="fas fa-envelope"></i>
                                                    </span>
                                                    <span class="text">Mensajes</span>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php 
                                        }
                                    ?>
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