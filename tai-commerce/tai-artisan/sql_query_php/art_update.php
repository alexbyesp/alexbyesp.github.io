<?php

    session_start();
    require 'connec_bd.php';

    $artesano_nombre = $_POST['artesano_nombre'];
    $artesano_apellidos = $_POST['artesano_apellidos'];
    $artesano_telefono = $_POST['artesano_telefono'];
    $artesano_email = $_POST['artesano_email'];
    $artesano_dir_calle = $_POST['artesano_dir_calle'];
    $artesano_dir_numext = $_POST['artesano_dir_numext'];
    $artesano_dir_numint = $_POST['artesano_dir_numint'];
    $artesano_dir_colonia = $_POST['artesano_dir_colonia'];
    $artesano_dir_minicipio = $_POST['artesano_dir_minicipio'];
    $artesano_dir_estado = $_POST['artesano_dir_estado'];
    $artesano_dir_ref = $_POST['artesano_dir_ref'];
    $artesano_img = $_POST['artesano_img'];


    $update = mysqli_query($conexion, "UPDATE tai_artesano SET artesano_nombre = '" . $artesano_nombre ."',
    artesano_apellidos = '" . $artesano_apellidos ."',
    artesano_telefono = '" . $artesano_telefono ."',
    artesano_email = '" . $artesano_email ."',
    artesano_img = '" . $artesano_img ."',
    artesano_dir_calle = '" . $artesano_dir_calle ."',
    artesano_dir_numext = '" . $artesano_dir_numext ."',
    artesano_dir_numint = '" . $artesano_dir_numint ."',
    artesano_dir_colonia = (SELECT colonia_id FROM dir_colonias WHERE colonia_muni_id = (SELECT municipio_id FROM dir_municipios WHERE municipio_nombre = '" . $artesano_dir_minicipio ."' AND municipio_estado_id = (SELECT estado_id FROM dir_estados WHERE estado_nombre = '" . $artesano_dir_estado ."')) AND colonia_nombre = '" . $artesano_dir_colonia ."'),
    artesano_dir_ref = '" . $artesano_dir_ref ."'
    WHERE artesano_id = '" . $_SESSION['artesano_id'] ."'");

    if($update){
        bien();
    }else{
        error_consulta();
    }
?>

<?php
    function bien()
    {
        header("location:../art_home.php?error=e");
    } 
    function error_consulta()
    {
        header("location:../art_home.php?error=g");
    }  
?>