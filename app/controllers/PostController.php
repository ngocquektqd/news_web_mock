<?php

namespace app\controllers;
//use app\core;

use app\config\Database;

require_once(dirname(__FILE__) . '../../config/Database.php');
require_once(dirname(__FILE__) . '../../models/Post.php');

use app\models\Post;
use app\models\User;
use PDO;

class PostController extends BaseController
{
    public $post;
    public $category;
//    public $user;
    function __construct()
    {
        $database = new Database();
        $db = $database->connect();
        $this->post = new Post($db);
//        $this->category = new Category($db);
//        $this->user = new User($db);

    }

    public function index()
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        $result = $this->post->read();
        $num = $result->rowCount();

        if ($num > 0) {
            $posts_arr = array();

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                extract($row);

                $post_item = array(
                'article_id'=> $article_id,
                'title'=> $title,
                'excerpt'=> $excerpt,
                'content'=> $content,
                'image'=> $image,
                'created_at'=>$created_at,
                'updated_at'=> $updated_at,
                'user_id'=> $user_name,
                'cate_id'=> $cate_name,
                );

                array_push($posts_arr, $post_item);
            }

            echo json_encode($posts_arr);
        } else {
            echo json_encode(
                array('message' => 'No Posts Found')
            );
        }
    }
    public function create()
    {
        
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

        $data = json_decode(file_get_contents("php://input"));

        $this->post->title = $data->title;
        $this->post->excerpt = $data->excerpt;
        $this->post->content = $data->content;
        $this->post->image = $data->image;
//        $this->post->image = $data->image;
//        $this->post->image = $data->$_FILES['image']['name'];
        $this->post->user_id = $data->user_id;
        $this->post->cate_id = $data->cate_id;

//        $target_dir = "C:/xampp/htdocs/project/output/image/";
//        $target_file = $target_dir . basename($_FILES["image"]["name"]);
       
//        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

        if ($this->post->create()) {
            echo json_encode(
                array('message' => 'Post Created')
            );
        } else {
            echo json_encode(
                array('message' => 'Post Not Created')
            );
        }
    }
    
    public function getPostById(){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        $url =$_SERVER['REQUEST_URI'];
        $getId = explode('/',$url);
        $this->post->article_id = $getId[4];
        $result = $this->post->getPostById();
        echo json_encode($result);
    }
    public  function editPost(){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        $url =$_SERVER['REQUEST_URI'];
        $getId = explode('/',$url);
        $this->post->article_id = $getId[4];
        $result = $this->post->getPostById();
        echo json_encode($result);
    }

//    public function readSingle()
//    {
//        header('Access-Control-Allow-Origin: *');
//        header('Content-Type: application/json');
//
//        $url = $_SERVER['REQUEST_URI'];
//        $getId = explode('/', $url);
//        $this->post->id = $getId[2];
//
//        $this->post->read_single();
//
//        $post_arr = array(
//            'id' => $this->post->id,
//            'title' => $this->post->title,
//            'body' => $this->post->body,
//            'author' => $this->post->author,
//            'category_id' => $this->post->category_id,
//            'category_name' => $this->post->category_name,
//            'image' => $this->post->image
//        );
//
//        print_r(json_encode($post_arr));
//    }
//
//    function getPostById()
//    {
//        header('Access-Control-Allow-Origin: *');
//        header('Content-Type: application/json');
//
//        $url = $_SERVER['REQUEST_URI'];
//        $getId = explode('/', $url);
//        $this->post->category_id = $getId[4];
//
//        $result = $this->post->get_post_by_category();
//        $num = $result->rowCount();
//
//        if ($num > 0) {
//            $posts_arr = array();
//
//            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
//                extract($row);
//
//                $post_item = array(
//                    'id' => $id,
//                    'title' => $title,
//                    'body' => html_entity_decode($body),
//                    'author' => $author,
//                    'category_id' => $category_id,
//                    'category_name' => $category_name,
//                    'image' => $image
//                );
//
//                array_push($posts_arr, $post_item);
//            }
//
//            echo json_encode($posts_arr);
//        } else {
//            echo json_encode(
//                array('message' => 'No Posts Found')
//            );
//        }
//    }
//
//
    public function delete()
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods: DELETE');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

        $data = json_decode(file_get_contents("php://input"));

        $url = $_SERVER['REQUEST_URI'];
        $getId = explode('/', $url);
        $this->post->id = $getId[4];

        if ($this->post->delete()) {
            echo json_encode(
                array('message' => 'Post Deleted')
            );
        } else {
            echo json_encode(
                array('message' => 'Post Not Deleted')
            );
        }
    }
//    public function update()
//    {
//
//        $data = json_decode(file_get_contents("php://input"));
//
//        $url = $_SERVER['REQUEST_URI'];
//        $getId = explode('/', $url);
//        $this->post->id = $getId[4];
//
//        $this->post->title = $data->title;
//        $this->post->body = $data->body;
//        $this->post->author = $data->author;
//        $this->post->category_id = $data->category_id;
//        $this->post->image = $data->image;
//        if ($this->post->update()) {
//            echo json_encode(
//                array('message' => 'Post Updated')
//            );
//        } else {
//            echo json_encode(
//                array('message' => 'Post Not Updated')
//            );
//        }
//    }
}
