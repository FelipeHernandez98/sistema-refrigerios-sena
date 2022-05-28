<?php

require_once '../modelos/refrigerio.modelo.php';
require_once '../controladores/refrigerio.controlador.php';

class MostrarRefrigerios
{
    public function TablaRefrigerios()
    {
        $item = null;
        $valor = null;

        $Refrigerios = RefrigerioControlador::ctrMostrarRefrigerios($item, $valor);
        
        if (count($Refrigerios) == 0 || isset($Refrigerios["mensaje"])){

            echo '{"data": []}';

            return;
        }

        $datosJson = '{
            "data": [';

        
        for($i = 0; $i < count($Refrigerios); $i++) { 

            $botones = "<div class='btn-group' role='group' aria-label='Basic example'> <button type='button' class='btn btn-success btn-traer-datos-refrigerio' idRefrigerio='" . $Refrigerios[$i]["idRefrigerio"] . "' fechaRefrigerio='" . $Refrigerios[$i]["fechaRefrigerio"] . "' horaRefrigerio='" . $Refrigerios[$i]["horaRefrigerio"] . "' tipoRefrigerio='" . $Refrigerios[$i]["tipoRefrigerio"] . "' cantidadRefrigerio='" . $Refrigerios[$i]["cantidadRefrigerio"] . "' descripcionRefrigerio='" . $Refrigerios[$i]["descripcionRefrigerio"] . "' estadoRefrigerio='" . $Refrigerios[$i]["estadoRefrigerio"] . "' idCoordinadorfk='" . $Refrigerios[$i]["idCoordinadorfk"] . "' idAuxiliar='" . $Refrigerios[$i]["idAuxiliar"] . "'><i class='fas fa-edit'></i></button></div>";

            if($Refrigerios[$i]["estadoRefrigerio"] == 1){
                $estado = "  <button type='button'class='btn btn-success btn-xs btn-desactivar' idRefrigerio='" . $Refrigerios[$i]["idRefrigerio"] ."' style='width: 90px; border: 1px solid white''> Activo</button> </div>";
            }else{
                $estado = "  <button type='button'class='btn btn-danger btn-xs btn-activar' idRefrigerio='" . $Refrigerios[$i]["idRefrigerio"] ."' style='width: 90px; border: 1px solid white''></i> Inactivo</button> </div>";
            }

            $datosJson .= '[
                "' . $Refrigerios[$i]["fechaRefrigerio"] . '",
                "' . $Refrigerios[$i]["horaRefrigerio"] . '",
                "' . $Refrigerios[$i]["tipoRefrigerio"] . '",
                "' . $Refrigerios[$i]["cantidadRefrigerio"] . '",
                "' . $Refrigerios[$i]["descripcionRefrigerio"] . '",
                "' . $Refrigerios[$i]["idCoordinadorfk"] . '",
                "' . $Refrigerios[$i]["idAuxiliar"] . '",
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
        $ver = new MostrarRefrigerios();
        $ver->TablaRefrigerios();
        break;        
    case 'add':
        $add = RefrigerioControlador::ctrRegistrarRefrigerio();
        echo json_encode($add);
        break;
    case 'estado':
        $estado = RefrigerioControlador::ctrCambiarEstado();
        echo json_encode($estado);
        break;
    case 'combo':
        $item = null;
        $valor = null;
        $combo = RefrigerioControlador::ctrMostrarRefrigerios($item, $valor);
        echo json_encode($combo);
        break;
    case 'updt':
        $updt = RefrigerioControlador::ctrActualizarRefrigerio();
        echo json_encode($updt);
        break;
}