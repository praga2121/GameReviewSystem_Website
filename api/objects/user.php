<?php
class User{
  
    // database connection and table name
    private $conn;
    private $table_name = "user";
  
    // object properties 
    public $userID;
    public $email;
    public $password;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    function search($keywords){
    
        // select all query
        $query = "SELECT
                    userID, email, password
                FROM
                    ". $this->table_name ." 
                WHERE
                    email LIKE ?
                ORDER BY
                    userID ASC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $keywords=htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";
    
        // bind
        $stmt->bindParam(1, $keywords);
         
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    }

?>