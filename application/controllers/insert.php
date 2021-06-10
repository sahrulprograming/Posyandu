<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Insert extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function bidan()
	{
		$data = [
			'nik' => $_POST['nik'],
			'nama' => $_POST['nama'],
			'alamat' => $_POST['alamat'],
			'email' => $_POST['email'],
			'no_tlpn' => $_POST['no_tlpn'],
			'password' => password_hash($_POST['no_tlpn'], PASSWORD_DEFAULT)
		];
		$this->db->insert('bidan', $data);
		$result = $this->db->affected_rows();
		if ($result > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambah Data Bidan!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambah Data Bidan!</div>');
		}
		redirect('admin/bidan');
	}
	public function ortu()
	{
		$data = [
			'no_kk' => $_POST['no_kk'],
			'nik' => $_POST['nik'],
			'nama' => $_POST['nama'],
			'alamat' => $_POST['alamat'],
			'no_tlpn' => $_POST['no_tlpn'],
			'status' => 'prosess',
			'email' => $_POST['email'],
			'password' => password_hash($_POST['no_tlpn'], PASSWORD_DEFAULT)
		];
		$this->db->insert('orang_tua', $data);
		$result = $this->db->affected_rows();
		if ($result > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambah Data Orang Tua!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambah Data Orang Tua!</div>');
		}
		redirect('admin/orang_tua');
	}
}

// 	public function bidan()
// 	{
// 		print_r($_POST);

// 		$data = array(
// 			'kd_bidan' => time(),
// 			'nama' => $_POST['nama'],
// 			'nik' => $_POST['nik'],
// 			'alamat' => $_POST['alamat'],
// 			'no_tlpn' => $_POST['no_tlpn'],
// 		);
// 		$this->model->insert('bidan', $data);

// 		redirect('/admin/bidan');
// 	}