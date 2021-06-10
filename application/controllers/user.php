<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{


    public function index()
    {
        $data['title'] = 'Home | Posyandu';
        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('user/index');
        $this->load->view('template/rightbar', $data);
        $this->load->view('template/footer');
    }

    public function home($value = '')
    {
        $this->load->view('user/home');
    }
    public function VisiMisiPosyandu($value = '')
    {
        $this->load->view('user/visi_misi_posyandu');
    }
    public function daftar($value = '')
    {
        $this->load->view('user/daftar');
    }
    public function login($value = '')
    {
        $this->load->view('user/login');
    }
    public function informasi($value = '')
    {
        $this->load->view('user/informasi');
    }
    public function jadwalposyandu($value = '')
    {
        $this->load->view('user/jadwal');
    }
    public function kegiatanposyandu($value = '')
    {
        $data['title'] = 'Home | Posyandu';
        $data['orang_tua'] = $this->orang_tua;
        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('user/akun/kegiatan');
        $this->load->view('template/rightbar', $data);
        $this->load->view('template/footer');
    }
    public function kaderposyandu($value = '')
    {
        $this->load->view('user/kader');
    }
}
