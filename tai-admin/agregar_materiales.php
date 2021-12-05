<?php 
 	include 'conexion_materiales.php';
 	$mate_nom=$_POST['material_nombre'];
 	$mate_des=$_POST['material_descrip'];
 	$sql="INSERT INTO tai_prod_materiales (material_nombre, material_descrip) VALUES ('$mate_nom','$mate_des')";
 	$resultado=mysqli_query($conexion,$sql);
 	if ($resultado) {
			echo "funciono";
		}else{
			echo "error";
		}
  ?>