<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'OPTIONS') {
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Access-Control-Allow-Headers: Origin, Accept, Content-Type, X-Requested-With');
}
    include_once '../config/database.php';
    include_once '../categories/index.php';

    $database = new Database();
    $db = $database->getConnection();
    $items = new item($db);
    $item->id = isset($_GET['id']) ? $_GET['id'] : die();
  
    $item->getSingleItem();
    if($item->category != null){
        // create array
        $emp_arr = array(

            "category" => $item->category,
            "id" =>  $item->id,
     
        );
      
        http_response_code(200);
        echo json_encode($emp_arr);
    }
      
    else{
        http_response_code(404);
        echo json_encode("category not found.");
    }
?>