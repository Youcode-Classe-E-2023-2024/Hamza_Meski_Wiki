<?php 
class Home extends Controller {
    public $userModel;
    public $postModel;

    public function __construct() {
        $this->userModel = $this->model('User');
        $this->postModel = $this->model('Post');
    }

    public function index() {
        $data = $this->postModel->getPosts();
        $this->view('home/index', $data);
    }

    public function postSection($postId) {
        $post = $this->postModel->getPostById($postId);
        $postAuthor = $this->userModel->getUserById($post->user_id);

        $data = [
            'post' => $post, 
            'postAuthor' => $postAuthor 
        ];
        $this->view('home/postSection', $data);
    }
}