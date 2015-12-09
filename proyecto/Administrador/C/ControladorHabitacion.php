<?php

require_once ('../M/Habitaciones.php');
echo "Voy a aentrarrrrrrr";

if (!empty($_GET['action'])){
    echo "<br>en el if";
    $Action = $_GET['action'];
    HabitacionesControlador::main($Action);
}

class HabitacionesControlador{
    
    
    static function main($action){
        if ($action == "crear"){
            HabitacionesControlador::crear();
        }else if ($action == "editar"){
            HabitacionesControlador::editar();
        }else if ($action == "buscarID"){
            HabitacionesControlador::buscarID(1);
        }
    }
    
    static public function crear (){
        try {


            $arrayUser = array();
            $arrayUser['TipoHabitacion'] = $_POST['tipoHabitacion'];
            $arrayUser['Numero'] = $_POST['numero'];
            $arrayUser['Piso'] = $_POST['piso'];
             $arrayUser['ValorNoche'] = $_POST['valorNoche'];
            $arrayUser['Estado'] = "libre";
            $arrayUser['Hotel'] = $_POST['hotel'];
            
            $Habitacion = new Habitaciones ($arrayUser);
            $Habitacion->Registrar();
            echo "<br>voy a redireccionar";
            header("Location: ../V/pages/formsHab.php");
        } catch (Exception $e) {
            /*
            header("Location: ../insertar.php?respuesta=error");
        */
           echo "nada".$e->getMessage();
        }
    }
    
    static public function editar (){
        try {
            $arrayUser = array();
            $arrayUser['tipoHabitacion'] = $_POST['tipoHabitacion'];
            $arrayUser['Numero'] = $_POST['numero'];
            $arrayUser['Piso'] = $_POST['piso'];
            $arrayUser['valorNoche'] = $_POST['valorNoche'];
            
            $Habitacion = new Habitaciones ($arrayUser);
            $Habitacion->Modificar();
            header("Location: ../editar.php?respuesta=correcto");
        } catch (Exception $e) {

        echo $arrayUser['tipoHabitacion']." ".$arrayUser['Numero']." ".$arrayUser['Piso']." ".$arrayUser['valorNoche'];
            //header("Location: ../editar.php?respuesta=error");
        }
    }
    
    static public function buscarID ($id){
        try { 
            return Habitacion::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../buscar.php?respuesta=error");
        }
    }
    
    public function buscarAll (){
        try {
            return Habitacion::getAll();
        } catch (Exception $e) {
            header("Location: ../buscar.php?respuesta=error");
        }
    }

    public function buscar ($campo, $parametro){
        try {
            return Habitacion::getAll();
        } catch (Exception $e) {
            header("Location: ../buscar.php?respuesta=error");
        }
    }
    
}
?>