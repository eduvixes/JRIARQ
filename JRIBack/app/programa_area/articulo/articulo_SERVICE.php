<?php

include_once './Base/appServiceBase.php';

class articulo_SERVICE extends appServiceBase{

	public $modelo;

	//METODOS

	function __construct(){

		parent::__construct();

	}

	function inicializarRest(){

		$this->listaAtributos = array('CodigoA','AutoresA','TituloA','TituloR','ISSN','VolumenR','PagIniA','PagFinA','FechaPublicacionR','FicheropdfA','EstadoA');

		$this->listaAtributosSelect = array('CodigoA','AutoresA','TituloA','TituloR','ISSN','VolumenR','PagIniA','PagFinA','FechaPublicacionR','FicheropdfA','EstadoA');

		$this->notnull = array(
						'ADD' => array('AutoresA','TituloA','TituloR','ISSN','EstadoA'),
						'EDIT' => array('CodigoA','AutoresA','TituloA','TituloR','ISSN','EstadoA'),
						'DELETE' => array('CodigoA')
						);

		$this->modelo = $this->crearModelOne('articulo');

		//array de arrays(nombrecampo de nuevo fichero, nombrecampo de la bd, directorio, array extensiones, tamaño en bytes)
		$this->files = array(
			array('nuevo_FicheropdfA','FicheropdfA','./filesuploaded/files_FicheropdfA/', array('pdf'), 5000000)
		);

	}

	function modificacion_atributos(){

		if (($_POST['action'] == 'ADD') || ($_POST['action'] == 'EDIT')){

			if (!(isset($_POST['FechaPublicacionR']))){
				$_POST['FechaPublicacionR'] = '0000-00-00';
			}
			else{
				if ($_POST['FechaPublicacionR'] == ''){
					$_POST['FechaPublicacionR'] = '0000-00-00';
				}
				else{
					$_POST['FechaPublicacionR'] = date("Y-m-d", strtotime($_POST['FechaPublicacionR']));
				}
			}

			if (!(isset($_POST['PagIniA']))){
				$_POST['PagIniA'] = 0;
			}
			else{
				if ($_POST['PagIniA'] == ''){
					$_POST['PagIniA'] = 0;
				}
			}

			if (!(isset($_POST['PagFinA']))){
				$_POST['PagFinA'] = 0;
			}
			else{
				if ($_POST['PagFinA'] == ''){
					$_POST['PagFinA'] = 0;
				}
			}
		}

	}

}
