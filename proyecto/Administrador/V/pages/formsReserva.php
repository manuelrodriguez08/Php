<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrador Hotel Hylton</title>
    <?php include ("snippets/headersRe.php"); ?>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php include ("snippets/navbar-headerRe.php"); ?>

            <?php include ("snippets/navbar-top-linksRe.php"); ?>

            <?php include ("snippets/navbar-sidebarRe.php"); ?>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" color="write">Realizar Reserva</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Datos De la Reserva
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="post"  action="../../C/ControladorReserva.php?accion=realizar">
                                     <div class="form-group">
                                            <label>Usuario</label></br>
                                           
                                              <?php  $conexion = mysql_connect("localhost","root","");

                                       mysql_select_db("hyltonproyect",$conexion);

                                       $mostrar = mysql_query( "SELECT * FROM usuarios where TipoUsuario = 'cliente'"); 
                                        echo' <select name="user" id="user" required>';
                                            echo '    <option value="">---Seleccione Una Opcion---</option>';

                                            while($fila = mysql_fetch_array($mostrar)){
                                                
                                                
                                         echo '<option value="'.$fila['idUsuario'].'">'.$fila['Nombres'].'</option>';

                                     };
                                                 
                                            echo ' </select>';
                                             ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Habitacion (libres)</label></br>
                                           
                                             <?php  $conexion = mysql_connect("localhost","root","");

                                       mysql_select_db("hyltonproyect",$conexion);

                                       $mostrar = mysql_query( "SELECT * FROM habitaciones where Estado='Libre'"); 
                                        echo' <select name="habitacion" id="habitacion" required>';
                                            echo '    <option value="">---Seleccione Una Opcion---</option>';

                                            while($fila = mysql_fetch_array($mostrar)){
                                                
                                                
                                         echo '<option value="'.$fila['idHabitacion'].'">'.$fila['Numero'].'</option>';

                                     };
                                                 
                                            echo ' </select>';
                                             ?>
                                        </div>
                                         <div class="form-group">
                                            <label>Tipo Reserva</label></br>
                                           
                                             <select name="reserva" id="reserva" required>
                                                <option>---Seleccione Una Opcion---</option>
                                                 <option>Personal</option>
                                                  <option>Telefonica</option>
                                                
                                                 
                                                 
                                             </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Duracion (dias)</label>
                                            <input class="form-control" placeholder="Duracion" type="number" name="Duracion" id="Duracion" required>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label>Fecha Entrada</label>
                                            <input class="form-control" placeholder="" type="date" name="fechaEn" id="fechaEn" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Fecha Salida</label>
                                            <input class="form-control" placeholder="" type="date" name="fechaSal" id="fechaSal" required>
                                        </div>
                                        
                                             <button type="submit" class="btn btn-default">Realizar Reserva</button>
                                        
                                    </form>
                                </div>

                                
                                <!-- /.col-lg-6 (nested) -->
                                
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
