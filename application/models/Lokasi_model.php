<?php

class Lokasi_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function addLokasi()
    {
        $field = array(
            'lokasi' => $this->input->post('lokasi')
        );
        return $this->db->insert('lokasi', $field);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
