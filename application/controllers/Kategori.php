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
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }
}
