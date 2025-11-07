<?php

include_once './Base/appServiceBase.php';

class persona_SERVICE extends appServiceBase{

	public $modelo;

	//METODOS

	function __construct(){

		parent::__construct();

	}

	function inicializarRest(){

		$this->listaAtributos = array('dni', 'nombre_persona', 'apellidos_persona','fechaNacimiento_persona', 'direccion_persona','telefono_persona','email_persona','foto_persona');

		$this->listaAtributosSelect = array('dni', 'nombre_persona', 'apellidos_persona','fechaNacimiento_persona', 'direccion_persona','telefono_persona','email_persona','foto_persona');

		$this->notnull =array(
						'ADD'=>array('dni', 'nombre_persona', 'apellidos_persona','fechaNacimiento_persona', 'direccion_persona','telefono_persona','email_persona'),
						'EDIT'=>array('dni', 'nombre_persona', 'apellidos_persona','fechaNacimiento_persona', 'direccion_persona','telefono_persona','email_persona'),
						'DELETE'=>array('dni')
					);

		$this->modelo = $this->crearModelOne('persona');

		$this->files = array(
			array('nuevo_foto_persona','foto_persona','./filesuploaded/files_foto_persona/', array('jpg','jpg'), 200000)
		);
	}

	function modificacion_atributos(){

		// si viene en el formato correcto en dd/mm/aaaa y es add o edit, modifico el formato

		if ((
			(action == 'ADD') ||
			(action == 'EDIT')
		)){
			// sino viene vacio
			if ((isset($_POST['fechaNacimiento_persona'])) && ($_POST['fechaNacimiento_persona'] != '')){
				$expregfecha = '/[0-9]{2}[\/][0-9]{2}[\/][0-9]{4}/';
				
				if (preg_match($expregfecha, $_POST['fechaNacimiento_persona'])){
					if ((isset($_POST['fechaNacimiento_persona'])) && ($_POST['fechaNacimiento_persona'] != '')){
						$arrayelementosfecha = explode("/",$_POST['fechaNacimiento_persona']);
						$_POST['fechaNacimiento_persona'] = $arrayelementosfecha[2].'-'.$arrayelementosfecha[1].'-'.$arrayelementosfecha[0];
					}
				}
				else{
					$_POST['fechaNacimiento_persona'] = '-';
				}
			}
		} // miro search
		else{
			if (action == 'SEARCH'){
				// sino viene vacio
				if ((isset($_POST['fechaNacimiento_persona'])) && ($_POST['fechaNacimiento_persona'] != '')){
					// si tiene numeros y/o / lo cambio
					$expregfecha = '/^[0-9\/]+$/';
					if (preg_match($expregfecha, $_POST['fechaNacimiento_persona'])){
						$arrayelementosfecha = explode("/",$_POST['fechaNacimiento_persona']);
						
						if (count($arrayelementosfecha) == 3){
							$_POST['fechaNacimiento_persona'] = $arrayelementosfecha[2].'-'.$arrayelementosfecha[1].'-'.$arrayelementosfecha[0];
						}
						else{
							if (count($arrayelementosfecha) == 2){
								$_POST['fechaNacimiento_persona'] = $arrayelementosfecha[1].'-'.$arrayelementosfecha[0];
							}
						}
					}
					else{
						// sino esta mal y no deberia devolver nada
						$_POST['fechaNacimiento_persona'] = 'error formato';
					}
				}
			}
		}
		
	}

/*

	function uploadFoto(){

		if ((isset($_FILES)) && (count($_FILES)>0)){
			
	    	$code = '';
	    	$file_name = $_FILES['name'];
	    	$file_size =$_FILES['size'];
		    $file_tmp =$_FILES['tmp_name'];
		    $file_type=$_FILES['type'];
		    $file_ext = explode('.',$file_name);
			$file_ext = end($file_ext);
		    $file_ext = strtolower($file_ext);
			      
	      	$extensions= array("jpg","png");
	      
	    	if(in_array($file_ext,$extensions)=== false){
		    	$code="foto_personaExtensionError";
		    }
		      
		    if($file_size > 2097152){
		    	$code='foto_personaSizeError';
		    }
	      
		    if($code==''){
		    	move_uploaded_file($file_tmp,"images/".$file_name);
		    	$this->modelo->foto_persona = $file_name;
		    	return true;
		    }else{
		    	$this->feedback['ok'] = false;
				$this->feedback['code'] = $code; //error upload foto
				$this->feedback['resource'] = $_POST;	
				return false;
	    	}
   		}
   		else{
   			return true;
   		}
	}


	
	function ADD(){

		if ($this->existe_dni_en_persona()){ //existe el usuario
			$this->feedback['ok'] = false;
			$this->feedback['code'] = 'DNI_PERSONA_YA_EXISTE'; //usuario ya existe
			$this->feedback['resource'] = $_POST;
		}
		else{
			if ($this->existe_email_en_persona()){ //el email ya existe
				$this->feedback['ok'] = false;
				$this->feedback['code'] = 'EMAIL_PERSONA_YA_EXISTE'; //email ya existe
				$this->feedback['resource'] = $_POST;
			}
			else{
				if ($this->uploadFoto()){
					$this->modelo->ADD();
					if ($this->modelo->feedback['ok']){
						$this->feedback['ok'] = true;
						$this->feedback['code'] = 'PERSONA_INSERTAR_OK'; //insertado con exito
					}
					else{
						if ($this->modelo->feedback['code'] != '00000') //sino es fallo conexion gestor
							$this->feedback['ok'] = false;
							$this->feedback['code'] = 'ERROR_INSERTAR_PERSONA'; //insercion fallida
							$this->feedback['resource'] = $_POST;
					}
				}
			}
		}
		return $this->feedback;

	}

*/	


}
?>
