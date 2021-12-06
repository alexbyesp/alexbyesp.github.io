

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Panel de Control: Productos</title>
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
                                <a class="dropdown-item" href="cliente_home2.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Mi Perfil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="sql_query_php/cliente_logout.php">
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
                        <h1 class="h3 mb-2 text-gray-800">Productos</h1>
                        <p class="mb-4">Lo mejor de TAI para ti.</p>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Productos</h6>
                            </div>
                               
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID Producto</th>
                                                <th>Producto</th>
                                                <th>Precio</th>
                                                <th>Código</th>
                                                <th>Descripción</th>
                                                <th>Inventario</th>
                                                <th>Estatus</th>
                                                <th>Categoría</th>
                                                <th>Material</th>
                                                <th>Imágen</th>
                                                <th>Comprar</th>
                                            </tr>
                                            <?php
                                            include 'sql_query_php/connec_bd.php';
                                            $consulta = mysqli_query($conexion, "SELECT * FROM tai_producto" );

                                            while ($mostrar = mysqli_fetch_array($consulta)){        
                                            ?>
                                        </thead>
                                            <?php
                                                $consulta2 = mysqli_query($conexion, "SELECT categoria_nombre FROM tai_prod_categoria WHERE categoria_id = '" . $mostrar['producto_categoria_id'] . "'");
                                                $row_datos = mysqli_fetch_assoc($consulta2);
                                            ?>
                                            <?php
                                                $consulta3 = mysqli_query($conexion, "SELECT material_nombre FROM tai_prod_materiales WHERE material_id IN (SELECT rel_mat_id FROM tai_prod_mat_rel WHERE rel_prod_id = '" . $mostrar['producto_id'] . "')");
                                                $row_datos2 = mysqli_fetch_assoc($consulta3);
                                            ?>
                                            <?php
                                                $consulta4 = mysqli_query($conexion, "SELECT img_nombre FROM tai_prod_images WHERE img_producto_id  = '" . $mostrar['producto_id'] . "'");
                                                $row_datos3 = mysqli_fetch_assoc($consulta4);
                                            ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $mostrar['producto_id'] ?></td>
                                                <td><?php echo $mostrar['producto_nombre'] ?></td>
                                                <td><?php echo $mostrar['producto_precio'] ?></td>
                                                <td><?php echo $mostrar['producto_SKU'] ?></td>
                                                <td><?php echo $mostrar['producto_descrip'] ?></td>
                                                <td><?php echo $mostrar['producto_stock'] ?></td>
                                                <td><?php if ($mostrar['producto_estatus'] == 0){
                                                    echo "En revisión";
                                                } else { echo "Activo"; }
                                                ?></td>
                                                <td><?php echo $row_datos['categoria_nombre'] ?></td>
                                                <td><?php echo $row_datos2['material_nombre']?></td>
                                                <td align="center">
                                                    <div id="load_img">
                                                        <img class="img-responsive" src="img/<?php echo $row_datos3['img_nombre'];?>" alt="Foto de producto" style="border-radius:150px;">
                                                    </div>
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