<?php
    session_start();
  
    unset($_SESSION['artesano_nombre']);
    session_destroy();
    echo'<script type="text/javascript">alert("¡Cerrando sesión!");</script>';
    header("Location:../index.php");
?>