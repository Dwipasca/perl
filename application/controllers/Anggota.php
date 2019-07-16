<?php

class Anggota extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Anggota_model');
        $this->load->library('SSP');
        if ($this->session->userdata('level') != 'Pustakawan') {
            redirect('auth');
        }
    }
    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('anggota');
        $this->load->view('template/footer');
    }

    function showAllDataAnggota()
    {
        $result = $this->Anggota_model->getAllDataAnggota();
        echo json_encode($result);
    }
    public function tambahAnggota()
    {
        $result = $this->Anggota_model->addAnggota();
        $msg['success'] = false;
        $msg['type'] = 'add';
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }
    public function getAnggota()
    {
        $result = $this->Anggota_model->getAnggota();
        echo json_encode($result);
    }
    public function updateAnggota()
    {
        $result = $this->Anggota_model->updateAnggota();
        $msg['success'] = false;
        $msg['type'] = 'update';
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }
    public function deleteAnggota()
    {
        $result = $this->Anggota_model->deleteAnggota();
        $msg['success'] = false;
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    function data()
    {
        //nama tabel
        $table = 'anggota';
        //primary keynya
        $primaryKey = 'id_anggota';
        //list field yg akan ditampilkan
        $columns = array(
            array('db' => 'id_anggota', 'dt' => 'id_anggota'),
            array('db' => 'no_identitas', 'dt' => 'no_identitas'),
            array('db' => 'nama', 'dt' => 'nama'),
            array('db' => 'tgl_lahir', 'dt' => 'tgl_lahir'),
            array('db' => 'jenis_kelamin', 'dt' => 'jenis_kelamin'),
            array('db' => 'alamat', 'dt' => 'alamat'),
            array('db' => 'hp', 'dt' => 'hp'),
            array('db' => 'tanggal_pembuatan', 'dt' => 'tanggal_pembuatan'),
            array(
                'db' => 'id_anggota',
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
