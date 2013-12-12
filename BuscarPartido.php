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
	 <style type="text/css" id="holderjs-style"></style>
   
    <!-- ajax amigos -->
       <script>
          function showPartido(str)
          {
                if (str.length==0)
                  {

                  document.getElementById("txtPartidos").innerHTML="";
                  return;
                  } 

                if (window.XMLHttpRequest)
                  {// code for IE7+, Firefox, Chrome, Opera, Safari
                  xmlhttp=new XMLHttpRequest();
                  }
                else
                  {
                  // code for IE6, IE5
                  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                  }
                xmlhttp.onreadystatechange=function()
                  {

                
                  if (xmlhttp.readyState==4 && xmlhttp.status==200)
                    {
                    document.getElementById("txtPartidos").innerHTML=xmlhttp.responseText;
                    }
                  }
                xmlhttp.open("GET","buscarpordeporte.php?q="+str,true);
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
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
           ENTRADA <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="Mensajes.php">Entrada</a></li> 
          <li><a href="Redactar.php">Redactar</a></li> 
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
        <div id="tabs">
            <ul class = "css_tabs">
              <li id="tabHeader_1">Compatibles</li>
              <li id="tabHeader_3">Por Deporte</li>
            </ul>
        </div>

        <div id="tabscontent">
            <div class="tabpage" id="tabpage_1">
                <table class="table">  
                <thead><tr><th>Creador</th><th>Fecha/Hora</th><th>Lugar</th><th>Deporte</th><th>Confirmados</th><th></th></tr></thead>  
                <tbody>  
               
                <?php
                      $link =mysql_connect("localhost", "root", "a");

                      if (!$link) {
                          trigger_error('Error al conectar al servidor mysql: ' . mysql_error(),E_USER_ERROR);
                      }

                      $db_selected = mysql_select_db("pichangachanga",$link) OR DIE ("Error: No es posible establecer la conexión");
                      if (!$db_selected) {
                          trigger_error ('Error al conectar a la base de datos: ' . mysql_error(),E_USER_ERROR);
                      }


                      $id = $_SESSION["id"];
                      $cont = 0;
                      $qry = mysql_query("SELECT * FROM partido WHERE id_usuario!=".$id."") or die("Error en: $busqueda: " . mysql_error());
                      $qry2 = mysql_query("SELECT * FROM bloque_libre WHERE id_usuario=".$id."") or die("Error en: $busqueda: " . mysql_error());
                      
                      $hoy = date("Y-m-d");
                      for($i=0;$i<mysql_num_rows($qry2);$i++){
                        $bloques[$i]=mysql_fetch_assoc($qry2);
                      }
                      
                      if (!$qry or mysql_num_rows($qry)==0)
                        echo '<tr><td>No hay Partidos</td></tr>';
                      else if(!$qry2 or mysql_num_rows($qry2)==0)
                        echo '<tr><td>No has registrado tus bloques libres</td></tr>';                      
                      else{
                          
                          while ($filas = mysql_fetch_assoc($qry)) {                                
                                
                                $fech = $filas["fecha"];                                
                                $fecha = explode("-", $fech);
                                $anio = $fecha[0];                                
                                $mes = (int)$fecha[1];
                                $dia = $fecha[2];
                                $meses = array (0,"Enero","Febrero","Marzo","Abril","Mayo","Junio ","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                $dias = array ("Domingo","Lunes","Martes","Miercoles","Jueves"," Viernes","Sabado");
                                $nombredia = date("w",mktime(0,0,0,$mes,$dia,$anio));
                                $fmes = $meses[$mes];
                                $fdia = $dias[$nombredia];

                                $qry3 = mysql_query("SELECT * FROM jugador WHERE id_partido=".$filas["id"]." AND estado=1");

                                if( $hoy < $fech or $hoy == $fech and $filas["hora_inicio"] > date("H:i:s",time()-3*3600)){
                                      
                                      foreach($bloques as $bloque){
                                        if($fdia == $bloque["dia"] and $filas["hora_inicio"] >= $bloque["inicio"] and $filas["hora_inicio"] < $bloque["fin"]) {  
                                            $resp = mysql_query("SELECT * FROM usuario WHERE id=".$filas["id_usuario"]);    
                                            $user = mysql_fetch_assoc($resp);                                                               
                                            echo '
                                                <tr>
                                                <td>'.$user["nombre"].'</td>
                                                <td>'.$fdia.' '.$dia.' de '.$fmes.', '.$anio.'/'.$filas["hora_inicio"].'</td>
                                                <td>'.$filas["lugar"].'</td>
                                                <td>'.$filas["deporte"].'</td>
                                                <td>'.mysql_num_rows($qry3).'/'.$filas["jugadores"].'</td>
                                                </tr>';
                                                $cont++;        
                                                }                                
                                            
                                    }
                                }
                          }
                      if($cont == 0)
                          echo '<tr><td>No hay Partidos para ti</td></tr>';
                      mysql_close($link);

                      }
                      
                ?>  

                </tbody>  
                </table>  


            </div>

            <!-- </div> -->

            <div class="tabpage" id="tabpage_2">

                <p>Fecha: <input type="date" name="partido" step="1" min="2013-01-01" max="2013-12-31" value="2013-01-01"></input>
                  <button type="submit" class="btn">Buscar</button>  </p> 

            </div>
            <div class="tabpage" id="tabpage_3">
                <form> 
                <p><h2>Buscar por Deporte:</h2> <input type="text" onkeyup="showPartido(this.value)"></input></p>
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
    <div id="txtPartidos"></div>
    </div>
      <!-- Site footer -->
        <div class="footer">
            <p>© Pichangachanga 2013</p>
        </div>

     <!-- /container -->

</div>
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-2.0.3.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/holder.js"></script>    
    <script src="js/tabs_old.js"></script>
    
  

</body></html>
