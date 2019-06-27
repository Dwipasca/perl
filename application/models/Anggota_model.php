<?php

class Anggota_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function addAnggota()
    {
        $field = array(
            'no_identitas' => $this->input->post('no_identitas'),
            'nama' => $this->input->post('nama'),
            'tgl_lahir' => $this->input->post('tgl'),
            'jenis_kelamin' => $this->input->post('jk'),
            'hp' => $this->input->post('no'),
            'alamat' => $this->input->post('alamat'),
        );
        return $this->db->insert('anggota', $field);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
