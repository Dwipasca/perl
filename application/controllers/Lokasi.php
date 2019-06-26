<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Lokasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('lokasi_model');
    }

    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('lokasi');
        $this->load->view('template/footer');
    }
    public function tambahLokasi()
    {
        $result = $this->lokasi_model->addLokasi();
        $msg['success'] = false;
        $msg['type'] = 'add';
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }
}
