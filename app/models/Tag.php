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

    public function addTag($data) {
        // query
        $this->db->query('INSERT INTO tags(name) VALUES(:tag_name)');
        // bind values
        $this->db->bind(':tag_name', $data['tag_name']);

        // execute 
        if($this->db->execute()) {
            return true;
        }else {
            return false;
        }
    }

    public function updateTag($tag_id, $data) {
        // die('UpdatePost here');
        // query
        $this->db->query('UPDATE tags SET name = :tag_name WHERE id = :id');
        // bind values
        $this->db->bind(':id', $tag_id);
        $this->db->bind(':tag_name', $data['tag_name']);
        // execute 
        if($this->db->execute()) {
            return true;
        }else {
            return false;
        }
    }

    public function deleteTag($id){
        $this->db->query('DELETE FROM tags WHERE id = :id'); 
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