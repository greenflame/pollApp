<?php

class Answers_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function all() {
        return $this->db->get('Answer')->result_array();
    }

    public function create($Answer) {
        return $this->db->insert('Answer', $Answer);
    }

    public function read($id) {
        return $this->db->get_where('Answer', ['Id'=> $id])->result_array()[0];
    }

    public function update($Answer) {
        return $this->db->update('Answer', $Answer, ['Id' => $Answer->Id]);
    }

    public function delete($id) {
        return $this->db->delete('Answer', ['Id' => $id]);
    }
}

?>