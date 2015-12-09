<?php

require_once('db_abstract_class.php');

class Habitaciones extends db_abstract_class{
    
    private $idHabitacion;
    private $Numero;
    private $Piso;
    private $TipoHabitacion;
    private $ValorNoche;
    private $Estado;
    private $Hotel;
    
    
    
    function getIdHabitacion() {
        return $this->idHabitacion;
    }

    function getNumero() {
        return $this->Numero;
    }

    function getPiso() {
        return $this->Piso;
    }

    function getTipoHabitacion() {
        return $this->tipoHabitacion;
    }

    function getValorNoche() {
        return $this->valorNoche;
    }

    function getEstado() {
        return $this->Estado;
    }

    function setIdHabitacion($idHabitacion) {
        $this->idHabitacion = $idHabitacion;
    }

    function setNumero($Numero) {
        $this->Numero = $Numero;
    }

    function setPiso($Piso) {
        $this->Piso = $Piso;
    }

    function setTipoHabitacion($tipoHabitacion) {
        $this->tipoHabitacion = $tipoHabitacion;
    }

    function setValorNoche($valorNoche) {
        $this->valorNoche = $valorNoche;
    }

    function setEstado($Estado) {
        $this->Estado = $Estado;
    }
    
    function __construct($datos=array()) {
        parent::__construct();
        if(count($datos)>1){
            foreach ($datos as $columna => $dato){
                $this->$columna = $dato;
            }
        }else{
            
            $Numero = "";
            $Piso = "";
            $TipoHabitacion = "";
            $ValorNoche = "";
            $Estado = "";
            $Hotel = "";
        }
    }
    
    function _destruct(){
        $this->Disconnect();
    }
    
    function Registrar(){

$this->insertRow("INSERT INTO habitaciones VALUES('NULL',?, ?, ?, ?, ?,?)", array(

                $this->TipoHabitacion,
                $this->Numero,
                $this->Piso,
                $this->ValorNoche,
                $this->Estado,
                $this->Hotel,

    )

 );

$this->Disconnect();        
    }
    
    function Modificar(){
        $arrUser = (array) $this;
        $this->updateRow("UPDATE habitaciones SET tipoHabitacion=?, Numero=?, Piso=?, valorNoche=? WHERE Numero = ?", array(

            $this->tipoHabitacion,
            $this->Numero,
            $this->Piso,
            $this->valorNoche,
            $this->Numero,


            )    
             );
       $this->Disconnect();




       /* $query = "UPDATE habitaciones SET Numero=?, Piso=?, tipoHabitacion=?, valorNoche=? WHERE Numero = ?";
        $parametros = array(
                        $this->Numero,
                        $this->Piso,
                        $this->tipoHabitacion,
                        $this->valorNoche,
                        $this->Numero,
                        );
        return parent::updateRow($query,$parametros);*/
    }
    
    function cambiarEstado($Estado,$idHabitacion){
        if($idHabitacion > 0){
            $sql = "UPDATE Habitacion SET Estado=? WHERE idHabitacion = ?";
            $parametros = array($Estado,$idHabitacion);
            return $this->updateRow($sql,$parametros);
        }
    }
    
    function Listar(){
        $sql = "SELECT * FROM Habitacion WHERE Estado = 'Activo'";
        return buscarQuery($sql);
    }
        
}

?>
