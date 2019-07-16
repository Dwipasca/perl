<?php

class Peminjaman extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Peminjaman_model');
        if ($this->session->userdata('level') != 'Pustakawan') {
            redirect('auth');
        }
    }
    function index()
    {
        $data['anggota'] = $this->Peminjaman_model->getDataAnggota();
        $data['buku'] = $this->Peminjaman_model->getDataKatalogBuku();
        $data['alldata'] = $this->Peminjaman_model->showAllData();
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
            $no_identitas = $this->input->post('anggota');
            $findData = $this->db->get_where('anggota', array('id_anggota' => $no_identitas))->row_array();
            date_default_timezone_set('Asia/Makassar');

            $data = array();
            $data['id_anggota'] = $this->input->post('anggota');
            $data['id_buku'] = $this->input->post('buku');
            $data['tgl_pinjam'] = date('Y-m-d');
            $data['tgl_pengembalian'] = $this->input->post('tgl');
            $data['status'] = 'Belum dikembalikan';
            $field = array(
                'id_pengunjung' => $findData['no_identitas'],
                'nama' => $findData['nama'],
                'hp' => $findData['hp'],
                'keperluan' => 'Pinjam Buku',
                'tgl_kunjungan' => date('Y-m-d'),
                'jam_kunjungan' => date("H:i:s")
            );
            var_dump($findData);
            $this->Peminjaman_model->addPengunjung($field);
            $this->Peminjaman_model->addPeminjaman($data);
            $this->session->set_flashdata('success', 'Data Peminjaman Telah Berhasil Disimpan');
            redirect('peminjaman');
        }
    }
    public function getPeminjaman()
    {
        $result = $this->Peminjaman_model->getPeminjaman();
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
            $this->Peminjaman_model->pengembalianPeminjaman($data);
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
            $this->Peminjaman_model->perpanjanganPeminjaman($data);
            $this->session->set_flashdata('success', 'Data Peminjaman Telah Berhasil Diubah');
            redirect('peminjaman');
        }
    }
    public function deletePeminjaman()
    {
        $result = $this->Peminjaman_model->deletePeminjaman();
        $msg['success'] = false;
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }
}
