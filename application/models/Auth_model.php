<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function cek_data_login($email)
    {
        // Cek Data Email Ke database
        $orang_tua = $this->db->query("SELECT * FROM orang_tua WHERE email = '$email' OR nik = '$email'")->row_array();
        $admin = $this->db->query("SELECT * FROM `admin` WHERE email = '$email' OR nik = '$email'")->row_array();
        $bidan = $this->db->query("SELECT * FROM bidan WHERE email = '$email' OR nik = '$email'")->row_array();
        $anggota = $this->db->query("SELECT * FROM anggota WHERE email = '$email' OR nik = '$email'")->row_array();
        return array($orang_tua, $admin, $bidan, $anggota);
    }
    public function tambah_user()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'foto' => 'default-P.jpg',
            'email' => htmlspecialchars($this->input->post('email', true)),
            'password' => password_hash(
                $this->input->post('password'),
                PASSWORD_DEFAULT
            ),
        ];
        $sql = $this->db->insert('orang_tua', $data);
    }
    public function tambah_data_diri($kd_ortu)
    {
        $data = [
            'nik' => $this->input->post('nik'),
            'no_kk' => $this->input->post('nkk'),
            'nama' => htmlspecialchars($this->input->post('nama_lengkap', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'no_tlpn' => $this->input->post('nohp'),
        ];
        $this->db->update('orang_tua', $data, "kd_ortu = $kd_ortu");
    }
}
