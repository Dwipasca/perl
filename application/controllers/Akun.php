<?php

class Akun extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('akun_model');
        $this->load->library('ssp');
    }

    function index()
    {
        $this->load->view('template/header');
        $this->load->view('akun');
        $this->load->view('template/footer');
    }
    function data()
    {
        //nama tabel
        $table = 'akun';
        //primary keynya
        $primaryKey = 'id_akun';
        //list field yg akan ditampilkan
        $columns = array(
            array('db' => 'id_akun', 'dt' => 'id_akun'),
            array('db' => 'id_pengguna', 'dt' => 'id_pengguna'),
            array('db' => 'jabatan', 'dt' => 'jabatan'),
            array('db' => 'nama_pengguna', 'dt' => 'nama_pengguna'),
            array(
                'db' => 'id_akun',
                'dt' => 'aksi',
                'formatter' => function ($d) { // var $d itu untuk ke primary key yaitu nip 
                    return '<a href="javascript:;" class="btn bg-navy btn-xs item-edit" data="' . $d . '" data-toggle="tooltip" data-placement="bottom" title="ubah"> <i class="fa fa-edit"></i> </a>' . ' ' .
                        '<a href="javascript:;" class="btn btn-danger btn-xs item-delete" data="' . $d . '" data-toggle="tooltip" data-placement="bottom" title="hapus"> <i class="fa fa-trash"></i> </a>';
                },
            )
        );
        // SQL server connection information
        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db' => $this->db->database,
            'host' => $this->db->hostname
        );
        echo json_encode(
            SSP::simple($_POST, $sql_details, $table, $primaryKey, $columns)
        );
    }
}
