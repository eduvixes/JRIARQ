<?php

include_once './Base/ModelBase.php';

class Montse_aportacion_MODEL extends ModelBase{


	//METODOS
	// tabla tabla
	// clave array(clavestabla)
	// foraneas array(tablaforanea => clavetablaforanea)
	function __construct(){

		$this->tabla = 'Montse_aportacion';
		$this->clave = array('aportacion_id');
		$this->foraneas = array();
		$this->autoincrement = array('aportacion_id');
	}


}
?>
