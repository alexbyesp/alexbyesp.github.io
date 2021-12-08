<!DOCTYPE HTML>
<html lang="es">

<!-- Mirrored from bootstrap-ecommerce.com/bootstrap-ecommerce-html/page-index-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Oct 2021 02:56:45 GMT -->

<head>
	<meta charset="utf-8">
	<meta http-equiv="pragma" content="no-cache" />
	<meta http-equiv="cache-control" content="max-age=604800" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>TAI</title>
	<link href="images/ICONO-TAI.png" rel="shortcut icon" type="image/x-icon">

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

		<nav class="navbar navbar-dark navbar-expand p-0 bg-primary">
			<div class="container">
				<ul class="navbar-nav d-none d-md-flex mr-auto">
					<li class="nav-item"><a class="nav-link" style="color:white">TAI: Artesanías al alcance de un CLICK</a></li>
				</ul>
				<ul class="navbar-nav">
					<li class="nav-item"><a class="nav-link" style="color:white">¿Eres artesano y te gustaría pertenecer a TAI?</a></li>
					<li class="nav-item dropdown">
						<button type="button" class="btn btn-secondary"><a href="" style="color:white">Ir a Módulo de Artesano</a></button>
					</li>
				</ul> <!-- list-inline //  -->
			</div> <!-- navbar-collapse .// -->

		</nav> <!-- header-top-light.// -->

		<section class="header-main border-bottom">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-2 col-6">
						<a href="index.php" class="brand-wrap">
							<img class="logo" src="images/TAI_LOGO.png">
						</a> <!-- brand-wrap.// -->
					</div>
					<div class="col-lg-6 col-12 col-sm-12">
						<form action="#" class="search">
							<div class="input-group w-100">
								<input type="text" class="form-control" placeholder="Buscar...">
								<div class="input-group-append">
									<button class="btn btn-primary" type="submit">
										<i class="fa fa-search"></i>
									</button>
								</div>
							</div>
						</form> <!-- search-wrap .end// -->
					</div> <!-- col.// -->
					<div class="col-lg-4 col-sm-6 col-12">
						<div class="widgets-wrap float-md-right">
							<div class="widget-header  mr-3">
								<a href="#" class="icon icon-sm rounded-circle border"><i class="fa fa-shopping-cart"></i></a>
								<span class="badge badge-pill badge-danger notify">0</span>
							</div>
							<div class="widget-header icontext">
								<a href="#" class="icon icon-sm rounded-circle border"><i class="fa fa-user"></i></a>
								<div class="text">
									<span class="text-muted">¡Bienvenido!</span>
									<div>
										<a href="cliente-login.php">Ingresar</a> |
										<a href="#">Regístrate</a>
									</div>
								</div>
							</div>
						</div> <!-- widgets-wrap.// -->
					</div> <!-- col.// -->
				</div> <!-- row.// -->
			</div> <!-- container.// -->
		</section> <!-- header-main .// -->
	</header> <!-- section-header.// -->

	<nav class="navbar navbar-main navbar-expand-lg navbar-light border-bottom">
		<div class="container">
			<?php
			require 'sql_query_php/connect_bd.php';
			$categorias = mysqli_query($conexion, "SELECT * FROM tai_prod_categoria");
			?>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="main_nav">
				<ul class="navbar-nav">
					<?php
					while ($row_cat = mysqli_fetch_array($categorias)) {
					?>
						<li class="nav-item">
							<form action="" method="POST">
								<input type="hidden" name="categoria_id" value="<?php echo $row_cat[0]; ?>">
								<button type="submit" class="nav-link">
									<span class="text"><?php echo $row_cat[1]; ?></span>
								</button>
							</form>
						</li>
					<?php
					}
					?>
				</ul>
			</div> <!-- collapse .// -->
		</div> <!-- container .// -->
	</nav>

	</header> <!-- section-header.// -->



	<!-- ========================= SECTION INTRO ========================= -->
	<section class="section-intro padding-y-sm">
		<div class="container">

			<div class="intro-banner-wrap">
				<img src="images/banners/banner2.png" class="img-fluid rounded">
			</div>

		</div> <!-- container //  -->
	</section>
	<!-- ========================= SECTION INTRO END// ========================= -->

	<!-- ========================= SECTION CONTENT ========================= -->
	<section class="section-content padding-bottom-sm">
		<div class="container">

			<header class="section-heading">
				<a href="#" class="btn btn-outline-primary float-right">Ver Todo</a>
				<h3 class="section-title">Productos Recomendados</h3>
			</header><!-- sect-heading -->

			<div class="row">
				<div class="col-md-3">
					<div href="#" class="card card-product-grid">
						<a href="#" class="img-wrap"> <img src="images/items/1.jpg"> </a>
						<figcaption class="info-wrap">
							<a href="#" class="title">Just another product name</a>
							<div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
						</figcaption>
					</div>
				</div> <!-- col.// -->
				<div class="col-md-3">
					<div href="#" class="card card-product-grid">
						<a href="#" class="img-wrap"> <img src="images/items/2.jpg"> </a>
						<figcaption class="info-wrap">
							<a href="#" class="title">Some item name here</a>
							<div class="price mt-1">$280.00</div> <!-- price-wrap.// -->
						</figcaption>
					</div>
				</div> <!-- col.// -->
				<div class="col-md-3">
					<div href="#" class="card card-product-grid">
						<a href="#" class="img-wrap"> <img src="images/items/3.jpg"> </a>
						<figcaption class="info-wrap">
							<a href="#" class="title">Great product name here</a>
							<div class="price mt-1">$56.00</div> <!-- price-wrap.// -->
						</figcaption>
					</div>
				</div> <!-- col.// -->
				<div class="col-md-3">
					<div href="#" class="card card-product-grid">
						<a href="#" class="img-wrap"> <img src="images/items/4.jpg"> </a>
						<figcaption class="info-wrap">
							<a href="#" class="title">Just another product name</a>
							<div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
						</figcaption>
					</div>
				</div> <!-- col.// -->
			</div> <!-- row.// -->

		</div> <!-- container .//  -->
	</section>
	<!-- ========================= SECTION CONTENT END// ========================= -->

	<!-- ========================= FOOTER ========================= -->
	<footer class="section-footer border-top bg">
		<div class="container">
			<section class="footer-top  padding-y">
				<div class="row">
					<aside class="col-md col-6">
						<h6 class="title">Compañia: TAI</h6>
						<ul class="list-unstyled">
							<li> <a href="#">Acerca de Nosotros</a></li>
							<li> <a href="#">¿Dónde nos puedes encontrar?</a></li>
							<li> <a href="#">Términos y Condiciones</a></li>
						</ul>
					</aside>
					<aside class="col-md col-6">
						<h6 class="title">Ayuda</h6>
						<ul class="list-unstyled">
							<li> <a href="#">Contáctanos</a></li>
							<li> <a href="#">¿Cómo comprar?</a></li>
							<li> <a href="#">¿Cómo saber el estatus de mi orden?</a></li>
						</ul>
					</aside>
					<aside class="col-md">
						<h6 class="title">Redes Sociales</h6>
						<ul class="list-unstyled">
							<li><a href="#"> <i class="fab fa-facebook"></i> Facebook </a></li>
							<li><a href="#"> <i class="fab fa-twitter"></i> Twitter </a></li>
							<li><a href="#"> <i class="fab fa-instagram"></i> Instagram </a></li>
							<li><a href="#"> <i class="fab fa-youtube"></i> Youtube </a></li>
						</ul>
					</aside>
				</div> <!-- row.// -->
			</section> <!-- footer-top.// -->

			<section class="footer-bottom row">
				<div class="col-md-2">
					<p class="text-muted"> &copy 2021 TAI </p>
				</div>
				<div class="col-md-8 text-md-center">
					<span class="px-2">tai.commerce.store@gmail.com</span>
					<span class="px-2">+52 772 117 9361</span>
					<span class="px-2">Ixmiquilpan-Actopan Carretera Ixmiquilpan-Capula, Km. 4, Nith, 42300 Ixmiquilpan, Hgo.</span>
				</div>
			</section>
		</div><!-- //container -->
	</footer>
	<!-- ========================= FOOTER END // ========================= -->


</body>

</html>