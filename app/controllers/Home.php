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
    
    public function filtered_index() {
        echo '<pre>'; 
        print_r($_POST); 
        echo '</pre>';
    }

    public function postSection($postId) {
        $post = $this->postModel->getPostByPostId($postId);
        $postAuthor = $this->userModel->getUserById($post->user_id);
        $postCategory = $this->categoryModel->getCategoryById($post->category_id);
        $postTags = $this->tagModel->getTagsById($post->id);
        $nmb_of_posts_by_author = $this->postModel->nmbOfPostsByUser($post->user_id);
        
        $data = [
            'post' => $post,
            'postAuthor' => $postAuthor,
            'postCategory' => $postCategory,
            'postTags' => $postTags, 
            'nmb_of_posts_by_author' => $nmb_of_posts_by_author
        ];

        $this->view('home/postSection', $data);
    }
}