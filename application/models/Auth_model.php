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
        $orang_tua = $this->db->get_where('orang_tua', ['email' => $email])->row_array();
        $admin = $this->db->get_where('admin', ['email' => $email])->row_array();
        $bidan = $this->db->get_where('bidan', ['email' => $email])->row_array();
        $balita = $this->db->get_where('balita', ['kd_ortu' => $orang_tua['kd_ortu']])->result_array();
        return array($orang_tua, $admin, $bidan, $balita);
    }
    public function tambah_user()
    {
        $data = [
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
