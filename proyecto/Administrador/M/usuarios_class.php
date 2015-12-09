<?php
require_once('db_abstract_class.php');

class usuarios extends db_abstract_class{
	
	private $idUsuario;
	private $TipoUsuario = "";
	private $TipoDocumento;
    private $Documento;
	private $Nombres;
	private $Apellidos;
    private $FechaNacimiento;
	private $Telefono;
	private $Direccion;
    private $Estado;
	private $User;
	private $Pass;

	/* Setters and Getters*/
    public function getId(){
        return $this->idUsuario;
    }
    
    private function _setId ($Id){
        $this->idUsuario = $Id;
        return $this;
    }

    public function getTipo_Identificacion(){
        return $this->TipoUsuario;
    }
    
    private function _setTipo_Identificacion ($tipo_identificacion){
        $this->tipo_identificacion = $tipo_identificacion;
        return $this;
    }

    public function getIdentificacion(){
        return $this->identificacion;
    }
    
    private function _setIdentificacion ($identificacion){
        $this->identificacion = $identificacion;
        return $this;
    }

    public function getNombres(){
        return $this->nombres;
    }
    
    private function _setNombres ($nombres){
        $this->nombres = $nombres;
        return $this;
    }

    public function getApellidos(){
        return $this->apellidos;
    }
    
    private function _setApellidos($apellidos){
        $this->apellidos = $apellidos;
        return $this;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    private function _setTelefono($telefono){
        $this->telefono = $telefono;
        return $this;
    }

    public function getDireccion(){
        return $this->direccion;
    }
    
    private function _setDireccion($direccion){
        $this->direccion = $direccion;
        return $this;
    }

    public function getFechaNacimiento(){
        return $this->fecha_nacimiento;
    }
    
    private function _setFechaNacimiento($fecha_nacimiento){
        $this->fecha_nacimiento = $fecha_nacimiento;
        return $this;
    }

    public function getSaldo(){
        return $this->saldo;
    }
    
    private function _setSaldo($saldo){
        $this->saldo = $saldo;
        return $this;
    }

    public function getUserLogin(){
        return $this->user_login;
    }
    
    private function _setUserLogin($user_login){
        $this->user_login = $user_login;
        return $this;
    }

    public function getPassLogin(){
        return $this->pass_login;
    }
    
    private function _setPassLogin($pass_login){
        $this->pass_login = $pass_login;
        return $this;
    }

    public function getEstado(){
        return $this->estado;
    }

    private function _setEstado($estado){
        $this->estado = $estado;
        return $this;
    }

    function __destruct() {
        $this->Disconnect();
    }

	public function __construct($user_data=array()){
        parent::__construct();
		if(count($user_data)>1){
			foreach ($user_data as $campo=>$valor){
                $this->$campo = $valor;
			}
		}else {
			$this->TipoUsuario = "";
            $this->TipoDocumento = "";
			$this->Documento = "";
			$this->Nombres = "";
			$this->Apellidos = "";
			$this->FechaNacimiento = "";
            $this->Telefono = "";
			$this->Direccion = "";
			$this->Estado = "";
			$this->User = "";
			$this->Pass = "";
			
		}
    }

    public function insertar(){
        $this->insertRow("INSERT INTO usuarios
            VALUES ('NULL', ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array( 
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
            $this->Pass,             )
        );
		$this->Disconnect();
    }

    public function editar(){
		$arrUser = (array) $this;
		$this->updateRow("UPDATE usuarios SET TipoUsuario = ?, TipoDocumento = ?, Documento = ?, Nombres = ?, Apellidos = ?, FechaNacimiento = ?, Telefono = ?, Direccion = ?,  Estado = ?, User = ?, Pass = ?  WHERE Documento = ?", array(
			


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
            $this->Documento,
			
		)

        );

        
		$this->Disconnect();
    }

    public function eliminar(){
        return $this->user_login;
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
        $getTempUser = $tmp->getRows("SELECT * FROM usuarios WHERE User = '$User'");
        if(count($getTempUser) >= 1){
            $getrows = $tmp->getRows("SELECT * FROM usuarios WHERE User = '$User' AND Pass = '$Password'");
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