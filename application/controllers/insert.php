<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insert extends CI_Controller {

	public function bidan()
	{
		print_r($_POST);

		$data = array(
			'kd_bidan' => time(),
			'nama' => $_POST['nama'],
			'nik' => $_POST['nik'],
			'alamat' => $_POST['alamat'],
			'no_tlpn' => $_POST['no_tlpn'], 
			);
		$this->model->insert('bidan',$data);

		redirect ('/admin/bidan');
	}
}
