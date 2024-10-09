<?php
    class Usuario extends Conectar
    {
        public function login($Email, $Password)
        {
            $conectar = parent::conexion();
            parent::set_names();

            $PassEncryp = md5($Email) . hash('sha256', $Password);

            $sql = "SELECT 
                    u.id,
                    username,
                    password,
                    email,
                    activo,
                    enlace_registro,
                    enlace_grupo
                FROM usuarios u
                INNER JOIN codigos_invitacion ON  u.id = usuario_id
                WHERE email=?
                AND password=?
                AND activo=1";


            $stmt = $conectar->prepare($sql);
            $stmt->bindValue(1, $Email);
            $stmt->bindValue(2, $PassEncryp);
            $stmt->execute();
            $Resultado = $stmt->fetchAll();
            return $Resultado;
        }

        public function EnlacesXid($idUser)
        {
            $conectar = parent::conexion();
            parent::set_names();

            $sql = "SELECT 
                    u.id,
                    username,
                    password,
                    email,
                    activo,
                    enlace_registro,
                    enlace_grupo
                FROM usuarios u
                INNER JOIN codigos_invitacion ON  u.id = usuario_id
                WHERE u.id = ?
                AND activo=1";


            $stmt = $conectar->prepare($sql);
            $stmt->bindValue(1, $idUser);
            $stmt->execute();
            $Resultado = $stmt->fetchAll();
            return $Resultado;
        }

        public function ActualziarEnlacesXid($idUser, $enlaceEwinscore, $EnlaceWhatsApp)
        {
            $conectar= parent::conexion();
            parent::set_names();

            $sql="UPDATE codigos_invitacion 
                  SET
                    enlace_registro = ?,
                    enlace_grupo = ?
                WHERE usuario_id = ?";

            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $enlaceEwinscore);
            $sql->bindValue(2, $EnlaceWhatsApp);
            $sql->bindValue(3, $idUser);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
?>
