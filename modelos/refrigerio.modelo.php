<?php

require_once 'conexion.php';

class RefrigerioModelo
{
    public static function mdlRegistrarRefrigerio($tabla, $datosModelo)
    {
        try {

            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (fechaRefrigerio, horaRefrigerio, tipoRefrigerio, cantidadRefrigerio, descripcionRefrigerio, estadoRefrigerio, idCoordinadorfk, idAuxiliar) VALUES (:fechaRefrigerio, :horaRefrigerio, :tipoRefrigerio, :cantidadRefrigerio, :descripcionRefrigerio, :estadoRefrigerio, :idCoordinadorfk, :idAuxiliar)");

            $stmt->bindParam(":fechaRefrigerio", $datosModelo["fechaRefrigerio"], PDO::PARAM_STR);
            $stmt->bindParam(":horaRefrigerio", $datosModelo["horaRefrigerio"], PDO::PARAM_STR);
            $stmt->bindParam(":tipoRefrigerio", $datosModelo["tipoRefrigerio"], PDO::PARAM_STR);
            $stmt->bindParam(":cantidadRefrigerio", $datosModelo["cantidadRefrigerio"], PDO::PARAM_INT);
            $stmt->bindParam(":descripcionRefrigerio", $datosModelo["descripcionRefrigerio"], PDO::PARAM_STR);
            $stmt->bindParam(":estadoRefrigerio", $datosModelo["estadoRefrigerio"], PDO::PARAM_INT);
            $stmt->bindParam(":idCoordinadorfk", $datosModelo["idCoordinadorfk"], PDO::PARAM_INT);
            $stmt->bindParam(":idAuxiliar", $datosModelo["idAuxiliar"], PDO::PARAM_INT);

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

    public static function mdlMostrarRefrigerios($tabla, $item, $valor)
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
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estadoRefrigerio = :estadoRefrigerio WHERE idRefrigerio = :idRefrigerio");

            $stmt->bindParam(":estadoRefrigerio", $datosModelo["estadoRefrigerio"], PDO::PARAM_INT);
            $stmt->bindParam(":idRefrigerio", $datosModelo["idRefrigerio"], PDO::PARAM_INT);


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

    public static function mdlActualizarRefrigerio($tabla, $datosModelo)
    {
        try {

            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  fechaRefrigerio = :fechaRefrigerio, horaRefrigerio = :horaRefrigerio, tipoRefrigerio = :tipoRefrigerio, cantidadRefrigerio = :cantidadRefrigerio, descripcionRefrigerio = :descripcionRefrigerio WHERE idRefrigerio = :idRefrigerio");

            $stmt->bindParam(":idRefrigerio", $datosModelo["idRefrigerio"], PDO::PARAM_INT);
            $stmt->bindParam(":fechaRefrigerio", $datosModelo["fechaRefrigerio"], PDO::PARAM_STR);
            $stmt->bindParam(":horaRefrigerio", $datosModelo["horaRefrigerio"], PDO::PARAM_STR);
            $stmt->bindParam(":tipoRefrigerio", $datosModelo["tipoRefrigerio"], PDO::PARAM_STR);
            $stmt->bindParam(":cantidadRefrigerio", $datosModelo["cantidadRefrigerio"], PDO::PARAM_INT);
            $stmt->bindParam(":descripcionRefrigerio", $datosModelo["descripcionRefrigerio"], PDO::PARAM_STR);
            //$stmt->bindParam(":idCoordinadorfk", $datosModelo["idCoordinadorfk"], PDO::PARAM_INT);
            //$stmt->bindParam(":idAuxiliar", $datosModelo["idAuxiliar"], PDO::PARAM_INT);
            

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