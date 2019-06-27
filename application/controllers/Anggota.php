<?php

class Anggota extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('anggota_model');
    }
    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('anggota');
        $this->load->view('template/footer');
    }

    function showAllDataAnggota()
    {
        $result = $this->anggota_model->getAllDataAnggota();
        echo json_encode($result);
    }
    public function tambahAnggota()
    {
        $result = $this->anggota_model->addAnggota();
        $msg['success'] = false;
        $msg['type'] = 'add';
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }
}
