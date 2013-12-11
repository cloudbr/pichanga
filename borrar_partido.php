<?php
session_start();
$link =mysql_connect("localhost", "root", "a");

if (!$link) {
    trigger_error('Error al conectar al servidor mysql: ' . mysql_error(),E_USER_ERROR);
}

$db_selected = mysql_select_db("pichangachanga",$link) OR DIE ("Error: No es posible establecer la conexión");
if (!$db_selected) {
    trigger_error ('Error al conectar a la base de datos: ' . mysql_error(),E_USER_ERROR);
}


$hoy = date("Y-m-d");
$id_partido = $_GET["id"];

$qryp = mysql_query("SELECT * FROM partido WHERE id=".$id_partido) or die("Error en: " . mysql_error());
$partido = mysql_fetch_assoc($qryp);

$qry1= mysql_query("SELECT * FROM jugador WHERE id_partido = ".$id_partido."") or die("Error en: " . mysql_error());

while($j = mysql_fetch_assoc($qry1)){
		$qrym = mysql_query("INSERT INTO mensajes (id_receptor,id_emisor,fecha,msn,estado) VALUES(".$j["id_usuario"].",".$_SESSION["id"].",'".$hoy."','Lo siento. Se ha suspendido el partido del ".$partido["fecha"]."',0)")or die("Error en: " . mysql_error());
		$qry2 = mysql_query("DELETE FROM jugador WHERE id_partido=".$id_partido." AND id_usuario=".$j["id_usuario"]) or die("Error en: " . mysql_error());
}

$qry2 = mysql_query("DELETE FROM partido WHERE id=".$id_partido."") or die("Error en: " . mysql_error());



header("Location: ConfPartido.php");
mysql_close($link);  
?>