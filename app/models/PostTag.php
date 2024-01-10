<?php  
class PostTag {
    private $db; 

    public function __construct() {
        $this->db = new Database();
    }

    public function addPostTag($postId, $selected_tags) {
        // query
        $this->db->query('INSERT INTO posts(title, user_id, body) VALUES(:title, :user_id, :body)');
        // bind values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':body', $data['body']);
        // execute 
        if($this->db->execute()) {
            return true;
        }else {
            return false;
        }
    }

    public function updatePostTag($data) {
        // die('UpdatePost here');
        // query
        $this->db->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');
        // bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        // execute 
        if($this->db->execute()) {
            return true;
        }else {
            return false;
        }
    }
}