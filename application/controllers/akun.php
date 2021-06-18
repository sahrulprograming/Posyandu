<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{
        public function __construct()
        {
                parent::__construct();
                cek_status_login();
                $this->load->library('form_validation');
                $this->load->model('Akun_model', 'akun_model');
                $this->jumlah_balita = $this->akun_model->jumlah_balita();
                $this->pmt = $this->akun_model->data_pmt();
                $this->load->model('Posyandu_model', 'posyandu_model');
        }

        public function index()
        {
                $data['profile'] = $this->akun_model->data_user();
                $data['kegiatan'] = $this->akun_model->data_kegiatan();
                $data['title'] = 'Home | Posyandu';
                $this->load->view('template/header', $data);
                $this->load->view('template/topbar', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('user/akun/home', $data);
                $this->load->view('template/rightbar', $data);
                $this->load->view('template/footer');
        }

        public function balita()
        {
                $data['balita'] = $this->akun_model->profile_balita();
                $data['profile'] = $this->akun_model->data_user();
                $data['title'] = 'Balita | Posyandu';
                $this->load->view('template/header', $data);
                $this->load->view('template/topbar', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('user/akun/balita', $data);
                $this->load->view('template/rightbar', $data);
                $this->load->view('template/footer');
        }

        public function jadwal_posyandu()
        {
                $data['title'] = 'Jadwal | Posyandu';
                $data['jadwal'] = $this->akun_model->data_jadwal();
                $data['profile'] = $this->akun_model->data_user();
                $data['jumlah_balita'] = $this->jumlah_balita;
                $this->load->view('template/header', $data);
                $this->load->view('template/topbar', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('user/akun/jadwal_posyandu', $data);
                $this->load->view('template/rightbar', $data);
                $this->load->view('template/footer');
        }
        public function pmt()
        {
                $data['pmt'] = $this->pmt;
                $data['jumlah_balita'] = $this->jumlah_balita;
                $data['profile'] = $this->akun_model->data_user();
                $data['title'] = 'PMT | Posyandu';
                $this->load->view('template/header', $data);
                $this->load->view('template/topbar', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('user/akun/pmt', $data);
                $this->load->view('template/rightbar', $data);
                $this->load->view('template/footer');
        }
        public function kegiatanposyandu()
        {
                $data['title'] = 'Kegiatan | Posyandu';
                $data['kegiatan'] = $this->akun_model->data_kegiatan();
                $data['profile'] = $this->akun_model->data_user();
                $this->load->view('template/header', $data);
                $this->load->view('template/topbar', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('user/akun/kegiatan');
                $this->load->view('template/rightbar', $data);
                $this->load->view('template/footer');
        }
        public function kader_posyandu()
        {
                $data['title'] = 'Kegiatan | Posyandu';
                $data['profile'] = $this->akun_model->data_user();
                $data['anggota'] = $this->posyandu_model->data_anggota();
                $this->load->view('template/header', $data);
                $this->load->view('template/topbar', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('user/akun/kader', $data);
                $this->load->view('template/rightbar', $data);
                $this->load->view('template/footer');
        }
}
