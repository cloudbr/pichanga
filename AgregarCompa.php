<?php
session_start();
$user = $_GET["id"];
$part = $_GET["id_partido"];
$hoy = date("Y:m:d");
$link =mysql_connect("localhost", "root", "a");

if (!$link) {
    trigger_error('Error al conectar al servidor mysql: ' . mysql_error(),E_USER_ERROR);
}

$db_selected = mysql_select_db("pichangachanga",$link) OR DIE ("Error: No es posible establecer la conexión");
if (!$db_selected) {
    trigger_error ('Error al conectar a la base de datos: ' . mysql_error(),E_USER_ERROR);
}

$qry = mysql_query("INSERT INTO jugador (id_partido,id_usuario,estado) VALUES(".$part.",".$user.",0)" );

$qry = mysql_query("INSERT INTO mensajes (id_receptor,id_emisor,fecha,msn,estado) VALUES(".$user.",".$_SESSION["id"].",'".$hoy."','".$_SESSION["nombre"]." te ha agregado a un partido',0)");

mysql_close($link);
header("Location: jugadoresPartido.php?id=".$part);

?>