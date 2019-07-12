<?php

class Pengunjung extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('pengunjung_model');
        $this->load->library('ssp');
    }
    function index()
    {
        $data['alldata'] = $this->pengunjung_model->getKategori()->result_array();
        // $data['buku'] = $this->pengunjung_model->getKatalogBuku()->result_array();
        // $data['pilih'] = $this->pengunjung_model->getDetailBuku()->result();
        $this->load->view('template/header_online', $data);
        $this->load->view('pengunjung', $data);
        $this->load->view('template/footer_online');
    }
    function getDataDetail()
    {
        $result = $this->pengunjung_model->getDataDetail();
        echo json_encode($result);
    }
    function AXshowAllData()
    {
        $result = $this->pengunjung_model->getAllData();
        echo json_encode($result);
    }
    function AXfilterPencarian($pencarian = '')
    {
        if ($pencarian == '') {
            $this->AXshowAllData();
        } else {
            $pencarian = str_replace("%20", " ", $pencarian);
            $sql = $this->pengunjung_model->fiterPencarian($pencarian);
            echo json_encode($sql);
        }
    }
    function akses()
    {
        $this->load->view('template/header');
        $this->load->view('data_pengunjung');
        $this->load->view('template/footer');
    }
    function data()
    {
        //nama tabel
        $table = 'pengunjung';
        //primary keynya
        $primaryKey = 'id_pengunjung';
        //list field yg akan ditampilkan
        $columns = array(
            array('db' => 'id_pengunjung', 'dt' => 'id_pengunjung'),
            array('db' => 'nama', 'dt' => 'nama'),
            array('db' => 'hp', 'dt' => 'hp'),
            array('db' => 'keperluan', 'dt' => 'keperluan'),
            array('db' => 'tgl_kunjungan', 'dt' => 'tgl_kunjungan'),
            array('db' => 'jam_kunjungan', 'dt' => 'jam_kunjungan')
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
