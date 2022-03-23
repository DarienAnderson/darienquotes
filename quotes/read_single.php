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
    $item = new item($db);
    $item->id = isset($_GET['id']) ? $_GET['id'] : die();
  
    $item->getSingleItem();
    if($item->id != null){
        // create array
        $emp_arr = array(
            "id" =>  $item->id,
            "quote" => $item->quote,
            "author_id" => $item->author_id,
            "author" => $item->author,
            "category" => $item->category,
            "category_id" => $item->category_id
        );
      
        http_response_code(200);
        echo json_encode($emp_arr);
    }
      
    else{
        http_response_code(404);
        echo json_encode("quote not found.");
    }
?>