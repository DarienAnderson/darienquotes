<?php
include_once '../categories/index.php';
include_once '../config/validit.php';
include_once '../categories/itsvalid.php';
$database = new Database();
    $db = $database->getConnection();
    
    $item = new item($db);
    
    $data = json_decode(file_get_contents("php://input"));
    
    $item->category = $data->category;
    
    if($item->deleteItem()){
        echo json_encode("category deleted.");
    } else{
        echo json_encode("Data could not be deleted");
    }
?>