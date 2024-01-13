<?php  
class Category {
    private $db; 

    public function __construct() {
        $this->db = new Database();
    }

    public function getCategories() {
        $this->db->query("SELECT * FROM categories ORDER BY created_at DESC");

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
        $this->db->query('INSERT INTO categories(name, image_name) VALUES(:category_name, :image_name)');
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
        $this->db->query('UPDATE categories SET name = :category_name, image_name = :image_name, created_at = CURRENT_TIMESTAMP() WHERE id = :category_id');
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

    public function postsPerCategory() {
        $this->db->query("  SELECT category_id, COUNT(*) AS post_count
                            FROM posts
                            GROUP BY category_id;
        ");

        return $this->db->resultSet();
    }

    // category search filter function 
    public function getCategoryByName($category_name) {
        $this->db->query('SELECT * FROM categories WHERE name = :category_name'); 
        $this->db->bind(':category_name', $category_name);

        $row = $this->db->single();

        return $row;
    }
}