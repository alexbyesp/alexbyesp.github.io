<?php

    require 'connect_bd.php';

    $artesano_id = $_POST['artesano_id'];
    $artesano_estatus = $_POST['artesano_estatus'];

    $update = mysqli_query($conexion, "UPDATE tai_artesano SET
        artesano_estatus = '" . $artesano_estatus . "'
    WHERE artesano_id = '" . $artesano_id . "'");
    
    if ($update) {
        bien();
    } else {
        error_consulta();
    }
?>

<?php
    function bien()
    {
        header("location:../admin_table_artisan.php?error=e");
    }
    function error_consulta()
    {
        header("location:../admin_table_artisan.php?error=g");
    }
?>