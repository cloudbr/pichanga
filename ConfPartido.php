<?php
session_start();
if(empty($_SESSION["id"])){
  $_SESSION = array();
  session_destroy();
  header("Location: Index.html");
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

    <div class="container">
		<form class="navbar-form navbar-right">
			<div class="form-group">
				<!--<input type="text" placeholder="Email" class="form-control">-->
			</div>
			<div class="form-group">
				<!--<input type="password" placeholder="Password" class="form-control">-->
            </div>
			<a href="logout.php" title="Cerrar sesión">Cerrar Sesión</a>
			
			<script type="text/javascript">
			function menu(){
				window.location="Menu.html";
			}
			</script>
		</form> 		
		<div class="masthead">
        <h3 class="text-muted">Pichangas</h3>
        <ul class="nav nav-justified">
                    
          <li><a href="Perfil.php">Ver Perfil</a></li>
          <li class="active"><a href="ConfPartido.php">Configurar Partido</a></li>
          <li><a href="BuscarPartido.php">Buscar Partido</a></li>
          <li><a href="Mensajes.php">Mensaje</a></li>
         
            
        </ul>  
      </div>

         

 <!--i segundo menu --> 
    <!--i configurar para cada nav activo en cada caso --> 
            <div id="wrapper">
            <h2>Información</h2>
            <link href="css/style.css" rel="stylesheet" type="text/css">
            <div id="tabContainer">
              <div id="tabs">
                <ul>
                  <li id="tabHeader_1">Datos del partido</li>
                  <li id="tabHeader_2">Agregar Jugadores</li>
                  <li id="tabHeader_3">Publicar Partido</li>
                </ul>
              </div>
              <div id="tabscontent">
                <div class="tabpage" id="tabpage_1">
                  <h2>Información</h2>
                
                  Fecha: <input type=“datetime” name=“fechahora”><br>
                  <br>
                  Lugar: <input type="text" ><br>
                  <br>
                  Deporte: <input type="text" ><br>
                  <br>


                  <h2>Participantes</h2>

                    <table class="table">  
                      <thead>  
                        <tr>  
                          <th>Nombre</th>  
                          <th>Apellido</th>  
                        </tr>  
                      </thead>  
                      <tbody>  
                        <tr>  
                          <td></td>  
                          <td></td>  
 
                        </tr>  
                      </tbody>  
                    </table>  


  

                </div>
                <div class="tabpage" id="tabpage_2">
                   <h2>Amigos</h2>
                   <p>Nombre:
                    <select>
                      <option value="Juan">Volvo</option>
                      <option value="Pedro">Saab</option>
                      
                    </select>
  
                    <button type="submit" class="btn">Agregar</button>

                    </p> 

                    <h2>Compañeros</h2>
                    <p>Nombre: <input type=“search” name=“busqueda”> <button type="submit" class="btn">Buscar</button> </p>

                     <h3>Resultados</h3>

                      <table class="table">  
                      <thead>  
                        <tr>  
                          <th>Nombre</th>  
                          <th>Apellido</th>  
                          <th>Agregar</th>  
                        </tr>  
                      </thead>  
                      <tbody>  
                        <tr>  
                          <td>Juan</td>  
                          <td>Gonzales </td>  
                          <td> <button type="submit" class="btn">Agregar</button> </td>  
                        </tr>  
                      </tbody>  
                    </table>  


                    <h3>Agregados</h3>

                           <table class="table">  
                      <thead>  
                        <tr>  
                          <th>Nombre</th>  
                          <th>Apellido</th>  
                          <th>Editar</th>   
                        </tr>  
                      </thead>  
                      <tbody>  
                        <tr>  
                          <td>Juan</td>  
                          <td>Gonzales </td>  
                          <td> <button type="submit" class="btn">Borrar</button> </td>    
                        </tr>  
                      </tbody> 
                      </table>  
              </div>


              <div class="tabpage" id="tabpage_3">
             

                <h2>Resumen</h2>

                 <table class="table">  
                      <thead>  
                        <tr>  
                          <th>Fecha</th>  
                          <th>Lugar</th>  
                          <th>Deporte</th>  
                        </tr>  
                      </thead>  
                      <tbody>  
                        <tr>  
                          <td></td>  
                          <td></td>  
                          <td></td>  
                        </tr>  
                      </tbody>  
                    </table>  


                    <h3>Jugadores</h3>

                           <table class="table">  
                      <thead>  
                        <tr>  
                          <th>Nombre</th>  
                          <th>Apellido</th>    
                        </tr>  
                      </thead>  
                      <tbody>  
                        <tr>  
                          <td>Juan</td>  
                          <td>Gonzales </td>  
                        </tr>  
                      </tbody> 
                      </table> 
                      <br>
                      <p><button type="button" class="btn btn-primary" disabled="disabled" >Facebook</button> <button type="button" class="btn btn-success">Agregar a sistema</button>
                </div><p>
                
                
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
      

    </div> <!-- /container -->
   <div class="footer">
        <p>© Pichangachanga 2013</p>
      </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-2.0.3.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/holder.js"></script>  
    <script src="js/tabs_old.js"></script>  
  

</body></html>
