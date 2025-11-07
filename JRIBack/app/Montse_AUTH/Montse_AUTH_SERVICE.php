<?php

include_once './Base/appServiceBase.php';

class Montse_AUTH_SERVICE extends appServiceBase{

	public $modelo;

	//METODOS

	function __construct(){

		parent::__construct();

	}

	function inicializarRest(){

		$this->listaAtributos = array('usuario_login', 'usuario_password', 'usuario_dni', 'usuario_nombre', 'usuario_apellidos', 'usuario_telefono', 'usuario_email', 'usuario_direccion', 'usuario_fechaNacimiento', 'usuario_pais', 'usuario_genero', 'usuario_estudios','usuario_rol');

		$this->listaAtributosSelect = array('usuario_login', 'usuario_password', 'usuario_dni', 'usuario_nombre', 'usuario_apellidos', 'usuario_telefono', 'usuario_email', 'usuario_direccion', 'usuario_fechaNacimiento', 'usuario_pais', 'usuario_genero', 'usuario_estudios','usuario_rol');

		$this->notnull = array(
						'LOGIN'=>array('usuario_login', 'usuario_password'),
						'DESCONECTAR'=>array('usuario_login'),
						'CAMBIAR_CONTRASENA'=>array('usuario_login','usuario_password'),
						'REGISTRAR'=>array('usuario_login', 'usuario_password', 'usuario_dni', 'usuario_nombre', 'usuario_apellidos', 'usuario_telefono', 'usuario_email', 'usuario_direccion', 'usuario_fechaNacimiento', 'usuario_pais', 'usuario_genero', 'usuario_estudios')
						);

		$this->modelo = $this->crearModelOne('Montse_usuario');

	}


	function cargarTokenCabecera(){

		$tokenFront = '';	

		foreach(apache_request_headers() as $header =>$value){
			if($header == 'Authorization')
				$tokenFront = $value;
		}	
		
		return $tokenFront;

	}

	function LOGIN(){

		include_once './app/Montse_usuario/Montse_usuario_SERVICE.php';
		$_POST['controlador'] = 'Montse_usuario';
		$_POST['action'] = 'SEARCH_BY';
		$password = $_POST['usuario_password'];
		unset($_POST['usuario_password']);

		$usuario = new Montse_usuario_SERVICE;
		$respuesta = $usuario->ejecutar();


		//if (!(empty($respuesta['resource']))){
		if ($respuesta['code'] == 'RECORDSET_DATOS'){

			$fila = $respuesta['resource'][0];
			if ($fila['usuario_password'] == $password){

				//$usuarioDatos = ['usuario' => $_POST['usuario'],'contrasena' => $_POST['contrasena']];
				include_once "./Base/JWT/token.php";
				$token = MiToken::creaToken($_POST['usuario_login'],$password);

				$feedback['ok'] = true;
				$feedback['code'] = literal['LOGIN_OK'];
				$reslogin = Array();
				$reslogin['token'] = $token;
				$reslogin['rol'] = $fila['usuario_rol'];
				$feedback['resource'] = $reslogin;

			}
			else{
				$feedback['ok'] = false;
				$feedback['code'] = literal['USUARIO_PASS_KO'];
				$feedback['resource'] = array($_POST['usuario_login'],$password);
			}
		}
		else{
			$feedback['ok'] = false;
			$feedback['code'] = literal['USUARIO_LOGIN_KO'];
			$feedback['resource'] = array($_POST['usuario_login'],$password);
		}


		return $feedback;

	} 

	function REGISTRAR(){

		include_once './app/Montse_usuario/Montse_usuario_SERVICE.php';
		$_POST['controlador'] = 'Montse_usuario';
		$_POST['action'] = 'ADD';
		$_POST['usuario_rol'] = 'PROVIDER';
		$usuario = new Montse_usuario_SERVICE;
		$res = $usuario->ejecutar();

		if ($res['ok'] === true){ // no hay error insertando usuario
			$res['code'] = literal['REGISTRAR_OK'];
		}
		else //error cambiando contraseña
		{
			$res['code'] = literal['REGISTRAR_KO'];
		}
						
		return $res;

	}

	function CAMBIAR_CONTRASENA(){

		if ($_POST['dni']=='11111111H'){
			$respuesta['ok'] = false;
			$respuesta['code'] = literal['admin_no_se_puede_modificar_KO'];
			return $respuesta;
		}
		
		include_once './app/usuario/usuario_SERVICE.php';
		$_POST['controlador'] = 'usuario';
		$usuario = new usuario_SERVICE;
		$res = $usuario->cambiar_contrasena();
		if ($res['ok'] === true){ // no hay error cambiando la contraseña
			$res['code'] = literal['CAMBIAR_contrasena_OK'];
		}
		else //error cambiando contraseña
		{
			$res['code'] = literal['CAMBIAR_contrasena_KO'];
		}
		return $res;
	
	}

	function validar_token(){

		include_once "./Base/JWT/token.php";
		$current_token = cargarTokenCabecera();
		$resultado = MiToken::devuelveToken($current_token);
		$password = $resultado->data->id;
		$login = $resultado->data->name;
		//echo 'comprobar en la bd si son correctos';
	}

}

?>
