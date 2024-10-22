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
			<section class="card">
                <header class="card-header text-center" role="alert" style="background-color: #0f9e8f; color: white;" id="TITULO"> Videos Tutoriales
                </header>
				<div class="card-block">
				<form method="post" id="configuracion_form">
                    <input type="hidden" id="id_Configuracion" name="id_Configuracion">


                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                   <a href="#">1.- Introducción de la Plataforma de Apuestas Diarias <strong>ews-analisis.com.mx/</strong></a>
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <video id="videoElement" class="embed-responsive-item" controls>
                                            <source src="../../public/video/1_intro_ews.mp4" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                <a href="#">2.- Conoce la Plataforma <strong>EWinScore</strong></a>
                                <br>
                                <br>
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <video id="videoElement" class="embed-responsive-item" controls>
                                            <source src="../../public/video/2_Recorrido_EWinScore.mp4" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                            </div>

							
                            <div class="col-sm-3">
                                <div class="form-group">
                                <a href="#">3.- Como hacer una recarga a la plataforma <strong>EWinScore</strong></a>

                                    <div class="embed-responsive embed-responsive-16by9">
                                        <video id="videoElement" class="embed-responsive-item" controls>
                                            <source src="../../public/video/3_recargar_EwinScore.mp4" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-3">
                                <div class="form-group">
                                <a href="#">4.- Aprende a realizar una apuesta en<strong>EWinScore</strong></a>
                                <br>
                                <br>
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <video id="videoElement" class="embed-responsive-item" controls>
                                            <source src="../../public/video/4_Aprende_a_realizar_una apuesta.mp4" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                   <a href="#">5.- Registrarse en <strong>ews-analisis.com.mx/</strong></a>
                                   <br>
                                   <br>
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <video id="videoElement" class="embed-responsive-item" controls>
                                            <source src="../../public/video/5_Registrate_apuestas_diarias.mp4" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                <a href="#">6.- Suscripción VIP <strong>ews-analisis.com.mx/</strong></a>
                                <br>
                                <br>
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <video id="videoElement" class="embed-responsive-item" controls>
                                            <source src="../../public/video/6_Suscripcion_VIP.mp4" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>

                </form>
            </section>
        </div>
    </div>
		<!-- Contenido -->

		<?php require_once("../MainJs/js.php");?>
		
	</body>
	</html>
	<?php
} else 
{
	$conexion = new Conectar(); // Crear una instancia de la clase Conectar
	header("Location:" . $conexion->ruta() . "index.php");
}
?>