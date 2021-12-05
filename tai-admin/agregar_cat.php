<?php 
 	include 'conexion_cat.php';
 	$cat_name=$_POST['cat_name'];
    $id=10;
 	$cat_des=$_POST['cat_des'];
 	$sql="INSERT INTO tai_prod_categoria (categoria_id,categoria_nombre, categoria_desc) VALUES ('$id','$cat_name','$cat_des')";
 	$resultado=mysqli_query($conexion,$sql);
 	if ($resultado) {
			echo "funciono";
		}else{
			echo "error";
		}
  ?>