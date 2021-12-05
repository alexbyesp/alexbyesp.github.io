<?php
include 'conexion_cat.php';
$mate_id=$_POST['material_id'];
$mate_nom=$_POST['material_nombre'];
$mate_des=$_POST['material_descrip'];

       $query="UPDATE tai_prod_materiales SET material_nombre='$mate_nom', mate_des='$material_descrip' WHERE material_id='$id'";
$s=mysqli_query($conexion,$query);
if ($s) {
			echo "funciono";
		}else{
			echo "error";
		}
?>