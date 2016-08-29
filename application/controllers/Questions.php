<?php

class Questions extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Questions_model');
    }

    public function all() {
        $data['json'] = json_encode($this->Questions_model->all());
        $this->load->view('json', $data);
    }

    public function create() {
        $Question = json_decode($this->input->get('json'));
        $data['json'] = json_encode($this->Questions_model->create($Question));
        $this->load->view('json', $data);
    }

    public function read() {
        $id = $this->input->get('id');
        $data['json'] = json_encode($this->Questions_model->read($id));
        $this->load->view('json', $data);
    }

    public function update() {
        $Question = json_decode($this->input->get('json'));
        $data['json'] = json_encode($this->Questions_model->update($Question));
        $this->load->view('json', $data);
    }

    public function delete() {
        $id = $this->input->get('id');
        $data['json'] = json_encode($this->Questions_model->delete($id));
        $this->load->view('json', $data);
    }
}

?>