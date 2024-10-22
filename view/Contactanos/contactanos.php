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
		<link rel="stylesheet" href="../../public/css/separate/vendor/fancybox.min.css">
		<link rel="stylesheet" href="../../public/css/separate/pages/activity.min.css">
		<link rel="stylesheet" href="../../public/css/lib/summernote/summernote.css"/>
		<link rel="stylesheet" href="../../public/css/separate/pages/editor.min.css">
		<link rel="stylesheet" href="../../public/css/lib/font-awesome/font-awesome.min.css">
		<link rel="stylesheet" href="../../public/css/lib/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="../../public/css/lib/bootstrap-sweetalert/sweetalert.css">
		<link rel="stylesheet" href="../../public/css/separate/vendor/sweet-alert-animations.min.css">
		<link rel="stylesheet" href="../../public/css/lib/datatables-net/datatables.min.css">
		<link rel="stylesheet" href="../../public/css/separate/vendor/datatables-net.min.css">
		<link rel="stylesheet" href="../../public/css/separate/vendor/select2.min.css">
		<link rel="stylesheet" href="../../public/css/main.css">
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
		<title>Inversiones</title>
	</head>

	<body class="with-side-menu">
		<header class="site-header">
		</header>
    	<div class="mobile-menu-left-overlay"></div>
    
		<!-- Contenido -->
		<div class="page-content">
			<div class="container-fluid">
			</div>
				<section class="card">
					<header class="card-header text-center" role="alert" style="background-color: #079651; color: white;" id="ContadorGeneral" name="ContadorGeneral" >
					</header>
					<div class="card-block">
					<form method="POST">
						<div class="box-typical box-typical-padding">
                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for="NOMBRE">NOMBRE :</label>
                                            <input type="text" class="form-control" id="NOMBRE" name="NOMBRE" placeholder="Introduce tu nombre" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for="TELEFONO">TELEFONO :</label>
                                            <input type="number" class="form-control" id="TELEFONO" name="TELEFONO" placeholder="Introduce tu número de celular" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for="CORREO">CORREO :</label>
                                            <input type="email" class="form-control" id="CORREO" name="CORREO" placeholder="Introduce tu correo eléctronico" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label class="form-label" for="ASUNTO">ASUNTO :</label>
                                    <input type="text" class="form-control" id="ASUNTO" name="ASUNTO" placeholder="Introduce el asunto" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="COMENTARIOS">COMENTARIOS : </label>
                                    <textarea class="form-control" id="COMENTARIOS" rows="5" name="COMENTARIOS" placeholder="Introduce tus comentarios" required></textarea>
                                </div>
                            </div>

							<div class="form-group">
							    <button type="button" name="action" id="Calcular" value="add" class="btn btn-rounded btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Enviar</button>
							</div>
                        </div>
					</form>
				</div>
			</section>
		</div>
	</div>

	<?php //require_once("modalIndex.php");?>
	<!-- Contenido -->
	<script src="../../public/js/lib/jquery/jquery.min.js"></script>
	<script src="../../public/js/lib/tether/tether.min.js"></script>
	<script src="../../public/js/lib/bootstrap/bootstrap.min.js"></script>
	<script src="../../public/js/plugins.js"></script>
	<script src="../../public/js/app.js"></script>
	<script src="../../public/js/lib/datatables-net/datatables.min.js"></script>
	<script src="../../public/js/lib/bootstrap-sweetalert/sweetalert.min.js"></script>
	<script src="../../public/js/lib/summernote/summernote.min.js"></script>
	<script src="../../public/js/lib/fancybox/jquery.fancybox.pack.js"></script>
	<script src="../../public/js/summernote-ES.js"></script>
	<script src="../../public/js/lib/select2/select2.full.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script type="text/javascript" src="contactanos.js"></script>
</body>
</html>