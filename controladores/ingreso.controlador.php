<?php
class ingresoControlador
{
    public static function ctrIngresarUsuario()
    {
        if (isset($_POST["ingresoCorreo"])) {
            if ($_POST["ingresoCorreo"] && preg_match('/^[a-zA-Z0-9-]+$/', $_POST["ingresoPassword"])) {
                
                $datosControador = array(
                    "correoUsuario"    => strtoupper(trim($_POST["ingresoCorreo"])),
                    "passwordUsuario" => strtoupper(trim($_POST["ingresoPassword"])),
                );

                $respuesta = IngresoModelo::mdlingresoUsuario($datosControador, "usuario");

                $usuarioActual = $_POST["ingresoCorreo"];

                if (is_array($respuesta) && !isset($respuesta["mensaje"])) {

                    if ($respuesta["correoUsuario"] == $usuarioActual && $_POST["ingresoPassword"] == $respuesta["passwordUsuario"]) {

                        if (intval($respuesta["estadoUsuario"]) === 1) {
                            if (!isset($_SESSION)) {
                                session_start();

                            }
                            $_SESSION["validarSession"]   = true;
                            $_SESSION["usuario_nombre"]    = $respuesta["nombreUsuario"];
                            $_SESSION["usuario_apellido"]    = $respuesta["apellidoUsuario"];
                            $_SESSION["usuario_correo"]    = $respuesta["correoUsuario"];
                            $_SESSION["usuario_id"]       = $respuesta["idUsuari"];
                            $_SESSION["usuario_rol"]       = $respuesta["rolUsuario"];

                            
                            echo '<script> window.location = "inicio"; </script>';
                            header("HTTP/1.1 301 Moved Permanently");
                            /* header("Location: " . URL . "inicio"); */

                            
                        } else {
                            echo '<div class="alert alert-info alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <h5><i class="icon fas fa-exclamation-triangle"></i> Advertencia!</h5> Usuario Inactivo. Comunicarse Con el Administrador</div>';
                        }

                    } else {

                        echo '<div class="alert alert-warning alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <h5><i class="icon fas fa-exclamation-triangle"></i> Advertencia!</h5> Usuario y/o Contraseña incorrectos. </div>';
                    }
                } else {

                    echo '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <h5><i class="icon fas fa-exclamation-triangle"></i> Advertencia!</h5> Error: ' . $respuesta["codigo"] . '</div>';
                }

            } else {

                echo '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <h5><i class="icon fas fa-exclamation-triangle"></i> Advertencia!</h5> Los campos Estan vacios o ingresaron caracteres no permitidos. </div>';
            }
        }
    }
}
