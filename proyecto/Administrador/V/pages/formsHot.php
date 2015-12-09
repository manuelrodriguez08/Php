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
                    <h1 class="page-header" color="write">Registrar Empresa</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Datos De La Empresa
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="../../C/ControladorHotel.php?action=crear" method="post">
                                       
                                        <div class="form-group">
                                            <label>NOMBRE </label>
                                            <input class="form-control" placeholder="Nombre" type="tex" name="nombre" id="nombre" required>
                                        </div>
                                        <div class="form-group">
                                            <label>NIT </label>
                                            <input class="form-control" placeholder="Nit" type="tex" name="nit" id="nit" required>
                                        </div>
                                        <div class="form-group">
                                            <label>DIRECCION </label>
                                            <input class="form-control" placeholder="Direccion" type="tex" name="direccion" id="direccion" required>
                                        </div>
                                        <div class="form-group">
                                            <label>TELEFONO </label>
                                            <input class="form-control" placeholder="Telefono" type="number" name="tel" id="tel" required>
                                        </div>
                                        <div class="form-group">
                                            <label>RESOLUCION DIAN </label>
                                            <input class="form-control" placeholder="Resolucion Dian" type="tex" name="reso" id="reso" required>
                                        </div>
                                        
                                        
                                       
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
