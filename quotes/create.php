<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'OPTIONS') {
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Access-Control-Allow-Headers: Origin, Accept, Content-Type, X-Requested-With');
}
include_once '../config/database.php';
include_once '../quotes/index.php';
$database = new Database();
$db = $database->getConnection();
$item = new item($db);
$data = json_decode(file_get_contents("php://input"));
$item->quote = $data->quote;


if($item->createItem()){
    echo 'quote created successfully.';
} else{
    echo 'quote could not be created.';
}
?>