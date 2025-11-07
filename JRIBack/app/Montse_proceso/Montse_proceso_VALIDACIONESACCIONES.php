<?php

	function VALIDACION_ACCION_DELETE_Montse_proceso($valores){

		if ($valores['proceso_id']=='1'){
			$res['ok'] = false;
			$res['code'] = literal['admin_no_te_lo_deja_borrar_KO'];
			return $res; 
		}
		
		return true;

	}



?>
