<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function data_admin()
    {
        $data_admin = $this->db->get_where('admin', ['kd_admin' => $this->session->userdata('kd_admin')])->row_array();
        return $data_admin;
    }
    public function posting_kegiatan($data, $nama_gambar)
    {
        $judul = $data['judul'];
        $keterangan = $data['keterangan'];
        $this->db->Query("INSERT INTO kegiatan (judul,foto_kegiatan,keterangan) VALUES ('$judul','$nama_gambar','$keterangan')");
    }
}
