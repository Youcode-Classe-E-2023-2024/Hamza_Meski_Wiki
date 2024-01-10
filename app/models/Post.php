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

    public function addPost($userId, $data) {
        // query
        $this->db->query('INSERT INTO posts(title, content, image_name, user_id, category_id) VALUES(:title, :content, :image_name, :user_id, :category_id)');
        // bind values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':content', $data['content']);
        $this->db->bind(':image_name', $data['image_name']);
        $this->db->bind(':user_id', $userId);
        $this->db->bind(':category_id', $data['category_id']);
        // execute 
        if($this->db->execute()) {
            return true;
        }else {
            return false;
        }
    }

    public function updatePost($postId, $data) {
        // die('UpdatePost here');
        // query
        $this->db->query('UPDATE posts SET title = :title, content = :content, image_name = :image_name WHERE id = :postId');
        // bind values
        $this->db->bind(':postId', $postId);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':content', $data['content']);
        $this->db->bind(':image_name', $data['image_name']);
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