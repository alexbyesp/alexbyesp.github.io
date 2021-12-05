<?php
    session_start();
    require 'connect_bd.php';
    

    $admin_email = $_POST['admin_email'];
    $admin_pass = $_POST['admin_pass'];

    $login = mysqli_query($conexion, "SELECT * FROM tai_admin WHERE admin_email = '$admin_email' AND admin_pass = '$admin_pass'");
    $num_login = mysqli_num_rows($login);
    if ($num_login == 0) {
        echo'<script type="text/javascript">alert("¡USUARIO O CONTRASEÑA INCORRECTA!");window.location.href="../index.php";</script>';
    } else {
        $row_usuario = mysqli_fetch_assoc($login);
        $_SESSION['admin_id'] = $row_usuario['admin_id'];
        $_SESSION['admin_nombre'] = $row_usuario['admin_nombre'];
        header('location:../admin_home.php');
    }
