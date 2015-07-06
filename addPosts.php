<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agregar - Posts</title>

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
                            Agregar Post
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Post</a>
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

                        <form role="form" id="frmUser" method="post" action="crudPosts.php?action=crear">
                            <div class="form-group">
                                <label>Utc</label>
                                <input id="Utc" name="Utc" class="form-control" placeholder="1234">
                                <p class="help-block">Utc.</p>
                            </div>

                            <div class="form-group">
                                <label>Anio</label>
                                <input id="Anio" name="Anio" class="form-control" placeholder="2015">
                                <p class="help-block">Anio.</p>
                            </div>

                            <div class="form-group">
                                <label>Mes</label>
                                <input id="Mes" name="Mes" class="form-control" placeholder="12">
                                <p class="help-block">Mes.</p>
                            </div>

                            <div class="form-group">
                                <label>Dia</label>
                                <input id="Dia" name="Dia" class="form-control" placeholder="13">
                                <p class="help-block">Dia.</p>
                            </div>

                            
                            <div class="form-group">
                                <label>Hora</label>
                                <input id="Hora" name="Hora" class="form-control" placeholder="13">
                                <p class="help-block">Hora.</p>
                            </div>

     <div class="form-group">
                                <label>Segundo</label>
                                <input id="Segundo" name="Segundo" class="form-control" placeholder="09">
                                <p class="help-block">Segundo.</p>
                            </div>


     <div class="form-group">
                                <label>Titulo</label>
                                <input id="Titulo" name="Titulo" class="form-control" placeholder="Titulo">
                                <p class="help-block">Titulo.</p>
                            </div>


     <div class="form-group">
                                <label>Subtitulo</label>
                                <input id="SubTitulo" name="SubTitulo" class="form-control" placeholder="Subtitulo">
                                <p class="help-block">Subtitulo.</p>
                            </div>

                            <div class="form-group">
                                <label>Icono</label>
                                <input id="Icono" name="Icono" class="form-control" placeholder="Icono">
                                <p class="help-block">Icono.</p>
                            </div>


                            <div class="form-group">
                                <label>Texto</label>
                                <input id="Texto" name="Texto" class="form-control" placeholder="Texto">
                                <p class="help-block">Texto.</p>
                            </div>

                             <div class="form-group">
                                <label>Imagen</label>
                                <input id="Imagen" name="Imagen" class="form-control" placeholder="Imagen">
                                <p class="help-block">Imagen.</p>
                            </div>
                             <div class="form-group">
                                <label>Video</label>
                                <input id="Video" name="Video" class="form-control" placeholder="Video">
                                <p class="help-block">Video.</p>
                            </div>
                             <div class="form-group">
                                <label>Sonido</label>
                                <input id="Sonido" name="Sonido" class="form-control" placeholder="Sonido">
                                <p class="help-block">SONIDO.</p>
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