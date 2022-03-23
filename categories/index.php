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
            $sqlQuery = "SELECT * FROM categories";

            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
        // CREATE
        public function createItem() {
            $sqlQuery = 'INSERT INTO categories
                    SET
                        category = :category';
                  
        
            $stmt = $this->conn->prepare($sqlQuery);
            $this->category=htmlspecialchars(strip_tags($this->category));
  
        
        
            // bind data

            $stmt->bindParam(':category', $this->category);
   
        
            if($stmt->execute()){
               return true;
        }
            return false;
        }
        // READ single
        public function getSingleItem(){
            $sqlQuery = "SELECT * FROM categories WHERE id = ? LIMIT 1";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->category = $dataRow[category];

        }        
        // UPDATE
        public function updateItem(){
            $sqlQuery = 'UPDATE categories SET category = :category WHERE id = :id';
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->category=htmlspecialchars(strip_tags($this->category));

            $this->id=htmlspecialchars(strip_tags($this->id));
        
            // bind data
            $stmt->bindParam(':category', $this->category);
            $stmt->bindParam(':id', $this->id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        // DELETE
        function deleteItem(){
            $sqlQuery = 'DELETE FROM categories WHERE id = ?';
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
            $this->category=htmlspecialchars(strip_tags($this->category));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }
    }
    ?>
