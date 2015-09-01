<?php
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
define('DB_NAME', 'wcdb');
  session_start();
// require_once('jpgraph/src/jpgraph.php');


class DbConnect {
        private $conn;
        function __construct() {
        // connecting to database
        $this->connect();
        }
        function __destruct() {
        $this->close();
        }
        function connect() {
        // include_once dirname(__FILE__) . './Config.php';

        $this->conn = mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD) or die(mysql_error());
        // echo 'OK'
        mysql_select_db(DB_NAME) or die(mysql_error());
        // returing connection resource
        return $this->conn;
        }
         // Close function
        function close() {
        // close db connection
        mysql_close($this->conn);
        }
}

function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    mt_srand(time());
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[mt_rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function redirect($path){
	header('Location: ./' . $path);
	exit();
}

?>
