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
    public $category;
    function __construct()
    {
        $database = new Database();
        $db = $database->connect();
        $this->category = new Category($db);
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
    
    //Que
    //Post view

    public function Dashbroad()
    {
        return $this->view('dashbroad.PostDashborad');
    }
    //Que
    public function create()
    {
        $categories = $this->category->getCategories();
        
        $listCate = $this->showCategories($categories);
        $data= [
            'categories'=>$listCate
        ];

        return $this->view('post.create', $data);
    }

    public function postDetail(){
        return $this->view('post.detail');
    }

    public function editPost(){
        $categories = $this->category->getCategories();

        $listCate = $this->showCategories($categories);
        $data= [
            'categories'=>$listCate
        ];
        return $this->view('post.edit',$data);
    }
    
    //Que
    public function createCategory()
    {
        $categories = $this->category->getCategories();

        $listCate = $this->showCategories($categories);
        $data= [
            'categories'=>$listCate
        ];
        return $this->view('category.create', $data);
    }
    public function updateCategory()
    {
        return $this->view('category.update');
    }
    public function CatDashborad()
    {
        $categories = $this->category->getCategories();

        $listCate = $this->showCategories($categories);
        $data= [
            'categories'=>$listCate
        ];
//        print_r($categories);
//        print_r($data['categories']);
        return $this->view('dashbroad.CategoryDashborad',$data);
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
