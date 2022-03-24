<?php

include_once '../config/database.php';
include_once '../categories/index.php';
include_once '../categories/itsvalid.php';
include_once '../config/validit.php';
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