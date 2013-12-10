<?php

$q=$_GET["q"];

//echo $q ;

$con = mysqli_connect('localhost','root','a','pichangachanga');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM usuario WHERE nombre = '".$q."'";

$result = mysqli_query($con,$sql);

echo "<table border='1'>
<tr>
<th>Nombre</th>
<th>Correo</th>
</tr>";


while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['nombre'] . "</td>";
  echo "<td>" . $row['correo'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysqli_close($con);
?>