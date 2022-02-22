<?php

namespace app\models;

use PDO;

class Post
{
    private $conn;
    private $table = 'articles';
    public $article_id;
    public $title;
    public $excerpt;
    public $content;
    public $image;
    public $created_at;
    public $updated_at;
    public $article_status;
    public $user_id;
    public $cate_id;


    public function __construct($db){
        $this->conn = $db;
    }

    public function read(){
        $query = 'SELECT * FROM articles INNER JOIN categories ON articles.cate_id = categories.cate_id
                                        INNER JOIN users ON articles.user_id = users.user_id ORDER BY article_id DESC ';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getPostById(){
        $query ='SELECT * FROM articles INNER JOIN categories ON articles.cate_id = categories.cate_id
                    INNER  JOIN users ON articles.user_id =users.user_id
                    WHERE article_id = ? LIMIT 0,1';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->article_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $result;
        
        

//        $this->title = $row['title'];
//        $this->excerpt = $row['excerpt'];
//        $this->content = $row['content'];
//        $this->image = $row['image'];
//        $this->created_at = $row['created_at'];
//        $this->user_id = $row['user_id'];
//        $this->cate_id = $row['cate_id'];
//        $this->title = $row['title'];
//        $this->body = $row['body'];
//        $this->author = $row['author'];
//        $this->category_id = $row['category_id'];
//        $this->image = $row['image'];
//        $this->category_name = $row['category_name'];
    }


//    function get_post_by_category(){
//        $query = 'SELECT c.name as category_name, p.id, p.category_id, p.title, p.body, p.author, p.created_at,p.image
//        FROM ' . $this->table . ' p
//        LEFT JOIN
//          categories c ON p.category_id = c.id
//            WHERE p.category_id = ?
//          ORDER BY
//            p.created_at DESC';
//        $stmt = $this->conn->prepare($query);
//
//        $stmt->bindParam(1, $this->category_id);
//
//        $stmt->execute();
//
//        return $stmt;
//
//    }


//    public function read_single()
//    {
//        $query = 'SELECT c.name as category_name, p.id, p.category_id, p.title, p.body, p.author, p.created_at,p.image
//                                        FROM ' . $this->table . ' p
//                                        LEFT JOIN
//                                          categories c ON p.category_id = c.id
//                                        WHERE
//                                          p.id = ?
//                                        LIMIT 0,1';
//
//        $stmt = $this->conn->prepare($query);
//        $stmt->bindParam(1, $this->id);
//        $stmt->execute();
//        $row = $stmt->fetch(PDO::FETCH_ASSOC);
//        $this->title = $row['title'];
//        $this->body = $row['body'];
//        $this->author = $row['author'];
//        $this->category_id = $row['category_id'];
//        $this->image = $row['image'];
//        $this->category_name = $row['category_name'];
//    }

    public function create()
    {
        $query = 'INSERT INTO articles (title, excerpt, content, image ,user_id , cate_id) VALUE (:title, :excerpt, :content, :image ,:user_id , :cate_id) ';

        $stmt = $this->conn->prepare($query);

        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->excerpt = htmlspecialchars(strip_tags($this->excerpt));
        $this->content = htmlspecialchars(strip_tags($this->content));
        $this->image = htmlspecialchars(strip_tags($this->image));
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
        $this->cate_id = htmlspecialchars(strip_tags($this->cate_id));

        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':excerpt', $this->excerpt);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':image', $this->image);
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':cate_id', $this->cate_id);
        $stmt->execute();

//        if ($stmt->execute()) {
//            return true;
//        }
//
//        printf("Error: %s.\n", $stmt->error);
//
//        return false;
    }

    public function update()
    {
        $query = 'UPDATE articles SET title = :title, excerpt = :excerpt, content = :content, image = :image, user_id = :user_id, cate_id = :cate_id WHERE article_id = :article_id';

        $stmt = $this->conn->prepare($query);

        $this->article_id = htmlspecialchars(strip_tags($this->article_id));
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->excerpt = htmlspecialchars(strip_tags($this->excerpt));
        $this->content = htmlspecialchars(strip_tags($this->content));
        $this->image = htmlspecialchars(strip_tags($this->image));
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
        $this->cate_id = htmlspecialchars(strip_tags($this->cate_id));

        $data = [
            'title'=>$this->title,
            'excerpt'=>$this->excerpt,
            'content'=>$this->content,
            'image'=>$this->image,
            'user_id'=>$this->user_id,
            'cate_id'=>$this->cate_id
        ];
//        return $data;
//        echo json_encode($data);

        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':excerpt', $this->excerpt);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':image', $this->image);
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':cate_id', $this->cate_id);


        if ($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;
    }



//    public function update(){
//
//        $query = 'UPDATE ' . $this->table . '
//                                    SET title = :title, body = :body, author = :author, category_id = :category_id, image = :image
//                                    WHERE id = :id';
//        $stmt = $this->conn->prepare($query);
//
//        $this->title = htmlspecialchars(strip_tags($this->title));
//        $this->body = htmlspecialchars(strip_tags($this->body));
//        $this->author = htmlspecialchars(strip_tags($this->author));
//        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
//        $this->image = htmlspecialchars(strip_tags($this->image));
//        $this->id = htmlspecialchars(strip_tags($this->id));
//
//        $stmt->bindParam(':title', $this->title);
//        $stmt->bindParam(':body', $this->body);
//        $stmt->bindParam(':author', $this->author);
//        $stmt->bindParam(':category_id', $this->category_id);
//        $stmt->bindParam(':image', $this->image);
//        $stmt->bindParam(':id', $this->id);
//
//        if ($stmt->execute()) {
//          return true;
//        }else{
//            printf("Error: %s.\n", $stmt->error);
//            return false;
//        }
//
//    }

    public function delete()
    {
        $query = 'DELETE FROM articles WHERE article_id = :id';

        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        } else {
            printf("Error: %s.\n", $stmt->error);

            return false;
        }
    }


}
