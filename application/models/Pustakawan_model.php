<?php

class Pustakawan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function jumlahField($table)
    {
        $query = $this->db->get($table);
        return  $query->num_rows();
    }
    function insertAkun()
    {
        $no = $this->jumlahField('Pustakawan');
        $pengguna = $this->input->post('no_inden');
        $akun = array(
            'id_pengguna' => $pengguna,
            'jabatan' => 'Pustakawan',
            'nama_pengguna' => 'Pustakawan-00' . $no,
            'kata_sandi' => password_hash('12345', PASSWORD_DEFAULT)
        );
        $this->db->insert('akun', $akun);
    }

    function addPustakawan()
    {
        $field = array(
            'no_identitas' => $this->input->post('no_inden'),
            'nama' => $this->input->post('nama'),
            'tgl_lahir' => $this->input->post('tgl'),
            'jenis_kelamin' => $this->input->post('jk'),
            'hp' => $this->input->post('no'),
            'alamat' => $this->input->post('alamat'),
        );
        $this->insertAkun();
        $this->db->insert('Pustakawan', $field);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function getAllDataPustakawan()
    {
        $this->db->order_by('nama', 'asc');
        $query = $this->db->get('pustakawan');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    function getPustakawan()
    {
        $id = $this->input->get('id_pustakawan');
        $this->db->where('id_pustakawan', $id);
        $query = $this->db->get('pustakawan');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return 'tidak ada data dari model ke database';
        }
    }
    function updatePustakawan()
    {
        $id = $this->input->post('txtId');
        $field = array(
            'no_identitas' => $this->input->post('no_inden'),
            'nama' => $this->input->post('nama'),
            'tgl_lahir' => $this->input->post('tgl'),
            'jenis_kelamin' => $this->input->post('jk'),
            'hp' => $this->input->post('no'),
            'alamat' => $this->input->post('alamat'),
        );
        $this->db->where('id_pustakawan', $id);
        $this->db->update('pustakawan', $field);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    function deletePustakawan()
    {
        $id = $this->input->get('id_pustakawan');
        $this->db->where('id_pustakawan', $id);
        $this->db->delete('pustakawan');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
