<?php
namespace app\controllers;
use app\config\Database;
use app\models\User;
use app\controllers\BaseControllers;

class UserController {
    public $user;
    function __construct(){
        $database = new Database();
        $db = $database->connect();
        $this->user = new User($db);
    }

    public function index(){

    }

    public function register(){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

        $data = json_decode(file_get_contents("php://input"));

        $this->user->user_name = $data->user_name;
        $this->user->password = $data->password;

        if ($this->user->register()) {
            echo json_encode(
                array('message' => 'User Created')
            );
        } else {
            echo json_encode(
                array('message' => 'User Not Created')
            );
        }
    }

    public function login(){
        
    }
}