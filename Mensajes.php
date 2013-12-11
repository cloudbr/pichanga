<?php
session_start();
if(empty($_SESSION["id"])){
  $_SESSION = array();
  session_destroy();
  header("Location: Index.php");
}
?>
<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="http://getbootstrap.com/docs-assets/ico/favicon.png">

    <title>PichangaChanga</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/justified-nav.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- MENU FIJADO EN TOP -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->

  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target=".navbar-ex1-collapse">
      <span class="sr-only">Desplegar navegación</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="">PichangaChanga</a>
  </div>
  
  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li><a href="Inicio.php">INICIO</a></li>
      <!--li><a href="#">PERFIL</a></li-->
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          PARTIDOS <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="ConfPartido.php">Mis Partidos</a></li>
          <li><a href="BuscarPartido.php">Buscar</a></li>          
        </ul>
      </li>
      <li class="dropdown active">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
           ENTRADA <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li class="active"><a href="Mensajes.php">Entrada</a></li> 
          <li><a href="redactar.php">Redactar</a></li> 
        </ul>
    </ul>
 
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <?php echo $_SESSION["nombre"]; ?> <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="Perfil.php">Perfil</a></li>
          <li class="divider"></li>
          <li><a href="logout.php">Cerrar Sesión</a></li>
        </ul>
      </li>
    </ul>
  </div>
  
</nav>

<!-- END MENU -->
	  
	 <!--i segundo menu --> 
    <!--i configurar para cada nav activo en cada caso --> 
        <div id="wrapper">
            <link href="css/style.css" rel="stylesheet" type="text/css">
            <div id="tabContainer">
              
                  <div class="panel-group" id="accordion">
                  <?php

                      $id = $_SESSION["id"];
                      $hoy = date("Y-m-d");

                      $cont = 0;
                      $con = mysql_connect('localhost','root','a');
                      if (!$con){
                        die('Could not connect: ' . mysqli_error($con));
                      }

                      mysql_select_db("pichangachanga");
                      $sql="SELECT * FROM mensajes WHERE id_receptor=".$id." ORDER BY fecha";

                      $result = mysql_query($sql);
                      while($row = mysql_fetch_assoc($result)){
                            $fech = $row["fecha"];                                
                            $fecha = explode("-", $fech);
                            $anio = $fecha[0];                                
                            $mes = (int)$fecha[1];
                            $dia = $fecha[2];
                            $meses = array (0,"Enero","Febrero","Marzo","Abril","Mayo","Junio ","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                            $dias = array ("Domingo","Lunes","Martes","Miercoles","Jueves"," Viernes","Sabado");
                            $nombredia = date("w",mktime(0,0,0,$mes,$dia,$anio));
                            $fmes = $meses[$mes];
                            $fdia = $dias[$nombredia];
                                                      
                              $result2 = mysql_query("SELECT * FROM usuario WHERE id = ".$row["id_emisor"]);
                              if($emisor = mysql_fetch_assoc($result2)){
                                    $cont++;
                                    echo '<div class="panel panel-success">
                                            <div class="panel-heading">
                                              <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$row["id"].'">
                                                <font color="#000000">
                                                 DE: '.$emisor["nombre"].'<br>'.$fdia.', '.$dia.' de '.$fmes.' del '.$anio.'
                                                 </font>
                                                </a>
                                              </h4>
                                            </div>
                                            <div id="collapse'.$row["id"].'" class="panel-collapse collapse out">
                                              <div class="panel-body">
                                                <p>'.$row["msn"].'
                                              </div>
                                            </div>
                                          </div>';
                                        }
                      }                            
                      if($cont == 0)
                        echo '<div class="panel panel-success">
                                <div class="panel-heading">
                                  <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$row["id"].'">
                                    <font color="#000000">
                                     No Tienes Mensajes.
                                     </font>
                                    </a>
                                  </h4>
                                </div>
                                
                              </div>';
                      
                      mysql_close($con);
                      ?>
                 </div> 
				 									 
       
      <!-- Jumbotron -->
          <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
          <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
          <script type="text/javascript">
              $('#tabs')
                  .tabs()
                  .addClass('ui-tabs-vertical ui-helper-clearfix');
            </script>
              <!-- end jumbotron -->

      <!-- Site footer -->
    </div>
      <div class="footer">
        <p>© Pichangachanga 2013</p>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-2.0.3.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/holder.js"></script>   
    <script src="js/tabs_old.js"></script> 
    <script src="js/modal.js"></script> 

    <script type="text/javascript" src="http://twitter.github.io/bootstrap/assets/js/bootstrap-dropdown.js"></script>
    <script type="text/javascript" src="../js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
   

  

</body>
</html>
