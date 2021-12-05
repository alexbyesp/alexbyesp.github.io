<?php
    session_start();
    require 'connec_bd.php';

    $producto_id = $_POST['producto_id'];
    $producto_nombre = $_POST['producto_nombre'];
    $producto_precio = $_POST['producto_precio'];
    $producto_SKU = $_POST['producto_SKU'];
    $producto_descrip = $_POST['producto_descrip'];
    $producto_stock = $_POST['producto_stock'];
    $categoria_nombre = $_POST['categoria_nombre'];
    $material_nombre = $_POST['material_nombre'];
    $img_nombre = $_POST['img_nombre'];

    $update = mysqli_query($conexion, "UPDATE tai_producto SET producto_nombre = '" . $producto_nombre ."',
    producto_precio = '" . $producto_precio ."',
    producto_SKU = '" . $producto_SKU ."',
    producto_descrip = '" . $producto_descrip ."',
    producto_stock = '" . $producto_stock ."',
    producto_categoria_id = (SELECT categoria_id FROM tai_prod_categoria WHERE categoria_nombre = '" . $categoria_nombre ."')
    WHERE producto_id = '" . $producto_id ."'");

    if($update){
        bien();
        $updateimg = mysqli_query($conexion, "UPDATE tai_prod_images SET img_nombre = '" . $img_nombre ."' WHERE img_producto_id = '" . $producto_id ."'");
        $sql = mysqli_query($conexion, "UPDATE tai_prod_mat_rel SET rel_mat_id = (SELECT material_id FROM tai_prod_materiales WHERE material_nombre = '" . $material_nombre ."')");
    }else{
        error_consulta();
    }
?>
<?php
    function bien()
    {
        header("location:../art_table_produ.php?error=e");
    } 
    function error_consulta()
    {
        header("location:../art_table_produ.php?error=g");
    }  
?>