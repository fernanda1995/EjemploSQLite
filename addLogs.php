<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agregar - Logs</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SB Admin</a>
            </div>
           
             <?php include_once "menuItems.php"; ?>
             <?php include_once "menu.php"; ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Agregar Logs
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Logs</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Agregar
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-8">

                        <form role="form" id="frmUser" method="post" action="crudLogs.php?action=crear">
                            <div class="form-group">
                                <label>Utc</label>
                                <input id="Utc" name="Utc" class="form-control" placeholder="156554">
                                <p class="help-block">Utc.</p>
                            </div>

                            <div class="form-group">
                                <label>Anio</label>
                                <input id="Anio" name="Anio" class="form-control" placeholder="2015">
                                <p class="help-block">Anio.</p>
                            </div>

                            <div class="form-group">
                                <label>Mes</label>
                                <input id="Mes" name="Mes" class="form-control" placeholder="04">
                                <p class="help-block">Mes.</p>
                            </div>

                            <div class="form-group">
                                <label>Dia</label>
                                <input id="Dia" name="Dia" class="form-control" placeholder="12">
                                <p class="help-block">Dia.</p>
                            </div>

                            
                            <div class="form-group">
                                <label>Hora</label>
                                <input id="Hora" name="Hora" class="form-control" placeholder="14:00">
                                <p class="help-block">Hora.</p>
                            </div>

     <div class="form-group">
                                <label>Segundo</label>
                                <input id="Segundo" name="Segundo" class="form-control" placeholder="12">
                                <p class="help-block">Segundo.</p>
                            </div>


     <div class="form-group">
                                <label>Ip</label>
                                <input id="Ip" name="Ip" class="form-control" placeholder="05-78657">
                                <p class="help-block">Ip.</p>
                            </div>


     <div class="form-group">
                                <label>Navegador</label>
                                <input id="Navegador" name="Navegador" class="form-control" placeholder="Google">
                                <p class="help-block">Navegador.</p>
                            </div>

                            <div class="form-group">
                                <label>Usuario</label>
                                <input id="Usuario" name="Usuario" class="form-control" placeholder="mafe">
                                <p class="help-block">Usuario.</p>
                            </div>


                            <div class="form-group">
                                <label>Operador</label>
                                <input id="Operador" name="Operador" class="form-control" placeholder="Operador">
                                <p class="help-block">Operador.</p>
                            </div>

                            


                            <button type="submit" class="btn btn-default">Enviar</button>
                            <button type="reset" class="btn btn-default">Limpiar</button>

                        </form>

                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>