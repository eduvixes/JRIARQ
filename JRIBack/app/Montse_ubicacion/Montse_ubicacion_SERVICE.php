<?php

include_once './Base/appServiceBase.php';

class Montse_ubicacion_SERVICE extends appServiceBase{

	public $modelo;

	//METODOS

	function __construct(){

		parent::__construct();

	}

	function inicializarRest(){

		$this->listaAtributos = array('id_site', 'site_latitud', 'site_longitud', 'site_altitude', 'site_locality', 'site_north_photo', 'site_south_photo', 'site_east_photo', 'site_west_photo');

		$this->listaAtributosSelect = array('id_site', 'site_latitud', 'site_longitud', 'site_altitude', 'site_locality', 'site_north_photo', 'site_south_photo', 'site_east_photo', 'site_west_photo');

		$this->notnull =array(
						'ADD'=>array('site_latitud', 'site_longitud', 'site_altitude', 'site_locality'),
						'EDIT'=>array('site_latitud', 'site_longitud', 'site_altitude', 'site_locality'),
						'DELETE'=>array('id_site')
					);

        //array de arrays(nombrecampo de nuevo fichero, nombrecampo de la bd, directorio, array extensiones, tamaño en bytes)
		$this->files = array(
						array('site_north_photo','Montse_ubicacion','./filesuploaded/files_site_north_photo/', array('jpg'), 500000),
                        array('site_south_photo','Montse_ubicacion','./filesuploaded/files_site_south_photo/', array('jpg'), 500000),
                        array('site_east_photo','Montse_ubicacion','./filesuploaded/files_site_east_photo/', array('jpg'), 500000),
                        array('site_west_photo','Montse_ubicacion','./filesuploaded/files_site_west_photo/', array('jpg'), 500000),
					);

		$this->modelo = $this->crearModelOne('Montse_ubicacion');


	}

	function modificacion_atributos(){

		

	}


}
?>
