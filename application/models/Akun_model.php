<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

defined('BASEPATH') or exit('No direct script access allowed');

class Akun_model extends CI_Model
{
    public function data_user()
    {
        $balita = $this->db->get_where('balita', ['kd_ortu' => $this->session->userdata('kd_ortu')])->result_array();
        $orang_tua = $this->db->get_where('orang_tua', ['kd_ortu' => $this->session->userdata('kd_ortu')])->row_array();
        return array($balita, $orang_tua);
    }
    public function cek_bidan($kd_bidan)
    {
        $bidan = $this->db->get_where('bidan', ['kd_bidan' => $kd_bidan])->row_array();
        return $bidan;
    }
    public function update_balita()
    {
        $nik = $this->input->post('nik');
        $data = [
            'nama' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tgl_lahir' => $this->input->post('tgl_lahir')
        ];
        $this->db->set($data);
        $this->db->where('nik', $nik);
        $this->db->update('balita');
    }
    public function jumlah_balita()
    {
        $kd_ortu = $this->session->userdata('kd_ortu');
        $this->db->select('*');
        $this->db->from('balita');
        $this->db->where('kd_ortu', $kd_ortu);
        $jumlah_balita = $this->db->get()->num_rows();
        return $jumlah_balita;
    }
    public function data_jadwal()
    {
        $data_jadwal = $this->db->query('SELECT * FROM jadwal ORDER BY kd_jadwal DESC')->result_array();
        return $data_jadwal;
    }
    public function data_pmt()
    {
        $kd_ortu = $this->session->userdata('kd_ortu');
        $this->db->select('*');
        $this->db->from('status_pmt');
        $this->db->join('orang_tua', 'status_pmt.kd_ortu = orang_tua.kd_ortu', 'left');
        $this->db->join('jadwal', 'status_pmt.kd_jadwal = jadwal.kd_jadwal', 'left');
        $this->db->where('orang_tua.kd_ortu', "$kd_ortu");
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function data_kegiatan()
    {
        $query = $this->db->query("SELECT * FROM kegiatan")->result_array();
        return $query;
    }
    public function cek_balita()
    {
        $query = $this->db->get_where('balita', ['kd_ortu' => $this->session->userdata('kd_ortu')])->result_array();
        return $query;
    }
    public function status_pmt($kd_jadwal)
    {
        $query = $this->db->get_where('status_pmt', ['kd_jadwal' => $kd_jadwal, 'kd_ortu' => $this->session->userdata('kd_ortu')])->row_array();
        $hasil = $this->db->affected_rows();
        if ($hasil > 0) {
            return $query;
        }
        return $query = ['status_bayar' => 'belum lunas'];
    }
}
