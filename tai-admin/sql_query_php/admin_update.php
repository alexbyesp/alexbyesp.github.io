<?php
    session_start();
    require 'connect_bd.php';

    $admin_nombre = $_POST['admin_nombre'];
    $admin_apellidos = $_POST['admin_apellidos'];
    $admin_telefono = $_POST['admin_telefono'];

    $update = mysqli_query($conexion, "UPDATE tai_admin SET 
        admin_nombre = '" . $admin_nombre ."', 
        admin_apellidos = '" . $admin_apellidos . "', 
        admin_telefono = '" . $admin_telefono . "' 
    WHERE admin_id = '" . $_SESSION['admin_id'] . "'");

    if($update){
        bien();
    }else{
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