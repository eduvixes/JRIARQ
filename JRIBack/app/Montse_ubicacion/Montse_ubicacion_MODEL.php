<?php

include_once './Base/ModelBase.php';

class Montse_ubicacion_MODEL extends ModelBase{


	//METODOS
	// tabla tabla
	// clave array(clavestabla)
	// foraneas array(tablaforanea => clavetablaforanea)
	function __construct(){

		$this->tabla = 'Montse_ubicacion';
		$this->clave = array('id_site');
		$this->foraneas = array();
		$this->autoincrement = array('id_site');
	}


}
?>
