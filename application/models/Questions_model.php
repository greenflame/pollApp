<?php

class Questions_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function all() {
        return $this->db->get('Question')->result_array();
    }

    public function create($Question) {
        return $this->db->insert('Question', $Question);
    }

    public function read($id) {
        return $this->db->get_where('Question', ['id'=> $id])->result_array()[0];
    }

    public function update($Question) {
        return $this->db->update('Question', $Question, ['id' => $Question->id]);
    }

    public function delete($id) {
        return $this->db->delete('Question', ['id' => $id]);
    }
}

?>