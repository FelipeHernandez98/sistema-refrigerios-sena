<?php

require_once 'conexion.php';

class CursoModelo
{
    public static function mdlRegistrarCurso($tabla, $datosModelo)
    {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (idCurso, sedeCurso, cantidadAlumnosCurso, directorCurso, estadoCurso, idRefrigeriofk) VALUES (:idCurso, :sedeCurso, :cantidadAlumnosCurso, :directorCurso, :estadoCurso, :idRefrigeriofk)");

            $stmt->bindParam(":idCurso", $datosModelo["idCurso"], PDO::PARAM_INT);
            $stmt->bindParam(":sedeCurso", $datosModelo["sedeCurso"], PDO::PARAM_STR);
            $stmt->bindParam(":cantidadAlumnosCurso", $datosModelo["cantidadAlumnosCurso"], PDO::PARAM_INT);
            $stmt->bindParam(":directorCurso", $datosModelo["directorCurso"], PDO::PARAM_STR);
            $stmt->bindParam(":estadoCurso", $datosModelo["estadoCurso"], PDO::PARAM_INT);
            $stmt->bindParam(":idRefrigeriofk", $datosModelo["idRefrigeriofk"], PDO::PARAM_INT);

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

    public static function mdlMostrarCursos($tabla, $item, $valor)
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
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estadoCurso = :estadoCurso WHERE idCurso = :idCurso");

            $stmt->bindParam(":estadoCurso", $datosModelo["estadoCurso"], PDO::PARAM_INT);
            $stmt->bindParam(":idCurso", $datosModelo["idCurso"], PDO::PARAM_INT);


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

    public static function mdlActualizarCurso($tabla, $datosModelo)
    {
        try {

            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  sedeCurso = :sedeCurso, cantidadAlumnosCurso = :cantidadAlumnosCurso, directorCurso = :directorCurso, idRefrigeriofk = :idRefrigeriofk WHERE idCurso = :idCurso");

            $stmt->bindParam(":idCurso", $datosModelo["idCurso"], PDO::PARAM_INT);
            $stmt->bindParam(":sedeCurso", $datosModelo["sedeCurso"], PDO::PARAM_STR);
            $stmt->bindParam(":cantidadAlumnosCurso", $datosModelo["cantidadAlumnosCurso"], PDO::PARAM_INT);
            $stmt->bindParam(":directorCurso", $datosModelo["directorCurso"], PDO::PARAM_STR);
            $stmt->bindParam(":idRefrigeriofk", $datosModelo["idRefrigeriofk"], PDO::PARAM_STR);

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