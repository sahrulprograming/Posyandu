<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hapus extends CI_Controller
{
	public function ortu()
	{
		$role = $this->session->userdata('role');
		$this->db->delete('orang_tua', ['kd_ortu' => $_POST['kd_ortu']]);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berhasil Menghapus Data Orang Tua!</div>');
		if (strtolower($role) == 'anggota') {
			redirect('anggota/orang_tua');
		} else {
			redirect('admin/orang_tua');
		}
	}
	public function balita()
	{
		$role = $this->session->userdata('role');
		$this->db->delete('balita', ['kd_balita' => $_POST['kd_balita']]);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berhasil Menghapus Data Balita!</div>');
		if (strtolower($role) == 'anggota') {
			redirect('anggota/balita');
		} else {
			redirect('admin/balita');
		}
	}
	public function bidan()
	{
		$this->db->delete('bidan', ['kd_bidan' => $_POST['kd_bidan']]);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berhasil Menghapus Data Bidan!</div>');
		redirect('admin/bidan');
	}
	public function jadwal()
	{
		$this->db->delete('jadwal', ['kd_jadwal' => $_POST['kd_jadwal']]);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berhasil Menghapus Data Jadwal!</div>');
		redirect('admin/jadwal');
	}
	public function kegiatan()
	{
		$this->db->delete('kegiatan', ['kd_kegiatan' => $this->input->post('kd_kegiatan')]);
		unlink(FCPATH . 'assets_posyandu/img/kegiatan/' . $this->input->post('foto_kegiatan'));
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berhasil Menghapus Data Kegiatan!</div>');
		redirect('admin/kegiatan');
	}
	public function anggota()
	{
		$this->db->delete('anggota', ['kd_anggota' => $this->input->post('kd_anggota')]);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berhasil Menghapus Data Anggota!</div>');
		redirect('admin/anggota');
	}
	public function data_penimbang()
	{
		$this->db->delete('penimbangan', ['kd_penimbang' => $this->input->post('kd_penimbang')]);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berhasil Menghapus Data Penimbangan!</div>');
		redirect('admin/data_penimbang');
	}
	public function pmt()
	{
		$this->db->delete('status_pmt', ['kd_pmt' => $this->input->post('kd_pmt')]);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berhasil Menghapus Data PMT!</div>');
		redirect('admin/pmt');
	}
	public function data_imunisasi()
	{
		$this->db->delete('imunisasi', ['kd_imunisasi' => $this->input->post('kd_imunisasi')]);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berhasil Menghapus Data Imunisasi!</div>');
		redirect('admin/imunisasi');
	}
	public function admin()
	{
		$hapus = $this->db->delete('admin', ['kd_admin' => $this->input->post('kd_admin')]);
		if ($hapus) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menghapus Data Admin!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menghapus Data Admin!</div>');
		}
		redirect('admin/tambah_admin');
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