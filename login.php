<?php 
@session_start();

$mail = $_POST["correo"];
$pass = $_POST["password"];

$link =mysql_connect("localhost", "root", "");

if (!$link) {
    trigger_error('Error al conectar al servidor mysql: ' . mysql_error(),E_USER_ERROR);
}

$db_selected = mysql_select_db("pichangachanga",$link) OR DIE ("Error: No es posible establecer la conexión");
if (!$db_selected) {
    trigger_error ('Error al conectar a la base de datos: ' . mysql_error(),E_USER_ERROR);
}

$qry = mysql_query("SELECT * FROM usuario WHERE correo = '".$mail."' AND password = '".$pass."'") or die("Error en: $busqueda: " . mysql_error());

	$R = mysql_fetch_array($qry);
if(!$R){
	echo "Error";
	header('Location: Index.html');
}
else{
	echo $R["nombre"];
	$_SESSON["id"]=$R["id"];
	$_SESSON["nombre"]=$R["nombre"];
	$_SESSON["correo"]=$R["correo"];
	$_SESSON["password"]=$R["password"];
	header('Location: Perfil.php');
}

mysql_close($link);
?>