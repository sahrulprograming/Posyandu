<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubah extends CI_Controller {

	
	public function bidan($kode)
	{
		$bidan = $this->model->bidan(" where kd_bidan = '$kode'")[0];
		$this->load->view('admin/Ubah_bidan', array('bidan' => $bidan ));
	}

	public function Ubahbidan($kode='')
	{

		// print_r($_POST);
		$data = array(
			'nama' => $_POST['nama'],
			'nik' => $_POST['nik'],
			'alamat' => $_POST['alamat'],
			'no_tlpn' => $_POST['no_tlpn'], 
			);

		$this->model->update('bidan',$data,array('kd_bidan' => $kode));

		redirect ('/admin/bidan');
	}
}
