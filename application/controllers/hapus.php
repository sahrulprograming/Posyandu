<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hapus extends CI_Controller
{
	public function ortu()
	{
		$this->db->delete('orang_tua', ['kd_ortu' => $_POST['kd_ortu']]);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berhasil Menghapus Data Orang Tua!</div>');
		redirect('admin/orang_tua');
	}
	public function bidan()
	{
		$this->db->delete('bidan', ['kd_bidan' => $_POST['kd_bidan']]);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berhasil Menghapus Data Bidan!</div>');
		redirect('admin/bidan');
	}
}







// public function bidan($kode)
	// {
	// 	// $this->load->view('welcome_message');
	// 	$this->model->delete('bidan', array('kd_bidan' => $kode));

	// 	redirect('/admin/bidan');
	// }
	// public function data_penimbang_bayi($kode)
	// {
	// 	// $this->load->view('welcome_message');
	// 	$this->model->delete('data_penimbang_bayi', array('kd_penimbang' => $kode));

	// 	redirect('/admin/data_penimbang_bayi');
	// }