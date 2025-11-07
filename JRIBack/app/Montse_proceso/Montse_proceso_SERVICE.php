<?php

include_once './Base/appServiceBase.php';

class Montse_proceso_SERVICE extends appServiceBase{

	public $modelo;

	//METODOS

	function __construct(){

		parent::__construct();

	}

	function inicializarRest(){

		$this->listaAtributos = array('proceso_id', 'proceso_name', 'proceso_description', 'proceso_owner', 'proceso_category', 'proceso_file', 'proceso_url', 'proceso_approved_date', 'proceso_status');

		$this->listaAtributosSelect = array('proceso_id', 'proceso_name', 'proceso_description', 'proceso_owner', 'proceso_category', 'proceso_file', 'proceso_url', 'proceso_approved_date', 'proceso_status');

		$this->notnull =array(
						'ADD'=>array('proceso_name', 'proceso_description', 'proceso_owner', 'proceso_category', 'proceso_file', 'proceso_url', 'proceso_approved_date', 'proceso_status'),
						'EDIT'=>array('proceso_id', 'proceso_name', 'proceso_description', 'proceso_owner', 'proceso_category', 'proceso_file', 'proceso_url', 'proceso_approved_date', 'proceso_status'),
						'DELETE'=>array('proceso_id')
					);

        //array de arrays(nombrecampo de nuevo fichero, nombrecampo de la bd, directorio, array extensiones, tamaño en bytes)
		$this->files = array(
						array('proceso_file','Montse_proceso','./filesuploaded/files_proceso_file/', array('pdf'), 5000000),
					);

		$this->modelo = $this->crearModelOne('Montse_proceso');


	}

	function modificacion_atributos(){

		

	}


}
?>
