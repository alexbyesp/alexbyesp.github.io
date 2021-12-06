<?php

    require 'connect_bd.php';

    $material_nombre = $_POST['material_nombre'];
    $material_descrip = $_POST['material_descrip'];

    #AJUSTAR AUTOINCREMENTABLE PARA QUE NO SE BRINQUE IDES

    $contar_ids = mysqli_query($conexion, "SELECT MAX(material_id) + 1 FROM tai_prod_materiales");
    $row_id = mysqli_fetch_array($contar_ids);

    #INSERTAR DATOS

    $insert = mysqli_query($conexion, "INSERT INTO tai_prod_materiales 
        VALUES ('" . $row_id[0] . "','" . $material_nombre . "','" . $material_descrip . "')");
    
    if ($insert) {
        bien();
    } else {
        error_consulta();
    }
?>

<?php
    function bien()
    {
        header("location:../admin_table_prod_mat.php?error=s");
    }
    function error_consulta()
    {
        header("location:../admin_table_prod_mat.php?error=c");
    }
?>