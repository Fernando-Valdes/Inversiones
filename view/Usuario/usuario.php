<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["id"])){ 
?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<title>Administración de Usuarios</title>
</head>
<body class="with-side-menu">

    <?php require_once("../MainHeader/header.php");?>

    <div class="mobile-menu-left-overlay"></div>
    
    <?php require_once("../MainNav/nav.php");?>

	<!-- Contenido -->
	<div class="page-content">
		<div class="container-fluid">

		<div class="row">
				<div class="col-xl-12">
					<div class="row">
						<div class="col-sm-4">
	                        <article class="statistic-box green">
	                            <div>
	                                <div class="number" id="lblVIP" name="lblVIP"></div>
	                                <div class="caption"><div>Total Suscripción VIP pagada</div></div>
	                            </div>
	                        </article>
	                    </div>
						<div class="col-sm-4">
	                        <article class="statistic-box yellow">
	                            <div>
	                                <div class="number" id="lblGratis" name="lblGratis"></div>
	                                <div class="caption"><div>Total Versión Gratuita</div></div>
	                            </div>
	                        </article>
	                    </div>
						<div class="col-sm-4">
	                        <article class="statistic-box purple">
	                            <div>
	                                <div class="number" id="lbltotal" name="lbltotal"></div>
	                                <div class="caption"><div>Total de usuarios</div></div>
	                            </div>
	                        </article>
	                    </div>
					</div>
				</div>
			</div>

			<div class="box-typical box-typical-padding">
				<table id="usuario_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
					<thead>
						<tr>
							<th style="width: 10%;">Nombre</th>
							<th style="width: 10%;">Correo</th>
							<th style="width: 5%;">Telefono</th>
							<th style="width: 5%;">Contador visitas</th>
							<th style="width: 5%;">Estado</th>
							<th style="width: 10%;">Acciones</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- Contenido -->

	<?php require_once("modalnuevo.php");?>
	<?php require_once("modalUsuarioSIGA.php");?>

	<?php require_once("../MainJs/js.php");?>
	
	<script type="text/javascript" src="usuario.js"></script>
	
</body>
</html>
<?php
   } else {
    $conexion = new Conectar(); // Crear una instancia de la clase Conectar
    header("Location:" . $conexion->ruta() . "index.php");
   }
?>