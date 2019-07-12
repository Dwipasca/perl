<?php

class Auth_model extends CI_Model
{
    function addPengunjung($data)
    {
        return $this->db->insert('pengunjung', $data);
    }
}
