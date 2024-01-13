<?php 
class Archive extends Controller {
    public $postModel;

    public function __construct() {
        $this->postModel = $this->model('Post');
    }
    
    public function index() {
        $this->view('archive/index');
    }
}