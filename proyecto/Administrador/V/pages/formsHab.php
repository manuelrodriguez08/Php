<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrador Hotel Hylton</title>
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
                    <h1 class="page-header" color="write">Registrar Habitacion</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Datos De La Habitacion
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="post" action="../../C/ControladorHabitacion.php?action=crear">
                                     <div class="form-group">
                                            <label>Tipo De Habitacion</label></br>
                                           
                                             <select name="tipoHabitacion" id="tipoUsuario" required>
                                                <option value="">---Seleccione Una Opcion---</option>
                                                 <option value="sencilla">Sencilla</option>
                                                 <option value="doble">Doble</option>
                                                 <option value= "familiar">Familiar</option>
                                             </select>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label>Numero </label>
                                            <input class="form-control" placeholder="Numero" type="number" name="numero" id="numero" required>
                                        </div>
                                        
                                        
                                         <div class="form-group">
                                            <label>Piso</label>
                                            <input class="form-control" placeholder="Piso" type="number" name="piso" id="piso" required>
                                        </div>
                                         <div class="form-group">
                                            <label>Valor Noche</label>
                                            <input class="form-control" placeholder="Valor Noche" type="number" name="valorNoche" id="valorNoche" required>
                                        </div>
                                        <?php  $conexion = mysql_connect("localhost","root","");

                                       mysql_select_db("hyltonproyect",$conexion);

                                       $mostrar = mysql_query( "SELECT * FROM hotel"); 

                                            while($fila = mysql_fetch_array($mostrar)){

                                            }

                                       ?>
                                             <div class="form-group">
                                            <label>Hotel</label></br>
                                           

                                            <?php  $conexion = mysql_connect("localhost","root","");

                                       mysql_select_db("hyltonproyect",$conexion);

                                       $mostrar = mysql_query( "SELECT * FROM hotel"); 
                                        echo' <select name="hotel" id="hotel" required>';
                                            echo '    <option value="">---Seleccione Una Opcion---</option>';

                                            while($fila = mysql_fetch_array($mostrar)){
                                                
                                                
                                         echo '<option value="'.$fila['idHotel'].'">'.$fila['Nombre'].'</option>';

                                     };
                                                 
                                            echo ' </select>';
                                             ?>
                                        </div><!--
                                         <div class="form-group">
                                            <label>Hotel</label>
                                            <input class="form-control" placeholder="" type="text" name="hotel" id="hotel" required>
                                        </div>-->
                                    
                                        <button type="submit" class="btn btn-default">Registrar</button>
                                        
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
