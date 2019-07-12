<?php

class Pustakawan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('pustakawan_model');
        $this->load->library('ssp');
        if ($this->session->userdata('level') != 'Pustakawan') {
            redirect('auth');
        }
    }
    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('pustakawan');
        $this->load->view('template/footer');
    }
    function showAllDataPustakawan()
    {
        $result = $this->pustakawan_model->getAllDataPustakawan();
        echo json_encode($result);
    }
    public function tambahPustakawan()
    {
        $result = $this->pustakawan_model->addPustakawan();
        $msg['success'] = false;
        $msg['type'] = 'add';
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }
    public function getPustakawan()
    {
        $result = $this->pustakawan_model->getPustakawan();
        echo json_encode($result);
    }
    public function updatePustakawan()
    {
        $result = $this->pustakawan_model->updatePustakawan();
        $msg['success'] = false;
        $msg['type'] = 'update';
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }
    public function deletePustakawan()
    {
        $result = $this->pustakawan_model->deletePustakawan();
        $msg['success'] = false;
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    function data()
    {
        //nama tabel
        $table = 'pustakawan';
        //primary keynya
        $primaryKey = 'id_pustakawan';
        //list field yg akan ditampilkan
        $columns = array(
            array('db' => 'id_pustakawan', 'dt' => 'id_pustakawan'),
            array('db' => 'no_identitas', 'dt' => 'no_identitas'),
            array('db' => 'nama', 'dt' => 'nama'),
            array('db' => 'tgl_lahir', 'dt' => 'tgl_lahir'),
            array('db' => 'jenis_kelamin', 'dt' => 'jenis_kelamin'),
            array('db' => 'alamat', 'dt' => 'alamat'),
            array('db' => 'hp', 'dt' => 'hp'),
            array('db' => 'tanggal_pembuatan', 'dt' => 'tanggal_pembuatan'),
            array(
                'db' => 'id_pustakawan',
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
