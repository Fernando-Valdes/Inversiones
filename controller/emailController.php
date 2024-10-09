<?php
    require_once("../config/conexion.php");
    require_once("../models/EmailModel.php");
    require_once("../models/contactanosModel.php");
    $Contacto = new Contactanos();
    $email = new Email();


    switch ($_GET["opcion"]) 
    {
        case "EnviarMensajeContactanos":
            $Contacto->GuardaMensajeContactanos($_POST["NOMBRE"], $_POST["TELEFONO"], $_POST["CORREO"], $_POST["ASUNTO"], $_POST["COMENTARIOS"]);
            $email->EnviarMensajeContactanos($_POST["NOMBRE"], $_POST["TELEFONO"], $_POST["CORREO"],$_POST["ASUNTO"]);
            $email->EnviarMensajeContactanosSoporte($_POST["NOMBRE"], $_POST["TELEFONO"], $_POST["CORREO"],$_POST["ASUNTO"], $_POST["COMENTARIOS"]);
            
            $response = array('status' => 'success', 'message' => 'Datos guardados correctamente');

            echo json_encode($response);
        break;
    }
?>