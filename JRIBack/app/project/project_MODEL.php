<?php

include_once './Base/ModelBase.php';

class project_MODEL extends ModelBase{


	//METODOS
	// tabla tabla
	// clave array(clavestabla)
	// foraneas array(tablaforanea => clavetablaforanea)
	function __construct(){

		$this->tabla = 'project';
		$this->clave = array('id_project');
		$this->foraneas = array();
		$this->autoincrement = array('');
	}


}
?>
