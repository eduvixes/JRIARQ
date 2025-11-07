<?php

include_once './Base/ModelBase.php';

class articulo_MODEL extends ModelBase{


	//METODOS
	// tabla tabla
	// clave array(clavestabla)
	// foraneas array(tablaforanea => clavetablaforanea)
    // autoincrement array(atributos autoincrementales)
    // unicos array(atributos unique)
	function __construct(){

		$this->tabla = 'articulo';
		$this->clave = array('CodigoA');
		$this->foraneas = array();
		$this->autoincrement = array('CodigoA');
        $this->unicos = array();

	}

}