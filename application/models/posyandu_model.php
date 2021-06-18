<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Posyandu_model extends CI_Model
{
    public function data_anggota()
    {
        return $this->db->get('anggota')->result_array();
    }
}
