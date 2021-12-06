<?php
    session_start();
    require 'connec_bd.php';

    $cliente_email = $_POST['cliente_email'];
    $cliente_pass = $_POST['cliente_pass'];

    $login = mysqli_query($conexion, "SELECT * FROM tai_cliente WHERE cliente_email = '$cliente_email' AND cliente_pass = '$cliente_pass'");
    $num_login = mysqli_num_rows($login);
    if ($num_login == 0) {
        echo'<script type="text/javascript">alert("¡USUARIO O CONTRASEÑA INCORRECTA!");window.location.href="../index.php";</script>';
    } else {
        $row_usuario = mysqli_fetch_assoc($login);
        $_SESSION['cliente_id'] = $row_usuario['cliente_id'];
        $_SESSION['cliente_nombre'] = $row_usuario['cliente_nombre'];
        header('location: ../cliente_home.php');
    }
?>