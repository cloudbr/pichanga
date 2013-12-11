<?php
$link =mysql_connect("localhost", "root", "a");

if (!$link) {
    trigger_error('Error al conectar al servidor mysql: ' . mysql_error(),E_USER_ERROR);
}

$db_selected = mysql_select_db("pichangachanga",$link) OR DIE ("Error: No es posible establecer la conexión");
if (!$db_selected) {
    trigger_error ('Error al conectar a la base de datos: ' . mysql_error(),E_USER_ERROR);
}



$id = $_GET["id"];

$qry = mysql_query("DELETE FROM partido WHERE id=".$id."") or die("Error en: " . mysql_error());
header("Location: ConfPartido.php");
mysql_close($link);  
?>