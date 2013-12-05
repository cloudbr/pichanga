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


$id = $_SESSION["id"];
$dia = $_POST["dia"];
$inicio = $_POST["hora_inicio"];
$fin = $_POST["hora_fin"];


$qry = mysql_query("INSERT INTO bloque_libre (id_usuario,inicio,fin,dia) VALUES('".$id."','".$inicio."','".$fin."','".$dia."')") or die("Error en: $busqueda: " . mysql_error());
header("Location: Perfil.php");

?>