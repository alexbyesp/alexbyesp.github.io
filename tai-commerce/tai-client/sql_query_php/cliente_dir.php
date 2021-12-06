<?php

    include "connec_bd.php";

    $direc_cli_calle = $_POST ['direc_cli_calle'];
    $direc_cli_numext = $_POST ['direc_cli_numext'];
    $direc_cli_numint = $_POST ['direc_cli_numint'];
    $direc_cli_colonia = $_POST ['direc_cli_colonia'];
    $direc_cli_referencia = $_POST ['direc_cli_referencia'];
   
    $sql = "INSERT INTO tai_cliente_direc (`direc_cli_calle`, `direc_cli_numext`, `direc_cli_numint`, `direc_cli_colonia`, `direc_cli_referencia`)
        VALUE ('$direc_cli_calle', '$direc_cli_numext', '$direc_cli_numint', '$direc_cli_colonia', '$direc_cli_referencia')";

    

        $consulta = mysqli_query($conexion, $sql);

		if ($consulta == FALSE) {
			echo "<script type='text/javascript'> alert('No se registro su dirección');
					window.location.href=' ../cliente_home.php';					
					</script>";
		}
		else{
			echo "<script type='text/javascript'> alert('Dirección agregada correctamente');
					window.location.href='../cliente_home2.php';					
					</script>";
		}
		mysqli_close($conexion);

?>