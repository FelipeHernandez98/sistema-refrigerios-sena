<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;

class RefrigerioControlador
{
    public static function ctrRegistrarRefrigerio()
    {
        $tabla = "refrigerio";
        date_default_timezone_set('America/Bogota');
        $usu_Ingreso = date("Y-m-d H:i:s");

        if(isset($_POST)){
            
            if ($_SESSION["usuario_rol"] == "Coordinador" || $_SESSION["usuario_rol"] == "Auxiliar") {

                if ($_POST["idCoordinadorfk"] and $_POST["idAuxiliar"]) {             
                    $fechaRefrigerio     = trim($_POST["fechaRefrigerio"]);
                    $horaRefrigerio  = trim($_POST["horaRefrigerio"]);
                    $tipoRefrigerio = trim($_POST["tipoRefrigerio"]);
                    $cantidadRefrigerio = intval($_POST["cantidadRefrigerio"]);
                    $descripcionRefrigerio = trim($_POST["descripcionRefrigerio"]);
                    $estadoRefrigerio = $_POST["estadoRefrigerio"];
                    $idCoordinadorfk = intval($_POST["idCoordinadorfk"]);
                    $idAuxiliar = intval($_POST["idAuxiliar"]);
                    

                    $datosControlador = array(
                        'fechaRefrigerio'       => $fechaRefrigerio,
                        'horaRefrigerio'       => $horaRefrigerio,
                        'tipoRefrigerio'       => $tipoRefrigerio,
                        'cantidadRefrigerio'       => $cantidadRefrigerio,
                        'descripcionRefrigerio'       => $descripcionRefrigerio,
                        'estadoRefrigerio'       => $estadoRefrigerio,
                        'idCoordinadorfk'       => $idCoordinadorfk,
                        'idAuxiliar'       => $idAuxiliar
                        
                    );

                    if ($_SESSION["usuario_rol"]=="Coordinador") {

                        return $respuestaModelo = RefrigerioModelo::mdlRegistrarRefrigerio($tabla, $datosControlador);
                        
                        
                    } else {
                        $arrayName = array('codigo' => 'No tienes permisos para realizar esta accion');

                        return $arrayName;
                    }
                } else {

                    $arrayName = array('codigo' => 'Revisar Campos Alguno debe contener un caracter no permitido o esta vacio');

                    return $arrayName;
                }
            } else {
                $arrayName = array('codigo' => 'No tienes permisos para realizar esta accion');

                return $arrayName;
            }
            
        }
    }

    public static function ctrMostrarRefrigerios($item, $valor)
    {
        $tabla           = "refrigerio";
        $respuestaModelo = RefrigerioModelo::mdlMostrarRefrigerios($tabla, $item, $valor);
        return $respuestaModelo;
    }

    public static function ctrCambiarEstado()
    {
        if ($_SESSION["usuario_rol"]=="Coordinador") {
            

            $tabla           = "refrigerio";

                if (isset($_POST["idRefrigerio"]) && !empty($_POST["idRefrigerio"])) {

                        $datosControlador = array(
                            'estadoRefrigerio' => intval($_POST["estadoRefrigerio"]),
                            'idRefrigerio' => intval($_POST["idRefrigerio"])
                        );     

                    $respuestaModelo = RefrigerioModelo::mdlCambiarEstado($tabla, $datosControlador);

                    return $respuestaModelo;
                } else {
                    $arrayName = array('codigo' => 'Identificador No Enviado');

                    return $arrayName;
                }
            
        } else {
            $arrayName = array('codigo' => 'no tienes permisos para ejecutar esta accion');

            return $arrayName;
        }

    }

    public static function ctrActualizarRefrigerio()
    {
        $tabla = "refrigerio";
        if(isset($_POST)){
            
            if ($_SESSION["usuario_rol"] == "Coordinador") {

                if ($_POST["idRefrigerio"]) {             
                    $idRefrigerio  = intval($_POST["idRefrigerio"]);
                    $fechaRefrigerio     = trim($_POST["fechaRefrigerio"]);
                    $horaRefrigerio  = trim($_POST["horaRefrigerio"]);
                    $tipoRefrigerio = trim($_POST["tipoRefrigerio"]);
                    $cantidadRefrigerio = intval($_POST["cantidadRefrigerio"]);
                    $descripcionRefrigerio = trim($_POST["descripcionRefrigerio"]);
                    //$idCoordinadorfk = intval($_POST["idCoordinadorfk"]);
                    //$idAuxiliar = intval($_POST["idAuxiliar"]);
                    

                    $datosControlador = array(
                        'idRefrigerio'       => $idRefrigerio,
                        'fechaRefrigerio'       => $fechaRefrigerio,
                        'horaRefrigerio'       => $horaRefrigerio,
                        'tipoRefrigerio'       => $tipoRefrigerio,
                        'cantidadRefrigerio'       => $cantidadRefrigerio,
                        'descripcionRefrigerio'       => $descripcionRefrigerio,
                        //'idCoordinadorfk'       => $idCoordinadorfk,
                        //'idAuxiliar'       => $idAuxiliar
                        
                    );

                    if ($_SESSION["usuario_rol"]=="Coordinador") {

                        return $respuestaModelo = RefrigerioModelo::mdlActualizarRefrigerio($tabla, $datosControlador);
                        
                        
                    } else {
                        $arrayName = array('codigo' => 'No tienes permisos para realizar esta accion');

                        return $arrayName;
                    }
                } else {

                    $arrayName = array('codigo' => 'Revisar Campos Alguno debe contener un caracter no permitido o esta vacio');

                    return $arrayName;
                }
            } else {
                $arrayName = array('codigo' => 'No tienes permisos para realizar esta accion');

                return $arrayName;
            }
            
        }
    }

    public static function ctrDescargarReporteRefrigerios()
    {
        
        if (isset($_GET["reporte"])) {

            $tabla           = "refrigerio";
            $respuestaModelo = RefrigerioModelo::mdlMostrarRefrigerios($tabla, null, null);

            if (!isset($respuestaModelo["mensaje"])) {

                $nombre    = $_GET["reporte"] . "xlsx";
                $documento = new Spreadsheet();
                $documento
                    ->getProperties()
                    ->setCreator("CREADOR: colegiofranciscojaviermatiz.com.co")
                    ->setLastModifiedBy(date('Y-m-d H:i:s')) // última vez modificado por
                    ->setTitle('Reporte de refrigerios COLEGIO FRANCISCO JAVIER MATIZ')
                    ->setSubject('refrigerios')
                    ->setDescription('Este documento fue generado para COLEGIO FRANCISCO JAVIER MATIZ')
                    ->setCategory('Refrigerios');

                $hoja = $documento->getActiveSheet();
                $hoja->setTitle("Refrigerios");
                $hoja->setCellValue("A1", "idRefrigerio");
                $hoja->setCellValue("B1", "fechaRefrigerio");
                $hoja->setCellValue("C1", "horaRefrigerio");
                $hoja->setCellValue("D1", "tipoRefrigerio");
                $hoja->setCellValue("E1", "cantidadRefrigerio");
                $hoja->setCellValue("F1", "descripcionRefrigerio");
                $hoja->setCellValue("G1", "estadoRefrigerio");
                $hoja->setCellValue("H1", "idCoordinadorfk");
                $hoja->setCellValue("I1", "idAuxiliar");
                $celdas = 2;

                for ($i = 0; $i < count($respuestaModelo); $i++) {
                    $hoja->setCellValue("A" . ($celdas), $respuestaModelo[$i]["idRefrigerio"]);
                    $hoja->setCellValue("B" . ($celdas), $respuestaModelo[$i]["fechaRefrigerio"]);
                    $hoja->setCellValue("C" . ($celdas), $respuestaModelo[$i]["horaRefrigerio"]);
                    $hoja->setCellValue("D" . ($celdas), $respuestaModelo[$i]["tipoRefrigerio"]);
                    $hoja->setCellValue("E" . ($celdas), $respuestaModelo[$i]["cantidadRefrigerio"]);
                    $hoja->setCellValue("F" . ($celdas), $respuestaModelo[$i]["descripcionRefrigerio"]);
                    if ($respuestaModelo[$i]["estadoRefrigerio"] == 1) {
                        $activo = "ACTIVO";
                    } else {
                        $activo = "INACTIVO";
                    }
                    $hoja->setCellValue("G" . ($celdas), $activo);
                    $hoja->setCellValue("H" . ($celdas), $respuestaModelo[$i]["idCoordinadorfk"]);
                    $hoja->setCellValue("I" . ($celdas), $respuestaModelo[$i]["idAuxiliar"]);
                }

                $nombreDelDocumento = "refrigerios-" . date('YmdHis') . ".xlsx";

                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
                header('Cache-Control: max-age=0');

                $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($documento, 'Xlsx');
                $writer->save('php://output');
                exit;
            } else {

                echo "Error: " . $respuestaModelo["errorinfo"];
                exit;

            }

        }
    
    }
}