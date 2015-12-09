<?php 

require_once("../../dompdf/dompdf_config.inc.php");



$Codigohtml='


  				<input type="submit"></input>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Usuario</th>
                                            <th>Habitacion</th>
                                            <th>Duracion (dias) </th>
                                            <th>Tipo De Reserva</th>
                                            <th>Fecha Entrada</th>
                                            <th>Fecha Salida</th>
                                            <th>Estado</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>';

                                    
                                      $conexion = mysql_connect("localhost","root","");

                                       mysql_select_db("hyltonproyect",$conexion);

                                       $mostrar = mysql_query( "SELECT * from reserva");

                                       $mos = mysql_query( "SELECT * from usuarios");

                                       $mo = mysql_query( "SELECT * from habitaciones");

                                       
      

                             while($fila = mysql_fetch_array($mostrar)){

                                $x = mysql_fetch_array($mos);

                                 		$y = mysql_fetch_array($mo);


              $Codigohtml.=' "<tr><td>'. $fila['idReserva']. '</td><td>'.$x['Nombres'].'</td><td>'. $y['Numero'].'</td><td>'.$fila['Duracion'].'</td><td>'.
                    $fila['TipoReserva'].'</td><td>'.$fila['FechaEntrada'].'</td><td>'.$fila['FechaSalida'].'</td><td>'.$fila['Estado'];
    
              
}

$Codigohtml.='
                                        
                                       
                                    </tbody>
                                </table>

                               
                           


';




echo $fila['FechaSalida'];

echo $Codigohtml;


?>