<?php


namespace app\models;

use PDO;

class Category
{
    private $conn;
    private $table = 'categories';

//    public $id;
//    public $name;
//    public $created_at;
public $cate_id;
public $cate_name;
public $parent_id;

    public function __construct($db)
    {
    $this->conn = $db;
    }
    public function getCategories(){

        $query= 'SELECT * FROM categories';
        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt->fetchAll();
    }

//    public function read()
//    {
//    $query = 'SELECT
//        id,
//        name,
//        created_at
//      FROM
//        ' . $this->table . '
//      ORDER BY
//        created_at DESC';
//
//    $stmt = $this->conn->prepare($query);
//
//    $stmt->execute();
//
//    return $stmt;
//    }


 

//    public function read_single()
//    {
//    $query = 'SELECT
//          id,
//          name
//        FROM
//          ' . $this->table . '
//      WHERE id = ?
//      LIMIT 0,1';
//
//    $stmt = $this->conn->prepare($query);
//
//    $stmt->bindParam(1, $this->id);
//
//    $stmt->execute();
//
//    $row = $stmt->fetch(PDO::FETCH_ASSOC);
//
//    $this->id = $row['id'];
//    $this->name = $row['name'];
//    }

    public function create()
    {
//    $query = 'INSERT INTO ' .
//      $this->table . '
//    SET
//      name = :name';
        $query = 'INSERT INTO categories (cate_name , parent_id) VALUE (:cate_name, :parent_id)';
    $stmt = $this->conn->prepare($query);

    $this->cate_name = htmlspecialchars(strip_tags($this->cate_name));
    $this->parent_id = htmlspecialchars(strip_tags($this->parent_id));

    $stmt->bindParam(':cate_name', $this->cate_name);
    $stmt->bindParam(':parent_id', $this->parent_id);

    if ($stmt->execute()) {
      return true;
    }

    printf("Error: %s.\n", $stmt->error);

    return false;
    }

    public function update()
    {
    $query = 'UPDATE ' .
      $this->table . '
    SET
      name = :name
      WHERE
      id = :id';

    $stmt = $this->conn->prepare($query);

    $this->name = htmlspecialchars(strip_tags($this->name));
    $this->id = htmlspecialchars(strip_tags($this->id));

    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':id', $this->id);

    if ($stmt->execute()) {
      return true;
    }

    printf("Error: %s.\n", $stmt->error);

    return false;
    }

    public function delete()
    {
    $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

    $stmt = $this->conn->prepare($query);

    $this->id = htmlspecialchars(strip_tags($this->id));
    $stmt->bindParam(':id', $this->id);

    if ($stmt->execute()) {
      return true;
    }

    printf("Error: %s.\n", $stmt->error);

    return false;
    }
}
