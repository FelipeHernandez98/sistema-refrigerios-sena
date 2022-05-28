<?php

require_once '../modelos/usuario.modelo.php';
require_once '../controladores/usuario.controlador.php';

class MostrarUsuarios
{

    public function TablaUsuarios()
    {
        $item = null;
        $valor = null;

        $Usuarios = usuarioControlador::ctrMostrarUsuarios($item, $valor);
        
        if (count($Usuarios) == 0 || isset($Usuarios["mensaje"])){

            echo '{"data": []}';

            return;
        }

        $datosJson = '{
            "data": [';

        
        for($i = 0; $i < count($Usuarios); $i++) { 

            $botones = "<div class='btn-group' role='group' aria-label='Basic example'> <button type='button' class='btn btn-success btn-traer-datos-usuarios' idUsuari='" . $Usuarios[$i]["idUsuari"] . "' nombreUsuario='" . $Usuarios[$i]["nombreUsuario"] . "' apellidoUsuario='" . $Usuarios[$i]["apellidoUsuario"] . "' correoUsuario='" . $Usuarios[$i]["correoUsuario"] . "' telefonoUsuario='" . $Usuarios[$i]["telefonoUsuario"] . "' direccionUsuario='" . $Usuarios[$i]["direccionUsuario"] . "' rolUsuario='" . $Usuarios[$i]["rolUsuario"] . "' passwordUsuario='" . $Usuarios[$i]["passwordUsuario"] . "'><i class='fas fa-edit'></i></button></div>";

            if($Usuarios[$i]["estadoUsuario"] == 1){
                $estado = "  <button type='button'class='btn btn-success btn-xs btn-desactivar' idUsuari='" . $Usuarios[$i]["idUsuari"] ."' style='width: 90px; border: 1px solid white''> Activo</button> </div>";
            }else{
                $estado = "  <button type='button'class='btn btn-danger btn-xs btn-activar' idUsuari='" . $Usuarios[$i]["idUsuari"] ."' style='width: 90px; border: 1px solid white''></i> Inactivo</button> </div>";
            }

            $datosJson .= '[
                "' . $Usuarios[$i]["nombreUsuario"] . '",
                "' . $Usuarios[$i]["apellidoUsuario"] . '",
                "' . $Usuarios[$i]["correoUsuario"] . '",
                "' . $Usuarios[$i]["telefonoUsuario"] . '",
                "' . $Usuarios[$i]["direccionUsuario"] . '",
                "' . $Usuarios[$i]["rolUsuario"] . '",
                "' . $estado . '",
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
        $ver = new MostrarUsuarios();
        $ver->TablaUsuarios();
        break;
    case 'add':
        $add = usuarioControlador::ctrRegistrarUsuario();
        echo json_encode($add);
        break;
    case 'addcor':
        $addcor = usuarioControlador::ctrRegistrarUsuarioCoordinador();
        echo json_encode($addcor);
        break;
    case 'addaux':
        $addaux = usuarioControlador::ctrRegistrarUsuarioAuxiliar();
        echo json_encode($addaux);
        break;
    case 'estado':
        $estado = usuarioControlador::ctrCambiarEstado();  
        echo json_encode($estado);
        break;
    case 'combo':
        $item = null;
        $valor = null;
        $combo = usuarioControlador::ctrMostrarUsuarios($item, $valor);
        echo json_encode($combo);
        break;
    case 'updt':
        $updt = usuarioControlador::ctrActualizarUsuario();
        echo json_encode($updt);
        break;
}
