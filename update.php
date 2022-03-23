<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'OPTIONS') {
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Access-Control-Allow-Headers: Origin, Accept, Content-Type, X-Requested-With');
}
include_once '../config/database.php';
include_once '../authors/index.php';

$database = new Database();
$db = $database->getConnection();

$item = new item($db);

$data = json_decode(file_get_contents("php://input"));

$item->author = $data->author;

if($item->updateItem()){
    echo json_encode("Author data updated.");
} else{
    echo json_encode("Data could not be updated");
}
?>