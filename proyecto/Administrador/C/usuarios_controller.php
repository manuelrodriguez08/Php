<?php

session_start();

require_once (__DIR__.'/../M/usuarios_class.php');

if(!empty($_GET['action'])){
	usuarios_controller::main($_GET['action']);
}

class usuarios_controller{
	
	static function main($action){
		if ($action == "crear"){
			usuarios_controller::crear();
		}else if ($action == "editar"){
			usuarios_controller::editar();
		}else if ($action == "buscarID"){
			usuarios_controller::buscarID(1);
		}else if($action == "Login"){
			usuarios_controller::Login();
		}else if($action == "CerrarSession"){
			usuarios_controller::CerrarSession();
		}else if ($action == "crearCliente"){
			usuarios_controller::crearCliente();
	}
}
	
	static public function crear (){
		try {
			$arrayUser = array();
			$arrayUser['TipoUsuario'] = $_POST['tipoUsuario'];
			$arrayUser['TipoDocumento'] = $_POST['tipoDocumento'];
			$arrayUser['Documento'] = $_POST['Documento'];
			$arrayUser['Nombres'] = $_POST['nombre'];
			$arrayUser['Apellidos'] = $_POST['apellido'];
			$arrayUser['FechaNacimiento'] = $_POST['fechaN'];
			$arrayUser['Telefono'] = $_POST['telefono'];
			$arrayUser['Direccion'] = $_POST['direccion'];
			$arrayUser['Estado'] = "Activo";
			$arrayUser['User'] = $_POST['user'];
			$arrayUser['Pass'] = $_POST['pass'];




			
			$usuario = new usuarios ($arrayUser);
			$usuario->insertar();
			header("Location: ../V/pages/forms.php");
		} catch (Exception $e) {
			header("Location: ../insertar.php?respuesta=error");
		}
	}
	static public function crearCliente (){
		try {
			$arrayUser = array();
			$arrayUser['TipoUsuario'] = $_POST['tipoUsuario'];
			$arrayUser['TipoDocumento'] = $_POST['tipoDocumento'];
			$arrayUser['Documento'] = $_POST['numeroDocumento'];
			$arrayUser['Nombres'] = $_POST['nombre'];
			$arrayUser['Apellidos'] = $_POST['apellido'];
			$arrayUser['FechaNacimiento'] = $_POST['fechaN'];
			$arrayUser['Telefono'] = $_POST['telefono'];
			$arrayUser['Direccion'] = $_POST['direccion'];
			$arrayUser['Estado'] = "Activo";
			$arrayUser['User'] = "";
			$arrayUser['Pass'] = "";




			
			$usuario = new usuarios ($arrayUser);
			$usuario->insertar();
			header("Location: ../V/pages/formsRe.php");
		} catch (Exception $e) {
			header("Location: ../insertar.php?respuesta=error");
		}
	}
	
	static public function editar (){
		try {
			$arrayUser = array();
			$arrayUser['TipoUsuario'] = $_POST['tipoUsuario'];
			$arrayUser['TipoDocumento'] = $_POST['tipoDocumento'];
			$arrayUser['Documento'] = $_POST['Documento'];
			$arrayUser['Nombres'] = $_POST['nombre'];
			$arrayUser['Apellidos'] = $_POST['apellido'];
			$arrayUser['FechaNacimiento'] = $_POST['fechaN'];
			$arrayUser['Telefono'] = $_POST['telefono'];
			$arrayUser['Direccion'] = $_POST['direccion'];
			$arrayUser['Estado'] = "Activo";
			$arrayUser['User'] = $_POST['user'];
			$arrayUser['Pass'] = $_POST['pass'];

			$usuario = new usuarios ($arrayUser);
			$usuario->editar();
			header("Location: ../V/pages/tables.php");
		} catch (Exception $e) {

			//throw new Exception($e->getMesssage());
			  
			//header("Location: ../editar.php?respuesta=error");
		}
	}
	
	static public function buscarID ($id){
		try { 
			return usuarios::buscarForId($id);
		} catch (Exception $e) {
			header("Location: ../buscar.php?respuesta=error");
		}
	}
	
	public function buscarAll (){
		try {
			return usuarios::getAll();
		} catch (Exception $e) {
			header("Location: ../buscar.php?respuesta=error");
		}
	}

	public function buscar ($campo, $parametro){
		try {
			return usuarios::getAll();
		} catch (Exception $e) {
			header("Location: ../buscar.php?respuesta=error");
		}
	}

	public function Login (){
		try {
			$User = $_POST['user'];
			$Password = $_POST['pass'];
			if(!empty($User) && !empty($Password)){
				$respuesta = usuarios::Login($User, $Password);
				if (is_array($respuesta)) {
					$_SESSION['idUsuario'] = $respuesta['idUsuario'];
					$_SESSION['TipoUsuario'] = $respuesta['TipoUsuario'];
					echo TRUE;
				}else if($respuesta == "Contraseña Invalida"){
					echo "<div class='ui-state-error ui-corner-all' style='margin-top: 20px; padding: 0 .7em;'>";
						echo "<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span>";
						echo "<strong>Error!</strong> La Contraseña No Coincide Con El Usuario</p>";
					echo "</div>";
				}else if($respuesta == "No existe el usuario"){
					echo "<div class='ui-state-error ui-corner-all' style='margin-top: 20px; padding: 0 .7em;'>";
						echo "<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span>";
						echo "<strong>Error!</strong> No Existe Un Usuario Con Estos Datos</p>";
					echo "</div>";
				}
			}else{
				echo "<div class='ui-state-error ui-corner-all' style='margin-top: 20px; padding: 0 .7em;'>";
					echo "<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span>";
					echo "<strong>Error!</strong> Datos Vacios</p>";
				echo "</div>";
			}
		} catch (Exception $e) {
			header("Location: ../login.php?respuesta=error");
		}
	}

	public function CerrarSession (){
		session_destroy();
		header("Location: ../../vista/web/contac.html");
	}
	
}
?>