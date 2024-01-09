<?php 
class Posts extends Controller {
    public $postModel;

    public function __construct() {
        $this->postModel = $this->model('Post');
    }

    public function index() {
        $this->view('Posts/index');
    }

    // public
    public function getPostsByUserId() {
        $userId = $_SESSION['user_id']; 
        $posts = $this->postModel->getPostsByUserId($userId);
        echo '<pre>'; 
        print_r($posts); 
        echo '</pre>';
    }
}
?>