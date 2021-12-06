<?php

    require 'connect_bd.php';

    $producto_id = $_POST['producto_id'];
    $producto_estatus = $_POST['producto_estatus'];

    $update = mysqli_query($conexion, "UPDATE tai_producto SET
        producto_estatus = '" . $producto_estatus . "'
    WHERE producto_id = '" . $producto_id . "'");
    
    if ($update) {
        bien();
    } else {
        error_consulta();
    }
?>

<?php
    function bien()
    {
        header("location:../admin_table_productos.php?error=e");
    }
    function error_consulta()
    {
        header("location:../admin_table_productos.php?error=g");
    }
?>