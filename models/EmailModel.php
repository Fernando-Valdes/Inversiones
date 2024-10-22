<?php
/* librerias necesarias para que el proyecto pueda enviar emails */
require('class.phpmailer.php');
include("class.smtp.php");

/* llamada de las clases necesarias que se usaran en el envio del mail */
require_once("../config/conexion.php");

class Email extends PHPMailer
{

    public function EnviarMensajeContactanos($nombre, $telefono, $correo, $asunto)
    {
        $this->IsSMTP();
        $this->Host = 'smtp.titan.email';
        $this->Port = 465;//Aqui el puerto
        $this->SMTPAuth = true;
        $this->Username = 'contacto@ews-analisis.com.mx';
        $this->Password = 'EwSor32024$$**';
        $this->From = 'contacto@ews-analisis.com.mx';
        $this->SMTPSecure = 'ssl';
        $this->FromName = "";
        $this->CharSet = 'UTF8';
        $this->addAddress($correo);
        $this->WordWrap = 50;
        $this->IsHTML(true);
        $this->Subject = "GRACIAS POR CONTÁCTARNOS";
 
        $cuerpo = file_get_contents('../public/EnviarMensaje.html');

        $cuerpo = str_replace("lblasunto", $asunto, $cuerpo);
        $cuerpo = str_replace("LblNombre", $nombre, $cuerpo);
        $cuerpo = str_replace("lbltelefono", $telefono, $cuerpo);
        $cuerpo = str_replace("lblcorreo", $correo, $cuerpo);

        $this->Body = $cuerpo;
        $this->AltBody = strip_tags("GRACIAS");
        return $this->Send();
    }

    public function EnviarMensajeContactanosSoporte($nombre, $telefono, $correo2, $asunto, $comentario2)
    {
        $this->IsSMTP();
        $this->Host = 'smtp.titan.email';
        $this->Port = 465;//Aqui el puerto
        $this->SMTPAuth = true;
        $this->Username = 'contacto@ews-analisis.com.mx';
        $this->Password = 'EwSor32024$$**';
        $this->From = 'contacto@ews-analisis.com.mx';
        $this->SMTPSecure = 'ssl';
        $this->FromName = "";
        $this->CharSet = 'UTF8';
        $this->clearAddresses();
        $this->addAddress('contacto@ews-analisis.com.mx');
        $this->WordWrap = 50;
        $this->IsHTML(true);
        $this->Subject = "CLIENTE POTENCIAL";
 
        $cuerpoSoporte = file_get_contents('../public/EnviarMensajeSoporte.html');

        $cuerpoSoporte = str_replace("lblasunto", $asunto, $cuerpoSoporte);
        $cuerpoSoporte = str_replace("LblNombre", $nombre, $cuerpoSoporte);
        $cuerpoSoporte = str_replace("lbltelefono", $telefono, $cuerpoSoporte);
        $cuerpoSoporte = str_replace("lblcorreo", $correo2, $cuerpoSoporte);
        $cuerpoSoporte = str_replace("lblcomentarios", $comentario2, $cuerpoSoporte);


        $this->Body = $cuerpoSoporte;
        $this->AltBody = strip_tags("CLIENTE");
        return $this->Send();
    }
}

?>