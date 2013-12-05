<?php
session_start();
$link =mysql_connect("localhost", "root", "");

if (!$link) {
    trigger_error('Error al conectar al servidor mysql: ' . mysql_error(),E_USER_ERROR);
}

$db_selected = mysql_select_db("pichangachanga",$link) OR DIE ("Error: No es posible establecer la conexión");
if (!$db_selected) {
    trigger_error ('Error al conectar a la base de datos: ' . mysql_error(),E_USER_ERROR);
}

$id=$_SESSION["id"]


//if ($_SESSION["existe"]==0) {
  //echo "<input type=\"text\" id=\"fecha\" value=\"".$_SESSION["fecha"]."\">";	
  //echo "<input type=\"text\" id=\"hora\" value=\"".$_SESSION["hora"]."\">";	
  //echo "<input type=\"text\" id=\"lugar\" value=\"".$_SESSION["lugar"]."\">";
  //echo "<input type=\"text\" id=\"direc\" value=\"".$_SESSION["direc"]."\">";
  //echo "<input type=\"text\" id=\"deporte\" value=\"".$_SESSION["deporte"]."\">";
  //echo "<input type=\"text\" id=\"desc\" value=\"".$_SESSION["desc"]."\">";
//}
//else
//{
//$_SESSION["existe"]==1;
//$_SESSION["fecha"]= $_POST["fecha"];
//$_SESSION["hora"] = $_POST["hora"];
//$_SESSION["lugar"]= $_POST["lugar"];  
//$_SESSION["direc"]= $_POST["direc"];
//$_SESSION["deporte"]= $_POST["deporte"]; 
//$_SESSION["desc"] = $_POST["desc"];  
//}


$fecha = $_POST["fecha"];
$hora = $_POST["hora"];
$lugar = $_POST["lugar"];  
$direc = $_POST["direc"];  
$deporte = $_POST["deporte"];  
$desc = $_POST["desc"];  

$qry = mysql_query("INSERT INTO partido (id_usuario,fecha,hora_inicio,lugar,direccion,deporte,descripcion) VALUES ('$id','$fecha','$hora', '$lugar','$direc','$deporte','$desc') ");
header("Location: ConfPartido.php");          
?>
