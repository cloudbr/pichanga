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


$aux = $_POST["nombreReceptor"];

$qry = mysql_query("SELECT * FROM usuario WHERE nombre = '".$aux."'") or die("Error en: $busqueda: " . mysql_error());

	$Q = mysql_fetch_array($qry);

if(!$Q){
	echo "Error";
	header('Location: Redactar.php');
}
else{
	$_SESSION["idReceptor"]=$Q["id"];
	$_SESSION["nombreReceptor"]=$Q["nombre"];
	$_SESSION["correoReceptor"]=$Q["correo"];
	$_SESSION["passwordReceptor"]=$Q["password"];
	$_SESSION["telefonoReceptor"]=$Q["telefono"];
}




$receptor = $_SESSION["idReceptor"];
$id_emisor = $_SESSION["id"];
$fecha = date("Y:m:d");
$mensaje = $_POST["mensaje"];


$qry = mysql_query("INSERT INTO mensajes (id_receptor,id_emisor,fecha,msn,estado) VALUES ('".$receptor."','".$id_emisor."','".$fecha."','".$mensaje."',0) ") or die("Error" . mysql_error());



header("Location: Redactar.php");          
?>

