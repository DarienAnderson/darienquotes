<<<<<<< HEAD
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

  
    $server = $url[us-cdbr-east-05.cleardb.net];
    $username = $url["bc564e2ba639c1"];
    $password = $url[30577b80];
    $db = substr($url[https://darien-quotes-api.herokuapp.com/api/quotes], 1);
    

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
    
=======
<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'OPTIONS') {
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Access-Control-Allow-Headers: Origin, Accept, Content-Type, X-Requested-With');
}

function Database() {


$url = getenv('JAWSDB_URL');
 $dbparts = parse_url($this->url);
    // specify your own database credentials

  
  $hostname = $dbparts['acw2033ndw0at1t7.cbetxkdyhwsb.us-east-1.rds.amazonaws.com'];
$username = $dbparts['r6r5aagukx1oa3h7'];
    $password = $dbparts['shcdhwtlafp65zoh'];
  $database = ltrim($dbparts['https://darien-quotes-api.herokuapp.com'],'1');

  }
    // get the database connection
 function getConnection(){


        $this->conn = null;
  
        try {
            $Conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
            } 
       
        catch(PDOException $e)
            {
            echo "Connection failed: " . $e->getMessage();
            } 
        }
    
>>>>>>> 8585e9b3783b64daa19040fd40149c57d5013a94
?>
