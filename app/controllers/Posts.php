<?php 
class Posts extends Controller {
    public $postModel;
    public $categoryModel;
    public $tagModel;

    public function __construct() {
        $this->postModel = $this->model('Post');
        $this->categoryModel = $this->model('Category');
        $this->tagModel = $this->model('Tag');
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
        $tags = $this->tagModel->getTags();
        $data = [
            'user_id' => $_SESSION['user_id'],
            'categories' => $categories, 
            'tags' => $tags
        ];
        $this->view('posts/addPostSection', $data);
    }

    public function addPost() {

        $this->postModel->addPost($_SESSION['user_id'] );
    }
}
?>