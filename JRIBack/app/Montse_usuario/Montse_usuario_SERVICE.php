<?php

include_once './Base/appServiceBase.php';

class Montse_usuario_SERVICE extends appServiceBase{

	public $modelo;

	//METODOS

	function __construct(){

		parent::__construct();

	}

	function inicializarRest(){

		$this->listaAtributos = array('usuario_login', 'usuario_password', 'usuario_dni', 'usuario_nombre', 'usuario_apellidos', 'usuario_telefono', 'usuario_email', 'usuario_direccion', 'usuario_fechaNacimiento', 'usuario_pais', 'usuario_genero', 'usuario_estudios','usuario_rol');

		$this->listaAtributosSelect = array('usuario_login', 'usuario_password', 'usuario_dni', 'usuario_nombre', 'usuario_apellidos', 'usuario_telefono', 'usuario_email', 'usuario_direccion', 'usuario_fechaNacimiento', 'usuario_pais', 'usuario_genero', 'usuario_estudios','usuario_rol');

		$this->notnull = array(
						'ADD'=>array('usuario_login', 'usuario_password', 'usuario_dni', 'usuario_nombre', 'usuario_apellidos', 'usuario_telefono', 'usuario_email', 'usuario_direccion', 'usuario_fechaNacimiento', 'usuario_pais', 'usuario_genero', 'usuario_estudios','usuario_rol'),
						'EDIT'=>array('usuario_login', 'usuario_password', 'usuario_dni', 'usuario_nombre', 'usuario_apellidos', 'usuario_telefono', 'usuario_email', 'usuario_direccion', 'usuario_fechaNacimiento', 'usuario_pais', 'usuario_genero', 'usuario_estudios','usuario_rol'),
						'DELETE'=>array('usuario_login'),
						);

		$this->modelo = $this->crearModelOne('Montse_usuario');

	}

	function cambiar_contrasena(){
		$res = $this->modelo->cambiar_contrasena();
		return $res;
	}
	

}

?>
