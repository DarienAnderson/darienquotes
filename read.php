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
                "author" => $author,
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