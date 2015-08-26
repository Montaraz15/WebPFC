<?php
  require('config.php');

  if("" == trim($_POST['email'])){
    $_SESSION['error']="Error no ha introducido ningun email";
    redirect('index.php');
  }else{

    $db = new DbConnect();
    $query = "Select user_id from Users where email='".$_POST['email']."';";
    $result = mysql_query($query);
    if($result){
      $id=mysql_fetch_array($result);
      if( ""==$id['user_id']){
        $_SESSION['error']="Este email no se encuentra en nuestra base de datos";
        redirect('index.php');
      }
    }
    else{
      $_SESSION['error']="Error en la consulta";
      redirect('index.php');
    }
  }

 ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/general.css" rel="stylesheet">
<script src="js/chargeImg.js"/></script>
<script src="js/jquery-1.11.3.js"></script>
<title>Mindwave records</title>

</head>


<body>
  <div class="container">
    <h1>Mindwave Records</h1>
    <ul class="nav nav-tabs" >
      <li role="presentation" class="active"><a href="#">Home</a></li>
      <li role="presentation"><a href="index.php">Logout</a></li>
      <!-- <li role="presentation"><a href="#">Messages</a></li> -->
    </ul>
    <div id="table-wrapper">
      <div id="table-scroll">

          <table class="table table-striped" >

            <tr>
              <th>Nº Sesión</th>
              <th>Meditación</th>
              <th>Concentración</th>
              <th>Parpadeo</th>
              <th>Fecha</th>
              <th>Segundos</th>
            </tr>
          <?php

          // $db = new DbConnect();
          $query = "Select * from eeg where user_id=".$id['user_id']." order by Session_id ASC";
          $result = mysql_query($query);
          $json_res=array();
          if ($result) {
            while ($fila = mysql_fetch_assoc($result)) {
                $json_res[]=json_encode($fila);
            }
            // var_dump($json_res);
              // echo mysql_result($result,0);
              // echo mysql_result($result,1);

          } else {
            die('Consulta no válida: ' . mysql_error());
          }
          $i=1;
          foreach ($json_res as $element) {

            // $aux=json_decode($element);
            // var_dump($aux);
            // var_dump($element);
            $aux=json_decode($element);
            // var_dump($aux);
            echo "<tr class=\"active\" style=\"cursor:pointer;\" onclick=\"newGraf('".$aux->FileRoute."',".$aux->ts.",".$aux->Session_id.");\" >";//
            echo "<td>".$i."</td>";
            echo "<td>".$aux->Meditation."</td>";
            echo "<td>".$aux->Concentration."</td>";
            echo "<td>".$aux->Blink."</td>";
            echo "<td>".date("d/m/Y H:i:s",$aux->ts/1000)."</td>";
            echo "<td>".$aux->seg."</td>";
            echo "</tr>";
            $i++;
          }
          ?>

          </table>

      </div>
    </div>
    <div style="width:100%;text-align:center;">
      <img id="graf" src="img/blank_img.png" style="width:1000;height:350;" />
    </div>
  </div>



</body>
</html>
