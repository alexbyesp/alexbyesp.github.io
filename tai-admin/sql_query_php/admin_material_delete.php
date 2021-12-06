<?php

    require 'connect_bd.php';

    $material_id = $_POST['material_id'];

    $delete = mysqli_query($conexion, "DELETE FROM tai_prod_materiales 
    WHERE material_id = '" . $material_id . "'");
    
    if ($delete) {
        bien();
    } else {
        error_consulta();
    }
?>

<?php
    function bien()
    {
        header("location:../admin_table_prod_mat.php?error=h");
    }
    function error_consulta()
    {
        header("location:../admin_table_prod_mat.php?error=d");
    }
?>