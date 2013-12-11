<?php
session_start();

$q=$_GET["q"];
$p = $_GET["partido"];


$con = mysqli_connect('localhost','root','a','pichangachanga');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM usuario WHERE id!=".$_SESSION["id"]." AND nombre LIKE '%".$q."%'";

$result = mysqli_query($con,$sql);
echo '<table class="table table-condensed">
<thead>  
<tr>  
  <th>Nombre</th>  
  <th>Correo</th>
  <th>Telefono</th>
  <th>Opción</th>   
</tr>  
</thead>
<tbody>';
while($row = mysqli_fetch_array($result)){
      $result2 = mysqli_query($con,"SELECT * FROM jugador WHERE id_usuario=".$row["id"]." AND id_partido=".$p);
      if($r = mysqli_fetch_array($result2))
        continue;
      echo '<tr>
      <td>'. $row['nombre'] .'</td>
      <td>'. $row['correo'] . '</td>
      <td>'. $row['telefono'] . '</td>
      <td><a href="AgregarCompa.php?id='.$row['id'].'&id_partido='.$p.'"><font color="black">Agregar</font></a></td>
      <tr>';
      }
  

echo "</tbody></table>";
mysqli_close($con);
?>