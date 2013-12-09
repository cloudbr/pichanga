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

$fecha = $_POST["fecha"];
$hora = $_POST["hora"];
$lugar = $_POST["lugar"];  
$direc = $_POST["direc"];  
$deporte = $_POST["deporte"];
$n_jugadores = $_POST["max_jugadores"];  

$qry = mysql_query("INSERT INTO partido (id_usuario,fecha,hora_inicio,lugar,direccion,deporte,descripcion) VALUES ('$id','$fecha','$hora', '$lugar','$direc','$deporte','$desc') ");
header("Location: ConfPartido.php");          
?>
