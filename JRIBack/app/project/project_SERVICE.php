<?php

include_once './Base/appServiceBase.php';

class project_SERVICE extends appServiceBase{

	public $modelo;

	//METODOS

	function __construct(){

		parent::__construct();

	}

	function inicializarRest(){

		$this->listaAtributos = array('id_project', 'name_project', 'start_date_project', 'end_date_project', 'responsable_project', 'organization_project', 'description_project', 'file_project', 'code_project', 'acronym_project', 'id_sampling_methodology');

		$this->listaAtributosSelect = array('id_project', 'name_project', 'start_date_project', 'end_date_project', 'responsable_project', 'organization_project', 'description_project', 'file_project', 'code_project', 'acronym_project', 'id_sampling_methodology');

		$this->notnull =array(
						'ADD'=>array('name_project', 'start_date_project', 'end_date_project', 'responsable_project', 'organization_project', 'description_project', 'code_project', 'acronym_project', 'id_sampling_methodology'),
						'EDIT'=>array('id_project', 'name_project', 'start_date_project', 'end_date_project', 'responsable_project', 'organization_project', 'description_project', 'file_project', 'code_project', 'acronym_project', 'id_sampling_methodology'),
						'DELETE'=>array('id_project')
					);

        //array de arrays(nombrecampo de nuevo fichero, nombrecampo de la bd, directorio, array extensiones, tamaño en bytes)
		$this->files = array(
						array('nuevo_file_project','file_project','./filesuploaded/files_file_project/', array('pdf','doc','docx'), 2000000),
					);

		$this->modelo = $this->crearModelOne('project');


	}

	function modificacion_atributos(){

        if (!(action == 'SEARCH')){		
            if ((isset($_POST['start_date_project'])) && ($_POST['start_date_project'] != '')){
			    // cambio a formato yyyy/mm/dd porque a mi me llega dia/mes/año
				    $arrayelementosfecha = explode("/",$_POST['start_date_project']);
				    $_POST['start_date_project'] = $arrayelementosfecha[2].'-'.$arrayelementosfecha[1].'-'.$arrayelementosfecha[0];
		    }
		    
            if ((isset($_POST['end_date_project'])) && ($_POST['end_date_project'] != '')){
			    // cambio a formato yyyy/mm/dd porque a mi me llega dia/mes/año
				    $arrayelementosfecha = explode("/",$_POST['end_date_project']);
				    $_POST['end_date_project'] = $arrayelementosfecha[2].'-'.$arrayelementosfecha[1].'-'.$arrayelementosfecha[0];
		    }
        }
        else{

            if (isset($_POST['start_date_project'])){
				
                $arrayelementosfecha = explode("/",$_POST['start_date_project']);
				
				if (count($arrayelementosfecha) == 3){
					$_POST['start_date_project'] = $arrayelementosfecha[2].'-'.$arrayelementosfecha[1].'-'.$arrayelementosfecha[0];
				}
				else{
					if (count($arrayelementosfecha) == 2){
						$_POST['start_date_project'] = $arrayelementosfecha[1].'-'.$arrayelementosfecha[0];
					}
				}
			}

            if (isset($_POST['end_date_project'])){
				
                $arrayelementosfecha = explode("/",$_POST['end_date_project']);
				
				if (count($arrayelementosfecha) == 3){
					$_POST['end_date_project'] = $arrayelementosfecha[2].'-'.$arrayelementosfecha[1].'-'.$arrayelementosfecha[0];
				}
				else{
					if (count($arrayelementosfecha) == 2){
						$_POST['end_date_project'] = $arrayelementosfecha[1].'-'.$arrayelementosfecha[0];
					}
				}
			}


        }
    

	}


}
?>
