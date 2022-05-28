<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;

class CursoControlador
{

    public static function ctrRegistrarCurso()
    {
        $tabla = "curso";
        date_default_timezone_set('America/Bogota');
        $usu_Ingreso = date("Y-m-d H:i:s");

        if (isset($_POST)) {

            if ($_SESSION["usuario_rol"] == "Coordinador" || $_SESSION["usuario_rol"] == "Auxiliar") {

                if ($_POST["idCurso"] and $_POST["idRefrigeriofk"]) {
                    $idCurso     = intval($_POST["idCurso"]);
                    $sedeCurso  = trim($_POST["sedeCurso"]);
                    $cantidadAlumnosCurso = intval($_POST["cantidadAlumnosCurso"]);
                    $directorCurso = trim($_POST["directorCurso"]);
                    $estadoCurso = intval($_POST["estadoCurso"]);
                    $idRefrigeriofk = intval($_POST["idRefrigeriofk"]);
                    
                    $datosControlador = array(
                        'idCurso'       => $idCurso,
                        'sedeCurso'       => $sedeCurso,
                        'cantidadAlumnosCurso'       => $cantidadAlumnosCurso,
                        'directorCurso'       => $directorCurso,
                        'estadoCurso'       => $estadoCurso,
                        'idRefrigeriofk'       => $idRefrigeriofk
                        
                    );

                    if ($_SESSION["usuario_rol"]=="Coordinador") {

                        return $respuestaModelo = CursoModelo::mdlRegistrarCurso($tabla, $datosControlador);

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

    public static function ctrMostrarCursos($item, $valor)
    {
        $tabla           = "curso";
        $respuestaModelo = CursoModelo::mdlMostrarCursos($tabla, $item, $valor);
        return $respuestaModelo;
    }

    public static function ctrCambiarEstado()
    {
        if ($_SESSION["usuario_rol"]=="Coordinador") {
            

            $tabla           = "curso";

                if (isset($_POST["idCurso"]) && !empty($_POST["idCurso"])) {

                        $datosControlador = array(
                            'estadoCurso' => intval($_POST["estadoCurso"]),
                            'idCurso' => intval($_POST["idCurso"])
                        );     

                    $respuestaModelo = CursoModelo::mdlCambiarEstado($tabla, $datosControlador);

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

    public static function ctrActualizarCurso()
    {
        $tabla = "curso";
        date_default_timezone_set('America/Bogota');
        $usu_Ingreso = date("Y-m-d H:i:s");

        if (isset($_POST)) {

            if ($_SESSION["usuario_rol"] == "Coordinador") {

                if ($_POST["idCurso"] and $_POST["idRefrigeriofk"]) {
                    $idCurso     = intval($_POST["idCurso"]);
                    $sedeCurso  = trim($_POST["sedeCurso"]);
                    $cantidadAlumnosCurso = intval($_POST["cantidadAlumnosCurso"]);
                    $directorCurso = trim($_POST["directorCurso"]);
                    $idRefrigeriofk = intval($_POST["idRefrigeriofk"]);
                    
                    $datosControlador = array(
                        'idCurso'       => $idCurso,
                        'sedeCurso'       => $sedeCurso,
                        'cantidadAlumnosCurso'       => $cantidadAlumnosCurso,
                        'directorCurso'       => $directorCurso,
                        'idRefrigeriofk'       => $idRefrigeriofk
                        
                    );

                    if ($_SESSION["usuario_rol"]=="Coordinador") {

                        return $respuestaModelo = CursoModelo::mdlActualizarCurso($tabla, $datosControlador);

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

    public static function ctrDescargarReporteCursos()
    {
        
        if (isset($_GET["reporte"])) {

            $tabla           = "curso";
            $respuestaModelo = CursoModelo::mdlMostrarCursos($tabla, null, null);

            if (!isset($respuestaModelo["mensaje"])) {

                $nombre    = $_GET["reporte"] . "xlsx";
                $documento = new Spreadsheet();
                $documento
                    ->getProperties()
                    ->setCreator("CREADOR: colegiofranciscojaviermatiz.com.co")
                    ->setLastModifiedBy(date('Y-m-d H:i:s')) // última vez modificado por
                    ->setTitle('Reporte de cursos COLEGIO FRANCISCO JAVIER MATIZ')
                    ->setSubject('cursos')
                    ->setDescription('Este documento fue generado para COLEGIO FRANCISCO JAVIER MATIZ')
                    ->setCategory('Cursos');

                $hoja = $documento->getActiveSheet();
                $hoja->setTitle("Cursos");
                $hoja->setCellValue("A1", "idCurso");
                $hoja->setCellValue("B1", "sedeCurso");
                $hoja->setCellValue("C1", "cantidadAlumnosCurso");
                $hoja->setCellValue("D1", "directorCurso");
                $hoja->setCellValue("E1", "estadoCurso");
                $hoja->setCellValue("F1", "idRefrigeriofk");
                $celdas = 2;

                for ($i = 0; $i < count($respuestaModelo); $i++) {
                    $hoja->setCellValue("A" . ($celdas), $respuestaModelo[$i]["idCurso"]);
                    $hoja->setCellValue("B" . ($celdas), $respuestaModelo[$i]["sedeCurso"]);
                    $hoja->setCellValue("C" . ($celdas), $respuestaModelo[$i]["cantidadAlumnosCurso"]);
                    $hoja->setCellValue("D" . ($celdas), $respuestaModelo[$i]["directorCurso"]);
                    if ($respuestaModelo[$i]["estadoCurso"] == 1) {
                        $activo = "ACTIVO";
                    } else {
                        $activo = "INACTIVO";
                    }
                    $hoja->setCellValue("E" . ($celdas), $activo);
                    $hoja->setCellValue("F" . ($celdas), $respuestaModelo[$i]["idRefrigeriofk"]);
                    
                }

                $nombreDelDocumento = "cursos-" . date('YmdHis') . ".xlsx";

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