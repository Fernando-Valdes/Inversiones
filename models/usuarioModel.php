<?php
    class Usuario extends Conectar
    {
        public function login($Email, $Password)
        {
            $conectar = parent::conexion();
            parent::set_names();

            $PassEncryp = md5($Email) . hash('sha256', $Password);

            $sql = "SELECT 
                    id,
                    nombre,
                    email,
                    contador_visitas,
                    realizo_pago,
                    telefono,
                    enlace_ews,
                    enlace_grupo,
                    comparte_enlace
                FROM usuarios
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
                    nombre,
                    password,
                    email,
                    activo,
                    enlace_registro,
                    enlace_grupo,
                    telefono
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

        public function ActualziarEnlacesXid($idUser,$nombre, $telefono, $enlaceEwinscore, $EnlaceWhatsApp)
        {
            $conectar= parent::conexion();
            parent::set_names();

            $sql="UPDATE usuarios 
                  SET
                    nombre = ?,
                    telefono = ?,
                    enlace_ews = ?,
                    enlace_grupo = ?
                WHERE id = ?";

            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombre);
            $sql->bindValue(2, $telefono);
            $sql->bindValue(3, $enlaceEwinscore);
            $sql->bindValue(4, $EnlaceWhatsApp);
            $sql->bindValue(5, $idUser);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        
        public function RegistroUser($nombre,$password,$email,$telefono)
        {
            $PassEncryp = md5($email) . hash('sha256', $password);

            $conectar= parent::conexion();
            parent::set_names();

            $sql="INSERT INTO usuarios
                    SET 
                        nombre=?,
                        password=?,
                        email=?,
                        telefono=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombre);
            $sql->bindValue(2, $PassEncryp);
            $sql->bindValue(3, $email);
            $sql->bindValue(4, $telefono);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }


        public function obtenerContadorXuser($idUser)
        { 
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT contador_visitas,nombre
                  FROM usuarios
                  WHERE id=?"; 
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $idUser);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function DatosDelUserLogin($id)
        {
            $conectar = parent::conexion();
            parent::set_names();

            $sql = "SELECT 
                    id,
                    nombre,
                    email,
                    contador_visitas,
                    realizo_pago,
                    telefono,
                    enlace_ews,
                    enlace_grupo,
                    comparte_enlace
                FROM usuarios
                WHERE id=?";

            $stmt = $conectar->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $Resultado = $stmt->fetchAll();
            return $Resultado;
        }

    }
?>
