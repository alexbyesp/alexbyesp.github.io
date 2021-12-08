<?php

    require 'connect_bd.php';

    $categoria_id = $_POST['categoria_id'];

    $delete = mysqli_query($conexion, "DELETE FROM tai_prod_categoria 
    WHERE categoria_id = '" . $categoria_id . "'");
    
    if ($delete) {
        bien();
    } else {
        error_consulta();
    }
?>

<?php
    function bien()
    {
        header("location:../admin_table_prod_cat.php?error=h");
    }
    function error_consulta()
    {
        header("location:../admin_table_prod_cat.php?error=d");
    }
?>