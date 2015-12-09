<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TABLAS HYLTON HOTEL</title>
    <?php include ("snippets/headers.php"); ?>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php include ("snippets/navbar-header.php"); ?>

            <?php include ("snippets/navbar-top-links.php"); ?>

            <?php include ("snippets/navbar-sidebar.php"); ?>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tablas</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tabla Usuarios
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    
                                        <tr>
                                            <th>id</th>
                                            <th>Tipo Usuario</th>
                                            <th>Tipo Documento</th>
                                            <th>Numero Documento</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Fecha Nacimiento</th>
                                            <th>Telefono</th>
                                            <th>Direccion</th>
                                            <th>Estado</th>
                                            <th>Usuario</th>
                                            <th>Password</th>
                                            <th></th>
                                            <th></th>

                                            
                                        </tr>
                                    
                                    <tbody> 
                                        <?php

                                       $conexion = mysql_connect("localhost","hylton","hylton");

                                       mysql_select_db("hyltonproyect",$conexion);

                                       $mostrar = mysql_query( "SELECT * FROM usuarios");

                                        while($fila = mysql_fetch_array($mostrar)){
                    echo "<tr><td>". $fila['idUsuario']. "</td><td>".$fila['TipoUsuario']."</td><td>". $fila['TipoDocumento']."</td><td>".$fila['Documento']."</td><td>".
                    $fila['Nombres']."</td><td>".$fila['Apellidos']."</td><td>".$fila['FechaNacimiento']."</td><td>".$fila['Telefono']."</td><td>".$fila['Direccion']."</td><td>".$fila['Estado']."</td><td>".$fila['User']."</td><td>".$fila['Pass']."</td><td><a href='actualizaruser.php?tipoU=".$fila['TipoUsuario']."&tipoD=".$fila['TipoDocumento']."&numero=".$fila['Documento']."&nombre=".$fila['Nombres']."&apellido=".$fila['Apellidos']."&fecha=".$fila['FechaNacimiento']
                    ."&tel=".$fila['Telefono']."&dire=".$fila['Direccion']."&use=".$fila['User']."&pass=".$fila['Pass']."'>Modificar</a>"."</td><td><a href=''>Eliminar</a></tr>";
        
            
         }

                                       ?>
                                    </tbody>

                                    
                                     
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Tabla Habitaciones
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Tipo Habitacion</th>
                                            <th>Numero</th>
                                            <th>Piso</th>
                                            <th>Valor Noche</th>
                                            <th>Estado</th>
                                            <th></th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                      $conexion = mysql_connect("localhost","root","");

                                       mysql_select_db("hyltonproyect",$conexion);

                                       $mostrar = mysql_query( "SELECT * from habitaciones");

                             while($fila = mysql_fetch_array($mostrar)){
              echo "<tr><td>".$fila['idHabitacion']."</td><td>".$fila['TipoHabitacion']."</td><td>".$fila['Numero']
              ."</td><td>".$fila['Piso']."</td><td>".$fila['ValorNoche']."</td><td>".$fila['Estado']
              ."</td><td><a href='actualizarHab.php?"
              ."&TipoHabitacion=".$fila['TipoHabitacion']."&Numero=".$fila['Numero']."&Piso=".$fila['Piso']."&ValorNoche="
              .$fila['ValorNoche']."&Hotel=".$fila['Hotel']."'>Modificar</a>"."</td><td><a href=''>Eliminar</a></tr>";
  }



                                         ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tabla Reservas
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
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
                                    <tbody>

                                    <?php
                                      $conexion = mysql_connect("localhost","root","");

                                       mysql_select_db("hyltonproyect",$conexion);

                                       $mostrar = mysql_query( "SELECT * from reserva");

                                       $mos = mysql_query( "SELECT * from usuarios");

                                       $mo = mysql_query( "SELECT * from habitaciones");
      

                             while($fila = mysql_fetch_array($mostrar)){

                                $x = mysql_fetch_array($mos);

                                 $y = mysql_fetch_array($mo);


              echo "<tr><td>". $fila['idReserva']. "</td><td>".$x['Nombres']."</td><td>". $y['Numero']."</td><td>".$fila['Duracion']."</td><td>".
                    $fila['TipoReserva']."</td><td>".$fila['FechaEntrada']."</td><td>".$fila['FechaSalida']."</td><td>".$fila['Estado']."</td><td><a href=''>Modificar</a>"."</td><td><a href=''>Cambiar Estado</a></tr>";
    
            }



                                         ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
           
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
