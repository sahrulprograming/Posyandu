<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Akun_model', 'akun_model');
		$this->kegiatan = $this->akun_model->data_kegiatan();
	}


	public function index()
	{
		$data['kegiatan'] = $this->kegiatan;
		$this->load->view('user/home', $data);
	}
}
