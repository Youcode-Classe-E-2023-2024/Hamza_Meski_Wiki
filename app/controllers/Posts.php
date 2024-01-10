<?php 
class Posts extends Controller {
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
        $categories = $this->categoryModel->getCategories();
        $tags = $this->tagModel->getTags();
        $data = [
            'user_id' => $_SESSION['user_id'],
            'categories' => $categories, 
            'tags' => $tags
        ];
        $this->view('Posts/index', $data);
    }

    public function getPostsByUserId() {
        $posts = $this->postModel->getPostsByUserId($_SESSION['user_id']);
        echo json_encode($posts);
    }




    /* CRUD FUNCTIONNALITIES */ 
    public function addPost(){

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // sanitize POST array
            $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $content = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            $data = [
                'title' => trim($title), 
                'body' => trim($body),
                'user_id' => $_SESSION['user_id'], 
                'title_err' => '', 
                'body_err' => ''
            ];

            // validate title 
            if(empty($data['title'])) {
                $data['title_err'] = 'Please enter title';
            }

            // validate body 
            if(empty($data['body'])) {
                $data['body_err'] = 'Please enter body text';
            }

            // make sure no errors 
            if(empty($data['title_err']) && empty($data['body_err'])) {
                // validated 
                if($this->postModel->addPost($data)) {
                    redirect('posts/index');
                }else {
                    die('something went wrong!');
                }
            }else {
                // load view with errors 
                $this->view('posts/add', $data);
            }

        }else {
            $data = [
                'title' => '',
                'body' =>  '',
                'user_id' => '', 
                'title_err' => '', 
                'body_err' => ''
            ];
    
            $this->view('posts/add', $data);
        }
    }

    public function updatePost($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // sanitize POST array
            $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            $data = [
                'id' => $id,
                'title' => trim($title), 
                'body' => trim($body),
                'user_id' => $_SESSION['user_id'], 
                'title_err' => '', 
                'body_err' => ''
            ];

            // validate title 
            if(empty($data['title'])) {
                $data['title_err'] = 'Please enter title';
            }

            // validate body 
            if(empty($data['body'])) {
                $data['body_err'] = 'Please enter body text';
            }

            // make sure no errors 
            if(empty($data['title_err']) && empty($data['body_err'])) {
                // validated 
                if($this->postModel->updatePost($data)) {
                    redirect('posts/index');
                }else {
                    die('something went wrong!');
                }
            }else {
                // load view with errors 
                $this->view('posts/edit', $data);
            }

        }else {
            // get existing post from model
            $post = $this->postModel->getPostById($id);

            // check for owner
            if($post->user_id != $_SESSION['user_id']) {
                redirect('posts/index');
            }

            $data = [
                'id' => $id,
                'title' =>  $post->title,
                'body' => $post->body, 
                'title_err' => '', 
                'body_err' => '', 
            ];
    
            $this->view('posts/edit', $data);
        }
    }

    public function deletePost($postId) {
        $this->postModel->deletePost($postId);
    }
}
?>