<?php

class Kategori_model extends CI_Model
{
    function addKategori()
    {
        $field = array(
            'kategori' => $this->input->post('kategori')
        );
        return $this->db->insert('kategori', $field);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    function getDataKategori()
    {
        $query = $this->db->get('kategori');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}
