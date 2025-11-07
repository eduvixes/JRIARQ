<?php

include_once './Base/appServiceBase.php';

class analysis_preparation_SERVICE extends appServiceBase{

	public $modelo;

	//METODOS

	function __construct(){

		parent::__construct();

	}

	function inicializarRest(){

		$this->listaAtributos = array('id_analysis_preparation', 'name_analysis_preparation', 'description_analysis_preparation', 'bib_analysis_preparation', 'file_analysis_preparation');

		$this->listaAtributosSelect = array('id_analysis_preparation', 'name_analysis_preparation', 'description_analysis_preparation', 'bib_analysis_preparation', 'file_analysis_preparation');

		$this->notnull =array(
						'ADD'=>array('id_analysis_preparation', 'name_analysis_preparation', 'description_analysis_preparation', 'bib_analysis_preparation' ),
						'EDIT'=>array('id_analysis_preparation', 'name_analysis_preparation', 'description_analysis_preparation', 'bib_analysis_preparation' ),
						'DELETE'=>array('id_analysis_preparation')
					);

        //array de arrays(nombrecampo de nuevo fichero, nombrecampo de la bd, directorio, array extensiones, tamaño en bytes)
		$this->files = array(
						array('nuevo_file_analysis_preparation','analysis_preparation','./filesuploaded/files_analysis_preparation/', array('pdf','doc','docx'), 2000000),
					);

		$this->modelo = $this->crearModelOne('analysis_preparation');


	}

	function modificacion_atributos(){

		

	}


}
?>
