<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'OPTIONS') {
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Access-Control-Allow-Headers: Origin, Accept, Content-Type, X-Requested-With');
}
$dsn = "mysql:host=localhost;dbmane=quotesdb";
$username = "root";
$password = "";

try {
    $db = new PDO($dsn, $username, $password);
    echo "you have connected!";
}catch(PDOException $e){
    $error_message = $e->getMessage();
    echo $error_message;
    exit();
}


?>
