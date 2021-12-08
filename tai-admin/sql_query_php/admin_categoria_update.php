<?php

    require 'connect_bd.php';

    $categoria_id = $_POST['categoria_id'];
    $categoria_nombre = $_POST['categoria_nombre'];
    $categoria_desc = $_POST['categoria_desc'];

    $update = mysqli_query($conexion, "UPDATE tai_prod_categoria SET
        categoria_nombre = '" . $categoria_nombre . "',
        categoria_desc = '" . $categoria_desc . "'
    WHERE categoria_id = '" . $categoria_id . "'");
    
    if ($update) {
        bien();
    } else {
        error_consulta();
    }
?>

<?php
    function bien()
    {
        header("location:../admin_table_prod_cat.php?error=e");
    }
    function error_consulta()
    {
        header("location:../admin_table_prod_cat.php?error=g");
    }
?>