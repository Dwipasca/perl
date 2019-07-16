<?php

class Buku_tamu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }
    function index()
    {
        $this->load->view('buku_tamu');
    }
    function jumlahField($table)
    {
        $query = $this->db->get($table);
        return  $query->num_rows();
    }
    function cekTamu()
    {
        $this->form_validation->set_rules('nama', 'Nama pengunjung', 'required');
        $this->form_validation->set_rules('hp', 'Hp', 'required');
        $this->form_validation->set_rules('keperluan', 'Keperluan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $no = $this->jumlahField('pengunjung');
            $nama = $this->input->post('nama');
            $hp = $this->input->post('hp');
            $keperluan = $this->input->post('keperluan');
            date_default_timezone_set('Asia/Makassar');
            $field = array(
                'id_pengunjung' => 'Pengunjung-00' . $no,
                'nama' => $nama,
                'hp' => $hp,
                'keperluan' => $keperluan,
                'tgl_kunjungan' => date('Y-m-d'),
                'jam_kunjungan' => date("H:i:s")
            );
            $this->Auth_model->addPengunjung($field);
            $this->session->set_flashdata('success', 'Selamat Datang');
            redirect('Buku_tamu');
        }
    }
}
