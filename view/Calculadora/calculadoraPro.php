<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["id"])){ 
?> 
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	<title>Inicio</title>
</head>
<body class="with-side-menu">

    <?php require_once("../MainHeader/header.php");?>

    <div class="mobile-menu-left-overlay"></div>
    
    <?php require_once("../MainNav/nav.php");?>

	<!-- Contenido -->
	<div class="page-content">
			<div class="container-fluid">
		        <section class="card">
				<header class="card-header text-center" role="alert" style="background-color: #0f9e8f; color: white;" id="TITULO"> CALCULADORA PRO
                </header>

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

	<!-- Contenido -->

	<?php require_once("../MainJs/js.php");?>
	<?php require_once("../Administracion/modalNoPago.php");?>
	<?php require_once("../Administracion/modalGraciasPago.php");?>

	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script type="text/javascript" src="calculadoraPro.js"></script>


</body>
</html>
<?php
  } else { 
   $conectar = new Conectar(); 
   header("Location: " . $conectar->ruta() . "../index.php"); 
}
?>