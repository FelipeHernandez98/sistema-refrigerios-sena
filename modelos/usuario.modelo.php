<?php

require_once 'conexion.php';

class UsuarioModelo
{
    public static function mdlRegistrarUsuario($tabla, $datosModelo)
    {

        try {

            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (idUsuari, nombreUsuario, apellidoUsuario, correoUsuario, telefonoUsuario, direccionUsuario, passwordUsuario, rolUsuario, estadoUsuario) VALUES (:idUsuari, :nombreUsuario, :apellidoUsuario, :correoUsuario, :telefonoUsuario, :direccionUsuario, :passwordUsuario, :rolUsuario, :estadoUsuario)");

            $stmt->bindParam(":idUsuari", $datosModelo["idUsuari"], PDO::PARAM_INT);
            $stmt->bindParam(":nombreUsuario", $datosModelo["nombreUsuario"], PDO::PARAM_STR);
            $stmt->bindParam(":apellidoUsuario", $datosModelo["apellidoUsuario"], PDO::PARAM_STR);
            $stmt->bindParam(":correoUsuario", $datosModelo["correoUsuario"], PDO::PARAM_STR);
            $stmt->bindParam(":telefonoUsuario", $datosModelo["telefonoUsuario"], PDO::PARAM_INT);
            $stmt->bindParam(":direccionUsuario", $datosModelo["direccionUsuario"], PDO::PARAM_STR);
            $stmt->bindParam(":passwordUsuario", $datosModelo["passwordUsuario"], PDO::PARAM_STR);
            $stmt->bindParam(":rolUsuario", $datosModelo["rolUsuario"], PDO::PARAM_STR);
            $stmt->bindParam(":estadoUsuario", $datosModelo["estadoUsuario"], PDO::PARAM_INT);

            $stmt->execute();

            $stmt = null;

            $arrayName = array(
                'mensaje' => 'ok',
            );

            return $arrayName;

        } catch (PDOException $e) {

            $err       = $stmt->errorInfo();
            $arrayName = array(
                'mensaje'         => $e->getMessage(),
                'codigo'          => $err[1],
                'sqlstate'        => $e->getCode(),
                'script'          => $e->getFile(),
                'linea'           => $e->getLine(),
                'excepcionprevia' => $e->getPrevious(),
                'cadena'          => $e->__toString(),
                'errorinfo'       => $err[2],
            );

            return $arrayName;
        }

        $stmt = null;
    }

    public static function mdlRegistrarUsuarioCoordinador($tabla, $datosModelo)
    {

        try {

            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (idCoordinador, nombreCoordinador, apellidoCoordinador,  telefonoCoordinador, correoCoordinador, oficinaCoordinador, estadoCoordinador, idUsuariofk) VALUES (:idCoordinador, :nombreCoordinador, :apellidoCoordinador, :telefonoCoordinador, :correoCoordinador, :oficinaCoordinador, :estadoCoordinador, :idUsuariofk)");

            $stmt->bindParam(":idCoordinador", $datosModelo["idCoordinador"], PDO::PARAM_INT);
            $stmt->bindParam(":nombreCoordinador", $datosModelo["nombreCoordinador"], PDO::PARAM_STR);
            $stmt->bindParam(":apellidoCoordinador", $datosModelo["apellidoCoordinador"], PDO::PARAM_STR);
            $stmt->bindParam(":telefonoCoordinador", $datosModelo["telefonoCoordinador"], PDO::PARAM_INT);
            $stmt->bindParam(":correoCoordinador", $datosModelo["correoCoordinador"], PDO::PARAM_STR);
            $stmt->bindParam(":oficinaCoordinador", $datosModelo["oficinaCoordinador"], PDO::PARAM_STR);
            $stmt->bindParam(":estadoCoordinador", $datosModelo["estadoCoordinador"], PDO::PARAM_INT);
            $stmt->bindParam(":idUsuariofk", $datosModelo["idUsuariofk"], PDO::PARAM_INT);

            $stmt->execute();

            $stmt = null;

            $arrayName = array(
                'mensaje' => 'ok',
            );

            return $arrayName;

        } catch (PDOException $e) {

            $err       = $stmt->errorInfo();
            $arrayName = array(
                'mensaje'         => $e->getMessage(),
                'codigo'          => $err[1],
                'sqlstate'        => $e->getCode(),
                'script'          => $e->getFile(),
                'linea'           => $e->getLine(),
                'excepcionprevia' => $e->getPrevious(),
                'cadena'          => $e->__toString(),
                'errorinfo'       => $err[2],
            );

            return $arrayName;
        }

        $stmt = null;
    }

    public static function mdlRegistrarUsuarioAuxiliar($tabla, $datosModelo)
    {

        try {

            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (idAuxiliar, nombreAuxiliar, apellidoAuxiliar, direccionAuxiliar, telefonoAuxiliar, correoAuxiliar, cursoAuxiliar, jornadaAuxiliar, estadoAuxiliar, idUsuariofk) VALUES (:idAuxiliar, :nombreAuxiliar, :apellidoAuxiliar, :direccionAuxiliar, :telefonoAuxiliar, :correoAuxiliar, :cursoAuxiliar, :jornadaAuxiliar, :estadoAuxiliar, :idUsuariofk)");

            $stmt->bindParam(":idAuxiliar", $datosModelo["idAuxiliar"], PDO::PARAM_INT);
            $stmt->bindParam(":nombreAuxiliar", $datosModelo["nombreAuxiliar"], PDO::PARAM_STR);
            $stmt->bindParam(":apellidoAuxiliar", $datosModelo["apellidoAuxiliar"], PDO::PARAM_STR);
            $stmt->bindParam(":direccionAuxiliar", $datosModelo["direccionAuxiliar"], PDO::PARAM_STR);
            $stmt->bindParam(":telefonoAuxiliar", $datosModelo["telefonoAuxiliar"], PDO::PARAM_INT);
            $stmt->bindParam(":correoAuxiliar", $datosModelo["correoAuxiliar"], PDO::PARAM_STR);
            $stmt->bindParam(":cursoAuxiliar", $datosModelo["cursoAuxiliar"], PDO::PARAM_STR);
            $stmt->bindParam(":jornadaAuxiliar", $datosModelo["jornadaAuxiliar"], PDO::PARAM_STR);
            $stmt->bindParam(":estadoAuxiliar", $datosModelo["estadoAuxiliar"], PDO::PARAM_INT);
            $stmt->bindParam(":idUsuariofk", $datosModelo["idUsuariofk"], PDO::PARAM_INT);

            $stmt->execute();

            $stmt = null;

            $arrayName = array(
                'mensaje' => 'ok',
            );

            return $arrayName;

        } catch (PDOException $e) {

            $err       = $stmt->errorInfo();
            $arrayName = array(
                'mensaje'         => $e->getMessage(),
                'codigo'          => $err[1],
                'sqlstate'        => $e->getCode(),
                'script'          => $e->getFile(),
                'linea'           => $e->getLine(),
                'excepcionprevia' => $e->getPrevious(),
                'cadena'          => $e->__toString(),
                'errorinfo'       => $err[2],
            );

            return $arrayName;
        }

        $stmt = null;
    }

    public static function mdlMostrarUsuarios($tabla, $item, $valor)
    {
        if ($item != null) {

            try {

                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

                $stmt->bindParam(":" . $item, $valor);

                $stmt->execute();

                return $stmt->fetch();

            } catch (PDOException $e) {
                $err       = $stmt->errorInfo();
                $arrayName = array(
                    'mensaje'         => $e->getMessage(),
                    'codigo'          => $err[1],
                    'sqlstate'        => $e->getCode(),
                    'script'          => $e->getFile(),
                    'linea'           => $e->getLine(),
                    'excepcionprevia' => $e->getPrevious(),
                    'cadena'          => $e->__toString(),
                    'errorinfo'       => $err[2],
                );

                return $arrayName;

            }

        } else {

            try {

                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

                $stmt->execute();

                return $stmt->fetchAll();

            } catch (PDOException $e) {

                $err       = $stmt->errorInfo();
                $arrayName = array(
                    'mensaje'         => $e->getMessage(),
                    'codigo'          => $err[1],
                    'sqlstate'        => $e->getCode(),
                    'script'          => $e->getFile(),
                    'linea'           => $e->getLine(),
                    'excepcionprevia' => $e->getPrevious(),
                    'cadena'          => $e->__toString(),
                    'errorinfo'       => $err[2],
                );

                return $arrayName;

            }

        }

        $stmt = null;
    }

    public static function mdlCambiarEstado($tabla, $datosModelo)
    {
        try{
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estadoUsuario = :estadoUsuario WHERE idUsuari = :idUsuari");

            $stmt->bindParam(":estadoUsuario", $datosModelo["estadoUsuario"], PDO::PARAM_INT);
            $stmt->bindParam(":idUsuari", $datosModelo["idUsuari"], PDO::PARAM_INT);


            $stmt->execute();

            $stmt = null;

            $arrayName = array(
                'mensaje' => "ok",
            );

            return $arrayName;
        }catch (PDOException $e) {

            $err       = $stmt->errorInfo();
            $arrayName = array(
                'mensaje'         => $e->getMessage(),
                'codigo'          => $err[1],
                'sqlstate'        => $e->getCode(),
                'script'          => $e->getFile(),
                'linea'           => $e->getLine(),
                'excepcionprevia' => $e->getPrevious(),
                'cadena'          => $e->__toString(),
                'errorinfo'       => $err[2],
            );

            return $arrayName;
        }
    }

    public static function mdlActualizarUsuario($tabla, $datosModelo)
    {
        try {

            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  nombreUsuario = :nombreUsuario, apellidoUsuario = :apellidoUsuario, correoUsuario = :correoUsuario, telefonoUsuario = :telefonoUsuario, direccionUsuario = :direccionUsuario, passwordUsuario = :passwordUsuario, rolUsuario = :rolUsuario WHERE idUsuari = :idUsuari");

            $stmt->bindParam(":idUsuari", $datosModelo["idUsuari"], PDO::PARAM_INT);
            $stmt->bindParam(":nombreUsuario", $datosModelo["nombreUsuario"], PDO::PARAM_STR);
            $stmt->bindParam(":apellidoUsuario", $datosModelo["apellidoUsuario"], PDO::PARAM_STR);
            $stmt->bindParam(":correoUsuario", $datosModelo["correoUsuario"], PDO::PARAM_STR);
            $stmt->bindParam(":telefonoUsuario", $datosModelo["telefonoUsuario"], PDO::PARAM_INT);
            $stmt->bindParam(":direccionUsuario", $datosModelo["direccionUsuario"], PDO::PARAM_STR);
            $stmt->bindParam(":passwordUsuario", $datosModelo["passwordUsuario"], PDO::PARAM_STR);
            $stmt->bindParam(":rolUsuario", $datosModelo["rolUsuario"], PDO::PARAM_STR);

            $stmt->execute();

            $stmt = null;

            $arrayName = array(
                'mensaje' => "ok",
            );

            return $arrayName;

        } catch (PDOException $e) {

            $err       = $stmt->errorInfo();
            $arrayName = array(
                'mensaje'         => $e->getMessage(),
                'codigo'          => $err[1],
                'sqlstate'        => $e->getCode(),
                'script'          => $e->getFile(),
                'linea'           => $e->getLine(),
                'excepcionprevia' => $e->getPrevious(),
                'cadena'          => $e->__toString(),
                'errorinfo'       => $err[2],
            );

            return $arrayName;
        }

        $stmt = null;
    }

}