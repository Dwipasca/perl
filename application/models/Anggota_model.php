<?php

class Anggota_model extends CI_Model
{
    public function __construct()
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
        $no = $this->jumlahField('anggota');
        $pengguna = $this->input->post('no_inden');
        $akun = array(
            'id_pengguna' => $pengguna,
            'jabatan' => 'Anggota',
            'nama_pengguna' => 'Perl-00' . $no,
            'kata_sandi' => password_hash('12345', PASSWORD_DEFAULT)
        );
        $this->db->insert('akun', $akun);
    }

    function addAnggota()
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
        $this->db->insert('anggota', $field);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function getAllDataAnggota()
    {
        $this->db->order_by('nama', 'asc');
        $query = $this->db->get('anggota');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    function getAnggota()
    {
        $id = $this->input->get('id_anggota');
        $this->db->where('id_anggota', $id);
        $query = $this->db->get('anggota');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return 'tidak ada data dari model ke database';
        }
    }
    function updateAnggota()
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
        $this->db->where('id_anggota', $id);
        $this->db->update('anggota', $field);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    function deleteAnggota()
    {
        $id = $this->input->get('id_anggota');
        $this->db->where('id_anggota', $id);
        $this->db->delete('anggota');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
