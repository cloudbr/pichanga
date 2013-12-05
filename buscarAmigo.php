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


$amigo = $_POST["amigo"];



 $qry2 = mysql_query("SELECT * FROM usuario WHERE nombre=".$amigo."") or die("Error en: $busqueda: " . mysql_error()); 
 if (!$qry2)
                              echo '<tr><td>No hay datos</td></tr>';
                            else{
                                while ($filas2 = mysql_fetch_assoc($qry2)) {
                                      
                                           $_SESSION["amigo1"]=$filas2["nombre"]
                                           $_SESSION["amigo2"]=$filas2["correo"]
                                            
                                }

                            }
header("Location: ConfPartido.php");          
?>