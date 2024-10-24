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
                    comparte_enlace,
                    autorizacion,
                    control
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
                    telefono,
                    autorizacion,
                    control
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
                        telefono=?,
                        autorizacion='cfcd208495d565ef66e7dff9f98764da',
                        control='a5ae0861febff1aeefb6d5b759d904a6'";
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
                    comparte_enlace,
                    autorizacion,
                    control
                FROM usuarios
                WHERE id=?";

            $stmt = $conectar->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $Resultado = $stmt->fetchAll();
            return $Resultado;
        }

        public function get_TodosLosUsuarios()
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
                    comparte_enlace,
                    autorizacion,
                    control
                FROM usuarios";

            $stmt = $conectar->prepare($sql);
            $stmt->execute();
            $Resultado = $stmt->fetchAll();
            return $Resultado;
        }

        public function DesactivarUsuario($id)
        {
            $conectar= parent::conexion();

            parent::set_names();
            $sql="UPDATE usuarios SET autorizacion='cfcd208495d565ef66e7dff9f98764da' where id=?";

            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function ActivarUsuario($id)
        {
            $conectar= parent::conexion();

            parent::set_names();
            $sql="UPDATE usuarios SET autorizacion='c4ca4238a0b923820dcc509a6f75849b' where id=?";

            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function Get_PrecioVIP()
        {
            $conectar = parent::conexion();
            parent::set_names();

            $sql = "SELECT limite_user_vip, costo FROM configuraciones WHERE id=1";

            $stmt = $conectar->prepare($sql);
            $stmt->execute();
            $Resultado = $stmt->fetchAll();
            return $Resultado;
        }

        public function Update_CantidadRegistros()
        {
            $conectar= parent::conexion();
            parent::set_names();

            $sql=" UPDATE configuraciones
                   SET limite_user_vip = limite_user_vip - 1";
            
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function Update_Precio()
        {
            $conectar= parent::conexion();
            parent::set_names();

            $sql=" UPDATE configuraciones
                   SET costo = 50.00";
            
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
?>

