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

    function getDataLokasi()
    {
        $this->db->order_by('lokasi', 'asc');
        $query = $this->db->get('lokasi');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    function getLokasi()
    {
        $id = $this->input->get('id_lokasi');
        $this->db->where('id_lokasi', $id);
        $query = $this->db->get('lokasi');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return 'tidak ada data dari model ke database';
        }
    }
    function updateLokasi()
    {
        $id = $this->input->post('txtId');
        $field = array(
            'lokasi' => $this->input->post('lokasi')
        );
        $this->db->where('id_lokasi', $id);
        $this->db->update('lokasi', $field);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    function deleteLokasi()
    {
        $id = $this->input->get('id_lokasi');
        $this->db->where('id_lokasi', $id);
        $this->db->delete('lokasi');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
