<?php

include_once '../categories/index.php';
include_once '../categories/itsvalid.php';
include_once '../config/validit.php';
$database = new Database();
$db = $database->getConnection();

$item = new item($db);

$data = json_decode(file_get_contents("php://input"));

$item->category = $data->category;

if($item->updateItem()){
    echo json_encode("category data updated.");
} else{
    echo json_encode("Data could not be updated");
}
?>