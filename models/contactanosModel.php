<?php
    class Contactanos extends Conectar
    {
        public function GuardaMensajeContactanos($nombre,$telefono,$correo,$asunto,$comentarios)
        {
            $conectar= parent::conexion();
            parent::set_names();

            $sql="INSERT INTO contactanos (nombre,telefono,correo,asunto,comentarios) VALUES (?,?,?,?,?)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombre);
            $sql->bindValue(2, $telefono);
            $sql->bindValue(3, $correo);
            $sql->bindValue(4, $asunto);
            $sql->bindValue(5, $comentarios);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
       
    }
?>
