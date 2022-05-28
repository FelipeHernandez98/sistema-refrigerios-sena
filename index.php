<?php

error_reporting(E_ALL); // ERROR / EXCEPCION

ini_set('ignore_repeated_errors', true);

ini_set('display_error', false);

ini_set('log_errors', true);

ini_set('error_log', 'php-error' . date("Y-m-d") . '.log');

/*error_log('ERRORES');*/

date_default_timezone_set('America/Bogota');

//modelos
require_once 'modelos/ingreso.modelo.php';
require_once 'modelos/usuario.modelo.php';
require_once 'modelos/refrigerio.modelo.php';
require_once 'modelos/curso.modelo.php';



//controladores
require_once 'controladores/plantilla.controlador.php';
require_once 'controladores/ingreso.controlador.php';
require_once 'controladores/usuario.controlador.php';
require_once 'controladores/refrigerio.controlador.php';
require_once 'controladores/curso.controlador.php';



//EXTENSIONES
/*require_once "extensiones/vendor/autoload.php";*/

$template = new PlantillaControlador();
$template->plantilla();

