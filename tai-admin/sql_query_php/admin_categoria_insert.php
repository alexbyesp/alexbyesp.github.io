<?php

    require 'connect_bd.php';

    $categoria_nombre = $_POST['categoria_nombre'];
    $categoria_desc = $_POST['categoria_desc'];

    #AJUSTAR AUTOINCREMENTABLE PARA QUE NO SE BRINQUE IDES

    $contar_ids = mysqli_query($conexion, "SELECT MAX(categoria_id) + 1 FROM tai_prod_categoria");
    $row_id = mysqli_fetch_array($contar_ids);

    #INSERTAR DATOS

    $insert = mysqli_query($conexion, "INSERT INTO tai_prod_categoria 
        VALUES ('" . $row_id[0] . "','" . $categoria_nombre . "','" . $categoria_desc . "')");
    
    if ($insert) {
        bien();
    } else {
        error_consulta();
    }
?>

<?php
    function bien()
    {
        header("location:../admin_table_prod_cat.php?error=s");
    }
    function error_consulta()
    {
        header("location:../admin_table_prod_cat.php?error=c");
    }
?>