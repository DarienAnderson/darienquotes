<?php
class Product{
  
    // database connection and table name
    private $conn;
    private $table_name = "quotesdb";
  
    // object properties
    public $id;
    public $author;
    public $category;
    public $quote;
    public $author_id;
    public $quote_id;

  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    function read(){
  
        // select all query
        $query = "SELECT
                    c.author as author_id, p.id, p.quote, p.category, p.category_id
                FROM
                    " . $this->table_name . " p
                    LEFT JOIN
                        authors c
                            ON p.author_id = c.id
                ORDER BY
                    p.created DESC";
      
        // prepare query statement
        $stmt = $this->conn->prepare($query);
      
        // execute query
        $stmt->execute();
      
        return $stmt;
    }  
}
?>
