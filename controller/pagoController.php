<?php
    require_once("../config/conexion.php");
    require_once("../models/UsuarioModel.php");
       
    $usuario = new Usuario();
    header('Content-Type: application/json');


        switch ($_GET["opcion"]) 
        {
            case "PagoExitoso";
            $datos=$ObtenerDatos->ObtenerEnlaceInvitacionEwinscoreXid($_POST['idUser']);  
            
            if(is_array($datos)==true and count($datos)>0)
            {
                foreach($datos as $row)
                {
                    $output["enlace_ews"] = $row["enlace_ews"];
                    $output["enlace_grupo"] = $row["enlace_grupo"];
                }
                echo json_encode($output);
            }

        break;
        }
?>