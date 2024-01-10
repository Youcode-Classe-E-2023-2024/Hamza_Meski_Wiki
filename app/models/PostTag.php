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