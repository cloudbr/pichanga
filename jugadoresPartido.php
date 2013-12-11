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
xmlhttp.open("GET","buscarAmigo.php?q="+str,true);
xmlhttp.send();
}

</script>



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
      <li class="dropdown active">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          JUGADORES <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="ConfPartido.php">Mis Partidos</a></li>
          <li><a href="BuscarPartido.php">Buscar</a></li>          
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
           ENTRADA <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="Mensajes.php">Entrada</a></li> 
          <li><a href="#">Redactar</a></li> 
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
        <ul>
          <li id="tabHeader_1">Jugadores</li>
        </ul>
      </div>

      <div id="tabscontent">
                

                            <form> 
                            <p><h3>Buscar por Nombre:</h3> <input type="text" onkeyup="showHint(this.value)">
                            </form>

                            <br> 
                            <div id="txtHint"></div>
                            <br>     


               <h3>Inscritos</h3>

                <table class="table">  
                  <thead>  
                    <tr>  
                      <th>Nombre</th>  
                      <th>Correo</th>  
                      <th>Telefono</th>
                      <th>Estado</th>
                      <th></th> 
                    </tr>  
                  </thead>  
                  <tbody>  
                    <?php
                      $id_partido = $_GET["id"];
                      $link =mysql_connect("localhost", "root", "a");

                      if (!$link) {
                          trigger_error('Error al conectar al servidor mysql: ' . mysql_error(),E_USER_ERROR);
                      }

                      $db_selected = mysql_select_db("pichangachanga",$link) OR DIE ("Error: No es posible establecer la conexión");
                      if (!$db_selected) {
                          trigger_error ('Error al conectar a la base de datos: ' . mysql_error(),E_USER_ERROR);
                      }

                      $opcion = "";
                      $estado = "";
                      $tel = "No hay registro";
                      $cont = 0;
                      $qry = mysql_query("SELECT * FROM jugador WHERE id_partido=".$id_partido."") or die("Error en: $busqueda: " . mysql_error());
                      
                      while($row = mysql_fetch_assoc($qry)){
                        if($row["estado"]== 0){
                          $estado = "Esperando Respuesta";
                          //$opcion = '<input type="button" class="btn btn_success" value="Aceptar"/>';
                        }

                        if($row["estado"] == 1)
                          $estado = "Confirmado";
                        if($row["estado"] == 2)
                          continue;

                        $qry2 = mysql_query("SELECT * FROM usuario WHERE id=".$row["id_usuario"]."") or die("Error en: $busqueda: " . mysql_error());
                        $jugador = mysql_fetch_assoc($qry2);

                        if($jugador["telefono"]!=0)
                          $tel = $jugador["telefono"];
                        echo '
                            <tr>
                            <td>'.$jugador["nombre"].'</td>
                            <td>'.$jugador["correo"].'</td>
                            <td>'.$tel.'</td>
                            <td>'.$estado.'</td>
                            <td>'.$opcion.'</td>
                            </tr>';
                            $cont++; 
                      }

                              
                        
                ?>    
                  </tbody> 
                </table>              
           
              
        
                
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