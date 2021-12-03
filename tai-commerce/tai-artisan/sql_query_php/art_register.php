<?php

    $artesano_nombre = $_POST['artesano_nombre'];
    $artesano_apellidos = $_POST['artesano_apellidos'];
    $artesano_telefono = $_POST['artesano_telefono'];
    $artesano_email = $_POST['artesano_email'];
    $artesano_pass = $_POST['artesano_pass'];
    $artesano_pass_confirm = $_POST['artesano_pass_confirm'];
    $artesano_dir_calle = $_POST['artesano_dir_calle'];
    $artesano_dir_numext = $_POST['artesano_dir_numext'];
    $artesano_dir_numint = $_POST['artesano_dir_numint'];
    $artesano_dir_colonia = $_POST['artesano_dir_colonia'];
    $artesano_dir_minicipio = $_POST['artesano_dir_minicipio'];
    $artesano_dir_estado = $_POST['artesano_dir_estado'];
    $artesano_dir_ref = $_POST['artesano_dir_ref'];

    include("connec_bd.php");

    if ($artesano_pass === $artesano_pass_confirm){
        $sql = "INSERT INTO `tai_artesano`(`artesano_nombre`, `artesano_apellidos`, `artesano_telefono`, `artesano_email`, `artesano_pass`, `artesano_dir_calle`, `artesano_dir_numext`, `artesano_dir_numint`, `artesano_dir_colonia`, `artesano_dir_ref`)
        VALUE ('$artesano_nombre', '$artesano_apellidos', '$artesano_telefono', '$artesano_email', '$artesano_pass', '$artesano_dir_calle', '$artesano_dir_numext', '$artesano_dir_numint',
        (SELECT colonia_id FROM dir_colonias WHERE colonia_muni_id = (SELECT municipio_id FROM dir_municipios WHERE municipio_nombre = '$artesano_dir_minicipio' AND municipio_estado_id = (SELECT estado_id FROM dir_estados WHERE estado_nombre = '$artesano_dir_estado')) AND colonia_nombre = '$artesano_dir_colonia'),
        '$artesano_dir_ref')";


        $register = mysqli_query($conexion, $sql);
        if($registre){
            echo '<cript>alert("Usuario registrado correctamente");</script>';
            header('Location: ../art_registro.php');
        } else {
            echo'<script type="text/javascript">alert("Registrado con exito ¡Bienvenido!");window.location.href="../index.php";</script>';
        }
    } else {
        echo'<script type="text/javascript">alert("¡LAS CONTRASEÑAS NO COINCIDEN!");window.location.href="../art_registro.php";</script>';
    }
    
?>