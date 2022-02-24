<?php

namespace app\models;

use PDO;

class User
{
    private $conn;
    private $table = 'users';

    public $user_id;
    public $user_name;
    public $password;

    public function __construct($db)
    {
    $this->conn = $db;
    }

//    public function read()
//    {
//        $query = 'SELECT * FROM user ';
//
//        $stmt = $this->conn->prepare($query);
//
//        $stmt->execute();
//
//        return $stmt;
//    }
    
    public function register(){
        $query = ('INSERT INTO users (user_name, password) VALUES (:user_name, :password)');
        $stmt = $this->conn->prepare($query);
        $this->user_name = htmlspecialchars(strip_tags($this->user_name));
        $this->password = htmlspecialchars(strip_tags($this->password));

        $stmt->bindParam(':user_name', $this->user_name);
        $stmt->bindParam(':password', $this->password);
        $stmt->execute();
        return $stmt;
    }
}
