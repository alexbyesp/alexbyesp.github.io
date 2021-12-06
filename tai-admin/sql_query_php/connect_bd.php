<?php
    $servidor = "localhost";
    $usuario = "root";
    $contrasena = "";
    $bd = "tai_commerce";
    $conexion = mysqli_connect($servidor,$usuario,$contrasena,$bd);
    if($conexion){
        #echo "Conexión Establecida Correctamente";
    }else{
        echo mysqli_connect_error();
    }
?>