<?php
    session_start();
  
    unset($_SESSION['admin_id']);
    session_destroy();
    echo'<script type="text/javascript">alert("¡SALIENDO DEL SISTEMA!");</script>';
    header("Location:../index.php");
?>