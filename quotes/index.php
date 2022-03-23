<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'OPTIONS') {
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Access-Control-Allow-Headers: Origin, Accept, Content-Type, X-Requested-With');
}

    class item{
        // Connection
        private $conn;
        private $db_table = "quotesdb";
        // Columns
        public $id;
        public $author;
        public $quote;
        public $author_id;
        public $category_id;

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }
        // GET ALL
        public function getquote(){
            $sqlQuery = "SELECT * FROM quotes";

            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
        // CREATE
        public function createItem() {
            $sqlQuery = 'INSERT INTO quotes
                    SET
                        quote = :quote';
             
                  
        
            $stmt = $this->conn->prepare($sqlQuery);
            $this->quote=htmlspecialchars(strip_tags($this->quote));

        
            // bind data

            $stmt->bindParam(':quote', $this->quote);
            if($stmt->execute()){
               return true;
        }
            return false;
        }

        // READ single
        public function getSingleItem(){
            $sqlQuery = "SELECT * FROM quotes WHERE id = ? LIMIT 1";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->quote= $dataRow['quote'];
            $this->author_id = $dataRow['author_id'];
            $this->author = $dataRow['author'];
            $this->category = $dataRow['category'];
            $this->category_id = $dataRow['category_id'];
        }        
        // UPDATE
        public function updateItem(){
            $sqlQuery = 'UPDATE quotes SET quote = :quote WHERE id = :id';
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->quote=htmlspecialchars(strip_tags($this->quote));

            $this->id=htmlspecialchars(strip_tags($this->id));
        
            // bind data
            $stmt->bindParam(':quote', $this->quote);
            $stmt->bindParam(':id', $this->id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        // DELETE
        function deleteItem(){
            $sqlQuery = 'DELETE FROM quotes WHERE id = ?';
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
            $this->quote=htmlspecialchars(strip_tags($this->quote));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }
    }
    ?>

