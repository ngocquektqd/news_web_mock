<?php

namespace app\controllers;

use app\models;

require_once(dirname(__FILE__) . '../../config/Database.php');
//require_once(dirname(__FILE__) . '../../models/Post.php');
require_once(dirname(__FILE__) . '../../models/User.php');


//use Couchbase\User;
use PDO;

class AdminController
{
    public $user;
    function __construct()
    {
//        header('Access-Control-Allow-Origin: *');
//        header('Content-Type: application/json');
//        header('Access-Control-Allow-Methods: POST');
//        header('Access-Control-Allow-Methods: GET');
//        header('Access-Control-Allow-Methods: PUT');
//        header('Access-Control-Allow-Methods: DELETE');
//        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
        $database = new Database();
        $connect = $database->connect();
        $this->user = new User($connect);
    }

    public function index(){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        $result = $this->user->read();
        $num = $result->rowCount();
        print_r($result);

        if ($num > 0) {
            $users_arr = array();

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                extract($row);

                $user_item = array(
                    'id' => $id,
                    'user_name' => $user_name,
                    'password' => $password,
                );

                array_push($users_arr, $user_item);
            }

            echo json_encode($users_arr);
        } else {
            echo json_encode(
                array('message' => 'No Posts Found')
            );
        }
    }

    public function register(){
        $data = json_decode(file_get_contents("php://input"));

        $this->user->user_name = $data->user_name;
        $this->user->password = $data->password;

        if ($this->user->register()) {
            echo json_encode(
                array('message' => 'Category Created')
            );
        } else {
            echo json_encode(
                array('message' => 'Category Not Created')
            );
        }
    }

    public function login(){

    }
}
