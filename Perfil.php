﻿<?php
@session_start();

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

    <link rel="stylesheet" href="stylesheets/bootstrap-switch.css" />
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
    <script type="text/javascript">
		
			function menu(){
				window.location="Menu.html";
			}
		
			function pushData(){
				var data_user = document.getElementById("username").value;				
				var data_pass = document.getElementById("password").value;
				if((data_user=="user")&&(data_pass=="pass")){
					    alert('¡Logeado!')
						window.location="Perfil.html";
					}else{
						alert('¡User y/o Pass desconocida!')
					}							
			}
																
			
	</script>
    
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

			}



			</script>
		</form> 		
		<div class="masthead">
        <h1 class="text-muted">PICHANGAS!</h1>
        <ul class="nav nav-justified">
          

          <li class="active"><a href="Perfil.html">Ver Perfil</a></li>
          <li><a href="ConfPartido.html">Configurar Partido</a></li>
          <li><a href="BuscarPartido.html">Buscar Partido</a></li>
          <li><a href="Mensajes.html">Mensaje</a></li>         
            
        </ul>  
      </div>


      <!--i segundo menu --> 
    <!--i configurar para cada nav activo en cada caso --> 
            <div id="wrapper">
            <h2>Perfil</h2>
            <link href="css/style.css" rel="stylesheet" type="text/css">
            <div id="tabContainer">
              <div id="tabs">
                <ul>
                  <li id="tabHeader_1">Datos</li>
                  <li id="tabHeader_2">Horarios</li>
                  <li id="tabHeader_3">Notificaciones</li>
                </ul>
              </div>
              <div id="tabscontent">
                <div class="tabpage" id="tabpage_1">
                  <h2>Saludos</h2>
                


                   <!-- Example row of columns -->
                    
                    <legend>Datos:</legend>
                    Nombre:<input type="text" placeholder="Daniel" required />
                    <br>
                    Apellido:<input type="text" placeholder="Romero" required />
                    <br>
                    Email: <input type="email" placeholder="daniel.romero@alumnos.utfsm.cl.input-xxlarge" required />
                    <br>


                </div>


                <div class="tabpage" id="tabpage_2">
                   <h2>Mis Bloques Disponibles</h2>
                      <table class="table">  
                      <thead>  
                        <tr>  
                          <th>Día</th>  
                          <th>Hora</th>  
                          <th>Opción</th>  
                        </tr>  
                      </thead>  
                      <tbody>  
                        <tr>  
                          <td>Lunes</td>  
                          <td>11:30 </td>  
                          <td> <button type="submit" class="btn">Borrar</button> </td>  
                        </tr>  
                      </tbody>  
                    </table>
                    <h3>Nuevo Bloque Libre</h3>
                      Día:  <select class="selectpicker">
                        <option>Lunes</option>
                        <option>Martes</option>
                        <option>Miercoles</option>
                        <option>Jueves</option>
                        <option>Viernes</option>
                        <option>Sabado</option>
                      </select>

                      Hora:<input size="16" type="text" value="" readonly class="form_time"><td> <button type="submit" class="btn">Agregar</button> </td> 
    

    

                    
              </div>


              <div class="tabpage" id="tabpage_3">
             

                <h2>Notificaciones</h2>
               


                    
                     
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

      </div> <!-- /container -->
      <!-- Site footer -->
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
    <script type="text/javascript" src="../js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    

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
