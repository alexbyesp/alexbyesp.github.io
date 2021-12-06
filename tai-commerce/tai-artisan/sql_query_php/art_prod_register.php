<?php
    session_start();
    require 'connec_bd.php';

    $producto_nombre = $_POST['producto_nombre'];
    $producto_precio = $_POST['producto_precio'];
    $producto_SKU = $_POST['producto_SKU'];
    $producto_descrip = $_POST['producto_descrip'];
    $producto_stock = $_POST['producto_stock'];
    $categoria_nombre = $_POST['categoria_nombre'];
    $material_nombre = $_POST['material_nombre'];
    $img_nombre = $_POST['img_nombre'];
    
    $register = mysqli_query($conexion, "INSERT INTO `tai_producto`(`producto_nombre`, `producto_precio`, `producto_SKU`, `producto_descrip`, `producto_stock`, `producto_artesano_id`, `producto_categoria_id`) 
    VALUES ('$producto_nombre', '$producto_precio', '$producto_SKU', '$producto_descrip', '$producto_stock', '" . $_SESSION['artesano_id'] . "', 
    (SELECT categoria_id FROM tai_prod_categoria WHERE categoria_nombre = '$categoria_nombre')
    )");

    if($register){
        bien();
        $registroimg = mysqli_query($conexion, "INSERT INTO `tai_prod_images`(`img_nombre`, `img_producto_id`) VALUES ('$img_nombre', 
        (SELECT producto_id FROM tai_producto WHERE producto_nombre = '$producto_nombre')
        )");
        $sql = mysqli_query($conexion, "INSERT INTO `tai_prod_mat_rel`(`rel_prod_id`, `rel_mat_id`) VALUES (
            (SELECT producto_id FROM tai_producto WHERE producto_nombre = '$producto_nombre'),
            (SELECT material_id FROM tai_prod_materiales WHERE material_nombre = '$material_nombre')
            )");
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
