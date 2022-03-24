<?php
include_once '../quotes/index.php';
include_once '../quotes/itsvalid.php';
include_once '../config/database.php';
include_once '../config/validit.php';
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