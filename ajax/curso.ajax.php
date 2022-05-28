<?php

require_once '../modelos/curso.modelo.php';
require_once '../controladores/curso.controlador.php';

class MostrarCursos
{
    public function TablaCursos()
    {
        $item = null;
        $valor = null;

        $Cursos = CursoControlador::ctrMostrarCursos($item, $valor);
        
        if (count($Cursos) == 0 || isset($Cursos["mensaje"])){

            echo '{"data": []}';

            return;
        }

        $datosJson = '{
            "data": [';

        
        for($i = 0; $i < count($Cursos); $i++) { 

            $botones = "<div class='btn-group' role='group' aria-label='Basic example'> <button type='button' class='btn btn-success btn-traer-datos-curso' idCurso='" . $Cursos[$i]["idCurso"] . "' sedeCurso='" . $Cursos[$i]["sedeCurso"] . "' cantidadAlumnosCurso='" . $Cursos[$i]["cantidadAlumnosCurso"] . "' directorCurso='" . $Cursos[$i]["directorCurso"] . "' estadoCurso='" . $Cursos[$i]["estadoCurso"] . "' idRefrigeriofk='" . $Cursos[$i]["idRefrigeriofk"] . "'><i class='fas fa-edit'></i></button> </div>";

            if($Cursos[$i]["estadoCurso"] == 1){
                $estado = "  <button type='button'class='btn btn-success btn-xs btn-desactivar' idCurso='" . $Cursos[$i]["idCurso"] ."' style='width: 90px; border: 1px solid white''> Activo</button> </div>";
            }else{
                $estado = "  <button type='button'class='btn btn-danger btn-xs btn-activar' idCurso='" . $Cursos[$i]["idCurso"] ."' style='width: 90px; border: 1px solid white''></i> Inactivo</button> </div>";
            }

            $datosJson .= '[
                "' . $Cursos[$i]["idCurso"] . '",
                "' . $Cursos[$i]["sedeCurso"] . '",
                "' . $Cursos[$i]["cantidadAlumnosCurso"] . '",
                "' . $Cursos[$i]["directorCurso"] . '",
                "' . $Cursos[$i]["idRefrigeriofk"] . '",
                "' . $estado .'",
                "' . $botones .'"
              ],';
        }

        $datosJson = substr($datosJson, 0, -1);

        $datosJson .= ']

        }';

        echo $datosJson;
    }
}

$acc = "";
if (isset($_POST["acc"])) {
    $acc = $_POST["acc"];
} else if (isset($_GET["acc"])) {
    $acc = $_GET["acc"];
} else {
    $acc = "ver";
}

if (!isset($_SESSION)) {
    session_start();
}

switch ($acc) {
    case 'ver':
        $ver = new MostrarCursos();
        $ver->TablaCursos();
        break;        
    case 'add':
        $add = CursoControlador::ctrRegistrarCurso();
        echo json_encode($add);
        break;
    case 'estado':
        $estado = CursoControlador::ctrCambiarEstado();  
        echo json_encode($estado);
        break;
    case 'updt':
        $updt = CursoControlador::ctrActualizarCurso();
        echo json_encode($updt);
        break;
}