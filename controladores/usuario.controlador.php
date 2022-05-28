<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;

class usuarioControlador
{
    public static function ctrRegistrarUsuario()
    {
        $tabla = "usuario";
        date_default_timezone_set('America/Bogota');
        $usu_Ingreso = date("Y-m-d H:i:s");

        if (isset($_POST)) {

            if ($_SESSION["usuario_rol"] == "Coordinador" || $_SESSION["usuario_rol"] == "Auxiliar") {

                if ($_POST["idUsuari"]) {
                    $idUsuari     = intval($_POST["idUsuari"]);
                    $nombreUsuario  = trim($_POST["nombreUsuario"]);
                    $apellidoUsuario = trim($_POST["apellidoUsuario"]);
                    $correoUsuario = trim($_POST["correoUsuario"]);
                    $telefonoUsuario = intval($_POST["telefonoUsuario"]);
                    $direccionUsuario = trim($_POST["direccionUsuario"]);
                    $passwordUsuario = trim($_POST["passwordUsuario"]);
                    $rolUsuario = trim($_POST["rolUsuario"]);
                    $estadoUsuario = intval($_POST["estadoUsuario"]);;

                    $datosControlador = array(
                        'idUsuari'       => $idUsuari,
                        'nombreUsuario'       => $nombreUsuario,
                        'apellidoUsuario'       => $apellidoUsuario,
                        'correoUsuario'       => $correoUsuario,
                        'telefonoUsuario'       => $telefonoUsuario,
                        'direccionUsuario'       => $direccionUsuario,
                        'passwordUsuario'       => $passwordUsuario,
                        'rolUsuario'       => $rolUsuario,
                        'estadoUsuario'       => $estadoUsuario
                        
                    );

                    if ($_SESSION["usuario_rol"]=="Coordinador") {

                        return $respuestaModelo = UsuarioModelo::mdlRegistrarUsuario($tabla, $datosControlador);

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

    public static function ctrRegistrarUsuarioCoordinador()
    {
        $tabla = "coordinador";
        date_default_timezone_set('America/Bogota');
        $usu_Ingreso = date("Y-m-d H:i:s");

        if (isset($_POST)) {

            if ($_SESSION["usuario_rol"] == "Coordinador" || $_SESSION["usuario_rol"] == "Auxiliar") {

                if ($_POST["idCoordinador"]) {
                    $idCoordinador     = intval($_POST["idCoordinador"]);
                    $nombreCoordinador  = trim($_POST["nombreCoordinador"]);
                    $apellidoCoordinador = trim($_POST["apellidoCoordinador"]);
                    $telefonoCoordinador = intval($_POST["telefonoCoordinador"]);
                    $correoCoordinador = trim($_POST["correoCoordinador"]);
                    $oficinaCoordinador = trim($_POST["oficinaCoordinador"]);
                    $estadoCoordinador = intval($_POST["estadoCoordinador"]);
                    $idUsuariofk = intval($_POST["idUsuariofk"]);;

                    $datosControlador = array(
                        'idCoordinador'       => $idCoordinador,
                        'nombreCoordinador'       => $nombreCoordinador,
                        'apellidoCoordinador'       => $apellidoCoordinador,
                        'telefonoCoordinador'       => $telefonoCoordinador,
                        'correoCoordinador'       => $correoCoordinador,
                        'oficinaCoordinador'       => $oficinaCoordinador,
                        'estadoCoordinador'       => $estadoCoordinador,
                        'idUsuariofk'       => $idUsuariofk
                        
                    );

                    if ($_SESSION["usuario_rol"]=="Coordinador") {

                        return $respuestaModelo = UsuarioModelo::mdlRegistrarUsuarioCoordinador($tabla, $datosControlador);

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

    public static function ctrRegistrarUsuarioAuxiliar()
    {
        $tabla = "auxiliar";
        date_default_timezone_set('America/Bogota');
        $usu_Ingreso = date("Y-m-d H:i:s");

        if (isset($_POST)) {

            if ($_SESSION["usuario_rol"] == "Coordinador" || $_SESSION["usuario_rol"] == "Auxiliar") {

                if ($_POST["idAuxiliar"]) {
                    $idAuxiliar     = intval($_POST["idAuxiliar"]);
                    $nombreAuxiliar  = trim($_POST["nombreAuxiliar"]);
                    $apellidoAuxiliar = trim($_POST["apellidoAuxiliar"]);
                    $direccionAuxiliar = trim($_POST["direccionAuxiliar"]);
                    $telefonoAuxiliar = intval($_POST["telefonoAuxiliar"]);
                    $correoAuxiliar = trim($_POST["correoAuxiliar"]);
                    $cursoAuxiliar = trim($_POST["cursoAuxiliar"]);
                    $jornadaAuxiliar = trim($_POST["jornadaAuxiliar"]);
                    $estadoAuxiliar = intval($_POST["estadoAuxiliar"]);
                    $idUsuariofk = intval($_POST["idUsuariofk"]);;

                    $datosControlador = array(
                        'idAuxiliar'       => $idAuxiliar,
                        'nombreAuxiliar'       => $nombreAuxiliar,
                        'apellidoAuxiliar'       => $apellidoAuxiliar,
                        'direccionAuxiliar'       => $direccionAuxiliar,
                        'telefonoAuxiliar'       => $telefonoAuxiliar,
                        'correoAuxiliar'       => $correoAuxiliar,
                        'cursoAuxiliar'       => $cursoAuxiliar,
                        'jornadaAuxiliar'       => $jornadaAuxiliar,
                        'estadoAuxiliar'       => $estadoAuxiliar,
                        'idUsuariofk'       => $idUsuariofk
                        
                    );

                    if ($_SESSION["usuario_rol"]=="Coordinador") {

                        return $respuestaModelo = UsuarioModelo::mdlRegistrarUsuarioAuxiliar($tabla, $datosControlador);

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

    public static function ctrMostrarUsuarios($item, $valor)
    {
        $tabla           = "usuario";
        $respuestaModelo = UsuarioModelo::mdlMostrarUsuarios($tabla, $item, $valor);
        return $respuestaModelo;
    }

    public static function ctrCambiarEstado()
    {
        if ($_SESSION["usuario_rol"]=="Coordinador") {
            

            $tabla           = "usuario";

                if (isset($_POST["idUsuari"]) && !empty($_POST["idUsuari"])) {

                        $datosControlador = array(
                            'estadoUsuario' => intval($_POST["estadoUsuario"]),
                            'idUsuari' => intval($_POST["idUsuari"])
                        );     

                    $respuestaModelo = UsuarioModelo::mdlCambiarEstado($tabla, $datosControlador);

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

    public static function ctrActualizarUsuario()
    {
        $tabla = "usuario";
        date_default_timezone_set('America/Bogota');
        $usu_Ingreso = date("Y-m-d H:i:s");

        if (isset($_POST)) {

            if ($_SESSION["usuario_rol"] == "Coordinador") {

                if ($_POST["idUsuari"]) {
                    $idUsuari     = intval($_POST["idUsuari"]);
                    $nombreUsuario  = trim($_POST["nombreUsuario"]);
                    $apellidoUsuario = trim($_POST["apellidoUsuario"]);
                    $correoUsuario = trim($_POST["correoUsuario"]);
                    $telefonoUsuario = trim($_POST["telefonoUsuario"]);
                    $direccionUsuario = trim($_POST["direccionUsuario"]);
                    $passwordUsuario = trim($_POST["passwordUsuario"]);
                    $rolUsuario = trim($_POST["rolUsuario"]);

                    $datosControlador = array(
                        'idUsuari'       => $idUsuari,
                        'nombreUsuario'       => $nombreUsuario,
                        'apellidoUsuario'       => $apellidoUsuario,
                        'correoUsuario'       => $correoUsuario,
                        'telefonoUsuario'       => $telefonoUsuario,
                        'direccionUsuario'       => $direccionUsuario,
                        'passwordUsuario'       => $passwordUsuario,
                        'rolUsuario'       => $rolUsuario,
                        
                    );

                    if ($_SESSION["usuario_rol"]=="Coordinador") {

                        return $respuestaModelo = UsuarioModelo::mdlActualizarUsuario($tabla, $datosControlador);

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

    public static function ctrDescargarReporteUsuarios()
    {
        
        if (isset($_GET["reporte"])) {

            $tabla           = "usuario";
            $respuestaModelo = UsuarioModelo::mdlMostrarUsuarios($tabla, null, null);

            if (!isset($respuestaModelo["mensaje"])) {

                $nombre    = $_GET["reporte"] . "xlsx";
                $documento = new Spreadsheet();
                $documento
                    ->getProperties()
                    ->setCreator("CREADOR: colegiofranciscojaviermatiz.com.co")
                    ->setLastModifiedBy(date('Y-m-d H:i:s')) // última vez modificado por
                    ->setTitle('Reporte de usuarios COLEGIO FRANCISCO JAVIER MATIZ')
                    ->setSubject('usuarios')
                    ->setDescription('Este documento fue generado para COLEGIO FRANCISCO JAVIER MATIZ')
                    ->setCategory('Usuarios');

                $hoja = $documento->getActiveSheet();
                $hoja->setTitle("Usuarios");
                $hoja->setCellValue("A1", "idUsuari");
                $hoja->setCellValue("B1", "nombreUsuario");
                $hoja->setCellValue("C1", "apellidoUsuario");
                $hoja->setCellValue("D1", "correoUsuario");
                $hoja->setCellValue("E1", "telefonoUsuario");
                $hoja->setCellValue("F1", "direccionUsuario");
                $hoja->setCellValue("G1", "rolUsuario");
                $hoja->setCellValue("H1", "estadoUsuario");
                $celdas = 2;

                for ($i = 0; $i < count($respuestaModelo); $i++) {
                    $hoja->setCellValue("A" . ($celdas), $respuestaModelo[$i]["idUsuari"]);
                    $hoja->setCellValue("B" . ($celdas), $respuestaModelo[$i]["nombreUsuario"]);
                    $hoja->setCellValue("C" . ($celdas), $respuestaModelo[$i]["apellidoUsuario"]);
                    $hoja->setCellValue("D" . ($celdas), $respuestaModelo[$i]["correoUsuario"]);
                    $hoja->setCellValue("E" . ($celdas), $respuestaModelo[$i]["telefonoUsuario"]);
                    $hoja->setCellValue("F" . ($celdas), $respuestaModelo[$i]["direccionUsuario"]);
                    $hoja->setCellValue("G" . ($celdas), $respuestaModelo[$i]["rolUsuario"]);
                    if ($respuestaModelo[$i]["estadoUsuario"] == 1) {
                        $activo = "ACTIVO";
                    } else {
                        $activo = "INACTIVO";
                    }
                    $hoja->setCellValue("H" . ($celdas), $activo);
                    $celdas += 1;
                }

                $nombreDelDocumento = "usuarios-" . date('YmdHis') . ".xlsx";

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

