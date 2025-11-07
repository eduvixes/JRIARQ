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

			// sino viene vacio
			// si viene en el formato correcto en dd/mm/aaaa y es add o edit, modifico el formato

			if ((isset($_POST['FechaPublicacionR'])) && ($_POST['FechaPublicacionR'] != '')){
				$expregfecha = '/[0-9]{2}[\/][0-9]{2}[\/][0-9]{4}/';
				
				if (preg_match($expregfecha, $_POST['FechaPublicacionR'])){
					if ((isset($_POST['FechaPublicacionR'])) && ($_POST['FechaPublicacionR'] != '')){
						$arrayelementosfecha = explode("/",$_POST['FechaPublicacionR']);
						$_POST['FechaPublicacionR'] = $arrayelementosfecha[2].'-'.$arrayelementosfecha[1].'-'.$arrayelementosfecha[0];
					}
				}
				else{
					$_POST['FechaPublicacionR'] = '-';
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

		else{
			if (action == 'SEARCH'){
				// sino viene vacio

				if ((isset($_POST['FechaPublicacionR'])) && ($_POST['FechaPublicacionR'] != '')){
					// si tiene numeros y/o / lo cambio
					$expregfecha = '/^[0-9\/]+$/';

					if (preg_match($expregfecha, $_POST['FechaPublicacionR'])){
						$arrayelementosfecha = explode("/",$_POST['FechaPublicacionR']);

						if (count($arrayelementosfecha) == 3){
							$_POST['FechaPublicacionR'] = $arrayelementosfecha[2].'-'.$arrayelementosfecha[1].'-'.$arrayelementosfecha[0];
						}
						else{
							if (count($arrayelementosfecha) == 2){
								$_POST['FechaPublicacionR'] = $arrayelementosfecha[1].'-'.$arrayelementosfecha[0];
							}
						}
					}
					else{
						// sino esta mal y no deberia devolver nada
						$_POST['FechaPublicacionR'] = 'error formato';
					}
				}
			}

		}

	}

}
