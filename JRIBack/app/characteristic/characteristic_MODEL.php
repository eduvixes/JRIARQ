<?php

include_once './Base/ModelBase.php';

class characteristic_MODEL extends ModelBase{


	//METODOS
	// tabla tabla
	// clave array(clavestabla)
	// foraneas array(tablaforanea => clavetablaforanea)
	function __construct(){

		$this->tabla = 'characteristic';
		$this->clave = array('id_characteristic');
		$this->foraneas = array();
		$this->autoincrement = array('id_characteristic');
	}


}
?>