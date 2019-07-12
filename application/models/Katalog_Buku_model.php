<?php

class Katalog_Buku_model extends CI_Model
{
    function getDataKategori()
    {
        return $this->db->get('kategori')->result_array();
    }
    function getDataLokasi()
    {
        return $this->db->get('lokasi')->result_array();
    }
    function addKatalogBuku($data)
    {
        return $this->db->insert('katalog_buku', $data);
    }
    function showAllData()
    {
        $query = $this->db->query(
            'SELECT katalog_buku.*, kategori.*, lokasi.* FROM katalog_buku 
            JOIN kategori ON katalog_buku.id_kategori = kategori.id_kategori 
            LEFT JOIN lokasi ON katalog_buku.id_lokasi = lokasi.id_lokasi'
        );
        return $query->result_array();
    }
    function deleteKatalog()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $this->db->delete('katalog_buku');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
