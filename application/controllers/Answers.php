<?php

class Answers extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Answers_model');
    }

    public function all() {
        $data['json'] = json_encode($this->Answers_model->all());
        $this->load->view('json', $data);
    }

    public function create() {
        $Answer = json_decode($this->input->get('json'));
        $data['json'] = json_encode($this->Answers_model->create($Answer));
        $this->load->view('json', $data);
    }

    public function read() {
        $id = $this->input->get('id');
        $data['json'] = json_encode($this->Answers_model->read($id));
        $this->load->view('json', $data);
    }

    public function update() {
        $Answer = json_decode($this->input->get('json'));
        $data['json'] = json_encode($this->Answers_model->update($Answer));
        $this->load->view('json', $data);
    }

    public function delete() {
        $id = $this->input->get('id');
        $data['json'] = json_encode($this->Answers_model->delete($id));
        $this->load->view('json', $data);
    }
}

?>