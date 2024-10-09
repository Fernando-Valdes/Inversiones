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

    
	<?php require_once("modalIndex.php");?>
	<?php require_once("modalContactanos.php");?>
	<?php require_once("view/Registro/modalRegistrarse.php");?>
	<!-- Contenido -->

	<?php require_once("../MainJs/js.php");?>

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