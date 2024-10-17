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

    <?php // require_once("../../controller/mercadoPagoController.php");?>
    <?php require_once("../MainHeader/header.php");?>

    <div class="mobile-menu-left-overlay"></div>
    
    <?php require_once("../MainNav/nav.php");?>

	<!-- Contenido -->
	<div class="page-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-12">
					<div class="row">
						<div class="col-sm-12">
	                        <article class="statistic-box green">
	                            <div>
	                                <div class="number" id="lbltotal" name="lbltotal"></div>
	                                <div class="caption"><div>Total de visitas con tu enlace</div></div>
	                            </div>
	                        </article>
	                    </div>
					</div>
				</div>
			</div>
			<section class="card">
				<header class="card-header">
					Grafico Estadístico
				</header>
				<div class="card-block">
					<div id="divgrafico" style="height: 250px;"></div>
				</div>
			</section>
			
		</div>
	</div>
	<!-- Contenido -->

	<?php require_once("modalNoPago.php");?>
	<?php require_once("../MainJs/js.php");?>

	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="https://sdk.mercadopago.com/js/v2"></script>
	<script type="text/javascript" src="home.js"></script>



</body>
</html>
<?php
  } else { 
   $conectar = new Conectar(); 
   header("Location: " . $conectar->ruta() . "../index.php"); 
}
?>