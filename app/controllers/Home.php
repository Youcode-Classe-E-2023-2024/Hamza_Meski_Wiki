<?php 
class Home extends Controller {
    public function index() {
        $this->view('home/index');
    }

    public function postSection() {
        $this->view('home/postSection');
    }
}