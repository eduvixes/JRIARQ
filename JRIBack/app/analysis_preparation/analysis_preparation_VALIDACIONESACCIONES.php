<?php

	function VALIDACION_ACCION_DELETE_analysis_preparation($valores){

		if ($valores['id_analysis_preparation']=='1'){
			$res['ok'] = false;
			$res['code'] = literal['admin_no_te_lo_deja_borrar_KO'];
			return $res; 
		}
		
		return true;

	}



?>