<?php

	class PersonajesControlador
	{

		static public function registrar($datos)
		{

			$tabla = "characters";

			$peticion = PersonajesModelo::registrar($tabla, $datos);

			return $peticion;

		}

		static public function consultar()
		{

			$tabla = "characters";

			$peticion = PersonajesModelo::consultar($tabla);

			return $peticion;

		}

		static public function actualizar($datos)
		{

			$tabla = "characters";

			$peticion = PersonajesModelo::actualizar($tabla, $datos);

			return $peticion;

		}

	}