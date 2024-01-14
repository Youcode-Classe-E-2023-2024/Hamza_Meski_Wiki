<?php 
class Archive extends Controller {
    public $postModel;

    public function __construct() {
        $this->postModel = $this->model('Post');
    }
    
    public function index() {
        $this->view('archive/index');
    }

    public function getPosts() {
        $posts = $this->postModel->getPosts();
        echo json_encode($posts);
    }

    public function archivePost() {
        $id_option = json_decode($_POST['id_option']);
        $postId = $id_option[0];
        $option = $id_option[1];
        $this->postModel->archivePost($postId, $option);
    }

}