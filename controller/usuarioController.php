<?php
    require_once("../config/conexion.php");
    require_once("../models/usuarioModel.php");
       
    $usuario = new Usuario();
    header('Content-Type: application/json');


        switch ($_GET["opcion"]) 
        {
            case "login":
                        $datos = $usuario->login($_POST["usu_correo"], $_POST['usu_pass']);
                        if (is_array($datos) && count($datos) > 0) 
                        {
                            foreach ($datos as $resultado) 
                            {
                                $_SESSION["id"] = $resultado["id"];
                                $_SESSION["nombre"] = $resultado["nombre"];
                                $_SESSION["email"] = $resultado["email"];
                                $_SESSION["telefono"] = $resultado["telefono"];
                                $_SESSION["enlace_ews"] = $resultado["enlace_ews"];
                                $_SESSION["enlace_grupo"] = $resultado["enlace_grupo"];
                                $_SESSION["comparte_enlace"] = $resultado["comparte_enlace"];
                                $_SESSION["autorizacion"] = $resultado["autorizacion"];
                                $_SESSION["control"] = $resultado["control"];
                            }
                            $DatosDeRespuesta["Validar"] = 1;
                        } else 
                        {
                            $DatosDeRespuesta["Validar"] = 0;
                        }
                        echo json_encode($DatosDeRespuesta);
            break;


            case "UserXid";
                $datos=$usuario->EnlacesXid($_POST["idUser"]);  
                if(is_array($datos)==true and count($datos)>0)
                {
                    foreach($datos as $row)
                    {
                        $output["id"] = $row["id"];
                        $output["username"] = $row["username"];
                        $output["enlace_registro"] = $row["enlace_registro"];
                        $output["enlace_grupo"] = $row["enlace_grupo"];
                    }
                    echo json_encode($output);
                }   

            break;


            case "guardar":
                    $resultado = $usuario->ActualziarEnlacesXid($_POST['id_Configuracion'], $_POST["NOMBRE"], $_POST["TELEFONO"], $_POST["ENLACE_EWINSCORE"], $_POST["ENLACE_GRUPO_WHATSAPP"]);
               
                    if ($resultado) 
                    {
                        $response = array('status' => 'success', 'message' => 'Datos guardados correctamente');
                    } 
                    else 
                    {
                        $response = array('status' => 'error', 'message' => 'Error al guardar los datos');
                    }

                    echo json_encode($response);
            break;

            case "obtenerContadorXuser";
                $datos=$usuario->obtenerContadorXuser($_POST['idUser']);  
                
                if(is_array($datos)==true and count($datos)>0)
                {
                    foreach($datos as $row)
                    {
                        $output["contador_visitas"] = $row["contador_visitas"];
                    }
                    echo json_encode($output);
                }

            break;

            case "graficoXid";
            $datos=$usuario->obtenerContadorXuser($_POST["idUser"]);  
            echo json_encode($datos);
        break;


        case "Registro":
            $usuario->RegistroUser($_POST["NOMBRE"], $_POST["PASSWORD"], $_POST["CORREO"],$_POST["TELEFONO"]);
            
                if ($usuario) 
                {
                    $DatosDeRespuesta["Validar"] = 1;
                } 
                else 
                {
                    $DatosDeRespuesta["Validar"] = 0;
                }

            echo json_encode($DatosDeRespuesta);
        break;


        case "DatosDelUserLogin":

            $datos=$usuario->DatosDelUserLogin($_SESSION['id']);  

            if(is_array($datos)==true and count($datos)>0)
            {
                foreach($datos as $row)
                {
                    $resultado["id"] = $row["id"]  ;
                    $resultado["nombre"] = $row["nombre"];
                    $resultado["email"] = $row["email"];  
                    $resultado["telefono"] = $row["telefono"];
                    $resultado["enlace_ews"] = $row["enlace_ews"];  
                    $resultado["enlace_grupo"] = $row["enlace_grupo"];  
                    $resultado["comparte_enlace"] = $row["comparte_enlace"];
                    $resultado["autorizacion"] = $row["autorizacion"];
                    $resultado["control"] = $row["control"];
                }
                echo json_encode($resultado);
            }
        break;

        case "get_TodosLosUsuarios":
            $datos=$usuario->get_TodosLosUsuarios();
            $data= Array();

            foreach($datos as $row)
            {
                $sub_array = array();
                $sub_array[] = $row["nombre"];
                $sub_array[] = $row["email"];
                $sub_array[] = $row["telefono"];
                $sub_array[] = $row["contador_visitas"];

                
                if($row["autorizacion"] == "cfcd208495d565ef66e7dff9f98764da")
                {
                    $sub_array[] = '<span class="label label-pill label-warning">Versión Gratuita</span>';

                    $sub_array[] = '<button type="button" onClick="editar('.$row["id"].');"  id="'.$row["id"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>'.
                    '<button type="button" onClick="Activar('.$row["id"].');"  id="'.$row["id"].'" class="btn btn-inline btn-success btn-sm ladda-button"><i class="glyphicon glyphicon-ok"></i></button>';
                }
                else
                {
                    $sub_array[] = '<span class="label label-pill label-success">Suscripción VIP pagada</span>';

                    $sub_array[] = '<button type="button" onClick="editar('.$row["id"].');"  id="'.$row["id"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>'.
                    '<button type="button" onClick="Desactivar('.$row["id"].');"  id="'.$row["id"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="glyphicon glyphicon-remove"></i></button>';
                }


                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);

        break;

        case "DesactivarUsuario":
            $usuario->DesactivarUsuario($_POST["id"]);
        break;

        case "ActivarUsuario":
            $usuario->ActivarUsuario($_POST["id"]);
        break;

    }
?>
