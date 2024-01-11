<?php 
class ManageCategories extends Controller {
    public $categoryModel;

    public function __construct() {
        $this->categoryModel = $this->model('Category');
    }
    
    public function index() {
        $this->view('manageCategories/index');
    }

    public function addCategory(){
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

    public function updateCategory(){
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
    }

}