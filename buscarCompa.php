<?php

$q=$_GET["q"];

//echo $q ;

$con = mysqli_connect('localhost','root','a','pichangachanga');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM usuario WHERE nombre LIKE '%".$q."%'";

$result = mysqli_query($con,$sql);

echo '<table class="table table-condensed">
<thead>  
<tr>  
  <th>Nombre</th>  
  <th>Correo</th>  
</tr>  
</thead>
<tbody>';


while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['nombre'] . "</td>";
  echo "<td>" . $row['correo'] . "</td>";
  echo "</tr>";
  }
echo "</tbody></table>";

mysqli_close($con);
?>