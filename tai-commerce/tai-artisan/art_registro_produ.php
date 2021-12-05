<!--
    Nombre: Página de Inicio de Sesión del Artesano
    Programador: Cristian Yavin Cortes Lugo
-->
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Panel de Control: Registrar productos</title>
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
                        <h1 class="h3 mb-2 text-gray-800">Registro de productos</h1>
                        <p class="mb-4">Registre un nuevo producto y extienda su variedad para aumentar su popularidad en el mercado.</p>
                        <?php
                            include("sql_query_php/errores.php");
                        ?>
                        <?php
                            include 'sql_query_php/connec_bd.php';
                            $consulta = mysqli_query($conexion, "SELECT * FROM tai_artesano WHERE artesano_id = '" . $_SESSION['artesano_id'] . "'");
                            $row_datos = mysqli_fetch_assoc($consulta);
                        ?>
                        <?php
                            $consulta2 = mysqli_query($conexion, "SELECT colonia_nombre FROM dir_colonias WHERE colonia_id = '" . $row_datos['artesano_dir_colonia'] . "'");
                            $row_datos2 = mysqli_fetch_assoc($consulta2);
                        ?>
                        <?php
                            $consulta3 = mysqli_query($conexion, "SELECT municipio_nombre FROM dir_municipios WHERE municipio_id = (SELECT colonia_muni_id FROM dir_colonias WHERE colonia_id = '" . $row_datos['artesano_dir_colonia'] . "')");
                            $row_datos3 = mysqli_fetch_assoc($consulta3);
                        ?>
                        <?php
                            $consulta4 = mysqli_query($conexion, "SELECT estado_nombre FROM dir_estados WHERE estado_id = (SELECT municipio_estado_id FROM dir_municipios WHERE municipio_id = (SELECT colonia_muni_id FROM dir_colonias WHERE colonia_id = '" . $row_datos['artesano_dir_colonia'] . "'))");
                            $row_datos4 = mysqli_fetch_assoc($consulta4);
                        ?>
                        <form action="sql_query_php/art_prod_register.php" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input name="producto_nombre" type="text" class="form-control" placeholder="Nombre del producto">
                                </div>
                                <div class="form-group col-md-6">
                                    <input name="producto_precio" type="text" class="form-control" placeholder="Precio del producto">
                                </div>
                                <div class="form-group col-md-6">
                                    <input name="producto_SKU" type="text" class="form-control" placeholder="Código de producto">
                                </div>
                                <div class="form-group col-md-6">
                                    <textarea name="producto_descrip" type="text" class="form-control" placeholder="Descripción del producto"></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <input name="producto_stock" type="text" class="form-control" placeholder="Cantidad en inventario">
                                </div>
                                <div class="form-group col-md-6">
                                    <select name="categoria_nombre" class="form-control">
                                        <option>Categoría del producto</option>
                                        <?php
                                        include 'sql_query_php/connec_bd.php';
                                        $consulta = mysqli_query($conexion, "SELECT categoria_nombre FROM tai_prod_categoria");

                                        while ($mostrar = mysqli_fetch_array($consulta)){        
                                        ?>
                                        <option><?php echo $mostrar['categoria_nombre'] ?></option>
                                        <?php 
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <select name="material_nombre" class="form-control">
                                        <option>Material del producto</option>
                                        <?php
                                        $consulta = mysqli_query($conexion, "SELECT material_nombre FROM tai_prod_materiales");

                                        while ($mostrar = mysqli_fetch_array($consulta)){        
                                        ?>
                                        <option><?php echo $mostrar['material_nombre'] ?></option>
                                        <?php 
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Seleccione la imagen principal de su producto</label>
                                    <input type="file" class="form-control-file" name="img_nombre">
                                </div>
                            </div>
                            <div align="center">
                                <br><button type="submit" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-upload"></i>
                                    </span>
                                    <span class="text">Registrar producto</span>
                                </button>
                            </div>
                        </form>

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