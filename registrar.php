<?php
$link =mysql_connect("localhost", "root", "a");

if (!$link) {
    trigger_error('Error al conectar al servidor mysql: ' . mysql_error(),E_USER_ERROR);
}

$db_selected = mysql_select_db("pichangachanga",$link) OR DIE ("Error: No es posible establecer la conexión");
if (!$db_selected) {
    trigger_error ('Error al conectar a la base de datos: ' . mysql_error(),E_USER_ERROR);
}

$nombre = $_POST["nombreRegistro"];
$correo = $_POST["emailRegistro"];
$clave = $_POST["claveRegistro"];
$telefono = $_POST["numeroRegistro"];



$qry = mysql_query("INSERT INTO usuario (nombre,correo,password,telefono) VALUES ('".$nombre."','".$correo."','".$clave."','".$telefono."') ") or die("Error" . mysql_error());




header("Location: Index.php");          
?>

