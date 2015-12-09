<?php
session_start();
        
        
        $usuario= $_POST['user'];
        $contrasena = $_POST['pass'];
        
         $con = mysql_connect("localhost","root","");

         
         mysql_select_db('hyltonproyect', $con);
         
         
         $n = "SELECT * FROM usuarios";
         
         $resultado = mysql_query($n);
         
         while($fila = mysql_fetch_array($resultado)){
             
             $usuariobasedatos= $fila['User'];
            $contrasenabasedatos = $fila['Pass'];
            $tipo = $fila['TipoUsuario'];
            $estado = $fila['Estado'];
            
            if($usuario == $usuariobasedatos && $contrasena == $contrasenabasedatos && $tipo  == 'administrador' && $estado= 'Activo'){
                
                $_SESSION['usuario']= $usuario;
                $_SESSION['contrasena']= $contrasena;

                header("Location: ../Administrador/V/pages/tables.php");
                
                           };
                
                if($usuario == $usuariobasedatos && $contrasena == $contrasenabasedatos && $tipo  == 'recepcionista' && $estado= 'Activo'){
                
                $_SESSION['usuario']= $usuario;
                $_SESSION['contrasena']= $contrasena;

                 header("Location: ../Administrador/V/pages/tablesRe.php");
                
               /* echo "<html> 
            
                <head>
                <meta http-equiv='REFRESH' content='0;url=../Administrador/V/pages/tablesRe.php'> </head>
        </html>";*/
                
                
            }else{

                echo "";
            } 
         }


?>

