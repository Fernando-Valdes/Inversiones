<?php
    require_once("../config/conexion.php");
    require_once("../models/UsuarioModel.php");
       
    $usuario = new Usuario();
    header('Content-Type: application/json');


        switch ($_GET["collection_status"]) 
        {
            case "approved";
            $datos=$usuario->ActivarUsuario($_SESSION['id']);  
            $datosConfiguracion=$usuario->Get_PrecioVIP(); 


            if(is_array($datosConfiguracion)==true and count($datosConfiguracion)>0)
            {
                foreach($datosConfiguracion as $row)
                {
                    if($row["limite_user_vip"] =! '0')
                    {
                        $datosConfiguracion=$usuario->Update_CantidadRegistros(); 
                    }
                }

                $conexion = new Conectar(); 
                header("Location:" . $conexion->ruta() . "view/Logout/logout.php");
            }

            break;
        }
?>