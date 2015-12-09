
<?php

session_start();

require_once (__DIR__.'/../M/Clase_Hotel.php');


if(!empty($_GET['action'])){
	hotel_controlador::main($_GET['action']);
}

class hotel_controlador{
	
	static function main($action){
		if ($action == "crear"){
			hotel_controlador::crear();
		}else if ($action == "editar"){
			hotel_controlador::editar();
		}else if ($action == "buscarID"){
			hotel_controlador::buscarID(1);
		
	}
}




static public function crear (){
		try {
			$arrayUser = array();
			$arrayUser['Nombre'] = $_POST['nombre'];
			$arrayUser['Nit'] = $_POST['nit'];
			$arrayUser['Direccion'] = $_POST['direccion'];
			$arrayUser['Telefono'] = $_POST['tel'];
			$arrayUser['ResolucionDian'] = $_POST['reso'];
			
			



			
			$hotel = new hoteles ($arrayUser);
			$hotel -> crear();
			header("Location: ../V/pages/forms.php");
		} catch (Exception $e) {
			header("Location: ../insertar.php?respuesta=error");
		}
	}

}


?>