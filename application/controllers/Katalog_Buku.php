<?php

class Katalog_Buku extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('katalog_buku_model');
        if ($this->session->userdata('level') != 'Pustakawan') {
            redirect('auth');
        }
    }
    function index()
    {
        $data['kategori'] = $this->katalog_buku_model->getDataKategori();
        $data['lokasi'] = $this->katalog_buku_model->getDataLokasi();
        $data['alldata'] = $this->katalog_buku_model->showAllData();
        $this->load->view('template/header');
        $this->load->view('katalog_buku', $data);
        $this->load->view('template/footer');
    }

    function addKatalogBuku()
    {

        $this->form_validation->set_rules('kategori', 'Kategori', 'required')
            ->set_rules('isbn', 'ISBN', 'required')
            ->set_rules('judul', 'Judul', 'required')
            ->set_rules('pengarang', 'pengarang', 'required')
            ->set_rules('penerbit', 'penerbit', 'required')
            ->set_rules('tahun', 'tahun', 'required')
            ->set_rules('tempat', 'tempat', 'required')
            ->set_rules('bahasa', 'bahasa', 'required')
            ->set_rules('halaman', 'halaman', 'required')
            ->set_rules('lokasi', 'lokasi', 'required')
            // ->set_rules('cover', 'Cover', 'required')
            ->set_rules('link', 'link', 'required')
            ->set_rules('status', 'status', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array();
            $data['id_kategori'] = $this->input->post('kategori');
            $data['isbn'] = $this->input->post('isbn');
            $data['judul'] = $this->input->post('judul');
            $data['pengarang'] = $this->input->post('pengarang');
            $data['penerbit'] = $this->input->post('penerbit');
            $data['tahun_terbit'] = $this->input->post('tahun');
            $data['tempat_terbit'] = $this->input->post('tempat');
            $data['bahasa'] = $this->input->post('bahasa');
            $data['halaman'] = $this->input->post('halaman');
            $data['id_lokasi'] = $this->input->post('lokasi');
            $data['link_buku'] = $this->input->post('link');
            $data['status'] = $this->input->post('status');
            $config['upload_path']          = APPPATH . '../assets/images/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = '5000';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('cover')) {
                $data['file_cover'] = 'book_nopic.jpg';
            } else {
                $upload_gambar = $this->upload->data();
                $data['file_cover'] = $upload_gambar['file_name'];
            }
            $this->katalog_buku_model->addKatalogBuku($data);
            $this->session->set_flashdata('success', 'Katalog Buku Telah Berhasil Disimpan');
            redirect('katalog_buku');
        }
    }
    public function deleteKatalog()
    {
        $result = $this->katalog_buku_model->deleteKatalog();
        $msg['success'] = false;
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }
}
