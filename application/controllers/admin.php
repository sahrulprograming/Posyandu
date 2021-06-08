<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{


	public function index()
	{
		$this->load->view('admin/index');
	}
	public function bidan($value = '')
	{
		$bidan = $this->model->bidan();
		$this->load->view('admin/bidan', array('bidan' => $bidan));
	}
	public function anggota($value = '')
	{
		$this->load->view('admin/anggota');
	}
	public function jadwal($value = '')
	{
		$this->load->view('admin/jadwal');
	}
	public function visi_misi($value = '')
	{
		$this->load->view('admin/visi_misi');
	}
	public function laporan_posyandu($value = '')
	{
		$this->load->view('admin/laporan_posyandu');
	}
	public function balita($value = '')
	{
		$this->load->view('admin/balita');
	}
	public function pmt($value = '')
	{
		$this->load->view('admin/pmt');
	}


	public function data_penimbang_bayi($value = '')
	{
		$this->load->view('admin/data_penimbang_bayi');
	}
	public function imunisasi($value = '')

	{
		$this->load->view('admin/imunisasi');
	}
	public function orang_tua($value = '')
	{
		$orang_tua = $this->model->orang_tua();

		$this->load->view('admin/orang_tua', array('orang_tua' => $orang_tua));
	}

	public function detailPMT($value = '')
	{
		$this->load->view('admin/detailPMT');
	}
}
