<?php

require_once '../../controladores/usuario.controlador.php';
require_once '../../modelos/usuario.modelo.php';

require_once '../../controladores/refrigerio.controlador.php';
require_once '../../modelos/refrigerio.modelo.php';

require_once '../../controladores/curso.controlador.php';
require_once '../../modelos/curso.modelo.php';

require __DIR__ . "/../../extensiones/vendor/autoload.php";
//
//
ob_end_clean();

if (isset($_GET["reporte"]) && $_GET["reporte"] === "usuarios") {
    $usuarios = new usuarioControlador();
    $usuarios->ctrDescargarReporteUsuarios();
} else if (isset($_GET["reporte"]) && $_GET["reporte"] === "refrigerios") {
    $refrigerios = new RefrigerioControlador();
    $refrigerios->ctrDescargarReporteRefrigerios();
} else if (isset($_GET["reporte"]) && $_GET["reporte"] === "cursos") {
    $cursos = new CursoControlador();
    $cursos->ctrDescargarReporteCursos();
} 
