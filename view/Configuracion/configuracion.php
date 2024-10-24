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
                <header class="card-header text-center" role="alert" style="background-color: #0f9e8f; color: white;" id="TITULO"> Configuración de mis datos
                </header>
				<div class="card-block">
				<form method="post" id="configuracion_form">
                    <input type="hidden" id="id_Configuracion" name="id_Configuracion">

                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="form-label" for="NOMBRE">NOMBRE : </label>
                                    <input type="text" class="form-control" id="NOMBRE" name="NOMBRE" required>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="form-label" for="CORREO">CORREO ELÉCTRONICO : </label>
                                    <input type="text" class="form-control" id="CORREO" name="CORREO" required disabled>
                                </div>
                            </div>

							
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="form-label" for="TELEFONO">TELÉFONO : </label>
                                    <input type="text" class="form-control" id="TELEFONO" name="TELEFONO" required>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="form-group">
                            <label class="form-label" for="ENLACE_EWINSCORE">ENLACE EWINSCORE : </label>
                            <input type="text" class="form-control" id="ENLACE_EWINSCORE" name="ENLACE_EWINSCORE" required>
                        </div>
                    </div>

					<div class="col-xl-12">
                        <div class="form-group">
                            <label class="form-label" for="ENLACE_GRUPO_WHATSAPP">ENLACE GRUPO WHATSAPP : </label>
                            <input type="text" class="form-control" id="ENLACE_GRUPO_WHATSAPP" name="ENLACE_GRUPO_WHATSAPP" required >
                        </div>
                    </div>

					<div class="col-xl-12">
                        <div class="form-group">
                            <label class="form-label" for="ENLACE">COMPARTE TU ENLACE : </label>
                            <input type="text" class="form-control" id="ENLACE" name="ENLACE" required>
                        </div>
                    </div>
                   
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-sm-5">
                            </div>

                            <div class="col-sm-2">
                                <button type="submit" name="action" id="Guardar" value="add" class="btn btn-rounded btn-primary">Guardar</button>
                            </div>

                            <div class="col-sm-5">
                            </div>
                        </div>
                    </div>

                </form>
            </section>
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