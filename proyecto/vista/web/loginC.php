<?php 
	session_start(); 
	if (empty($_SESSION['idUsuario'])){
		header("Location: contac.html");
	}else{
		if($_SESSION['TipoUsuario'] == "administrador"){
			header("Location: ../Administrador/V/pages/tables.php");
		}else if ($_SESSION['TipoUsuario'] == "recepcionista"){
			header("Location: ../Administrador/V/pages/tablesRe.php");
		}
	}
?>
<a href="../Administrador/C/usuarios_controller.php?action=CerrarSession">Cerrar Session</a>
