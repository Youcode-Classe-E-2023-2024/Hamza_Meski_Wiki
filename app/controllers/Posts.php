<?php 
class Posts extends Controller {
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

    public function getPosts() {
        $posts = $this->postModel->getPosts();
        echo json_encode($posts);
    }


    /* CRUD FUNCTIONNALITIES */ 
    public function addPost(){

        // sanitize POST array
        $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $content = filter_var($_POST['content'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $category = filter_var($_POST['category_id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        // Handling the image upload 
        if (isset($_FILES['image_name']) && $_FILES['image_name']['error'] === UPLOAD_ERR_OK) {
            // Get the file name and generate a unique filename
            $imageName = uniqid() . '_' . basename($_FILES['image_name']['name']);
    
            // Set the local path where the image will be saved
            $imagePath = PROJECT_ROOT . '/public/images/' . $imageName;
    
            // Move the uploaded file to the specified path
            move_uploaded_file($_FILES['image_name']['tmp_name'], $imagePath);
    
            // Update the $image_name variable with the local path
            $image_name = $imageName;
        } else {
            // If no file is uploaded, use a default image name
            $image_name = 'ice.avif';
        }
        
        $data = [
            'title' => trim($title), 
            'content' => trim($content),
            'image_name' => trim($image_name),
            'category_id' => trim($category),
        ];

        // inserting post and getting its id at the same time:
        $postId = $this->postModel->addPost($_SESSION['user_id'], $data);
        if(isset($_POST['selected_tags'])) {
            $this->postTagModel->addPostTag($postId ,$_POST['selected_tags']);
        }
    }

    public function getPostByPostId($postId) {
        $post_info = $this->postModel->getPostByPostId($postId); 
        echo json_encode($post_info);
    }

    public function updatePost(){
        
        // sanitize POST array
        $postId = filter_var($_POST['postId'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $content = filter_var($_POST['content'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $category = filter_var($_POST['category_id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        // Handling the image upload 
        if (isset($_FILES['image_name']) && $_FILES['image_name']['error'] === UPLOAD_ERR_OK) {
            // Get the file name and generate a unique filename
            $imageName = uniqid() . '_' . basename($_FILES['image_name']['name']);
    
            // Set the local path where the image will be saved
            $imagePath = PROJECT_ROOT . '/public/images/' . $imageName;
    
            // Move the uploaded file to the specified path
            move_uploaded_file($_FILES['image_name']['tmp_name'], $imagePath);
    
            // Update the $image_name variable with the local path
            $image_name = $imageName;
        }
        
        $data = [
            'title' => trim($title), 
            'content' => trim($content),
            'image_name' => trim($image_name),
            'category_id' => trim($category),
        ];

        $this->postModel->updatePost($postId, $data);
        if(isset($_POST['selected_tags'])) {
            $this->postTagModel->updatePostTag($postId ,$_POST['selected_tags']);
        }
    }

    public function deletePost($postId) {
        $this->postModel->deletePost($postId);
    }

    /* charts purpose */ 
    public function postsByEachUser() {
        $row = $this->postModel->postsByEachUser();
        echo json_encode($row);
    }
}
?>