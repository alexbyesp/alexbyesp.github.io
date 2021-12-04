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
                        <h1 class="h3 mb-2 text-gray-800">Mi pefil</h1>
                        <p class="mb-4">Mantén tus datos actualizados para que los usuarios puedan encontrarte.</p>
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
                        <form action="sql_query_php/art_update.php" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Foto de Perfil:</label>
                                    <div class="col-md-3 col-lg-3 " align="center"> 
										<div id="load_img">
											<img class="img-responsive" src="img/<?php echo $row_datos['artesano_img'];?>" alt="Foto de perfil" style="border-radius:150px;">
										</div>
									</div>
                                    <br>
                                    <input type="file" class="form-control-file" name="artesano_img">
                                </div>
                            </div>
                            <h6 class="h3 mb-2 text-gray-800">Datos personales</h6>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Nombre:</label>
                                    <input name="artesano_nombre" type="text" class="form-control" value="<?php echo $row_datos['artesano_nombre']; ?>" placeholder="Nombre del Administrador">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Apellidos:</label>
                                    <input name="artesano_apellidos" type="text" class="form-control" value="<?php echo $row_datos['artesano_apellidos']; ?>" placeholder="Apellidos del Administrador">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Teléfono:</label>
                                    <input name="artesano_telefono" type="text" class="form-control" value="<?php echo $row_datos['artesano_telefono']; ?>" placeholder="Nombre del Administrador">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Correo electrónico:</label>
                                    <input name="artesano_email" type="text" class="form-control" value="<?php echo $row_datos['artesano_email']; ?>" placeholder="Apellidos del Administrador">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Contraseña:</label>
                                    <input name="artesano_pass" type="password" class="form-control is-invalid" value="<?php echo $row_datos['artesano_pass']; ?>" readonly>
                                    <div class="invalid-feedback">
                                    Si necesitas cambiar tu contraseña <i>contacta al Administrador de Base de Datos (alexesparzalex@gmail.com)</i>.
                                    </div>
                                </div>
                            </div>
                            <h6 class="h3 mb-2 text-gray-800">Dirección</h6>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Calle:</label>
                                    <input name="artesano_dir_calle" type="text" class="form-control" value="<?php echo $row_datos['artesano_dir_calle']; ?>" placeholder="+52 (000) 000 0000">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Numero exterior:</label>
                                    <input name="artesano_dir_numext" type="text" class="form-control" value="<?php echo $row_datos['artesano_dir_numext']; ?>" placeholder="+52 (000) 000 0000">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Numero interior:</label>
                                    <input name="artesano_dir_numint" type="text" class="form-control" value="<?php echo $row_datos['artesano_dir_numint']; ?>" placeholder="+52 (000) 000 0000">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Colonia:</label>
                                    <input name="artesano_dir_colonia" type="text" class="form-control" value="<?php echo $row_datos2['colonia_nombre']; ?>" placeholder="+52 (000) 000 0000">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Municipio:</label>
                                    <input name="artesano_dir_minicipio" type="text" class="form-control" value="<?php echo $row_datos3['municipio_nombre']; ?>" placeholder="Nombre del Administrador">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Estado:</label>
                                    <input name="artesano_dir_estado" type="text" class="form-control" value="<?php echo $row_datos4['estado_nombre']; ?>" placeholder="Apellidos del Administrador">
                                </div>
                                
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Referencias:</label>
                                    <input name="artesano_dir_ref" type="text" class="form-control" value="<?php echo $row_datos['artesano_dir_ref']; ?>" placeholder="Apellidos del Administrador">
                                </div>
                            </div>
                            <div align="center">
                                <br><button type="submit" class="btn btn-warning btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                    <span class="text">Actualizar Datos</span>
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