<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bidan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_status_login();
        $this->load->library('form_validation');
        $this->load->model('Admin_model', 'admin_model');
        $this->load->model('Akun_model', 'akun_model');
        $this->bidan = $this->admin_model->data_admin();
        $this->jadwal = $this->akun_model->data_jadwal();
        $this->kegiatan = $this->akun_model->data_kegiatan();
    }
    // Data Balita
    public function index()
    {
        $data['title'] = 'Data Balita | Posyandu';
        $data['profile'] = $this->bidan;
        $data['jadwal'] = $this->akun_model->data_jadwal();
        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('bidan/index');
        $this->load->view('template/rightbar', $data);
        $this->load->view('template/footer');
    }
    // Data Balita
    public function balita()
    {
        $data['title'] = 'Data Balita | Posyandu';
        $data['profile'] = $this->bidan;
        $data['balita'] = $this->admin_model->profile_balita();
        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('bidan/balita');
        $this->load->view('template/rightbar', $data);
        $this->load->view('template/footer');
    }
    // Imunisasi
    public function imunisasi()
    {
        $data['title'] = 'Imunisasi | Posyandu';
        $data['profile'] = $this->bidan;
        $data['imunisasi'] = $this->admin_model->data_imunisasi();
        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('bidan/imunisasi', $data);
        $this->load->view('template/rightbar', $data);
        $this->load->view('template/footer');
    }
}
