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
        // title fitler
        if($_POST['search_by'] == 'title') {
            echo json_encode($this->postModel->getPostsByTitle($_POST['search_input']));
        }else if($_POST['search_by'] == 'category') {
            $category = $this->categoryModel->getCategoryByName($_POST['search_input']);
            if(isset($category->id)) {
                $posts = $this->postModel->getPostsByCategoryId($category->id);
                echo json_encode($posts);
            }else {
                echo json_encode([]);
            }
        }else if($_POST['search_by'] == 'tag') {
            $tag = $this->tagModel->getTagByName($_POST['search_input']);
            if(isset($tag->id)) {
                $posts = $this->postTagModel->getPostsByTagId($tag->id);
                $store_comp_posts = [];
                foreach($posts as $post) {
                    $store_comp_posts[] = $this->postModel->getPostByPostId($post->post_id);
                };
                echo json_encode($store_comp_posts); 
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