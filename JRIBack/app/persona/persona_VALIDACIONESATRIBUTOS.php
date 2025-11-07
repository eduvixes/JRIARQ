<?php

	function VALIDACION_ATRIBUTOS_ADD_persona($valores){

		
		$expregfecha = '/[0-9]{4}[-][0-9]{2}[-][0-9]{2}/';
		if (!preg_match($expregfecha, $valores['fechaNacimiento_persona'])){
			$res['ok'] = false;
			$res['code'] = 'fechaNacimiento_persona_formatofecha_KO';
			//$res['resource'] = 'valor '.$valores['fechaNacimiento_persona'];
			return $res; // 
		}
		
		return true;
	
	}

	function VALIDACION_ATRIBUTOS_EDIT_persona($valores){

		$expregfecha = '/[0-9]{4}[-][0-9]{2}[-][0-9]{2}/';
		if (!preg_match($expregfecha, $valores['fechaNacimiento_persona'])){
			$res['ok'] = false;
			$res['code'] = 'fechaNacimiento_persona_formatofecha_KO';
			//$res['resource'] = 'valor '.$valores['fechaNacimiento_persona'];
			return $res; // 
		}

		return true;

	}

	function VALIDACION_ATRIBUTOS_DELETE_persona($valores){


		return true;

	}



?>