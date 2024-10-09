<!DOCTYPE html>
<html>
	<head lang="es">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<link href="img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
		<link href="img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
		<link href="img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
		<link href="img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
		<link href="img/favicon.png" rel="icon" type="image/png">
		<link href="img/favicon.ico" rel="shortcut icon">
		<link rel="stylesheet" href="public/css/separate/vendor/fancybox.min.css">
		<link rel="stylesheet" href="public/css/separate/pages/activity.min.css">
		<link rel="stylesheet" href="public/css/lib/summernote/summernote.css"/>
		<link rel="stylesheet" href="public/css/separate/pages/editor.min.css">
		<link rel="stylesheet" href="public/css/lib/font-awesome/font-awesome.min.css">
		<link rel="stylesheet" href="public/css/lib/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="public/css/lib/bootstrap-sweetalert/sweetalert.css">
		<link rel="stylesheet" href="public/css/separate/vendor/sweet-alert-animations.min.css">
		<link rel="stylesheet" href="public/css/lib/datatables-net/datatables.min.css">
		<link rel="stylesheet" href="public/css/separate/vendor/datatables-net.min.css">
		<link rel="stylesheet" href="public/css/separate/vendor/select2.min.css">
		<link rel="stylesheet" href="public/css/main.css">
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
		<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8149394496969240"
         crossorigin="anonymous"></script>
		<title>Inversiones</title>
	</head>

	<body class="with-side-menu">
		<header class="site-header">
			<div class="container-fluid">
				<button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
					<span>toggle menu</span>
				</button>
				<button class="hamburger hamburger--htla">
					<span>toggle menu</span>
				</button>

				<div class="site-header-content">
					<div class="site-header-content-in">
						<div class="site-header-shown">
							<div class="dropdown user-menu">
								<button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<img src="public/img/1.ico" alt="">
								</button>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
									<a class="dropdown-item" href="view/Login/Login.php"><span class="font-icon glyphicon glyphicon-user"></span>Iniciar Sesión</a>
								</div>
							</div>
						</div>
						<div class="mobile-menu-right-overlay"></div>
						<div class="dropdown dropdown-typical">
						<button type="button" name="action" id="btnContactanos" class="btn btn-inline btn-warning"> Contáctanos</button>
						</div>
					</div>
				</div>
			</div>
		</header>
		
    	<div class="mobile-menu-left-overlay"></div>
    
		<!-- Contenido -->
		<div class="page-content">
			<div class="container-fluid">

			<section class="card">
					<header class="card-header text-center" role="alert" style="background-color: #079651; color: white;" id="ContadorGeneral" name="ContadorGeneral" >
					</header>
					<div class="card-block">


			<div class="col-xl-12">
                <div class="row">
                    <div class="col-sm-3">
						<div class="card" style="width: 18rem;">
							<div class="embed-responsive embed-responsive-16by9">
								<video id="videoElement" class="embed-responsive-item" controls>
									<source src="public/video/1_intro_ews.mp4" type="video/mp4">
								</video>
                			</div>
							<a href="#">Introducción de la Plataforma de Apuestas Diarias <strong>ews-analisis.com.mx/</strong></a>
						</div>
					</div>

					<div class="col-sm-3">
						<div class="card" style="width: 18rem;">
							<div class="embed-responsive embed-responsive-16by9">
								<video id="videoElement" class="embed-responsive-item" controls>
									<source src="public/video/2_Recorrido_EWinScore.mp4" type="video/mp4">
								</video>
							</div>
							<a href="#">Conoce la Plataforma <strong>EWinScore</strong></a>
						</div>
					</div>

					<div class="col-sm-3">
						<div class="card" style="width: 18rem;">
								<div class="embed-responsive embed-responsive-16by9">
									<video id="videoElement" class="embed-responsive-item" controls>
										<source src="public/video/Bienvenida_a_EWinScore.mp4" type="video/mp4">
									</video>
								</div>
								<a href="#">Bienvenido a <strong>EWinScore</strong></a>
						</div>
					</div>

					<div class="col-sm-3">
					<div class="card" style="width: 18rem;">
							<div class="embed-responsive embed-responsive-16by9">
								<video id="videoElement" class="embed-responsive-item" controls>
									<source src="public/video/3_recargar_EwinScore.mp4" type="video/mp4">
								</video>
                			</div>
							<a href="#"> Como hacer una recarga a la plataforma <strong>EWinScore</strong></a>
						</div>
					</div>
				</div>
			</div>
			</div>
			</div>


					<form method="POST">
						<div class="box-typical box-typical-padding">
							<div class="form-group">
								<label class="form-label" for="usu_nom">Inversión Inicial (MXN):</label>
								<input type="number" class="form-control" id="Inversion" name="Inversión_Inicial" placeholder="Introduce el valor de la iniversión inicial" required>
							</div>
							<div class="form-group">
								<label class="form-label" for="usu_nom">Porcentaje de Ganancia (%):</label>
								<input type="number" class="form-control" id="Porcentaje_de_Ganancia" name="Porcentaje_de_Ganancia" value="0.65" readonly>
							</div>
							<div class="form-group">
								<label class="form-label" for="usu_nom">Día de Retiro:</label>
								<input type="number" class="form-control" id="diaRetiro" name="Día_de_Retiro" placeholder="Introduce el día de retiro" required>
							</div>
							<div class="form-group">
							<button type="button" name="action" id="Calcular" value="add" class="btn btn-rounded btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Calcular</button>
							</div>
							</form>
							<table id="usuario_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
								<thead>
									<tr>
										<th class="d-none d-sm-table-cell" style="width: 3%;">Día</th>
										<th class="d-none d-sm-table-cell" style="width: 3%;">Fecha</th>
										<th class="d-none d-sm-table-cell" style="width: 3%;">Ganancia 1ra Apuesta (MXN)</th>
										<th class="d-none d-sm-table-cell" style="width: 3%;">Saldo 1ra Apuesta (MXN)</th>
										<th class="d-none d-sm-table-cell" style="width: 3%;">Ganancia 2da Apuesta (MXN)</th>
										<th class="d-none d-sm-table-cell" style="width: 3%;">Saldo 2da Apuesta (MXN)</th>
										<th class="d-none d-sm-table-cell" style="width: 3%;">Ganancia 3ra Apuesta (MXN)</th>
										<th class="d-none d-sm-table-cell" style="width: 3%;">Saldo 3ra Apuesta (MXN)</th>
										<th class="d-none d-sm-table-cell" style="width: 3%;">Ganancia del día (MXN)</th>
										<th class="d-none d-sm-table-cell" style="width: 3%;">Saldo del día (MXN)</th>
										<th class="d-none d-sm-table-cell" style="width: 3%;">Comisión por Retiro 5% (MXN)</th>
										<th class="d-none d-sm-table-cell" style="width: 3%;">Cantidad Libre de comisiones a retirar</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
						<div class="card">
							<div class="card-body">
							<h5 class="alert alert-success text-center" role="alert"> Estadísticas Diarias de Inversión</h5>
								<canvas id="investmentChart"></canvas>
							</div>
						</div>
						</div>
					</div>
					</div>
				</div>
			</section>
		</div>
	</div>


	<nav class="side-menu">
	<button type="button" name="action" id="btnRegistrarse" class="btn btn-inline btn-success"> Registrarse</button>
	<button type="button" name="action" id="btnContactanos" class="btn btn-inline btn-success"> Registrarse EWinScore</button>
	<button type="button" name="action" id="btnContactanos" class="btn btn-inline btn-success"> Solicita Bono $48 MX</button>
	</nav>
	

	<?php require_once("modalIndex.php");?>
	<?php require_once("modalContactanos.php");?>
	<?php require_once("view/Registro/modalRegistrarse.php");?>
	<!-- Contenido -->
	<script src="public/js/lib/jquery/jquery.min.js"></script>
	<script src="public/js/lib/tether/tether.min.js"></script>
	<script src="public/js/lib/bootstrap/bootstrap.min.js"></script>
	<script src="public/js/plugins.js"></script>
	<script src="public/js/app.js"></script>
	<script src="public/js/lib/datatables-net/datatables.min.js"></script>
	<script src="public/js/lib/bootstrap-sweetalert/sweetalert.min.js"></script>
	<script src="public/js/lib/summernote/summernote.min.js"></script>
	<script src="public/js/lib/fancybox/jquery.fancybox.pack.js"></script>
	<script src="public/js/summernote-ES.js"></script>
	<script src="public/js/lib/select2/select2.full.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script type="text/javascript" src="indexx.js"></script>
</body>
</html>