<?php
    session_start();
    require 'connec_bd.php';

    $artesano_email = $_POST['artesano_email'];
    $artesano_pass = $_POST['artesano_pass'];

    $login = mysqli_query($conexion, "SELECT * FROM tai_artesano WHERE artesano_email = '$artesano_email' AND artesano_pass = '$artesano_pass'");
    $num_login = mysqli_num_rows($login);
    if ($num_login == 0) {
        echo'<script type="text/javascript">alert("¡USUARIO O CONTRASEÑA INCORRECTA!");window.location.href="../index.php";</script>';
    } else {
        $row_usuario = mysqli_fetch_assoc($login);
        $_SESSION['artesano_id'] = $row_usuario['artesano_id'];
        $_SESSION['artesano_nombre'] = $row_usuario['artesano_nombre'];
        header('location: ../art_home.php');
    }
?>