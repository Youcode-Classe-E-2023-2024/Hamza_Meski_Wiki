<?php
class Pages extends Controller {
    public $categoryModel;
    public function __construct() {
        $this->categoryModel = $this->model('Category');
    }

    public function index() {
        if(isLoggedIn()) {
            redirect('posts/index');
        }

        $data = [
            'title' => 'Share Posts', 
            'description' => 'Simple social network built on the TraversyMVC PHP framework'
        ];

        $this->view('pages/index', $data);
    }

    public function about() {
        $data = [
            'title' => 'Welcome about', 
            'description' => 'App to share Posts with other users'
        ];
        $this->view('pages/about', $data);
    }

    public function categories() {
        $categories = $this->categoryModel->postsPerCategory();
        foreach($categories as $category) {
            $fetched_category = $this->categoryModel->getCategoryById($category->category_id);
            $category->name = $fetched_category->name;
            $category->image_name = $fetched_category->image_name;
            $category->created_at = $fetched_category->created_at;
        }
        $data = [
            'categories' => $categories
        ];
        $this->view('pages/categories', $data);
    }

}
?>
