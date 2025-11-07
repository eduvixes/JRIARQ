<?php

include_once './Base/ModelBase.php';

class Montse_usuario_MODEL extends ModelBase{


	//METODOS
	// tabla tabla
	// clave array(clavestabla)
	// foraneas array(tablaforanea => clavetablaforanea)
	function __construct(){

		$this->tabla = 'Montse_usuario';
		$this->clave = array('usuario_login');
		$this->foraneas = array();
		$this->autoincrement = array();
	}

	function cambiar_contrasena(){
		$this->mapping = new mapping($this->tabla);
		$query = "UPDATE Montse_usuario SET usuario_password = '".$_POST['usuario_password']."' WHERE (usuario_login = '".$_POST['usuario_login']."')";
		$result = $this->mapping->lanzarquery($query);
		return $result;
	}



}
?>
