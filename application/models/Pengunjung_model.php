<?php

class Pengunjung_model extends CI_Model
{
    function getKatalogBuku()
    {
        $query = $this->db->query(
            'SELECT katalog_buku.*, kategori.*, lokasi.* FROM katalog_buku 
            JOIN kategori ON katalog_buku.id_kategori = kategori.id_kategori 
            LEFT JOIN lokasi ON katalog_buku.id_lokasi = lokasi.id_lokasi'
        );
        return $query;
    }
    function getDataDetail()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $query = $this->db->get('katalog_buku');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return 'tidak ada data dari model ke database';
        }
    }
    function getKategori()
    {
        return $this->db->get('kategori');
    }
    function getAllData()
    {
        $query = $this->db->get('katalog_buku');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    function fiterPencarian($cari)
    {
        $query = $this->db->select('*')
            ->from('katalog_buku')
            ->like('judul', $cari)
            ->or_like('pengarang', $cari)
            ->or_like('penerbit', $cari)
            ->or_like('id_kategori', $cari)
            ->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}
