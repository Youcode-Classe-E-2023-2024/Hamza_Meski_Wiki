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
        $tag_name = filter_var($_POST['tag_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        $data = [
            'tag_name' => trim($tag_name)
        ];
    
        $this->tagModel->addTag($data);
    }

    public function updateTag(){
        // sanitize POST array
        $tag_id = filter_var($_POST['tag_id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $tag_name = filter_var($_POST['tag_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        $data = [
            'tag_name' => trim($tag_name), 
        ];

        $this->tagModel->updateTag($tag_id, $data);
    }

    public function deleteTag($tag_id) {
        $this->tagModel->deleteTag($tag_id);
    }

    public function getTags() {
        echo json_encode($this->tagModel->getTags());
    }

    public function getTagById($id) {
        echo json_encode($this->tagModel->getTagById($id));
    }
}