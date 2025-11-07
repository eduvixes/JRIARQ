<?php

function VALIDACION_ACCION_EDIT_alumnograduacion($valores){

	if ($valores['alumnograduacion_dni'] == '11111111H'){
	
		$res['ok'] = false;
		$res['code'] = 'no se puede modificar el admin';
		return $res;

	}

	return true;


}

function VALIDACION_ACCION_DELETE_alumnograduacion($valores){

	if ($valores['alumnograduacion_dni'] == '11111111H'){

		$res['ok'] = false;
		$res['code'] = 'no se puede borrar el admin';
		return $res;

	}

	return true;

}

?>
