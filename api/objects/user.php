<?php
class User{
  
    // database connection and table name
    private $conn;
    private $table_name = "user";
  
    // object properties 
    //just add or remove these here based on ur table structure, suggested to name as same as the one u have in db so u dont confuse
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