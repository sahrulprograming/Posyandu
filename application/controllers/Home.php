<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Akun_model', 'akun_model');
		$this->load->model('Posyandu_model', 'posyandu_model');
	}


	public function index()
	{
		$data['kegiatan'] = $this->akun_model->data_kegiatan();
		$data['anggota'] = $this->posyandu_model->data_anggota();
		$this->load->view('user/home', $data);
	}
}
