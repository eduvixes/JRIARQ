<?php

include_once './Base/appServiceBase.php';

class alumnograduacion_SERVICE extends appServiceBase{

	public $modelo;

	//METODOS

	function __construct(){

		parent::__construct();

	}

	function inicializarRest(){

		$this->listaAtributos = array('alumnograduacion_login', 'alumnograduacion_password', 'alumnograduacion_nombre', 'alumnograduacion_apellidos', 'alumnograduacion_titulacion', 'alumnograduacion_dni', 'alumnograduacion_telefono', 'alumnograduacion_direccion', 'alumnograduacion_email', 'alumnograduacion_fotoacto'
	);

		$this->listaAtributosSelect = array('alumnograduacion_login', 'alumnograduacion_password', 'alumnograduacion_nombre', 'alumnograduacion_apellidos', 'alumnograduacion_titulacion', 'alumnograduacion_dni', 'alumnograduacion_telefono', 'alumnograduacion_direccion', 'alumnograduacion_email', 'alumnograduacion_fotoacto');

		$this->notnull = array(
						'ADD' => array('alumnograduacion_login', 'alumnograduacion_password', 'alumnograduacion_nombre', 'alumnograduacion_apellidos', 'alumnograduacion_titulacion', 'alumnograduacion_dni', 'alumnograduacion_telefono', 'alumnograduacion_direccion', 'alumnograduacion_email'),
						'EDIT' => array('alumnograduacion_login', 'alumnograduacion_password', 'alumnograduacion_nombre', 'alumnograduacion_apellidos', 'alumnograduacion_titulacion', 'alumnograduacion_dni', 'alumnograduacion_telefono', 'alumnograduacion_direccion', 'alumnograduacion_email'),
						'DELETE' => array('alumnograduacion_dni')
						);

		$this->modelo = $this->crearModelOne('alumnograduacion');
		//array de arrays(nombrecampo de nuevo fichero, nombrecampo de la bd, directorio, array extensiones, tamaño en bytes)
		$this->files = array(
						array('nuevo_alumnograduacion_fotoacto','alumnograduacion_fotoacto','./filesuploaded/files_alumnograduacion_fotoacto/', array('jpg','jpeg'), 2000000)
					);

	}
/*
	function modificacion_atributos(){

		if ((isset($_POST['fecha_publicacion'])) && ($_POST['fecha_publicacion'] != '')){
			$_POST['fecha_publicacion'] = date("Y-m-d", strtotime($_POST['fecha_publicacion']));
		}
		
	}
*/

}
