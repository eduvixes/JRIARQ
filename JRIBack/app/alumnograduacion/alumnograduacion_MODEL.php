<?php

include_once './Base/ModelBase.php';

class alumnograduacion_MODEL extends ModelBase{


	//METODOS
	// tabla tabla
	// clave array(clavestabla)
	// foraneas array(tablaforanea => clavetablaforanea)
    // autoincrement array(atributos autoincrementales)
    // unicos array(atributos unique)
	function __construct(){

		$this->tabla = 'alumnograduacion';
		$this->clave = array('alumnograduacion_dni');
		$this->foraneas = array();
		$this->autoincrement = array();
        $this->unicos = array('alumnograduacion_login');

	}

}