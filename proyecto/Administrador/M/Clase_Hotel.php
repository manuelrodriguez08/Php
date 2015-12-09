<?php 


require_once('db_abstract_class.php');

class hoteles extends db_abstract_class{

	private $idHotel;
	private $Nombre;
	private $Nit;
    private $Telefono;
	private $Direccion;
	private $ResolucionDian;


                            public function __construct($user_data=array()){
                                    parent::__construct();
                            		if(count($user_data)>1){
                            			foreach ($user_data as $campo=>$valor){
                                            $this->$campo = $valor;
                            			}
                            		}else {
                            			$this->Nombre = "";
                                        $this->Nit = "";
                            			$this->Direccion = "";
                            			$this->Telefono = "";
                            			$this->ResolucionDian = "";
                            			
                            			
                            		}
                                }


                                 function __destruct() {
                                    $this->Disconnect();
                                }


                             public function crear(){
                                    $this->insertRow("INSERT INTO hotel
                                        VALUES ('NULL', ?, ?, ?, ?, ?)", array( 
                                        $this->Nombre,
                                        $this->Nit, 
                                        $this->Direccion, 
                                        $this->Telefono, 
                                        $this->ResolucionDian, 
                                                    )
                                    );
                            		$this->Disconnect();
                                }

}
?>