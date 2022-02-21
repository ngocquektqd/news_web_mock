<?php

namespace app\controllers;
use app\config\Database;

require_once(dirname(__FILE__) . '../../config/Database.php');
require_once(dirname(__FILE__) . '../../models/Post.php');
use app\models;
use app\models\Category;

require_once(dirname(__FILE__) . '/BaseController.php');

class HomeController extends BaseController
{
    function __construct()
    {
    }
    public function index()
    {
        return $this->view('client.index');
    }
    public function detail()
    {
        return $this->view('client.detail');
    }
    public function postbyid()
    {
        return $this->view('client.categorydetail');
    }
    public function Dashbroad()
    {
        return $this->view('dashbroad.PostDashborad');
    }
    public function create()
    {
        $database = new Database();
        $db = $database->connect();
        $this->category = new Category($db);
        $categories = $this->category->getCategories();
        
        $listCate = $this->showCategories($categories);
//        print_r($listCate);
        $data= [
            'categories'=>$listCate
        ];

        return $this->view('post.create', $data);
    }
    public function createCategory()
    {
        return $this->view('category.create');
    }
    public function updateCategory()
    {
        return $this->view('category.update');
    }
    public function CatDashborad()
    {
        return $this->view('dashbroad.CategoryDashborad');
    }
    public function PostDashborad()
    {
        return $this->view('dashbroad.PostDashborad');
    }
    public function update()
    {
        require_once(dirname(__FILE__) . '../..//views/post/update.php');
    }


    public function register(){
        return $this->view('user.register');
    }

    public function login(){
        return $this->view('user.login');
    }

    
}
