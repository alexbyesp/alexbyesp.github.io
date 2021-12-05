<!--
    Nombre: Página de Inicio de Sesión del Artesano
    Programador: Cristian Yavin Cortes Lugo
-->
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Panel de Control: Actualizar Productos</title>
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
                    <h1 class="h3 mb-2 text-gray-800">Actualiza tus productos</h1>
                    <p class="mb-4">Administra tus productos para ofrecer una mejor experiencia a tus clientes.</p>
                        <?php
                            include("sql_query_php/errores.php");
                        ?>
                        <?php
                            include 'sql_query_php/connec_bd.php';
                            $producto_id = $_POST['producto_id'];
                            $consulta = mysqli_query($conexion, "SELECT * FROM tai_producto WHERE producto_id = '$producto_id'");
                            $row_datos = mysqli_fetch_assoc($consulta);
                        ?>
                        <?php
                            $consulta2 = mysqli_query($conexion, "SELECT categoria_nombre FROM tai_prod_categoria WHERE categoria_id  = '" . $row_datos['producto_categoria_id'] . "'");
                            $row_datos2 = mysqli_fetch_assoc($consulta2);
                        ?>
                        <?php
                            $consulta3 = mysqli_query($conexion, "SELECT material_nombre FROM tai_prod_materiales WHERE material_id  = (SELECT rel_mat_id FROM tai_prod_mat_rel WHERE rel_prod_id = '$producto_id')");
                            $row_datos3 = mysqli_fetch_assoc($consulta3);
                        ?>
                        <?php
                            $consulta4 = mysqli_query($conexion, "SELECT img_nombre FROM tai_prod_images WHERE img_producto_id  = '$producto_id'");
                            $row_datos4 = mysqli_fetch_assoc($consulta4);
                        ?>
                        <form action="sql_query_php/art_producto_update.php" method="POST">
                        <label for="inputEmail4">ID producto</label>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input name="producto_id" type="text" class="form-control" value="<?php echo $row_datos['producto_id'];?>" placeholder="Nombre del producto" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input name="producto_nombre" type="text" class="form-control" value="<?php echo $row_datos['producto_nombre'];?>" placeholder="Nombre del producto">
                                </div>
                                <div class="form-group col-md-6">
                                    <input name="producto_precio" type="text" class="form-control" value="<?php echo $row_datos['producto_precio'];?>" placeholder="Precio del producto">
                                </div>
                                <div class="form-group col-md-6">
                                    <input name="producto_SKU" type="text" class="form-control" value="<?php echo $row_datos['producto_SKU'];?>" placeholder="Código de producto">
                                </div>
                                <div class="form-group col-md-6">
                                    <textarea name="producto_descrip" type="text" class="form-control" placeholder="Descripción del producto"><?php echo $row_datos['producto_descrip'];?></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <input name="producto_stock" type="text" class="form-control" value="<?php echo $row_datos['producto_stock'];?>" placeholder="Cantidad en inventario">
                                </div>
                                <div class="form-group col-md-6">
                                    <select name="categoria_nombre" class="form-control">
                                        <option><?php echo $row_datos2['categoria_nombre'];?></option>
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
                                        <option><?php echo $row_datos3['material_nombre'];?></option>
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
                                    <div class="col-md-3 col-lg-3 " align="center"> 
										<div id="load_img">
											<img class="img-responsive" src="img/<?php echo $row_datos4['img_nombre'];?>" alt="Foto de perfil" style="border-radius:150px;">
										</div>
									</div>
                                    <input type="file" class="form-control-file" name="img_nombre">
                                </div>
                            </div>
                            <div align="center">
                                <br><button type="submit" class="btn btn-warning btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                    <span class="text">Actualizar producto</span>
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