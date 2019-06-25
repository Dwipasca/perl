<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_model');
    }
    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('kategori');
        $this->load->view('template/footer');
    }
    function showAllDataKategori()
    {
        $result = $this->kategori_model->getDataKategori();
        echo json_encode($result);
    }
    public function tambahKategori()
    {
        $result = $this->kategori_model->addKategori();
        $msg['success'] = false;
        $msg['type'] = 'add';
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }
    public function ubahKategori()
    {
        $result = $this->kategori_model->editKategori();
        echo json_encode($result);
    }
    public function updateKategori()
    {
        $result = $this->kategori_model->updateKategori();
        $msg['success'] = false;
        $msg['type'] = 'update';
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }
}
