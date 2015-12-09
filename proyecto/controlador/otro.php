
<?php 

$x = $_POST['user'];
$y = $_POST['pass'];



if( $x == 'Administrador' && $y == 'Administrador'){
	header ("location: ../Administrador/V/pages/tables.php");
}

else if( $x == 'Recepcion' && $y == 'Recepcion'){
	header ("location: ../Administrador/V/pages/tablesRe.php");
}

else if( $x != 'Recepcion' && $y != 'Recepcion' || $x != 'Administrador' && $y != 'Administrador' ){
echo "<script>alert('Datos Incorrectos');  </script>";

header ("location: ../vista/contact.html");
}


?>

