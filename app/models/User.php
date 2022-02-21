<?php

namespace app\models;

use PDO;

class User
{
  private $conn;
  private $table = 'users';

  public $id;
  public $username;
  public $password;

    public function __construct($db)
    {
    $this->conn = $db;
    }

    public function read()
    {
        $query = 'SELECT * FROM user ';

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function regiter()
    {
        $query = 'INSERT INTO ' . $this->table . ' SET user_name = :user_name, password = :passwoed';

        $stmt = $this->conn->prepare($query);

        $this->user_name = htmlspecialchars(strip_tags($this->user_name));
        $this->password = htmlspecialchars(strip_tags($this->password));

        $stmt->bindParam(':user_name', $this->user_name);
        $stmt->bindParam(':password', $this->password);

        if ($stmt->execute()) {
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }
}
