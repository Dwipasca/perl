<?php
class Peminjaman_model extends CI_Model
{
    function showAllData()
    {
        $query = $this->db->query(
            'SELECT peminjaman.*, anggota.*, katalog_buku.id, katalog_buku.judul FROM peminjaman 
            JOIN anggota ON peminjaman.id_anggota = anggota.id_anggota 
            JOIN katalog_buku ON peminjaman.id_buku = katalog_buku.id ORDER BY peminjaman.status ASC'
        );
        return $query->result_array();
    }
    function getPeminjaman()
    {
        $id = $this->input->get('id_peminjaman');
        $this->db->where('id_peminjaman', $id);
        $query = $this->db->get('peminjaman');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return 'tidak ada data dari model ke database';
        }
    }

    function getDataAnggota()
    {
        return $this->db->get('anggota')->result_array();
    }
    function getDataKatalogBuku()
    {
        return $this->db->get('katalog_buku')->result_array();
    }

    function addPengunjung($data)
    {
        return $this->db->insert('pengunjung', $data);
    }

    function addPeminjaman($data)
    {
        return $this->db->insert('peminjaman', $data);
    }

    function pengembalianPeminjaman($data)
    {
        $id = $this->input->post('txtId');
        $this->db->where('id_peminjaman', $id);
        return $this->db->update('peminjaman', $data);
    }
    function perpanjanganPeminjaman($data)
    {
        $id = $this->input->post('text-id_panjang');
        $this->db->where('id_peminjaman', $id);
        return $this->db->update('peminjaman', $data);
    }

    function deletePeminjaman()
    {
        $id = $this->input->get('id_peminjaman');
        $this->db->where('id_peminjaman', $id);
        $this->db->delete('peminjaman');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
