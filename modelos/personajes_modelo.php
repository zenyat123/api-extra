<?php

	require_once("conexion.php");

	class PersonajesModelo
	{

		static public function registrar($tabla, $datos)
		{

			$stmt = Conexion::conectar()->prepare("insert into $tabla (id, name, species, status) values (:id, :name, :species, :status)");

			$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
			$stmt -> bindParam(":name", $datos["name"], PDO::PARAM_STR);
			$stmt -> bindParam(":species", $datos["species"], PDO::PARAM_STR);
			$stmt -> bindParam(":status", $datos["status"], PDO::PARAM_STR);

			if($stmt -> execute())
			{

				return "Registrado";

			}
			else
			{

				return $stmt -> errorInfo();

			}

			$stmt -> close();

			$stmt = null;

		}

		static public function consultar($tabla)
		{

			$stmt = Conexion::conectar()->prepare("select * from $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

			$stmt -> close();

			$stmt = null;

		}

		static public function actualizar($tabla, $datos)
		{

			$stmt = Conexion::conectar()->prepare("update $tabla set name = :name, species = :species, status = :status where id = :id");

			$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
			$stmt -> bindParam(":name", $datos["name"], PDO::PARAM_STR);
			$stmt -> bindParam(":species", $datos["species"], PDO::PARAM_STR);
			$stmt -> bindParam(":status", $datos["status"], PDO::PARAM_STR);

			if($stmt -> execute())
			{

				return "Actualizado";

			}
			else
			{

				return $stmt -> errorInfo();

			}

			$stmt -> close();

			$stmt = null;

		}

	}