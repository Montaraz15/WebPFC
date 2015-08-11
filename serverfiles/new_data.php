<?php
include_once './DbConnect.php';
function createNewPrediction() {
        $response = array();
        $atention = $_POST["atention"];
        $meditation = $_POST["meditation"];
        $parpadeo = $_POST["blink"];
        $time=$_POST["time"];
        $seg=$_POST["seg"];
        $db = new DbConnect();
        $user_id=2;
        // file_put_contents('prueba.txt',$_POST['evolCon']);
        "2-".
        $dir = 'eegs';
        file_put_contents ($dir.'/test1.txt', "Concetracion: ".$_POST['evolCon']."\n");
        file_put_contents($dir.'/test1.txt',"Meditacion: ".$_POST['evolMed']."\n",FILE_APPEND);


       // mysql query
        $query = "INSERT INTO eeg(User_id,Meditation,Concentration,Blink,seg,ts) VALUES('$user_id','$meditation','$atention','$parpadeo','$seg','$time')";
        $result = mysql_query($query) or die(mysql_error());
        if ($result) {
            $response["error"] = false;
            $response["message"] = "Session archived successfully!";
        } else {
            $response["error"] = true;
            $response["message"] = "Failed to add session!";
        }
       // echo json response
    echo json_encode($response);
}
createNewPrediction();
?>
