<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_status_login();
        $this->load->library('form_validation');
        $this->load->model('Admin_model', 'admin_model');
        $this->load->model('Akun_model', 'akun_model');
        $this->anggota = $this->akun_model->data_user();
        $this->jadwal = $this->akun_model->data_jadwal();
        $this->kegiatan = $this->akun_model->data_kegiatan();
    }
    public function orang_tua()
    {
        $data['title'] = 'Data Orang Tua | Posyandu';
        $data['profile'] = $this->anggota;
        $data['orang_tua'] = $this->admin_model->data_ortu();
        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/orang_tua', $data);
        $this->load->view('template/rightbar', $data);
        $this->load->view('template/footer');
    }
    public function balita($value = '')
    {
        $data['title'] = 'Data Balita | Posyandu';
        $data['profile'] = $this->anggota;
        $data['balita'] = $this->admin_model->profile_balita();
        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/balita');
        $this->load->view('template/rightbar', $data);
        $this->load->view('template/footer');
    }
}
