<?php 
class Home extends Controller {
    public $postModel;

    public function __construct() {
        $this->postModel = $this->model('Post');
    }

    public function index() {
        $data = $this->postModel->getPosts();
        $this->view('home/index', $data);
    }

    public function postSection() {
        // $this->view('home/postSection', $data);
    }
}