<?php 
class ManageTags extends Controller {
    public $tagModel;

    public function __construct() {
        $this->tagModel = $this->model('Tag');
    }
    
    public function index() {
        $this->view('manageTags/index');
    }

    public function addTag(){

        // sanitize POST array
        $category_name = filter_var($_POST['category_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

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
            'category_name' => trim($category_name), 
            'image_name' => trim($image_name)
        ];
    
        $this->categoryModel->addCategory($data);
    }

    public function updateTag(){
        // sanitize POST array
        $category_id = filter_var($_POST['category_id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $category_name = filter_var($_POST['category_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

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
            'category_name' => trim($category_name), 
            'image_name' => trim($image_name)
        ];

        $this->categoryModel->updateCategory($category_id, $data);
        echo '<pre>'; 
        print_r($data); 
        echo '</pre>';
        die();
    }

    public function deleteTag($category_id) {
        echo $category_id;
        $this->categoryModel->deleteCategory($category_id);
    }

    public function getTags() {
        echo json_encode($this->categoryModel->getCategories());
    }

    public function getTagById($id) {
        echo json_encode($this->categoryModel->getCategoryById($id));
    }
}