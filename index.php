<?php
  require('config.php');
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
  <div class="container" >
    <h1>Mindwave Records</h1>
    <p>Introduce tu email</p>
    <form action="records.php" method="post">
      <input name="email"/>
      <input type="submit" />
    </form>
    <div id="error">
    <?php
    if(isset($_SESSION['error'])){
	 	echo $_SESSION['error'];
	 	unset($_SESSION['error']);
	   }
    ?>
    </div>
  </div>
</body>
</html>
