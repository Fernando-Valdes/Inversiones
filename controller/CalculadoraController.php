<?php
    require_once("../config/conexion.php");
    require_once("../models/indexModel.php");
    $ObtenerDatos = new ObtenerDatos();


    switch($_GET["opcion"]) 
    {
        
        case "guardarContadorXuseryObtenerEnlaces";

            $resultado = $ObtenerDatos->GuardarContadorXuser($_POST['idUser']);
            $datos=$ObtenerDatos->ObtenerEnlaceInvitacionEwinscoreXid($_POST['idUser']);  
            
            if(is_array($datos)==true and count($datos)>0)
            {
                foreach($datos as $row)
                {
                    $output["enlace_registro"] = $row["enlace_registro"];
                    $output["enlace_grupo"] = $row["enlace_grupo"];
                }
                echo json_encode($output);
            }

        break;

        case "ObtenerResultadosTabla":

            setlocale(LC_TIME, 'es_ES.UTF-8');
            $inversionInicial =(int) $_POST['inversion'];
            $porcentaje = 0.65 / 100; 
            $totalDias = (int) $_POST['retiro'];
            $diaRetiro = (int) $_POST['retiro'];
            $comisionRetiro = 0.05;
            $fechaActual = new DateTime();
            $gananciasDia = 0;
            $saldosDia = 0;
            $saldosTotal = 0;
            $meta = $inversionInicial * 2; 
            $metas = [$meta]; 
            $data= array();

            $formatter = new IntlDateFormatter(
                'es_ES', // Localización (idioma)
                IntlDateFormatter::FULL, // Formato largo
                IntlDateFormatter::NONE, // No incluir la hora
                'America/Mexico_City', // Zona horaria
                IntlDateFormatter::GREGORIAN // Calendario Gregoriano
            );


            for ($dia = 1; $dia <= $totalDias; $dia++) 
            {
                $sub_array = array();

                if ($dia == 1) 
                {
                    $inversion = $inversionInicial;
                } else 
                {
                    $inversion = $saldoDia;
                }


                $ganancia1 = round($inversion * $porcentaje, 2);
                $saldo1 = round($inversion + $ganancia1, 2);

                $ganancia2 = round($saldo1 * $porcentaje, 2);
                $saldo2 = round($saldo1 + $ganancia2, 2);

                $ganancia3 = round($saldo2 * $porcentaje, 2);
                $saldo3 = round($saldo2 + $ganancia3, 2);

                $gananciaDia = round($ganancia1 + $ganancia2 + $ganancia3, 2);
                $saldoDia = round($saldo3, 2);

                $comision = round($saldoDia * $comisionRetiro, 2);
                $saldosTotal = round($saldoDia - $comision, 2); 


                $sub_array[] = $dia;
                $sub_array[] = $formatter->format($fechaActual);
                $sub_array[] ="$". number_format($ganancia1, 2);
                $sub_array[] ="$". number_format($saldo1, 2);
                $sub_array[] ="$". number_format($ganancia2, 2);
                $sub_array[] ="$". number_format($saldo2, 2);
                $sub_array[] ="$". number_format($ganancia3, 2);
                $sub_array[] ="$". number_format($saldo3, 2);
                $sub_array[] ="$". number_format($gananciaDia, 2);
                $sub_array[] ="$". number_format($saldoDia, 2);
                $sub_array[] ="$". number_format($comision, 2);
                $sub_array[] ="$". number_format($saldosTotal, 2);


                if ($saldoDia >= $metas[count($metas) - 1])
                 {
                    $metas[] = end($metas) * 2;
                 }

                 $fechaActual->modify('+1 day');
                 $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);

        break;

        case "guardarYobtenerContadorGeneral";

            $resultado = $ObtenerDatos->GuardarContadorGeneral();
            $datos=$ObtenerDatos->obtenerContadorGeneral();  
            
            if(is_array($datos)==true and count($datos)>0)
            {
                foreach($datos as $row)
                {
                    $output["contador_general"] = $row["contador_general"];
                }
                echo json_encode($output);
            }

        break;
    }
?>