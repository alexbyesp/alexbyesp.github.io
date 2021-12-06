<?php

    $cliente_nombre = $_POST['cliente_nombre'];
    $cliente_apellidos = $_POST['cliente_apellidos'];
    $cliente_telefono = $_POST['cliente_telefono'];
    $cliente_email = $_POST['cliente_email'];
    $cliente_pass = $_POST['cliente_pass'];
    $cliente_pass_confirm = $_POST['cliente_pass_confirm'];
  

    include("connec_bd.php");

    if ($cliente_pass === $cliente_pass_confirm){
        $sql = "INSERT INTO `tai_cliente`(`cliente_nombre`, `cliente_apellidos`, `cliente_telefono`, `cliente_email`, `cliente_pass`)
        VALUE ('$cliente_nombre', '$cliente_apellidos', '$cliente_telefono', '$cliente_email', '$cliente_pass', '$cliente_dir_calle')";


        $register = mysqli_query($conexion, $sql);
        if($registre){
            echo '<cript>alert("Usuario registrado correctamente");</script>';
            header('Location: ../cliente_registro.php');
        } else {
            echo'<script type="text/javascript">alert("Registrado con exito ¡Bienvenido!");window.location.href="../index.php";</script>';
        }
    } else {
        echo'<script type="text/javascript">alert("¡LAS CONTRASEÑAS NO COINCIDEN!");window.location.href="../cliente_registro.php";</script>';
    }
    
?>