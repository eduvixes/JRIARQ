<?php

include_once './Base/appServiceBase.php';

class characteristic_SERVICE extends appServiceBase{

	public $modelo;

	//METODOS

	function __construct(){

		parent::__construct();

	}

	function inicializarRest(){

		$this->listaAtributos = array('id_characteristic', 'name_characteristic', 'description_characteristic', 'data_type_characteristic', 'category_characteristic', 'bibref_characteristic', 'file_characteristic');

		$this->listaAtributosSelect = array('id_characteristic', 'name_characteristic', 'description_characteristic', 'data_type_characteristic', 'category_characteristic', 'bibref_characteristic', 'file_characteristic');

		$this->notnull =array(
						'ADD'=>array('name_characteristic', 'description_characteristic', 'data_type_characteristic', 'category_characteristic', 'bibref_characteristic'),
						'EDIT'=>array('id_characteristic', 'name_characteristic', 'description_characteristic', 'data_type_characteristic', 'category_characteristic', 'bibref_characteristic'),
						'DELETE'=>array('id_characteristic')
					);

        //array de arrays(nombrecampo de nuevo fichero, nombrecampo de la bd, directorio, array extensiones, tamaño en bytes)
		$this->files = array(
						array('nuevo_file_characteristic','characteristic','./filesuploaded/files_file_characteristic/', array('pdf','doc','docx'), 200000),
					);

		$this->modelo = $this->crearModelOne('characteristic');


	}

	function modificacion_atributos(){

		

	}


}
?>
