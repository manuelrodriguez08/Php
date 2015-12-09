<?php

session_start();

require_once (__DIR__.'/../M/Clase_Reserva.php');

if(!empty($_GET['accion'])){
	ControladorReserva::main($_GET['accion']);
}

class ControladorReserva{
	
	static function main($action){
		if ($action == "realizar"){
			ControladorReserva::realizar();
		}else if ($action == "editar"){
			usuarios_controller::editar();
		}else if ($action == "buscarID"){
			usuarios_controller::buscarID(1);
		}
}
	
	static public function realizar (){
		try {
			$arrayReserva = array();
			$arrayReserva['Usuario'] = $_POST['user'];
			$arrayReserva['Habitacion'] = $_POST['habitacion'];
			$arrayReserva['Duracion'] = $_POST['Duracion'];
			$arrayReserva['TipoReserva'] = $_POST['reserva'];
			$arrayReserva['FechaEntrada'] = $_POST['fechaEn'];
			$arrayReserva['FechaSalida'] = $_POST['fechaSal'];
			$arrayReserva['Estado'] = "Activa";

			$reserva = new reserva ($arrayReserva);
			$reserva->realizar();
			header("Location: ../V/pages/formsReserva.php");
		} catch (Exception $e) {

		 
			//header("Location: ../insertar.php?respuesta=error");
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
			$arrayUser['TipoUsuario'] = $_POST['TipoUsuario'];
			$arrayUser['TipoDocumento'] = $_POST['TipoDocumento'];
			$arrayUser['Documento'] = $_POST['Documento'];
			$arrayUser['Nombres'] = $_POST['Nombres'];
			$arrayUser['Apellidos'] = $_POST['Apellidos'];
			$arrayUser['FechaNacimiento'] = $_POST['FechaNacimiento'];
			$arrayUser['Telefono'] = $_POST['Telefono'];
			$arrayUser['Direccion'] = $_POST['Direccion'];
			$arrayUser['Estado'] = $_POST['Estado'];
			$arrayUser['User'] = $_POST['User'];
			$arrayUser['Pass'] = $_POST['Pass'];
			$arrayUser['idUsuario'] = $_POST['idUsuario'];
			var_dump($arrayUser);
			$usuario = new usuarios ($arrayUser);
			$usuario->editar();
			header("Location: ../editar.php?respuesta=correcto");
		} catch (Exception $e) {
			header("Location: ../editar.php?respuesta=error");
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