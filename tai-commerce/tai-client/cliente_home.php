<!--
    Nombre: Página de Inicio de Sesión del clientes
    Programador: Emanuel
    Fecha: 04/12/2021
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['cliente_nombre']; ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="cliente_home.php">
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
                        <h1 class="h3 mb-2 text-gray-800">Mi pefil</h1>
                        <p class="mb-4">Completa los campos para completar tu perfil.</p>
                        <?php
                            include("sql_query_php/errores.php");
                        ?>
                        <?php
                            include 'sql_query_php/connec_bd.php';
                            $consulta = mysqli_query($conexion, "SELECT * FROM tai_cliente WHERE cliente_id = '" . $_SESSION['cliente_id'] . "'");
                            $row_datos = mysqli_fetch_assoc($consulta);
                        ?>

                        <form action="sql_query_php/art_update.php" method="POST">

                      
                            
                            <h6 class="h3 mb-2 text-gray-800">Datos personales</h6>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Nombre:</label>
                                    <input name="cliente_nombre" type="text" class="form-control" value="<?php echo $row_datos['cliente_nombre']; ?>" placeholder="Nombre del Administrador">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Apellidos:</label>
                                    <input name="cliente_apellidos" type="text" class="form-control" value="<?php echo $row_datos['cliente_apellidos']; ?>" placeholder="Apellidos del Administrador">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Teléfono:</label>
                                    <input name="cliente_telefono" type="text" class="form-control" value="<?php echo $row_datos['cliente_telefono']; ?>" placeholder="Nombre del Administrador">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Correo electrónico:</label>
                                    <input name="cliente_email" type="text" class="form-control" value="<?php echo $row_datos['cliente_email']; ?>" placeholder="Apellidos del Administrador">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Contraseña:</label>
                                    <input name="cliente_pass" type="password" class="form-control is-invalid" value="<?php echo $row_datos['cliente_pass']; ?>" readonly>
                                    <div class="invalid-feedback">
                                    Si necesitas cambiar tu contraseña <i>contacta al Administrador a la direccion de correo electronico (alexesparzalex@gmail.com)</i>.
                                    </div>
                                </div>
                            </div>
                    
                        </form>
                        <hr>
                        <p class="mb-4">Completa los campos para completar tu perfil.</p>
                        <hr>

                        <form action="sql_query_php/cliente_dir.php" method="POST">
                            <h6 class="h3 mb-2 text-gray-800">Dirección</h6>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Calle:</label>
                                    <input type="text" class="form-control form-control-user" name="direc_cli_calle">
                        
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Numero exterior:</label>
                                    <input type="text" class="form-control form-control-user" name="direc_cli_numext">
  
                                    
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Numero interior:</label>
                                    <input type="text" class="form-control form-control-user" name="direc_cli_numint">
                                    
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Colonia:</label>
                                  <!--  <input type="select" class="form-control form-control-user" name="direc_cli_colonia"> -->
                                    
                                    <select type="selected" name="colonia" class="form-control form-control-user" name="direc_cli_colonia">
                                    <option selected>Elige una opción</option>
                                    <option>Zona Centro</option>
                                    <option>Colonia del Rio</option>
                                    <option>Las Brisas</option>
                                    <option>Ramon Romo Franco</option>
                                    <option>San Cayetano</option>
                                    <option>Colinas de San Ignacio</option>
                                    <option>La Fundació</option>
                                    <option>Fundacion II</option>
                                    <option>Centro Cívico</option>
                                    <option>Caliss</option>
                                    <option>Industrial</option>
                                    <option>Residencial Cerrada del Parque</option>
                                    <option>Zona Industrial</option>
                                    <option>Burócrata</option>
                                    <option>Nacozari</option>
                                    <option>Libertad</option>
                                    <option>FOVISSSTE</option>
                                    <option>Zona Centra</option>
                                    <option>Palacio de Gobierno del Estado de Baja California</option>
                                    <option>Oficina Federal de Hacienda</option>
                                    <option>Ciudad del Cielo</option>
                                    <option>Colonia del Sol</option>
                                    <option>Lomas de Palmira</option>
                                    <option>Agustín Olachea</option>
                                    

                                    </select>

                                </div>
                
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Referencias:</label>
                                    <input type="text" class="form-control form-control-user" name="direc_cli_referencia">
                                   
                                </div>
                            </div>
                            <div align="center">
                                <br><button type="submit" class="btn btn-warning btn-icon-split">
                                    
                                    <span class="text">Guardar</span>
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
                        <span>Copyright &copy; TAI COMMERCE: Cliente <i>2021</i></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
</body>

</html>