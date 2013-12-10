<?php
session_start();
if(empty($_SESSION["id"])){
  $_SESSION = array();
  session_destroy();
  header("Location: Index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
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

    <link rel="stylesheet" href="stylesheets/bootstrap-switch.css" />
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
      <li><a href="Mensajes.php">MENSAJES</a></li> 
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown active">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <?php echo $_SESSION["nombre"]; ?> <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li class="disabled"><a href="Perfil.php">Perfil</a></li>
          <li class="disabled"><a href="/#Amigos">Amigos</a></li>
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
          <li id="tabHeader_1">Datos</li>
          <li id="tabHeader_3">Notificaciones</li>
        </ul>
      </div>
      <div id="tabscontent">
        <div class="tabpage" id="tabpage_1">

            <h2>Datos Personales</h2>            
            <dl class="dl-horizontal">
              <dt>Nombre:</dt>
              <dd><?php echo $_SESSION["nombre"]; ?></dd>
              <dt>Correo:</dt>
              <dd><?php echo $_SESSION["correo"]; ?></dd>
              <dt>Teléfono:</dt>
              <dd>99999999</dd>
            </dl>
           <h2>Mis Bloques Disponibles</h2>
              <table class="table table-condensed">
              <thead>  
                <tr>  
                  <th>Día</th>  
                  <th>Hora</th>  
                  <th>Opción</th>  
                </tr>  
              </thead>
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
                    
                    $qry = mysql_query("SELECT * FROM bloque_libre WHERE id_usuario=".$id." ORDER BY dia") or die("Error en: $busqueda: " . mysql_error());
                    
                    if (!$qry)
                      echo '<tr><td>No hay datos</td></tr>';
                    else{
                        while ($fila = mysql_fetch_assoc($qry)) {
                              echo '<tr>
                                    <td>'.$fila["dia"].'</td>
                                    <td>'.$fila["inicio"].' - '.$fila["fin"].'</td>
                                    <td><a href="borrar_horario.php?id='.$fila["id"].'"><font color="black">Borrar</font></a></td>
                                    </tr>
                                    ';
                        }

                    }
                    

              ?>  
                 
              </tbody>  
            </table>
            <h3>Nuevo Bloque Libre</h3>                    
                    <form  action="horarios.php" autocomplete="on" method="post"> 
                        <p> 
                            <label> Día </label>
                            <select class="selectpicker" name="dia">
                              <option>Lunes</option>
                              <option>Martes</option>
                              <option>Miercoles</option>
                              <option>Jueves</option>
                              <option>Viernes</option>
                              <option>Sabado</option>
                            </select>
                            
                         
                            <label for="password" class="youpasswd" > Hora-Inicio </label>
                            <input id="hora_inicio" name="hora_inicio" size="16" type="text" readonly class="form_time" required="required"/>
                         
                            <label for="password" class="youpasswd" > Hora-Fin </label>
                             <input id="hora_fin" name="hora_fin" size="16" type="text" readonly class="form_time" required="required"/>
                       
                            <button type="submit" class="btn" value="Agregar">Agregar</button> 
                        </p>
                    
                    </form>  
                    
              </div>


              <div class="tabpage" id="tabpage_3">
             

                <h2>Notificaciones</h2>
               

                    Próximamente...
                    
                     
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

      </div> <!-- /container -->
      <!-- Site footer -->
      <div class="footer">
        <p>© Pichangachanga 2013</p>
      </div>
    </div>

    


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-2.0.3.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/holder.js"></script>  
    <script src="js/tabs_old.js"></script>   
    <script type="text/javascript" src="../js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    
    <script type="text/javascript" src="http://twitter.github.io/bootstrap/assets/js/bootstrap-dropdown.js"></script>
    <script type="text/javascript" src="../js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
    <script type="text/javascript">



      $(".form_datetime").datetimepicker({
      minView: 2,
      format: 'dd-MM-yyyy'
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

</body></html>
