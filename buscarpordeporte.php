<?php
session_start();
$id = $_SESSION["id"];
$hoy = date("Y-m-d");
$cont = 0;
$q=$_GET["q"];


$con = mysqli_connect('localhost','root','a','pichangachanga');
if (!$con){
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM partido WHERE id_usuario!=".$id." AND deporte LIKE '%".$q."%'";

$result = mysqli_query($con,$sql);

/*echo '<table class="table">  
      <thead><tr><th>Fecha</th><th>Hora</th><th>Lugar</th><th>Deporte</th><th></th><th></th></tr></thead>  
      <tbody> ';*/
echo '<div class="panel-group" id="accordion">';
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
      $inscritos = 0;

      //Buscar inscritos
      $result3 = mysqli_query($con,"SELECT * FROM jugador WHERE id_partido = ".$row["id"]);
      while($r = mysqli_fetch_array($result3))
        $inscritos++;

      if($hoy <= $fech and $row["hora_inicio"] > date("H:i:s",time()-3*3600)){
          $cont++;
          /*echo '<tr>
              <td>'. $row['fecha'] .'</td>
              <td>'. $row['hora_inicio'] . '</td>      
              <td>'. $row['lugar'] . '</td>
              <td>'. $row['deporte'] . '</td>
              </tr>';*/
          $result2 = mysqli_query($con,"SELECT * FROM usuario WHERE id = ".$row["id_usuario"]);
          if($dueño = mysqli_fetch_array($result2))
                if($dueño["telefono"]==0)
                  $telefono = "No registrado";
                else
                  $telefono = $dueño["telefono"];

                echo '<div class="panel panel-success">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$row["id"].'">
                            <font color="#000000">
                             '.$row["deporte"].'<br>'.$fdia.', '.$dia.' de '.$fmes.' del '.$anio.'
                             </font>
                            </a>
                          </h4>
                        </div>
                        <div id="collapse'.$row["id"].'" class="panel-collapse collapse out">
                          <div class="panel-body">
                            <dl class="dl-horizontal">
                              <dt>Creador:</dt>
                              <dd>'.$dueño["nombre"].'</dd>
                              <dt>Telefono:</dt>
                              <dd>'.$telefono.'</dd>
                              <dt>Lugar</dt>
                              <dd>'.$row["lugar"].'</dd>
                              <dt>Hora Inicio</dt>
                              <dd>'.$row["hora_inicio"].'</dd>
                              <dt>Inscritos</dt>
                              <dd>'.$inscritos.'/'.$row["jugadores"].'</dd>
                            </dl>
                          </div>
                        </div>
                      </div>';
            }
      }
  
if($cont == 0)
  echo "No hay resultados vigentes";
echo "</div>";
mysqli_close($con);
?>