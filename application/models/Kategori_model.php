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

    public function editKategori()
    {
        $id = $this->input->get('id_kategori');
        $this->db->where('id_kategori', $id);
        $query = $this->db->get('kategori');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return 'tidak ada data dari model ke database';
        }
    }

    function updateKategori()
    {
        $id = $this->input->post('txtId');
        $field = array(
            'kategori' => $this->input->post('kategori')
        );
        $this->db->where('id_kategori', $id);
        $this->db->update('kategori', $field);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function deleteKategori()
    {
        $id = $this->input->get('id_kategori');
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    function getDataKategori()
    {
        $this->db->order_by('kategori', 'asc');
        $query = $this->db->get('kategori');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}
