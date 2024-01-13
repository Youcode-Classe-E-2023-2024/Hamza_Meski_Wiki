<?php  
class PostTag {
    private $db; 

    public function __construct() {
        $this->db = new Database();
    }

    public function addPostTag($postId, $selected_tags) {
        // query
        foreach($selected_tags as $selected_tag_id) {
            $this->db->query('INSERT INTO posts_tags(post_id, tag_id) VALUES(:post_id, :tag_id)');
            // bind values
            $this->db->bind(':post_id', $postId);
            $this->db->bind(':tag_id', $selected_tag_id);
            // execute 
            if(!$this->db->execute()) {
                return false;
            }
        }
        return true;
    }

    public function updatePostTag($postId, $selected_tags) {
        // removing existing tags for the post
        $this->db->query('DELETE FROM posts_tags WHERE post_id = :post_id');
        $this->db->bind(':post_id', $postId);
        
        // execute
        if(!$this->db->execute()) {
            return false;
        }
    
        $this->addPostTag($postId, $selected_tags);
    }

    // tag search filter function 
    public function getPostsByTagId($tag_id) {
        $this->db->query('SELECT * FROM posts_tags WHERE tag_id = :tag_id'); 
        $this->db->bind(':tag_id', $tag_id);

        $row = $this->db->resultSet();

        return $row;
    }
    
}