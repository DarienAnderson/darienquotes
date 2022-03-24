<?php

include_once '../quotes/index.php';
include_once '../quotes/itsvalid.php';
include_once '../config/validit.php';
$database = new Database();
$db = $database->getConnection();
$item = new item($db);
$data = json_decode(file_get_contents("php://input"));
$item->quote = $data->quote;

echo json_encode("Data could not be created due to foreign keys");
?>