<?php
    require_once("../config/conexion.php");
    require_once("../models/usuarioModel.php");
       
    $usuario = new Usuario();
    header('Content-Type: application/json');


        switch ($_GET["opcion"]) 
        {
            case "login":
                        $datos = $usuario->login($_POST["usu_correo"], $_POST['usu_pass']);
                        $DatosDeRespuesta = array(); 

                        if (is_array($datos) && count($datos) > 0) 
                        {
                            foreach ($datos as $resultado) 
                            {
                                $_SESSION["id"] = $resultado["id"];
                                $_SESSION["username"] = $resultado["username"];
                                $_SESSION["password"] = $resultado["password"];
                                $_SESSION["email"] = $resultado["email"];
                                $_SESSION["enlace_registro"] = $resultado["enlace_registro"];
                                $_SESSION["enlace_grupo"] = $resultado["enlace_grupo"];
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
                    $resultado = $usuario->ActualziarEnlacesXid($_POST['usu_id'], $_POST["Ewinscore"], $_POST["WhatsApp"]);
               
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
        }
?>
