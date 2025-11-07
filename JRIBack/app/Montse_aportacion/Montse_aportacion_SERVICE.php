<?php

include_once './Base/appServiceBase.php';

class Montse_aportacion_SERVICE extends appServiceBase{

	public $modelo;

	//METODOS

	function __construct(){

		parent::__construct();

	}

	function inicializarRest(){

		$this->listaAtributos = array('aportacion_id', 'aportacion_site', 'aportacion_owner', 'aportacion_date', 'proceso_id', 'aportacion_value');

		$this->listaAtributosSelect = array('aportacion_id', 'aportacion_site', 'aportacion_owner', 'aportacion_date', 'proceso_id', 'aportacion_value');

		$this->notnull =array(
						'ADD'=>array('aportacion_site', 'aportacion_owner', 'aportacion_date', 'proceso_id', 'aportacion_value'),
						'EDIT'=>array('aportacion_id', 'aportacion_site', 'aportacion_owner', 'aportacion_date', 'proceso_id', 'aportacion_value'),
						'DELETE'=>array('aportacion_id')
					);

        //$this->files = array(); array de arrays(nombrecampo de nuevo fichero, nombrecampo de la bd, directorio, array extensiones, tamaño en bytes)
		

		$this->modelo = $this->crearModelOne('Montse_aportacion');


	}

	function modificacion_atributos(){

		

	}


}
?>
