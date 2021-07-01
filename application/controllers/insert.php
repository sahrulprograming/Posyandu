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
			'no_tlpn' => $_POST['no_tlpn'],
			'foto' => 'default-P.jpg',
			'email' => $_POST['email'],
			'password' => password_hash('mawar20', PASSWORD_DEFAULT)
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
		$role = $this->session->userdata('role');
		$data = [
			'no_kk' => $_POST['no_kk'],
			'nik' => $_POST['nik'],
			'nama' => $_POST['nama'],
			'alamat' => $_POST['alamat'],
			'no_tlpn' => $_POST['no_tlpn'],
			'foto' => 'default-P.jpg',
			'email' => $_POST['email'],
			'password' => password_hash('mawar20', PASSWORD_DEFAULT),
			'status' => 'aktif'
		];
		$this->db->insert('orang_tua', $data);
		$result = $this->db->affected_rows();
		if ($result > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambah Data Orang Tua!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambah Data Orang Tua!</div>');
		}
		if (strtolower($role) == 'anggota') {
			redirect('anggota/orang_tua');
		} else {
			redirect('admin/orang_tua');
		}
	}
	public function balita()
	{
		$role = $this->session->userdata('role');
		$result = $this->db->get_where('bidan', ['nama' => $_POST['nama_bidan']])->row_array();
		$kd_bidan = $result['kd_bidan'];
		$kd_ortu = get_kd_ortu($this->input->post('nama_ortu'));
		$data = [
			'nik' => $_POST['nik'],
			'nama' => $_POST['nama'],
			'jenis_kelamin' => $_POST['jenis_kelamin'],
			'nik' => $_POST['nik'],
			'tgl_lahir' => $_POST['tgl_lahir'],
			'kd_bidan' => $kd_bidan,
			'kd_ortu' => $kd_ortu,
		];
		$this->db->insert('balita', $data);
		$result = $this->db->affected_rows();
		if ($result > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambah Data Balita!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambah Data Balita!</div>');
		}
		if (strtolower($role) == 'anggota') {
			redirect('anggota/balita');
		} else {
			redirect('admin/balita');
		}
	}
	public function jadwal()
	{
		// $arr = explode('-', $_POST['tgl_lahir']);
		// $tgl_lahir = $arr[2] . '-' . $arr[1] . '-' . $arr[0];
		$data = [
			'kas_PMT' => $_POST['kas_PMT'],
			'tanggal' => $_POST['tanggal'],
			'tempat' => $_POST['tempat'],
			'jam_mulai' => $_POST['jam_mulai'],
			'jam_selesai' => $_POST['jam_selesai'],
			'dibuat_pada' => $_POST['dibuat_pada'],
			'keterangan' => $_POST['keterangan'],
			'kd_admin' => $_POST['kd_admin'],
		];
		$this->db->insert('jadwal', $data);
		$result = $this->db->affected_rows();
		if ($result > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambah Data Jadwal!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambah Data Jadwal!</div>');
		}
		redirect('admin/jadwal');
	}
	public function status_pmt()
	{
		$sudah_bayar = $this->db->get_where('status_pmt', ['kd_jadwal' => $_POST['kd_jadwal'], 'kd_ortu' => $_POST['kd_ortu']])->row_array();
		if ($sudah_bayar) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda Sudah Bayar Menunggu Konfirmasi Admin!</div>');
			redirect('akun/jadwal_posyandu');
		} else {
			$jumlah_balita = $this->db->get_where('balita', ['kd_ortu' => $_POST['kd_ortu']])->num_rows();
			$data = [
				'status_bayar' => $_POST['status'],
				'kd_jadwal' => $_POST['kd_jadwal'],
				'kd_ortu' => $_POST['kd_ortu'],
				'jml_balita' => $jumlah_balita
			];
			$this->db->insert('status_pmt', $data);
			$result = $this->db->affected_rows();
			if ($result > 0) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pembayaran Menunggu Konfirmasi Silahkan sentuh Hubungi Admin!</div>');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Bayar!</div>');
			}
			redirect('akun/jadwal_posyandu');
		}
	}
	public function antrian()
	{
		ini_set('date.timezone', 'Asia/Jakarta');
		$jadwal = $this->db->get_where('jadwal', ['kd_jadwal' => $_POST['kd_jadwal']])->row_array();
		if ($jadwal['tanggal'] == date('Y-m-d') and date("h:i:s") >= $jadwal['jam_mulai'] and date("h:i:s") <= $jadwal['jam_selesai']) {
			$kd_ortu = $this->session->userdata('kd_ortu');
			$sudah_antri = $this->db->get_where('antrian', ['kd_jadwal' => $_POST['kd_jadwal'], 'kd_ortu' => $kd_ortu])->row_array();
			if ($sudah_antri) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda Sudah Antri</div>');
				redirect('akun/jadwal_posyandu');
				exit;
			}
			$kd_jadwal = $_POST['kd_jadwal'];
			$antrian = $this->db->query("SELECT no_antrian FROM antrian WHERE kd_jadwal = $kd_jadwal ORDER BY no_antrian DESC LIMIT 1")->row_array();
			$antrian_baru = $antrian['no_antrian'] + 1;
			if (!$antrian) {
				$antrian_baru = 1;
			}
			$data = [
				'no_antrian' => $antrian_baru,
				'kd_ortu' => $kd_ortu,
				'kd_jadwal' => $_POST['kd_jadwal']
			];
			$this->db->insert('antrian', $data);
			$result = $this->db->affected_rows();
			if ($result > 0) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil membuat no antrian!</div>');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal antri!</div>');
			}
			redirect('akun/jadwal_posyandu');
		} elseif ($jadwal['tanggal'] < date('Y-m-d')) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Sudah Lewat!</div>');
			redirect('akun/jadwal_posyandu');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Belum Mulai!</div>');
			redirect('akun/jadwal_posyandu');
		}
	}

	public function anggota()
	{
		$data = [
			'nik' => $this->input->post('nik'),
			'nama' => $this->input->post('nama'),
			'posisi' => $this->input->post('posisi'),
			'alamat' => $this->input->post('alamat'),
			'no_tlpn' => $this->input->post('no_tlpn'),
			'foto' => 'default-P.jpg',
			'email' => $this->input->post('email'),
			'password' => password_hash('mawar20', PASSWORD_DEFAULT),
		];
		$this->db->insert('anggota', $data);
		$result = $this->db->affected_rows();
		if ($result > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambah Anggota!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menambah Anggota!</div>');
		}
		redirect('admin/anggota');
	}
	public function penimbang()
	{
		$balita = $this->db->get_where('balita', ['nama' => $this->input->post('nama_balita')])->row_array();
		$data = [
			'bb' => $this->input->post('bb'),
			'tb' => $this->input->post('tb'),
			'keluhan' => $this->input->post('keluhan'),
			'tanggal' => date("Y-m-d"),
			'kd_balita' => $balita['kd_balita']
		];
		$this->db->insert('penimbangan', $data);
		$result = $this->db->affected_rows();
		if ($result > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambah data Penimbangan!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menambah data Penimbangan!</div>');
		}
		redirect('admin/data_penimbang');
	}
	public function data_imunisasi()
	{
		$balita = $this->db->get_where('balita', ['nama' => $this->input->post('nama_balita')])->row_array();
		if ($balita) {
			$data = [
				'jenis_imunisasi' => $this->input->post('jenis_imunisasi'),
				'keterangan' => $this->input->post('keterangan'),
				'tanggal' => date("Y-m-d"),
				'kd_balita' => $balita['kd_balita']
			];
			$this->db->insert('imunisasi', $data);
			$result = $this->db->affected_rows();
			if ($result > 0) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambah data imunisasi!</div>');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menambah data imunisasi!</div>');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tolong Pilih Balita!</div>');
		}
		redirect('admin/imunisasi');
	}
	public function bayar_pmt()
	{
		$nominal = $this->input->post('nominal');
		$cek_bayar = $this->db->get_where('status_pmt', ['kd_ortu' => $this->input->post('kd_ortu'), 'kd_jadwal' => $this->input->post('kd_jadwal')])->row_array();
		if (!$cek_bayar) {
			if ($nominal != 0) {
				$data = [
					'tgl_bayar' => date("Y-m-d"),
					'status_bayar' => 'lunas',
					'kd_jadwal' => $this->input->post('kd_jadwal'),
					'kd_ortu' => $this->input->post('kd_ortu'),
					'jml_balita' => $this->input->post('jml_balita')
				];
				$this->db->insert('status_pmt', $data);
				$result = $this->db->affected_rows();
				if ($result > 0) {
					$status_pmt = $this->db->get_where('status_pmt', ['kd_jadwal' => $this->input->post('kd_jadwal'), 'kd_ortu' => $this->input->post('kd_ortu')])->row_array();
					$kas_pmt = [
						'kd_pmt' => $status_pmt['kd_pmt'],
						'nominal_masuk' => $this->input->post('nominal'),
						'nominal_keluar' => 0
					];
					$result = $this->db->insert('kas_pmt', $kas_pmt);
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Bayar PMT!</div>');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Bayar PMT!</div>');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nominal Kosong!</div>');
			}
		} else {
			$status = $cek_bayar['status_bayar'];
			if ($status == "menunggu") {
				$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Orang Tua Sudah Bayar Status Menunggu!</div>');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Orang Tua Sudah Lunas Pada Jadwal ini!</div>');
			}
		}
		redirect('admin/pmt');
	}
	public function kehadiran()
	{
		$data = [
			'kd_jadwal' => $this->input->post('kd_jadwal'),
			'kd_ortu' => $this->input->post('kd_ortu'),
			'keterangan' => $this->input->post('keterangan'),
			'status' => "hadir"
		];
		$this->db->insert('kehadiran', $data);
		$result = $this->db->affected_rows();
		if ($result > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Input Hadir!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Gagal Input Hadir!</div>');
		}
		redirect('admin');
	}
	public function tidak_hadir()
	{
		$data = [
			'kd_jadwal' => $this->input->post('kd_jadwal'),
			'kd_ortu' => $this->input->post('kd_ortu'),
			'keterangan' => $this->input->post('keterangan'),
			'status' => "tidak hadir"
		];
		$this->db->insert('kehadiran', $data);
		$result = $this->db->affected_rows();
		if ($result > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Input Tidak Hadir!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Gagal Input Tidak Hadir!</div>');
		}
		redirect('admin');
	}
	public function kas_keluar()
	{
		$kas = $this->input->post('total_kas');
		$kas_keluar = $this->input->post('nominal_keluar');
		if ($kas >= $kas_keluar) {
			$data = [
				'nominal_keluar' => 0,
				'nominal_keluar' => $kas_keluar,
				'keterangan' => $this->input->post('keterangan')
			];
			$this->db->insert('kas_pmt', $data);
			$result = $this->db->affected_rows();
			if ($result > 0) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Input data kas keluar!</div>');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Input kas keluar!</div>');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Uang Kas Kurang!</div>');
		}
		redirect('admin/kas_pmt');
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