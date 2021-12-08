<?php

    require 'connect_bd.php';

    $material_id = $_POST['material_id'];
    $material_nombre = $_POST['material_nombre'];
    $material_descrip = $_POST['material_descrip'];

    $update = mysqli_query($conexion, "UPDATE tai_prod_materiales SET
        material_nombre = '" . $material_nombre . "',
        material_descrip = '" . $material_descrip . "'
    WHERE material_id = '" . $material_id . "'");
    
    if ($update) {
        bien();
    } else {
        error_consulta();
    }
?>

<?php
    function bien()
    {
        header("location:../admin_table_prod_mat.php?error=e");
    }
    function error_consulta()
    {
        header("location:../admin_table_prod_mat.php?error=g");
    }
?>