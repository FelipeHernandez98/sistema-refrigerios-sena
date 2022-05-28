<?php

require_once 'conexion.php';

class IngresoModelo{

	public static function mdlingresoUsuario($datosModelo, $tabla){

		try{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE correoUsuario = :correoUsuario");

			$stmt -> bindParam(":correoUsuario", $datosModelo["correoUsuario"], PDO::PARAM_STR);

			$stmt->execute();

			return $stmt -> fetch();

			$stmt = null;

		} catch (PDOException $e){

			$err = $stmt->errorInfo();
			$arrayName = array(
				'mensaje' => $e->getMessage(),
				'codigo' => $err[1],
				'sqlstate' => $e->getCode(),
				'script' => $e->getFile(),
				'linea' => $e->getLine(),
				'excepcionprevia' => $e->getPrevious(),
				'cadena' => $e->__toString(),
				'errorinfo' => $err[2]
			);

			return $arrayName;
		}

	}
}