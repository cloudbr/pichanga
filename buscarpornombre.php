<?php
$q = intval($_GET['q']);




$con = mysqli_connect('localhost','root','a','pichangachanga');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM usuario WHERE nombre = '".$q."'";

$result = mysqli_query($con,$sql);
$row2 = mysqli_fetch_array($result)

$cont=$row2["id_usuario"]


$sql2="SELECT * FROM partido WHERE id_usuario = '".$cont."'";
echo "<table border='1'>
<tr>
<th>Fecha</th>
<th>Hora</th>
<th>Lugar</th>
<th>Deporte</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['fecha'] . "</td>";
  echo "<td>" . $row['hora_inicio'] . "</td>";
  echo "<td>" . $row['lugar'] . "</td>";
  echo "<td>" . $row['deporte'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysqli_close($con);
?>