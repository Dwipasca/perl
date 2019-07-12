<?php

class Akun_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function getAkun()
    {
        $id = $this->input->get('id_akun');
        $this->db->where('id_akun', $id);
        $query = $this->db->get('akun');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return 'tidak ada data dari model ke database';
        }
    }
    function updateAkun()
    {
        $id = $this->input->post('txtId');
        $field = array(
            'jabatan' => $this->input->post('jabatan'),
        );
        $this->db->where('id_akun', $id);
        $this->db->update('akun', $field);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    function updateAkunPassword()
    {
        $id = $this->input->post('txtId');
        $field = array(
            'kata_sandi' => password_hash($this->input->post('kata_sandi'), PASSWORD_DEFAULT)
        );
        $this->db->where('id_akun', $id);
        $this->db->update('akun', $field);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    function deleteAkun()
    {
        $id = $this->input->get('id_akun');
        $this->db->where('id_akun', $id);
        $this->db->delete('akun');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
