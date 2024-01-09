<?php 
class Posts extends Controller {
    public $postModel;

    public function __construct() {
        $this->postModel = $this->model('Post');
    }

    public function index() {
        $this->view('Posts/index');
    }

    public function getPostsByUserId() {
        $posts = $this->postModel->getPostsByUserId($_SESSION['user_id']);
        echo json_encode($posts);
    }

    public function addPostSection() {
        $this->postModel->view('posts/addPostSection');
    }

    public function addPost() {

        $this->postModel->addPost($_SESSION['user_id'] );
    }
}
?>