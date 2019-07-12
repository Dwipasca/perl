<?php

class Peminjaman extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('peminjaman_model');
        if ($this->session->userdata('level') != 'Pustakawan') {
            redirect('auth');
        }
    }
    function index()
    {
        $data['anggota'] = $this->peminjaman_model->getDataAnggota();
        $data['buku'] = $this->peminjaman_model->getDataKatalogBuku();
        $data['alldata'] = $this->peminjaman_model->showAllData();
        $this->load->view('template/header');
        $this->load->view('peminjaman', $data);
        $this->load->view('template/footer');
    }
    function addPeminjaman()
    {

        $this->form_validation->set_rules('anggota', 'Anggota', 'required')
            ->set_rules('buku', 'Buku', 'required')
            ->set_rules('tgl', 'Tanggal Peminjaman', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array();
            $data['id_anggota'] = $this->input->post('anggota');
            $data['id_buku'] = $this->input->post('buku');
            $data['tgl_pinjam'] = date('Y-m-d');
            $data['tgl_pengembalian'] = $this->input->post('tgl');
            $data['status'] = 'Belum dikembalikan';
            $this->peminjaman_model->addPeminjaman($data);
            $this->session->set_flashdata('success', 'Data Peminjaman Telah Berhasil Disimpan');
            redirect('peminjaman');
        }
    }
    public function getPeminjaman()
    {
        $result = $this->peminjaman_model->getPeminjaman();
        echo json_encode($result);
    }
    function pengembalianPeminjaman()
    {
        $this->form_validation->set_rules('status_pinjam', 'Status', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array();
            $data['status'] = $this->input->post('status_pinjam');
            if ($data['status'] == 'Sudah dikembalikan') {
                $data['tgl_konfirmasi_pengembalian'] = date('Y-m-d');
            } else {
                $data['tgl_konfirmasi_pengembalian'] = '-';
            }
            $this->peminjaman_model->pengembalianPeminjaman($data);
            $this->session->set_flashdata('success', 'Data Peminjaman Telah Berhasil Diubah');
            redirect('peminjaman');
        }
    }
    function perpanjanganPeminjaman()
    {
        $this->form_validation->set_rules('tgl_panjang', 'Tanggal Perpanjangan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
                'tgl_perpanjangan' => $this->input->post('tgl_panjang')
            );
            // $data['tgl_perpanjangan'] = $this->input->post('tgl_panjang');
            $this->peminjaman_model->perpanjanganPeminjaman($data);
            $this->session->set_flashdata('success', 'Data Peminjaman Telah Berhasil Diubah');
            redirect('peminjaman');
        }
    }
    public function deletePeminjaman()
    {
        $result = $this->peminjaman_model->deletePeminjaman();
        $msg['success'] = false;
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }
}
