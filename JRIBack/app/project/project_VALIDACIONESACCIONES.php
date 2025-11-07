<?php

	function VALIDACION_ACCION_DELETE_project($valores){

		if ($valores['id_project']=='3116'){
			$res['ok'] = false;
			$res['code'] = literal['admin_no_te_lo_deja_borrar_KO'];
			return $res; 
		}
		
		return true;

	}



?>