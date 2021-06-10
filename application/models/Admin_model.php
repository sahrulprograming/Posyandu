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
    public function data_ortu()
    {
        $data_ortu = $this->db->get('orang_tua')->result_array();
        return $data_ortu;
    }
    public function data_bidan()
    {
        $data_bidan = $this->db->get('bidan')->result_array();
        return $data_bidan;
    }
    public function data_balita()
    {
        $data_balita = $this->db->query("SELECT `balita`.`kd_balita`,
                                        `balita`.`nama` AS `nama_balita`, 
                                        `orang_tua`.`nama` AS `nama_orang_tua`, 
                                        `bidan`.`nama` AS `nama_bidan`,
                                        `balita`.`tgl_lahir`,
                                        `balita`.`jenis_kelamin`,
                                        `balita`.`nik`,
                                        `balita`.`bb`,
                                        `balita`.`tb`,
                                        `balita`.`keluhan` FROM `balita`
                                        JOIN `orang_tua` ON `balita`.`kd_ortu` = `orang_tua`.`kd_ortu`
                                        JOIN `bidan` ON `balita`.`kd_bidan` = `bidan`.`kd_bidan`")->result_array();
        return $data_balita;
    }
}
