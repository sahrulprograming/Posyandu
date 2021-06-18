<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_status_login();
		$this->load->library('form_validation');
		$this->load->model('Admin_model', 'admin_model');
		$this->load->model('Akun_model', 'akun_model');
		$this->data_admin = $this->admin_model->data_admin();
		$this->jadwal = $this->akun_model->data_jadwal();
		$this->kegiatan = $this->akun_model->data_kegiatan();
		$this->data_ortu = $this->admin_model->data_ortu();
	}

	public function index()
	{
		$data['jadwal'] = $this->admin_model->jadwal_hari_ini();
		$data['title'] = 'Dasboard | Posyandu';
		$data['profile'] = $this->data_admin;
		$data['kegiatan'] = $this->kegiatan;
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('template/rightbar', $data);
		$this->load->view('template/footer');
	}
	public function orang_tua()
	{
		$data['title'] = 'Data Orang Tua | Posyandu';
		$data['profile'] = $this->data_admin;
		$data['orang_tua'] = $this->data_ortu;
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/orang_tua', $data);
		$this->load->view('template/rightbar', $data);
		$this->load->view('template/footer');
	}
	public function balita($value = '')
	{
		$data['title'] = 'Data Balita | Posyandu';
		$data['profile'] = $this->data_admin;
		$data['balita'] = $this->admin_model->profile_balita();
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/balita');
		$this->load->view('template/rightbar', $data);
		$this->load->view('template/footer');
	}
	public function bidan($value = '')
	{
		$data['title'] = 'Data Bidan | Posyandu';
		$data['profile'] = $this->data_admin;
		$data['bidan'] = $this->admin_model->data_bidan();
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/bidan', $data);
		$this->load->view('template/rightbar', $data);
		$this->load->view('template/footer');
	}
	public function pmt($value = '')
	{
		$data['title'] = 'Data PMT | Posyandu';
		$data['profile'] = $this->data_admin;
		$data['data_kas_pmt'] = $this->admin_model->data_kas_pmt();
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/pmt', $data);
		$this->load->view('template/rightbar', $data);
		$this->load->view('template/footer');
	}
	public function data_penimbang()
	{
		$data['title'] = 'Data Penimbang | Posyandu';
		$data['profile'] = $this->data_admin;
		$data['penimbang'] = $this->admin_model->data_penimbang();
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/data_penimbang');
		$this->load->view('template/rightbar', $data);
		$this->load->view('template/footer');
	}
	public function visi_misi($value = '')
	{
		$this->load->view('admin/visi_misi');
	}
	public function laporan_posyandu($value = '')
	{
		$data['title'] = 'Laporan Posyandu | Posyandu';
		$data['profile'] = $this->data_admin;
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/laporan_posyandu', $data);
		$this->load->view('template/rightbar', $data);
		$this->load->view('template/footer');
	}

	public function jadwal($value = '')
	{
		$data['title'] = 'Jadwal Posyandu | Posyandu';
		$data['profile'] = $this->data_admin;
		$data['jadwal'] = $this->admin_model->data_jadwal();
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/jadwal');
		$this->load->view('template/rightbar', $data);
		$this->load->view('template/footer');
	}

	// Imunisasi
	public function imunisasi($value = '')

	{
		$data['title'] = 'Imunisasi | Posyandu';
		$data['profile'] = $this->data_admin;
		$data['imunisasi'] = $this->admin_model->data_imunisasi();
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/imunisasi', $data);
		$this->load->view('template/rightbar', $data);
		$this->load->view('template/footer');
	}


	// kegiatan
	public function kegiatan()
	{
		$data['title'] = 'Kegiatan | Posyandu';
		$data['profile'] = $this->data_admin;
		$data['kegiatan'] = $this->kegiatan;
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/kegiatan', $data);
		$this->load->view('template/rightbar', $data);
		$this->load->view('template/footer');
	}
	public function upload_kegiatan()
	{

		$this->form_validation->set_rules('judul', 'Judul', 'required');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Kegiatan | Posyandu';
			$data['profile'] = $this->data_admin;
			$data['kegiatan'] = $this->kegiatan;
			$this->load->view('template/header', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/kegiatan');
			$this->load->view('template/rightbar', $data);
			$this->load->view('template/footer');
		} else {
			$gambar = $_FILES['gambar']['name'];
			if ($gambar) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '2048';
				$config['upload_path'] = './assets_posyandu/img/kegiatan/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('gambar')) {
					$nama_gambar = $this->upload->data('file_name');
					$this->admin_model->posting_kegiatan($_POST, $nama_gambar);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil posting kegiatan!</div>');
					redirect('admin/kegiatan');
				} else {
					echo $this->upload->display_errors();
				}
			} else {
				redirect('admin/kegiatan');
			}
		}
	}
	public function anggota($value = '')
	{
		$data['title'] = 'Anggota | Posyandu';
		$data['profile'] = $this->data_admin;
		$data['anggota'] = $this->admin_model->data_anggota();
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/anggota');
		$this->load->view('template/rightbar', $data);
		$this->load->view('template/footer');
	}
	public function coba()
	{
		$data['title'] = 'Data PMT | Posyandu';
		$data['profile'] = $this->data_admin;
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/coba');
		$this->load->view('template/rightbar', $data);
		$this->load->view('template/footer');
	}
}
