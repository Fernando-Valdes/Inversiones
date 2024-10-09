<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["id"]))
  { 
?>
	<!DOCTYPE html>
	<html>
		<?php require_once("../MainHead/head.php");?>
		<title>Mis datos</title>
	</head>
	<body class="with-side-menu">

		<?php require_once("../MainHeader/header.php");?>

		<div class="mobile-menu-left-overlay"></div>
		
		<?php require_once("../MainNav/nav.php");?>

		<!-- Contenido -->
		<div class="page-content">
			<div class="container-fluid">
				<header class="section-header">
					<div class="tbl">
						<div class="tbl-row">
							<div class="tbl-cell">
								<h3>Mis enlaces</h3>
								<ol class="breadcrumb breadcrumb-simple">
									<li class="active">Registrados en la plataforma</li>
								</ol>
							</div>
						</div>
					</div>
				</header>

				<div class="box-typical box-typical-padding">
					<table id="usuario_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
						<thead>
							<tr>
								<th style="width: 10%;">Nombre de usuario</th>
								<th style="width: 15%;">correo</th>
								<th class="d-none d-sm-table-cell" style="width: 30%;">Enlace Ewinscore</th>
								<th class="d-none d-sm-table-cell" style="width: 30%;">Enlace Grupo WhatsApp</th>
								<th class="text-center" style="width: 5%;"></th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>

			</div>
		</div>
		<!-- Contenido -->

		<?php require_once("modalConfiguracion.php");?>

		<?php require_once("../MainJs/js.php");?>
		
		<script type="text/javascript" src="configuracion.js"></script>

	</body>
	</html>
	<?php
} else 
{
	$conexion = new Conectar(); // Crear una instancia de la clase Conectar
	header("Location:" . $conexion->ruta() . "index.php");
}
?>