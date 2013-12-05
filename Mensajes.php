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


      <script type="text/javascript">
  $(document).ready(function(){
    $("#myModal").modal('show');
  });
</script>


		</form> 		
		<div class="masthead">
        <h3 class="text-muted">Pichangas</h3>
        <ul class="nav nav-justified">
          
         
          <li><a href="Perfil.php">Ver Perfil</a></li>
          <li><a href="ConfPartido.php">Configurar Partido</a></li>          
          <li><a href="BuscarPartido.php">Buscar Partido</a></li>
          <li class="active"><a href="Mensajes.php">Mensaje</a></li>
        
          
            
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
                  <li id="tabHeader_1">Nuevos</li>
                  <li id="tabHeader_2">Favoritos</li>
                  <li id="tabHeader_3">Papelera</li>
                </ul>
              </div>



              <div id="tabscontent">
                <div class="tabpage" id="tabpage_1">
                  <h2>Mensajes</h2>
                  <!-- Modal -->
                              <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

                              

                             <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
     </div><!-- /.modal -->                      
        
                                                     

              
                <div class="tabpage" id="tabpage_2">
                  <h2>Mensajes</h2>
                   <table class="table">  
                      <thead>  
                        <tr>  
                          <th>De:</th>  
                          <th>Motivo:</th>    
                        </tr>  
                      </thead>  
                      <tbody>  
                        <tr>  
                          <td>Juan</td>  
                          <td></td>  
                        </tr>  
                      </tbody> 
                      </table> 
              </div>


              <div class="tabpage" id="tabpage_3">
                <h2>Mensajes</h2>
                     <table class="table">  
                      <thead>  
                        <tr>  
                          <th>De:</th>  
                          <th>Motivo:</th>    
                        </tr>  
                      </thead>  
                      <tbody>  
                        <tr>  
                          <td>Juan</td>  
                          <td></td>  
                        </tr>  
                      </tbody> 
                
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
    <script src="js/bootstrap.min.js"></script>
    <script src="js/modal.js"></script>
   

  

</body></html>
