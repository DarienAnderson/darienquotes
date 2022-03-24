<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'OPTIONS') {
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Access-Control-Allow-Headers: Origin, Accept, Content-Type, X-Requested-With');
}

function Database() {


  $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    // specify your own database credentials

  
    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"], 1);
    

  }
    // get the database connection
 function getConnection(){


        $this->conn = null;
  
        try {
            $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
            } 
       
        catch(PDOException $e)
            {
            echo "Connection failed: " . $e->getMessage();
            } 
        }
    
?>