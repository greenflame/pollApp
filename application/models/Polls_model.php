<?php

class Polls_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function all() {
        return $this->db->get('Poll')->result_array();
    }

    public function create($poll) {
        return $this->db->insert('Poll', $poll);
    }

    public function read($id) {
        $poll = $this->db->get_where('Poll', ['Id'=> $id])->result_array()[0];
        $questions = $this->db->get_where('Question', ['Poll' => $id])->result_array();
        $poll['Questions'] = $questions;
        return $poll;
    }

    public function update($poll) {
        return $this->db->update('Poll', $poll, ['id' => $poll->id]);
    }

    public function delete($id) {
        return $this->db->delete('Poll', ['id' => $id]);
    }
}

?>