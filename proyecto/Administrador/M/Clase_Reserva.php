<?php
require_once('db_abstract_class.php');

class reserva extends db_abstract_class{
	
	private $idReserva;
	private $Usuario;
	private $Habitacion;
    private $Duracion;
	private $TipoReserva;
	private $FechaEntrada;
    private $FechaSalida;
    private $Estado;
	

	/* Setters and Getters*/
    public function getId(){
        return $this->idReserva;
    }
    
    private function _setId ($Id){
        $this->idReserva = $Id;
        return $this;
    }
     public function getUser(){
        return $this->Usuario;
    }
    
    private function _setUser($user){
        $this->user = $Usuario;
        return $this;
    }

     public function getHabitacion(){
        return $this->Habitacion;
    }
    
    private function _setHabitacion($Habitacion){
        $this->Habitacion = $Habitacion;
        return $this;
    }

   

    public function getTipo_Reserva(){
        return $this->TipoReserva;
    }
    
    private function _setTipo_Reserva ($tipo_reserva){
        $this->tipo_reserva = $TipoReserva;
        return $this;
    }

     public function getDuracion(){
        return $this->nombres;
    }
    
    private function _setDuracion($duracion){
        $this->duracion = $Duracion;
        return $this;
    }

     public function getFechaEntrada(){
        return $this->FechaEntrada;
    }
    
    private function _setFechaEntrada($entrada){
        $this->entrada = $FechaEntrada;
        return $this;
    }

    public function getFechaSalida(){
        return $this->FechaSalida;
    }
    
    private function _setFechaSalida($salida){
        $this->salida = $FechaSalida;
        return $this;
    }

     public function getEstado(){
        return $this->Estado;
    }

    private function _setEstado($estado){
        $this->estado = $Estado;
        return $this;
    }

    function __destruct() {
        $this->Disconnect();
    }

	public function __construct($reserva=array()){
        parent::__construct();
		if(count($reserva)>1){
			foreach ($reserva as $dato=>$valor){
                $this->$dato = $valor;
			}
		}else {
			$this->Usuario= "";
            $this->Habitacion = "";
			$this->Duracion = "";
			$this->TipoReserva = "";
			$this->FechaEntrada = "";
			$this->FechaSalida = "";
            $this->Estado = "";
			
			
		}
    }

    public function realizar(){
        $this->insertRow("INSERT INTO reserva
            VALUES ('NULL', ?, ?, ?, ?, ?, ?, ?)", array( 
             $this->Usuario,
            $this->Habitacion,
            $this->Duracion,
            $this->TipoReserva,
            $this->FechaEntrada,
            $this->FechaSalida,
            $this->Estado,           )
        );
		$this->Disconnect();
    }

    public function editar(){
		$arrUser = (array) $this;
		$this->updateRow("UPDATE usuarios SET TipoUsuario = ?, TipoDocumento = ?, Documento = ?, Nombres = ?, Apellidos = ?, FechaNacimiento = ?, Telefono = ?, Direccion = ?,  Estado = ?, User = ?, Pass = ?,  WHERE idUsuario = ?", array(
			 $this->TipoUsuario,
            $this->TipoDocumento, 
            $this->Documento, 
            $this->Nombres, 
            $this->Apellidos, 
            $this->FechaNacimiento, 
            $this->Telefono,
            $this->Direccion, 
            $this->Estado, 
            $this->User, 
            $this->Pass,  
			$this->idUsuario,
		));
		$this->Disconnect();
    }

    public function eliminar(){
        return $this->user_login;
    }

    public static function buscarForId($id){
		if ($id > 0){
			$usr = new usuarios();
			$getrow = $usr->getRow("SELECT * FROM usuarios WHERE idUsuarios =?", array($id));
			$usr->id = $getrow['idUsuarios'];
			$usr->tipo_identificacion = $getrow['tipo_identificacion'];
			$usr->identificacion = $getrow['Identificacion'];
			$usr->nombres = $getrow['Nombres'];
			$usr->apellidos = $getrow['Apellidos'];
			$usr->telefono = $getrow['Telefono'];
			$usr->direccion = $getrow['Direccion'];
			$usr->fecha_nacimiento = $getrow['Fecha_Nacimiento'];
			$usr->saldo = $getrow['Saldo_Cuenta'];
			$usr->user_login = $getrow['user_login'];
			$usr->pass_login = $getrow['pass_login'];
			$usr->estado = $getrow['estado'];
			$usr->Disconnect();
			return $usr;
		}else{
			return NULL;
		}
		$this->Disconnect();
    }
	
    public static function getAll(){
		return usuarios::buscar("SELECT * FROM usuarios");
    }
	
	public static function buscar($query){
        $arrUsuarios = array();
        $tmp = new usuarios();
        $getrows = $tmp->getRows($query);
        
        foreach ($getrows as $valor) {
            $usr = new usuarios();
            $usr->id = $valor['idUsuarios'];
            $usr->tipo_identificacion = $valor['tipo_identificacion'];
            $usr->identificacion = $valor['Identificacion'];
            $usr->nombres = $valor['Nombres'];
            $usr->apellidos = $valor['Apellidos'];
            $usr->telefono = $valor['Telefono'];
            $usr->direccion = $valor['Direccion'];
            $usr->fecha_nacimiento = $valor['Fecha_Nacimiento'];
            $usr->saldo = $valor['Saldo_Cuenta'];
            $usr->user_login = $valor['user_login'];
            $usr->pass_login = $valor['pass_login'];
            $usr->estado = $valor['estado'];
            array_push($arrUsuarios, $usr);
        }
        $tmp->Disconnect();
        return $arrUsuarios;
    }

public static function Login($User, $Password){
        $arrUsuarios = array();
        $tmp = new usuarios();
        $getTempUser = $tmp->getRows("SELECT * FROM Usuarios WHERE User = '$User'");
        if(count($getTempUser) >= 1){
            $getrows = $tmp->getRows("SELECT * FROM Usuarios WHERE User = '$User' AND Pass = '$Password'");
            if(count($getrows) >= 1){
                foreach ($getrows as $valor) {
                    return $valor;
                }
            }else{
                return "Contraseña Invalida";
            }
        }else{
            return "No existe el usuario";
        }

        $tmp->Disconnect();
        return $arrUsuarios;
    }

}
?>