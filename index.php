<?php

	require_once("controladores/principal_controlador.php");
	require_once("controladores/personajes_controlador.php");
	require_once("modelos/personajes_modelo.php");

	$principal = new PrincipalControlador();
	$principal -> principal();