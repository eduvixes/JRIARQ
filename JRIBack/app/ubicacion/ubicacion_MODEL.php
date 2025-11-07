<?php

include_once './Base/ModelBase.php';

class ubicacion_MODEL extends ModelBase{


	//METODOS
	// tabla tabla
	// clave array(clavestabla)
	// foraneas array(tablaforanea => clavetablaforanea)
	function __construct(){

		$this->tabla = 'ubicacion';
		$this->clave = array('id_site');
		$this->foraneas = array();
		$this->autoincrement = array('id_site');
	}


}
?>
