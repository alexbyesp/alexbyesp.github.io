<!DOCTYPE HTML>
<html lang="es">
<head>
	<link href="images/ICONO-TAI.png" rel="shortcut icon" type="image/x-icon">
	<meta charset="utf-8">
	<meta http-equiv="pragma" content="no-cache" />
	<meta http-equiv="cache-control" content="max-age=604800" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Inicio de Sesión: TAI</title>

	<link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">

	<!-- jQuery -->
	<script src="js/jquery-2.0.0.min.js" type="text/javascript"></script>

	<!-- Bootstrap4 files-->
	<script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />

	<!-- Font awesome 5 -->
	<link href="fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">

	<!-- custom style -->
	<link href="css/ui.css" rel="stylesheet" type="text/css" />
	<link href="css/responsive.css" rel="stylesheet" media="only screen and (max-width: 1200px)" />

	<!-- custom javascript -->
	<script src="js/script.js" type="text/javascript"></script>
</head>

<body>
	<header class="section-header">
		<section class="header-main border-bottom">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-2 col-4">
						<a href="index.php" class="brand-wrap">
							<img class="logo" src="images/TAI_LOGO.png">
						</a> <!-- brand-wrap.// -->
					</div>
					</div> <!-- col.// -->
				</div> <!-- row.// -->
			</div> <!-- container.// -->
		</section> <!-- header-main .// -->
	</header> <!-- section-header.// -->
	
		<!-- ============================ COMPONENT LOGIN   ================================= -->
		<div class="card mx-auto" style="max-width: 380px; margin-top:100px;">
			<div class="card-body">
				<h4 class="card-title mb-4">Inicio de Sesión</h4>
				<form>
					<div class="form-group">
						<input name="cliente_email" class="form-control" placeholder="Correo Electrónico" type="email">
					</div> <!-- form-group// -->
					<div class="form-group">
						<input name="cliente_pass" class="form-control" placeholder="Contraseña" type="password">
					</div> <!-- form-group// -->

					<div class="form-group">
						<a href="#" class="float-right">¿Olvidaste tu Contraseña?</a>
					</div> <!-- form-group form-check .// -->
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Entrar</button>
					</div> <!-- form-group// -->
				</form>
			</div> <!-- card-body.// -->
		</div> <!-- card .// -->

		<p class="text-center mt-4">¿No tienes una cuenta? <a href="#">Regístrate</a></p> <br><br><br>
		<!-- ============================ COMPONENT LOGIN  END.// ================================= -->

	<!-- ========================= FOOTER ========================= -->
	<footer class="section-footer border-top padding-y">
		<div class="container">
			<p class="float-md-right">
				&copy 2021 TAI
			</p>
			<p>
				<a href="#">Términos y Condiciones</a>
			</p>
		</div><!-- //container -->
	</footer>

</body>
</html>