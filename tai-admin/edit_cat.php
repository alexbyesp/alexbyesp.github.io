<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="css/sb-admin-2.css" rel="stylesheet">
<link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body>
	<center>
<div class="col-lg-6">
<br>
<br>
<br>

<?php
include 'conexion_cat.php';

$id=$_POST['id'];

        $sql="SELECT * FROM tai_prod_categoria where categoria_id='$id'";
 	    $resultado=mysqli_query($conexion,$sql);
 	    $row=mysqli_fetch_array($resultado);

?>
 
 <form class="user" action="editar_cat.php" method="post">
 	<input value="<?php echo $row[0];?>" name="id" type="hidden">

  <h1> Modificar Categoria</h1><br><br>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input value="<?php echo $row[1]?>" name ="cat_name" type="text" id="nombre"class="form-control form-control-user" 
                                            placeholder="Nombre">
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <input value="<?php echo $row[2]?>" name ="cat_des" type="text" id="descripcion" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Descripcion">
                                </div>
                                
                                </div>
                               
                                <hr>
                                    <button type="submit" class="btn btn-primary btn-icon-split" class="icon text-white-50">Anadir Categoria</button>
                            </form>
</body>
</div>
</center>

</html>