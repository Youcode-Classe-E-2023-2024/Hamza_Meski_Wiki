<?php 
class Home extends Controller {
    public $userModel;
    public $postModel;
    public $categoryModel;
    public $tagModel; 

    public function __construct() {
        $this->userModel = $this->model('User');
        $this->postModel = $this->model('Post');
        $this->categoryModel = $this->model('Category');
        $this->tagModel = $this->model('Tag');
    }

    public function index() {
        $data = $this->postModel->getPosts();
        $this->view('home/index', $data);
    }

    public function postSection($postId) {
        $post = $this->postModel->getPostById($postId);
        $postAuthor = $this->userModel->getUserById($post->user_id);
        $postCategory = $this->categoryModel->getCategoryById($post->id);
        $postTags = $this->tagModel->getTagsById($post->id);


        echo '<pre>';
        print_r($postCategory);
        echo '</pre>';
        
        echo '<pre>';
        print_r($postTags);
        echo '</pre>';


        die();
        $data = [
            'post' => $post,
            'postAuthor' => $postAuthor,
            'postCategory' => $postCategory,
            'postTags' => $postTags
        ];
        $this->view('home/postSection', $data);
    }
}