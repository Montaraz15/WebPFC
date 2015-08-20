<?php
  require('config.php');
 ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/general.css" rel="stylesheet">
<title>Mindwave records</title>

</head>


<body>
  <div class="container">
    <h1>Mindwave Records</h1>
    <ul class="nav nav-tabs" >
      <li role="presentation" class="active"><a href="#">Home</a></li>
      <li role="presentation"><a href="#">Profile</a></li>
      <li role="presentation"><a href="#">Messages</a></li>
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

          $db = new DbConnect();
          $query = "Select * from eeg where user_id=2 order by Session_id DESC";
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
          foreach ($json_res as $element) {

            // $aux=json_decode($element);
            // var_dump($aux);
            // var_dump($element);
            $aux=json_decode($element);
            // var_dump($aux);
            echo "<tr class=\"active\" style=\"cursor:pointer;\">";
            echo "<td>".$aux->Session_id."</td>";
            echo "<td>".$aux->Meditation."</td>";
            echo "<td>".$aux->Concentration."</td>";
            echo "<td>".$aux->Blink."</td>";
            echo "<td>".date("d/m/Y H:i:s",$aux->ts/1000)."</td>";
            echo "<td>".$aux->seg."</td>";
            echo "</tr>";
          }
          ?>

          </table>

      </div>
    </div>
    <div style="width:100%;text-align:center;">
      <img src="grafica.php" />
    </div>
  </div>



</body>
</html>
