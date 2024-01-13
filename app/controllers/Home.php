<?php 
class Home extends Controller {
    public $userModel;
    public $postModel;
    public $categoryModel;
    public $tagModel; 
    public $postTagModel;

    public function __construct() {
        $this->userModel = $this->model('User');
        $this->postModel = $this->model('Post');
        $this->categoryModel = $this->model('Category');
        $this->tagModel = $this->model('Tag');
        $this->postTagModel = $this->model('PostTag');
    }

    public function index() {
        $data = $this->postModel->getPosts();
        $this->view('home/index', $data);
    }
    
    public function filteredIndex() {
        $data = $this->postModel->getPosts();
        $this->view('home/filteredIndex', $data);
    }

    public function search() {
        if($_POST['search_by'] == 'title') echo 'title'; 
        if($_POST['search_by'] == 'category') echo 'category'; 
        if($_POST['search_by'] == 'tag') {
            $tag = $this->tagModel->getTagByName($_POST['search_input']);
            if(isset($tag->id)) {
                $posts = $this->postTagModel->getPostsByTagId($tag->id);
                // echo '<pre>'; 
                // print_r($posts); 
                // echo '</pre>';
                $store_comp_posts = [];
                foreach($posts as $post) {
                    $store_comp_posts[] = $this->postModel->getPostByPostId($post->post_id);
                };
                echo '<pre>'; 
                print_r($store_comp_posts); 
                echo '</pre>';
            }else{
                echo json_encode([]);
            }
        }
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