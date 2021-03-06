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
                    <h1 class="page-header" color="write">Registrar Empleado</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Datos Del Empleado
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="../../C/usuarios_controller.php?action=crear" method="post">
                                     <div class="form-group">
                                            <label>Tipo De Usuario</label></br>
                                           
                                             <select name="tipoUsuario" id="tipoUsuario" required>
                                                <option value="">---Seleccione Una Opcion---</option>
                                                 <option value="administrador">ADMINISTRADOR</option>
                                                 <option value="recepcionista">RECEPCIONISTA</option>
                                                 
                                             </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tipo De Documento</label></br>
                                           
                                             <select name="tipoDocumento" id="tipoDocumento" required>
                                                <option value="">---Seleccione Una Opcion---</option>
                                                 <option value="cedulaCiudadania"> Cedula De Ciudaddania</option>
                                                 <option value="tarjetaIdentidad"> Tarjeta de Identidad</option>
                                                 <option value="cedulaExtranjera"> Cedula Extranjera</option>
                                             </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Numero Documento</label>
                                            <input class="form-control" placeholder="Documento" type="number" name="Documento" id="Documento" required>
                                        </div>
                                         <div class="form-group">
                                            <label>Nombres</label>
                                            <input class="form-control" placeholder="Ingrese Sus Nombres" type="text" name="nombre" id="nombre" required>
                                        </div>
                                         <div class="form-group">
                                            <label>Apellidos</label>
                                            <input class="form-control" placeholder="Ingrese Sus Apellidos" type="text" name="apellido" id="apellido" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Fecha De Nacimiento</label>
                                            <input class="form-control" placeholder="Ingrese Sus Apellidos" type="date" name="fechaN" id="fechaN" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Telefono</label>
                                            <input class="form-control" placeholder="Telefono" type="number" name="telefono" id="telefono" required>
                                        </div>
                                       
                                         <div class="form-group">
                                            <label>Direccion</label>
                                            <input class="form-control" placeholder="Direccion" type="text" name="direccion" id="direccion" required>
                                        </div>
                                         
                                         
                                        <div class="form-group">
                                            <label>Usuario</label>
                                            <input class="form-control" placeholder="User" type="text" name="user" id="user" >
                                        </div>
                                         <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" placeholder="Pass" type="password" name="pass" id="pass" >
                                        </div>
                                        
                                        
                                       
                                        <button type="submit" class="btn btn-default" >Registrar</button>
                                        
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
