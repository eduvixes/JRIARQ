<?php

include_once './Base/ModelBase.php';

class Montse_proceso_MODEL extends ModelBase{


	//METODOS
	// tabla tabla
	// clave array(clavestabla)
	// foraneas array(tablaforanea => clavetablaforanea)
	function __construct(){

		$this->tabla = 'Montse_proceso';
		$this->clave = array('proceso_id');
		$this->foraneas = array();
		$this->autoincrement = array('proceso_id');
	}


}
?>
