<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Lokasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Lokasi_model');
        if ($this->session->userdata('level') != 'Pustakawan') {
            redirect('auth');
        }
    }

    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('lokasi');
        $this->load->view('template/footer');
    }

    function showAllDataLokasi()
    {
        $result = $this->Lokasi_model->getDataLokasi();
        echo json_encode($result);
    }
    public function tambahLokasi()
    {
        $result = $this->Lokasi_model->addLokasi();
        $msg['success'] = false;
        $msg['type'] = 'add';
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }
    public function getLokasi()
    {
        $result = $this->Lokasi_model->getLokasi();
        echo json_encode($result);
    }
    public function updateLokasi()
    {
        $result = $this->Lokasi_model->updateLokasi();
        $msg['success'] = false;
        $msg['type'] = 'update';
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }
    public function hapusLokasi()
    {
        $result = $this->Lokasi_model->deleteLokasi();
        $msg['success'] = false;
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }
}
