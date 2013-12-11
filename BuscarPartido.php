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
<link href="style.css" rel="stylesheet" type="text/css">
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
    <link href="css/carousel.css" rel="stylesheet">
	<style type="text/css" id="holderjs-style"></style></head>
   
    <!-- ajax amigos -->
       <script>
function showUser(str)
{
if (str=="")
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
xmlhttp.open("GET","buscarpornombre.php?q="+str,true);
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
      <li class="dropdown active">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          BUSCAR PARTIDO <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="ConfPartido.php">Mis Partidos</a></li>
          <li class="disabled"><a href="BuscarPartido.php">Buscar</a></li>          
        </ul>
      </li>
      <li><a href="Mensajes.php">MENSAJES</a></li>  
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
              <div id="tabs">
                <ul>
                  <li id="tabHeader_1">Buscar</li>
                </ul>
              </div>
              <div id="tabscontent">
                <div class="tabpage" id="tabpage_1">
                  <h2>Recomendados segun mi horario</h2>

                  <table class="table">  
                      <thead><tr><th>Fecha</th><th>Hora</th><th>Lugar</th><th>Deporte</th><th>Opción</th></tr></thead>  
                      <tbody>  
                     
                      <?php
                            $bloc[100]=null;
                            $dia[100]=null;

                            $x=0;

                            $link =mysql_connect("localhost", "root", "a");

                            if (!$link) {
                                trigger_error('Error al conectar al servidor mysql: ' . mysql_error(),E_USER_ERROR);
                            }

                            $db_selected = mysql_select_db("pichangachanga",$link) OR DIE ("Error: No es posible establecer la conexión");
                            if (!$db_selected) {
                                trigger_error ('Error al conectar a la base de datos: ' . mysql_error(),E_USER_ERROR);
                            }


                            $id = $_SESSION["id"];
                            
                            $qry = mysql_query("SELECT * FROM bloque_libre WHERE id_usuario=".$id."") or die("Error en: $busqueda: " . mysql_error());
                            
                            if (!$qry)
                              echo '<tr><td>No hay datos</td></tr>';
                            else{ 
                            while ($filas = mysql_fetch_assoc($qry)) {
                            $bloc[$x]=$filas["inicio"];
                            $dia[$x]=$filas["dia"];
                            //echo  $bloc[$x];
                            //echo  $dia[$x];
                            $x=$x+1;
                            //echo $filas["id_partido"];
                                                                      }
                                } 
                            
                      ?>  

                       </tbody>  
                    </table>
                </div>

              <!-- </div> -->

             <!--Buscar --> 
<!--             <div id="Buscar"> -->
             <h2>Personalizada</h2>
                            <form> 
                            <p>Nombre: <input type="text" onkeyup="showUser(this.value)">
                            </form>
                            <br> 
                            <div id="txtHint"><b>Por Compañero</b></div><td> 
                            <br> 
                            <button type="submit" class="btn">Agregar</button> </td>  
       

             <p>Fecha: <input type="date" name="partido" step="1" min="2013-01-01" max="2013-12-31" value="2013-01-01"> <button type="submit" class="btn">Buscar</button>  </p> 

             <p>Deporte: <input type=“search” name=“busqueda”> <button type="submit" class="btn">Buscar</button> </p>

             <h3>Resultados</h3>

                           <table class="table">  
                      <thead>  
                        <tr>  
                          <th>Fecha</th>  
                          <th>Hora</th>  
                          <th>Deporte</th>  
                          <th>Agregar</th>  
                        </tr>  
                      </thead>  
                      <tbody>  
                        <tr>  
                          <td>6/10/2013</td>  
                          <td>12:00 </td>  
                          <td>Futbol</td>  
                          <td> <button type="submit" class="btn">Aceptar</button> </td>  
                        </tr>  
                      </tbody>  
                    </table>  
              </body>  
          </html>  
          




             </div>

            </div>
          <script type="text/javascript">


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
    

<script>
    $(document).ready(function(){
        $('.carousel').carousel()
    });
</script>
  

</body></html>
