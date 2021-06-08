<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{


    public function index()
    {
        $this->load->view('user/index');
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
        $this->load->view('user/kegiatan');
    }
    public function kaderposyandu($value = '')
    {
        $this->load->view('user/kader');
    }
}
