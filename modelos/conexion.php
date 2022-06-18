<?php

	class Conexion{

		static public function conectar()
		{

			$servidor = "";
			$base_de_datos = "";
			$usuario = "";
			$contrasena = "";

			$conexion = new PDO("mysql:host=$servidor;dbname=$base_de_datos", "$usuario", "$contrasena",
							array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

			return $conexion;

		}

	}