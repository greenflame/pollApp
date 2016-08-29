<?php

class Polls extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('polls_model');
    }

    public function all() {
        $data['json'] = json_encode($this->polls_model->all());
        $this->load->view('json', $data);
    }

    public function create() {
        $poll = json_decode($this->input->get('json'));

        $poll->author = 1;

        $data['json'] = json_encode($this->polls_model->create($poll));
        $this->load->view('json', $data);
    }

    public function read() {
        $id = $this->input->get('id');
        $data['json'] = json_encode($this->polls_model->read($id));
        $this->load->view('json', $data);
    }

    public function update() {
        $poll = json_decode($this->input->get('json'));
        $data['json'] = json_encode($this->polls_model->update($poll));
        $this->load->view('json', $data);
    }

    public function delete() {
        $id = $this->input->get('id');
        $data['json'] = json_encode($this->polls_model->delete($id));
        $this->load->view('json', $data);
    }
}

?>