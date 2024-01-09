<?php 
class Home extends Controller {
    public $postModel;

    public function index() {
        $this->view('home/index');
        $this->postModel = $this->model('Post');
    }

    public function postSection() {
        $posts = $this->postModel->getPosts();
        echo '<pre>';
        print_r($posts);
        echo '</pre>';
        die();
        // $this->view('home/postSection', $data);
    }
}