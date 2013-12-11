<?php
session_start();
$id = $_SESSION["id"];
$hoy = date("Y-m-d");
$cont = 0;
$q=$_GET["q"];


$con = mysqli_connect('localhost','root','a','pichangachanga');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM partido WHERE id_usuario!=".$id." AND deporte LIKE '%".$q."%'";

$result = mysqli_query($con,$sql);

echo '<table class="table">  
      <thead><tr><th>Fecha</th><th>Hora</th><th>Lugar</th><th>Deporte</th><th></th><th></th></tr></thead>  
      <tbody> ';

while($row = mysqli_fetch_array($result)){


      $fech = $row["fecha"];                                
      $fecha = explode("-", $fech);
      $anio = $fecha[0];                                
      $mes = (int)$fecha[1];
      $dia = $fecha[2];
      $meses = array (0,"Enero","Febrero","Marzo","Abril","Mayo","Junio ","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
      $dias = array ("Domingo","Lunes","Martes","Miercoles","Jueves"," Viernes","Sabado");
                                      $nombredia = date("w",mktime(0,0,0,$mes,$dia,$anio));
      $fmes = $meses[$mes];
      $fdia = $dias[$nombredia];

      if($hoy <= $fech and $row["hora_inicio"] > date("H:i:s",time()-3*3600)){
          $cont++;
          echo '<tr>
              <td>'. $row['fecha'] .'</td>
              <td>'. $row['hora_inicio'] . '</td>      
              <td>'. $row['lugar'] . '</td>
              <td>'. $row['deporte'] . '</td>
              </tr>';
            }
      }
  
if($cont == 0)
  echo "<tr><td>No hay resultados vigentes.</td></tr>";
echo "</tbody></table>";
mysqli_close($con);
?>