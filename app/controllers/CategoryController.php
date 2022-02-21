<?php


namespace app\controllers;

use app\config\Database;
use app\models\Category;

require_once(dirname(__FILE__) . '../../models/Category.php');

use PDO;

class CategoryController
{

    public $category;

    function __construct(){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Methods: GET');
        header('Access-Control-Allow-Methods: PUT');
        header('Access-Control-Allow-Methods: DELETE');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
        $database = new Database();
        $db = $database->connect();
        $this->category = new Category($db);
    }

    public function index(){

        $result = $this->category->read();

        $num = $result->rowCount();
        if ($num > 0) {
            $cat_arr = array();
            $cat_arr['data'] = array();

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                extract($row);

                $cat_item = array(
                    'id' => $id,
                    'name' => $name
                );

                array_push($cat_arr['data'], $cat_item);
            }

            echo json_encode($cat_arr);
        } else {
            echo json_encode(
                array('message' => 'No Categories Found')
            );
        }
    }
    public function create(){

//        $filed = null;

        $data = json_decode(file_get_contents("php://input"));

        // return $data[$filed] ? htmlspecialchars($data[$filed]) : '';

        $this->category->name = $data->name;

        if ($this->category->create()) {
            echo json_encode(
                array('message' => 'Category Created')
            );
        } else {
            echo json_encode(
                array('message' => 'Category Not Created')
            );
        }
    }

    public function readSingle(){

        $url = $_SERVER['REQUEST_URI'];
        $getId = explode('/', $url);
        $this->category->id = $getId[3];
        $this->category->read_single();
        $category_arr = array(
            'id' => $this->category->id,
            'name' => $this->category->name
        );

    }
    public function delete(){

        $url = $_SERVER['REQUEST_URI'];
        $getId = explode('/', $url);
        $this->category->id = $getId[4];

        if ($this->category->delete()) {
            echo json_encode(
                array('message' => 'category Deleted')

            );
        } else {
            echo json_encode(
                array('message' => 'category Not Deleted')
            );
        }

    }

    public function update(){

        $data = json_decode(file_get_contents("php://input"));

        $url = $_SERVER['REQUEST_URI'];
        $getId = explode('/', $url);
        $this->category->id = $getId[4];
        // $category->id = isset($_GET['id']) ? $_GET['id'] : die();

        $this->category->name = $data->name;

        if ($this->category->update()) {
            echo json_encode(
                array('message' => 'category Updated')
            );
        } else {
            echo json_encode(
                array('message' => 'category Not Updated')
            );
        }

    }
}
