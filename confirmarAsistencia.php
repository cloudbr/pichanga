<?php
session_start();
$id = $_SESSION["id"];
$emisor = $_GET["emisor"]; //Me invito
$part = $_GET["idpartido"];
$hoy = date("Y:m:d");

$link =mysql_connect("localhost", "root", "a");

if (!$link) {
    trigger_error('Error al conectar al servidor mysql: ' . mysql_error(),E_USER_ERROR);
}

$db_selected = mysql_select_db("pichangachanga",$link) OR DIE ("Error: No es posible establecer la conexión");
if (!$db_selected) {
    trigger_error ('Error al conectar a la base de datos: ' . mysql_error(),E_USER_ERROR);
}

$update = "UPDATE jugador SET estado = 1 WHERE id_usuario=".$id." AND id_partido=".$part;

$msn = $_SESSION["nombre"].' ha confirmado su asistencia.';

$qryi = mysql_query($update);
$qry = mysql_query("INSERT INTO mensajes (id_receptor,id_emisor,fecha,msn,estado) VALUES(".$emisor.",".$_SESSION["id"].",'".$hoy."','".$msn."',0)");

mysql_close($link);
header("Location: ConfPartido.php");

?>