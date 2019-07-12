<?php

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
    }
    function index()
    {
        $this->load->view('auth/portal1');
    }
    function anggota()
    {
        $this->load->view('auth/login_anggota');
    }
    function nonanggota()
    {
        $this->load->view('auth/login_nonanggota');
    }
    function jumlahField($table)
    {
        $query = $this->db->get($table);
        return  $query->num_rows();
    }
    function pengunjung()
    {
        $no = $this->jumlahField('pengunjung');
        $nama = $this->input->post('username');
        $hp = $this->input->post('password');
        date_default_timezone_set('Asia/Makassar');
        $field = array(
            'id_pengunjung' => 'Pengunjung-00' . $no,
            'nama' => $nama,
            'hp' => $hp,
            'keperluan' => 'Baca Online',
            'tgl_kunjungan' => date('Y-m-d'),
            'jam_kunjungan' => date("H:i:s")
        );
        $this->auth_model->addPengunjung($field);
        redirect('pengunjung');
    }
    function cekLogin()
    {
        $this->form_validation->set_rules('username', 'Nama Pengguna', 'required');
        $this->form_validation->set_rules('password', 'Kata Sandi', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->anggota();
        } else {
            $this->prosesCekLogin();
        }
    }
    private function prosesCekLogin()
    {
        //proses login
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $akun = $this->db->get_where('akun', array('nama_pengguna' => $username))->row_array();
        $id = $akun['id_pengguna'];
        $tampung = $akun['kata_sandi'];
        if ($akun) {
            if (password_verify($password, $tampung)) {
                $this->session->set_userdata('username', $akun['nama_pengguna']);
                $this->session->set_userdata('level', $akun['jabatan']);
                $jabatan =  $this->session->userdata('level');
                $nama = $this->session->userdata('username');
                if ($jabatan == 'Anggota') {
                    $biodata = $this->db->get_where('anggota', array('no_identitas' => $id))->row_array();
                    date_default_timezone_set('Asia/Makassar');
                    $field = array(
                        'id_pengunjung' => $nama,
                        'nama' => $nama,
                        'hp' => $biodata['hp'],
                        'keperluan' => 'Baca Online',
                        'tgl_kunjungan' => date('Y-m-d'),
                        'jam_kunjungan' => date("H:i:s")
                    );
                    $this->auth_model->addPengunjung($field);
                    redirect('pengunjung');
                } else if ($jabatan == 'Pustakawan') {
                    redirect('peminjaman');
                } else {
                    redireact('/');
                }
            } else {
                $this->session->set_flashdata('danger', 'Password salah');
                redirect('auth/anggota');
            }
        } else {
            $this->session->set_flashdata('danger', 'Akun tidak terdaftar');
            redirect('auth/anggota');
        }
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
    }
}
