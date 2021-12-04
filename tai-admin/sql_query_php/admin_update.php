<?php
    session_start();
    require 'connect_bd.php';

    $admin_nombre = $_POST['admin_nombre'];
    $admin_apellidos = $_POST['admin_apellidos'];
    $admin_telefono = $_POST['admin_telefono'];

    #PARA SUBIR IMÁGENES

    if($_FILES['admin_img']['name'] == ''){
        $update = mysqli_query($conexion, "UPDATE tai_admin SET 
            admin_nombre = '" . $admin_nombre . "', 
            admin_apellidos = '" . $admin_apellidos . "', 
            admin_telefono = '" . $admin_telefono . "'
        WHERE admin_id = '" . $_SESSION['admin_id'] . "'");
    }else{
        #ELIMINAR FOTO ANTERIOR
        $consulta = mysqli_query($conexion, "SELECT admin_img FROM tai_admin WHERE admin_id = '" . $_SESSION['admin_id'] . "'");
        $row_datos = mysqli_fetch_assoc($consulta);
        unlink($row_datos['admin_img']);

        #INSERTAR NUEVOS DATOS

        $admin_img = $_FILES['admin_img']['name'];
        $extension = end(explode(".", $admin_img));
        $newfilename = $_SESSION['admin_id'] . "_" . $_SESSION['admin_nombre'] . "." . $extension;
        $admin_img_temporal = $_FILES['admin_img']['tmp_name'];
        $carpeta = '../img/img_perfil';
        $ruta = $carpeta . '/' . $newfilename;
        move_uploaded_file($admin_img_temporal, $carpeta . '/' . $newfilename);

        $update = mysqli_query($conexion, "UPDATE tai_admin SET 
                admin_nombre = '" . $admin_nombre . "', 
                admin_apellidos = '" . $admin_apellidos . "', 
                admin_telefono = '" . $admin_telefono . "',
                admin_img = '" . $ruta . "'
            WHERE admin_id = '" . $_SESSION['admin_id'] . "'");
    }

    $_SESSION['admin_nombre'] = $admin_nombre;

    if ($update) {
        bien();
    } else {
        error_consulta();
    }
?>

<?php
    function bien()
    {
        header("location:../admin_perfil.php?error=e");
    }
    function error_consulta()
    {
        header("location:../admin_perfil.php?error=g");
    }
?>