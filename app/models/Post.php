<?php  
class Post {
    private $db; 

    public function __construct() {
        $this->db = new Database();
    }

    public function getPosts() {
        $this->db->query("SELECT * FROM posts ORDER BY created_at DESC");

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
            return $this->db->insertedId();
        }else {
            return false;
        }
    }

    public function updatePost($postId, $data) {
        // query
        $this->db->query('UPDATE posts SET title = :title, content = :content, image_name = :image_name, category_id = :category_id, created_at = CURRENT_TIMESTAMP() WHERE id = :postId');
        // bind values
        $this->db->bind(':postId', $postId);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':content', $data['content']);
        $this->db->bind(':image_name', $data['image_name']);
        $this->db->bind(':category_id', $data['category_id']);
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

    public function postsByEachUser() {
        $this->db->query('  SELECT user_id, COUNT(*) AS post_count
                            FROM posts
                            GROUP BY user_id;
        ');
        
        return $this->db->resultSet();
    }

    // category search filter function 
    public function getPostsByCategoryId($category_id) {
        $this->db->query('SELECT * FROM posts WHERE category_id = :category_id'); 
        $this->db->bind(':category_id', $category_id);

        $row = $this->db->resultSet();

        return $row;
    }

    public function getPostsByTitle($title) {
        $this->db->query('SELECT * FROM posts WHERE title = :title'); 
        $this->db->bind(':title', $title);

        $row = $this->db->resultSet();

        return $row;
    }

    public function archivePost($postId) {
        // query
        $this->db->query('UPDATE posts SET status = 1 WHERE id = :postId');
        // bind values
        $this->db->bind(':postId', $postId);
        // execute 
        if($this->db->execute()) {
            return true;
        }else {
            return false;
        }
    }

    public function unarchivePost($postId) {
        // query
        $this->db->query('UPDATE posts SET status = 0 WHERE id = :postId');
        // bind values
        $this->db->bind(':postId', $postId);
        // execute 
        if($this->db->execute()) {
            return true;
        }else {
            return false;
        }
    }
}