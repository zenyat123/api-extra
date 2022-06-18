<?php

	require_once("../controladores/personajes_controlador.php");
	require_once("../modelos/personajes_modelo.php");

	class PersonajesAjax{

		public $id;
		public $name;
		public $species;
		public $status;

		public $id_edit;
		public $name_edit;
		public $species_edit;
		public $status_edit;

		public function registrar()
		{

			$datos = ["id" => $this->id, "name" => $this->name, "species" => $this->species, "status" => $this->status];

			$peticion = PersonajesControlador::registrar($datos);

		}

		public function actualizar()
		{

			$datos = ["id" => $this->id_edit, "name" => $this->name_edit, "species" => $this->species_edit, "status" => $this->status_edit];

			$peticion = PersonajesControlador::actualizar($datos);

		}

	}

	if(isset($_POST["id"]))
	{

		$registrar = new PersonajesAjax();
		$registrar -> id = $_POST["id"];
		$registrar -> name = $_POST["name"];
		$registrar -> species = $_POST["species"];
		$registrar -> status = $_POST["status"];
		$registrar -> registrar();

	}

	if(isset($_POST["id_edit"]))
	{

		$actualizar = new PersonajesAjax();
		$actualizar -> id_edit = $_POST["id_edit"];
		$actualizar -> name_edit = $_POST["name_edit"];
		$actualizar -> species_edit = $_POST["species_edit"];
		$actualizar -> status_edit = $_POST["status_edit"];
		$actualizar -> actualizar();

	}