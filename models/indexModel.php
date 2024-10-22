<?php
    class ObtenerDatos extends Conectar
    {

        public function ObtenerEnlaceInvitacionEwinscoreXid($Id)
        {
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT enlace_ews, enlace_grupo FROM usuarios WHERE id=?"; 
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function obtenerContadorGeneral()
        { 
            $conectar= parent::conexion();
            parent::set_names();

            $sql="SELECT contador_general
                FROM configuraciones
                WHERE id=1"; 
                
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function GuardarContadorGeneral()
        {
            $conectar= parent::conexion();
            parent::set_names();

            $sql=" UPDATE configuraciones
                   SET contador_general = contador_general + 1";
            
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function GuardarContadorXuser($idUser)
        {
            $conectar= parent::conexion();
            parent::set_names();

            $sql=" UPDATE usuarios
                   SET contador_visitas = contador_visitas + 1
                   WHERE id = ?";
            
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $idUser);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
?>
