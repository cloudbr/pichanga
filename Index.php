<?php
session_start();
if(!empty($_SESSION["id"])){
  $_SESSION = array();
  session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Login PichangaChanga</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo-login.css" />
        <link rel="stylesheet" type="text/css" href="css/style-login.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom-login.css" />
		
		
		
		<script type="text/javascript">
		
			function pushData(){
				var data_user = document.getElementById("username").value;				
				var data_pass = document.getElementById("password").value;
				if((data_user=="dromero@gmail.com")&&(data_pass=="dromero")){
					    alert('¡Logeado!')
						window.location="Perfil.php";
					
				}
                else if((data_user=="fnavarro@gmail.com")&&(data_pass=="fnavarro")){
                    alert('¡Logeado!')
                    window.location="Perfil.php";
                }
                
                else if((data_user=="tencina@gmail.com")&&(data_pass=="tencina")){
                        alert('¡Logeado!')
                        window.location="Perfil.php";
                    }else{
                        alert('¡User y/o Pass desconocida!')
                }     							
			}
																
			
		</script>
		
		
		
    </head>
    <body>		
		
        <div class="container">
            <header>
                <h1>Pichangachanga</h1>
				<nav class="codrops-demos">
				</nav>
            </header>
            <section>				
                <div id="container_demo" >                    
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="login.php" autocomplete="on" method="post"> 
                                <h1>Ingreso</h1> 
                                <p> 
                                    <label for="username" class="uname" > Correo </label>
                                    <input id="correo" name="correo" required="required" type="text" placeholder="Mymail@mail.com"/>
                                    
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" > Contraseña </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="*******" /> 
                                </p>
                                <p class="keeplogin"> 
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">Recordar mis datos</label>
								</p>
                                <p class="login button"> 
                                    <input type="submit" value="Login" /> 
								</p>
                               <!-- <p class="change_link">
									¿Olvidaste tu contraseña?
									<a href="#toregister" class="to_register" disable>Reg&iacute;strate</a>
								</p>-->
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form  action="Perfil.html" autocomplete="on" method="post"> 
                                <h1> Registro </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" >Your username</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="myusername" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail"  > Your email</label>
                                    <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="Mymail@mail.com"/> 
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd">Your password </label>
                                    <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="********"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" >Please confirm your password </label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="********"/>
                                </p>
                                <p class="signin button"> 
									<input type="submit" value="Sign up"/> 
								</p>
                                <p class="change_link">  
									¿Ya eres usuario?
									<a href="#tologin" class="to_register"> Ir al login </a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>
