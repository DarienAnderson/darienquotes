<?php
include_once '../config/validit.php';
include_once '../categories/index.php';
include_once '../categories/itsvalid.php';
    $database = new Database();
    $db = $database->getConnection();
    $items = new item($db);
    $stmt = $items->getquote();
    $quoteCount = $stmt->rowCount();

    echo json_encode($quoteCount);
    if($quoteCount > 0){
        
        $quoteArr = array();
        $quoteArr["body"] = array();
        $quoteArr["quoteCount"] = $quoteCount;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                'id' => $id,
                "category" => $category,
            );
            array_push($quoteArr["body"], $e);
        }
        echo json_encode($quoteArr);
    }
    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>