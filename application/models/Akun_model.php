<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun_model extends CI_Model
{
    public function data_user()
    {
        $balita = $this->db->get_where('balita', ['kd_ortu' => $this->session->userdata('kd_ortu')])->result_array();
        $orang_tua = $this->db->get_where('orang_tua', ['kd_ortu' => $this->session->userdata('kd_ortu')])->row_array();
        $jadwal = $this->db->query('SELECT * FROM jadwal ORDER BY kd_jadwal DESC')->result_array();
        return array($balita, $orang_tua, $jadwal);
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
    public function data_pmt()
    {
        $balita = $this->db->get_where('balita', ['kd_ortu' => $this->session->userdata('kd_ortu')]);
        foreach ($balita->result_array() as $row) {
            $kd_balita = $row['kd_balita'];
            $query = $this->db->query("SELECT * FROM pmt 
            JOIN jadwal on `pmt`.`kd_jadwal` = `jadwal`.`kd_jadwal` 
            WHERE kd_balita = $kd_balita")->result_array();
        }
    }
}
