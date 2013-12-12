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
	
	
<!-- ajax  compañeros-->
<script>
function showHint(str)
{
if (str.length==0)
  { 
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
var partido = '<?php echo $_GET["id"]; ?>' ;
xmlhttp.open("GET","buscarCompa.php?partido="+partido+"&q="+str,true);
xmlhttp.send();
}
</script>
	
	
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
           REDACTAR <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="Mensajes.php">Entrada</a></li> 
          <li class="active"><a href="redactar.php">Redactar</a></li> 
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

 <!--i segundo menu --> 
    <!--i configurar para cada nav activo en cada caso --> 
<div id="wrapper">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <div id="tabContainer">

      <div id="tabscontent">
        <div class="tabpage" id="tabpage_1">
 
            <h2>Redactar</h2>            

            <form method="post" action="enviarMensaje.php">
            <dl class="dl-horizontal">
              <dt>Destino:</dt>
              <dd><input id="nombreReceptor" name="nombreReceptor" required="required" type="text" placeholder="Nombre Apellido" /></dd>			  			 
			  
              <dt>Mensaje:</dt>
              <dd><textarea name="mensaje" maxlength="255" cols="40" rows="6" required ></textarea><dd>             
              <dt></dt>			  			 
			  
              <dd><button type="submit" class="btn btn-success">Enviar</button></dd>
            </dl>
            </form>
  
        </div>
                             
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
