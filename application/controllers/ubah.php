<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ubah extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Admin_model', 'admin_model');
		$this->load->model('Akun_model', 'akun_model');
	}
	public function orang_tua()
	{
		$data = [
			'nik' => $_POST['nik'],
			'no_kk' => $_POST['no_kk'],
			'nama' => $_POST['nama'],
			'alamat' => $_POST['alamat'],
			'no_tlpn' => $_POST['no_tlpn'],
			'status' => $_POST['status'],
			'email' => $_POST['email']
		];
		$this->db->where('kd_ortu', $_POST['kd_ortu']);
		$this->db->update('orang_tua', $data);
		$result = $this->db->affected_rows();
		if ($result > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Rubah Data Orang Tua!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Rubah Data Orang Tua!</div>');
		}
		redirect('admin/orang_tua');
	}
	public function Bidan()
	{
		$data = [
			'nik' => $_POST['nik'],
			'nama' => $_POST['nama'],
			'alamat' => $_POST['alamat'],
			'email' => $_POST['email'],
			'no_tlpn' => $_POST['no_tlpn']
		];
		$this->db->where('kd_bidan', $_POST['kd_bidan']);
		$this->db->update('bidan', $data);
		$result = $this->db->affected_rows();
		if ($result > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Rubah Data Bidan!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Rubah Data Bidan!</div>');
		}
		redirect('admin/bidan');
	}
}





	// public function bidan($kode)
	// {
	// 	$bidan = $this->model->bidan(" where kd_bidan = '$kode'")[0];
	// 	$this->load->view('admin/Ubah_bidan', array('bidan' => $bidan));
	// }

	// public function Ubahbidan($kode = '')
	// {

	// 	// print_r($_POST);
	// 	$data = array(
	// 		'nama' => $_POST['nama'],
	// 		'nik' => $_POST['nik'],
	// 		'alamat' => $_POST['alamat'],
	// 		'no_tlpn' => $_POST['no_tlpn'],
	// 	);

	// 	$this->model->update('bidan', $data, array('kd_bidan' => $kode));

	// 	redirect('/admin/bidan');
	// }