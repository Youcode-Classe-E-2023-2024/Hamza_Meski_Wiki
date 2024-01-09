<?php  
class Post {
    private $db; 

    public function __construct() {
        $this->db = new Database();
    }

    public function getPosts() {
        $this->db->query("SELECT * FROM posts");

        return $this->db->resultSet();
    }

    public function getPostByPostId($id) {
        $this->db->query('SELECT * FROM posts WHERE id = :id'); 
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function getPostsByUserId($id) {
        $this->db->query('SELECT * FROM posts WHERE user_id = :id'); 
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

    public function nmbOfPostsByUser($userId) {
        $this->db->query('  SELECT COUNT(*) AS post_count
                            FROM posts
                            WHERE user_id = :id;
                        ');
        $this->db->bind(':id', $userId);

        return $this->db->execute();
    }
}