<?php
    require_once("../config/conexion.php");
    require_once("../models/UsuarioModel.php");
       
    $usuario = new Usuario();
    header('Content-Type: application/json');


        switch ($_GET["opcion"]) 
        {
            case "Enlaces":
                $datos=$usuario->EnlacesXid($_POST['idUser']);
                $data= Array();

                foreach($datos as $row)
                {
                    $sub_array = array();
                    $sub_array[] = $row["username"];
                    $sub_array[] = $row["email"];
                    $sub_array[] = '<span class="label label-pill label-success">'.$row["enlace_registro"].'</span>';
                    $sub_array[] = '<span class="label label-pill label-success">'.$row["enlace_grupo"].'</span>';
                    $sub_array[] = '<button type="button" onClick="editar('.$row["id"].');"  id="'.$row["id"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                    $data[] = $sub_array;
                }
    
                $results = array(
                    "sEcho"=>1,
                    "iTotalRecords"=>count($data),
                    "iTotalDisplayRecords"=>count($data),
                    "aaData"=>$data);
                echo json_encode($results);
                
            break;

        }
?>