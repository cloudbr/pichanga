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



    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
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
      <li class="dropdown active">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          MIS PARTIDOS <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li class="disabled"><a href="ConfPartido.php">Mis Partidos</a></li>
          <li><a href="BuscarPartido.php">Buscar</a></li>          
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
          <li><a href="">Amigos</a></li>
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
          <li id="tabHeader_1">Datos del partido</li>
          <li id="tabHeader_2">Partidos Amigos</li>
          <li id="tabHeader_3">Publicar Facebook</li>
        </ul>
      </div>

      <div id="tabscontent">
        <div class="tabpage" id="tabpage_1">
          <h2>Mis Partidos</h2>


              <table class="table">  
                <thead><tr><th>Fecha</th><th>Hora</th><th>Lugar</th><th>Deporte</th><th>Opción</th><th>Amigos</th></tr></thead>  
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
                      
                      $qry = mysql_query("SELECT * FROM partido WHERE id_usuario=".$id."") or die("Error en: $busqueda: " . mysql_error());
                      
                      if (!$qry)
                        echo '<tr><td>No hay datos</td></tr>';
                      else{
                          
                          while ($filas = mysql_fetch_assoc($qry)) {
                                echo '<tr>
                                      <td>'.$filas["fecha"].'</td>
                                      <td>'.$filas["hora_inicio"].'</td>
                                      <td>'.$filas["lugar"].'</td>
                                      <td>'.$filas["deporte"].'</td>
                                      <td><a href="borrar_partido.php?id='.$filas["id"].'"><font color="black">Borrar</font></a></td>
                                      <td><a href="JugadoresPartido.php?id='.$filas["id"].'"><font color="black">Jugadores</font></a></td>
                                      <tr>';
                          }

                      }
                ?>  

                 </tbody>  
              </table>



            <h2>Nuevo Partido</h2>            

            <form  action="insertarPartido.php" autocomplete="on" method="post"> 
            <dl class="dl-horizontal">
              <dt>Deporte:</dt>
              <dd><input id="deporte" name="deporte" required="required" type="text" placeholder="¿Qué jugaremos?" /></dd>
              <dt>Fecha:</dt>
              <dd><input id="fecha" name="fecha" size="16" type="text" placeholder="¿Cuándo?" readonly class="form_datetime" required="required"/><dd>
              <dt>Hora:</dt>
              <dd><input id="hora" name="hora" size="16" type="text" placeholder="¿A qué hora?" readonly class="form_time" required="required"/><dd>
              <dt>Lugar:</dt>
              <dd><input id="lugar" name="lugar" required="required" type="text" placeholder="¿En qué cancha?" /></dd>
              <dt>Max. Jugadores:</dt>
              <dd><input id="max_jugadores" name="max_jugadores" required="required" type="text" placeholder="¿Cuántos jugadores?" /></dd>
              <dt></dt>
              <dd><button type="submit" class="btn btn-success">Nuevo</button></dd>
            </dl>
            </form>
              
        </div>
                
        <div class="tabpage" id="tabpage_2">
          <h2>Partidos Amigos</h2>
          

             <table class="table">  
                <thead><tr><th>Fecha</th><th>Hora</th><th>Lugar</th><th>Deporte</th></tr></thead>  
                <tbody>  
               
                <?php
                      
                      $cont[10];
                      $x=0;
                      $link =mysql_connect("localhost", "root", "a","pichangachanga");

                      if (!$link) {
                          trigger_error('Error al conectar al servidor mysql: ' . mysql_error(),E_USER_ERROR);
                      }

                      $db_selected = mysql_select_db("pichangachanga",$link) OR DIE ("Error: No es posible establecer la conexión");
                      if (!$db_selected) {
                          trigger_error ('Error al conectar a la base de datos: ' . mysql_error(),E_USER_ERROR);
                      }


                      $id = $_SESSION["id"];
                      
                      $qry = mysql_query("SELECT * FROM jugador WHERE id_usuario=".$id."") or die("Error en: $busqueda: " . mysql_error());
                      
                       if (!$qry)
                        echo '<tr><td>No hay datos</td></tr>';
                       else{ 
                            while ($filas = mysql_fetch_assoc($qry)) {
                            $cont[$x]=$filas["id_partido"];
                            $x=$x+1;
                             
                            //echo $filas["id_partido"];

                                                                      }

                            }

                            //echo $x;
                            for ($i = 0; $i < $x; $i++) {
                                    
                                    $qry2 = mysql_query("SELECT * FROM partido WHERE id=".$cont[$i]."") or die("Error en: $busqueda: " . mysql_error());
                                    //echo $cont[$i];
                                    while ($filas2 = mysql_fetch_assoc($qry2)) {
                                      echo '<tr>
                                      <td>'.$filas2["fecha"].'</td>
                                      <td>'.$filas2["hora_inicio"].'</td>
                                      <td>'.$filas2["lugar"].'</td>
                                      <td>'.$filas2["deporte"].'</td>
                                      <tr>';
                                                                          }  
                               }



                   ?>  

                 </tbody>  
              </table>


      
        </div>


        <div class="tabpage" id="tabpage_3">
             
          <h2>Resumen</h2>

            <table class="table">  
              <thead><tr><th>Fecha</th><th>Lugar</th><th>Deporte</th></tr></thead>  
                <tbody></tbody>  
            </table>  


          <h3>Jugadores</h3>

          <table class="table">  
            <thead><tr><th>Nombre</th><th>Apellido</th></tr></thead>  
            <tbody></tbody> 
          </table> 
          <br>
          <p><button type="button" class="btn btn-primary" disabled="disabled" >Facebook</button></p>
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
      

    </div> <!-- /container -->
    <div class="footer">
        <p>© Pichangachanga 2013</p>
    </div>
  </div>
  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->



  <!-- JQuery -->
  <script src="js/jquery-2.0.3.js"></script>


  <!-- BootStrap Link -->
  <script src="js/bootstrap.js"></script>
  <script src="js/holder.js"></script>  
  <script src="js/tabs_old.js"></script> 


    <!-- DatePicker -->
  <script type="text/javascript" src="../js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
  <script type="text/javascript" src="../js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
  <script type="text/javascript">


      $(".form_datetime").datetimepicker({
      minView: 2,
      autoclose: 1,
      format: 'yyyy-mm-dd'
    });

      $('.form_date').datetimepicker({
            language:  'fr',
            weekStart: 1,
            todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
        });

              

      $('.form_time').datetimepicker({
            minView: 1, 
            pickTime: true, 
            pickDate: false,
            maxView: 1,
        autoclose: 1,
        startView: 1,
        format: 'h:00'
        

        });


    </script>

</body>
</html>
