<?php 
class Posts extends Controller {
    public $postModel;
    public function index() {
        $this->postModel = $this->model('Post');
        $this->view('Posts/index');
    }

    // public
    public function getPostsByUserId() {
        $userId = $_SESSION['user_id']; 
        echo $userId;
        die();
        $this->postModel->getPostsByUserId($userId);
    }
}
?>