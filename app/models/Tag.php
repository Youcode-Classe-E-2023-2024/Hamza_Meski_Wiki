<?php  
class Tag {
    private $db; 

    public function __construct() {
        $this->db = new Database();
    }

    public function getTags() {
        $this->db->query("SELECT * FROM tags");

        return $this->db->resultSet();
    }

    public function getTagById($id) {
        $this->db->query('SELECT * FROM tags WHERE id = :id'); 
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function getTagsById($id) {
        $this->db->query('  SELECT tags.name
                            FROM tags
                            JOIN posts_tags ON tags.id = posts_tags.tag_id
                            WHERE posts_tags.post_id = :id;
                        '); 
        $this->db->bind(':id', $id);

        $row = $this->db->resultSet();

        return $row;
    }

    public function addPost($data) {
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

    public function updatePost($data) {
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

    public function deletePost($id){
        $this->db->query('DELETE FROM posts WHERE id = :id'); 
        // bind values 
        $this->db->bind(':id', $id);

        // execute 
        if($this->db->execute()) {
            return true;
        }else {
            return false;
        }
    }
}