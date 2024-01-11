<?php  
class Category {
    private $db; 

    public function __construct() {
        $this->db = new Database();
    }

    public function getCategories() {
        $this->db->query("SELECT * FROM categories");

        return $this->db->resultSet();
    }

    public function getCategoryById($id) {
        $this->db->query('SELECT * FROM categories WHERE id = :id'); 
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function addCategory($data) {
        // query
        $this->db->query('INSERT INTO categories(category_name, image_name) VALUES(:category_name, :image_name)');
        // bind values
        $this->db->bind(':category_name', $data['category_name']);
        $this->db->bind(':image_name', $data['image_name']);
        // execute 
        if($this->db->execute()) {
            return true;
        }else {
            return false;
        }
    }

    public function updateCategory($category_id, $data) {
        // die('UpdatePost here');
        // query
        $this->db->query('UPDATE categories SET category_name = :category_name, image_name = :image_name WHERE id = :category_id');
        // bind values
        $this->db->bind(':category_id', $category_id);
        $this->db->bind(':category_name', $data['category_name']);
        $this->db->bind(':image_name', $data['image_name']);
        // execute 
        if($this->db->execute()) {
            return true;
        }else {
            return false;
        }
    }

    public function deleteCategory($category_id){
        $this->db->query('DELETE FROM categories WHERE id = :category_id'); 
        // bind values 
        $this->db->bind(':category_id', $category_id);

        // execute 
        if($this->db->execute()) {
            return true;
        }else {
            return false;
        }
    }
}