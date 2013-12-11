<?php
$link =mysql_connect("localhost", "root", "a");

if (!$link) {
    trigger_error('Error al conectar al servidor mysql: ' . mysql_error(),E_USER_ERROR);
}

$db_selected = mysql_select_db("pichangachanga",$link) OR DIE ("Error: No es posible establecer la conexión");
if (!$db_selected) {
    trigger_error ('Error al conectar a la base de datos: ' . mysql_error(),E_USER_ERROR);
}



$id_partido = $_GET["id"];

$qry1= mysql_query("SELECT * FROM jugador WHERE id_partido = ".$id_partido."") or die("Error en: " . mysql_error());
$data=mysql_num_rows($qry1);
if($data > 0)
	while($j = mysql_fetch_assoc($qry1)){
		$qry2 = mysql_query("DELETE FROM jugador WHERE id=".$id_partido."") or die("Error en: " . mysql_error());
	}
		

$qry2 = mysql_query("DELETE FROM partido WHERE id=".$id_partido."") or die("Error en: " . mysql_error());


header("Location: ConfPartido.php");
mysql_close($link);  
?>