<?php
include 'conexion_cat.php';
$id=$_POST['id'];
$name=$_POST['cat_name'];
$desc=$_POST['cat_des'];

       $query="UPDATE tai_prod_categoria SET categoria_nombre='$name', categoria_desc='$desc' WHERE categoria_id='$id'";
$s=mysqli_query($conexion,$query);
if ($s) {
			echo "funciono";
		}else{
			echo "error";
		}
?>