<?php 
class Posts extends Controller {
    public $postModel;
    public $categoryModel;

    public function __construct() {
        $this->postModel = $this->model('Post');
        $this->categoryModel = $this->model('Category');
    }

    public function index() {
        $this->view('Posts/index');
    }

    public function getPostsByUserId() {
        $posts = $this->postModel->getPostsByUserId($_SESSION['user_id']);
        echo json_encode($posts);
    }

    public function addPostSection() {
        $categories = $this->categoryModel->getCategories();
        $data = [
            'categories' => $categories
        ];
        $this->view('posts/addPostSection', $data);
    }

    public function addPost() {

        $this->postModel->addPost($_SESSION['user_id'] );
    }
}
?>