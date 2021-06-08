<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hapus extends CI_Controller {

	public function bidan($kode)
	{
		// $this->load->view('welcome_message');

		$this->model->delete('bidan', array('kd_bidan' => $kode ));

		redirect ('/admin/bidan');
	}
	public function data_penimbang_bayi($kode)
	{
		// $this->load->view('welcome_message');

		$this->model->delete('data_penimbang_bayi', array('kd_penimbang' => $kode ));

		redirect ('/admin/data_penimbang_bayi');
	}
}
