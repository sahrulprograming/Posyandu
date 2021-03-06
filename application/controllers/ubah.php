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
		$role = $this->session->userdata('role');
		$data = [
			'nik' => $this->input->post('nik'),
			'no_kk' => $this->input->post('no_kk'),
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_tlpn' => $this->input->post('no_tlpn'),
			'status' => $this->input->post('status'),
			'email' => $this->input->post('email')
		];
		$this->db->where('kd_ortu', $this->input->post('kd_ortu'));
		$this->db->update('orang_tua', $data);
		$result = $this->db->affected_rows();
		if ($result > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Rubah Data Orang Tua!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Rubah Data Orang Tua!</div>');
		}
		if (strtolower($role) == 'anggota') {
			redirect('anggota/orang_tua');
		} else {
			redirect('admin/orang_tua');
		}
	}
	public function Bidan()
	{
		$data = [
			'nik' => $this->input->post('nik'),
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'email' => $this->input->post('email'),
			'no_tlpn' => $this->input->post('no_tlpn')
		];
		$this->db->where('kd_bidan', $this->input->post('kd_bidan'));
		$this->db->update('bidan', $data);
		$result = $this->db->affected_rows();
		if ($result > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Rubah Data Bidan!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Rubah Data Bidan!</div>');
		}
		redirect('admin/bidan');
	}
	public function profile()
	{
		$role = $this->session->userdata('role');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$no_tlpn = $this->input->post('no_tlpn');
		$foto = $_FILES['foto']['name'];
		if (strtolower($role) == 'admin') {
			$table = 'admin';
			$field = 'kd_admin';
			$value = $this->session->userdata('kd_admin');
		} elseif (strtolower($role) == 'bidan') {
			$table = 'bidan';
			$field = 'kd_bidan';
			$value = $this->session->userdata('kd_bidan');
		} elseif (strtolower($role) == 'anggota') {
			$table = 'anggota';
			$field = 'kd_anggota';
			$value = $this->session->userdata('kd_anggota');
		} else {
			$table = 'orang_tua';
			$field = 'kd_ortu';
			$value = $this->session->userdata('kd_ortu');
		}
		if ($foto) {
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']     = '2048';
			$config['upload_path'] = './assets_posyandu/img/profile/';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto')) {
				$data_profile = $this->db->get_where($table, [$field => $value])->row_array();
				$foto_lama = $data_profile['foto'];
				if ($foto_lama != "default-P.jpg") {
					unlink(FCPATH . 'assets_posyandu/img/profile/' . $foto_lama);
				}
				$foto = $this->upload->data('file_name');
				$this->db->set('foto', $foto);
			} else {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
				if (strtolower($role) == 'user') {
					redirect('akun');
				} else {
					redirect('admin');
				}
			}
		}
		$this->db->set('nama', $nama);
		$this->db->set('email', $email);
		$this->db->set('alamat', $alamat);
		$this->db->set('no_tlpn', $no_tlpn);
		$this->db->where($field, $value);
		$this->db->update($table);
		$result = $this->db->affected_rows();
		if ($result > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Rubah Profile!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Gagal Rubah Profile!</div>');
		}
		if (strtolower($role) == 'user' or strtolower($role) == 'anggota') {
			redirect('akun');
		} else {
			redirect('admin');
		}
	}
	public function password()
	{
		$role = $this->session->userdata('role');
		$password_lama = $this->input->post('password_lama');
		$password_baru = $this->input->post('password_baru');
		$password_konfirmasi = $this->input->post('password_konfirmasi');
		if (strtolower($role) == 'admin') {
			$table = 'admin';
			$field = 'kd_admin';
			$value = $this->session->userdata('kd_admin');
		} elseif (strtolower($role) == 'bidan') {
			$table = 'bidan';
			$field = 'kd_bidan';
			$value = $this->session->userdata('kd_bidan');
		} elseif (strtolower($role) == 'anggota') {
			$table = 'anggota';
			$field = 'kd_anggota';
			$value = $this->session->userdata('kd_anggota');
		} else {
			$table = 'orang_tua';
			$field = 'kd_ortu';
			$value = $this->session->userdata('kd_ortu');
		}
		$profile = $this->db->get_where($table, [$field => $value])->row_array();
		if (password_verify($password_lama, $profile['password'])) {
			if (!password_verify($password_baru, $profile['password'])) {
				if ($password_baru === $password_konfirmasi) {
					$data = [
						'password' => password_hash(
							$password_baru,
							PASSWORD_DEFAULT
						)
					];
					$this->db->where($field, $value);
					$this->db->update($table, $data);
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Berhasil di Rubah!</div>');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Konfirmasi salah</div>');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Baru sama dengan Password Lama</div>');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Lama Salah</div>');
		}
		if (strtolower($role) == 'user' or strtolower($role) == 'anggota') {
			redirect('akun');
		} else {
			redirect('admin');
		}
	}
	public function balita()
	{
		$role = $this->session->userdata('role');
		$kd_ortu = $this->db->get_where('orang_tua', ['nama' => $this->input->post('nama_ortu')])->row_array();
		$kd_ortu = $kd_ortu['kd_ortu'];
		$kd_bidan = $this->db->get_where('bidan', ['nama' => $this->input->post('nama_bidan')])->row_array();
		$kd_bidan = $kd_bidan['kd_bidan'];
		$data = [
			'kd_balita' => $this->input->post('kd_balita'),
			'nama' => $this->input->post('nama'),
			'nik' => $this->input->post('nik'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
		];
		$relasi_balita = [
			'kd_ortu' => $kd_ortu,
			'kd_bidan' => $kd_bidan
		];
		$this->db->where('kd_balita', $this->input->post('kd_balita'));
		$this->db->update('balita', $data);
		$result = $this->db->affected_rows();
		$this->db->where('kd_balita', $this->input->post('kd_balita'));
		$this->db->update('relasi_balita', $relasi_balita);
		$result1 = $this->db->affected_rows();
		if ($result > 0 || $result1 > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Rubah Data Balita!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Rubah Data Balita!</div>');
		}
		if (strtolower($role) == 'anggota') {
			redirect('anggota/balita');
		} else {
			redirect('admin/balita');
		}
	}
	public function jadwal()
	{
		$data = [
			'kas_PMT' => $this->input->post('kas_PMT'),
			'tanggal' => $this->input->post('tanggal'),
			'tempat' => $this->input->post('tempat'),
			'jam_mulai' => $this->input->post('jam_mulai'),
			'jam_selesai' => $this->input->post('jam_selesai'),
			'keterangan' => $this->input->post('keterangan')
		];
		$this->db->where('kd_jadwal', $this->input->post('kd_jadwal'));
		$this->db->update('jadwal', $data);
		$result = $this->db->affected_rows();
		if ($result > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Rubah Data Jadwal!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Rubah Data Jadwal!</div>');
		}
		redirect('admin/jadwal');
	}
	public function kegiatan()
	{
		$data_kegiatan = $this->db->get_where('kegiatan', ['kd_kegiatan' => $this->input->post('kd_kegiatan')])->row_array();
		$nama_gambar = $data_kegiatan['foto_kegiatan'];

		// Cek Gambar
		$foto_kegiatan = $_FILES['foto_kegiatan']['name'];

		if ($foto_kegiatan) {
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']     = '2048';
			$config['upload_path'] = './assets_posyandu/img/kegiatan/';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto_kegiatan')) {
				$gambar_lama = $data_kegiatan['foto_kegiatan'];
				unlink(FCPATH . 'assets_posyandu/img/kegiatan/' . $gambar_lama);
				$nama_gambar = $this->upload->data('file_name');
			} else {
				echo $this->upload->display_errors();
			}
		}
		$data = [
			'foto_kegiatan' => "$nama_gambar",
			'judul' => $this->input->post('judul'),
			'keterangan' => $this->input->post('keterangan'),
		];
		$this->db->where('kd_kegiatan', $this->input->post('kd_kegiatan'));
		$this->db->update('kegiatan', $data);
		$result = $this->db->affected_rows();
		if ($result > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Rubah Data kegiatan!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Rubah Data kegiatan!</div>');
		}
		redirect('admin/kegiatan');
	}
	public function anggota()
	{
		$data = [
			'nik' => $this->input->post('nik'),
			'nama' => $this->input->post('nama'),
			'posisi' => $this->input->post('posisi'),
			'alamat' => $this->input->post('alamat'),
			'no_tlpn' => $this->input->post('no_tlpn'),
			'email' => $this->input->post('email'),
		];
		$this->db->where('kd_anggota', $this->input->post('kd_anggota'));
		$this->db->update('anggota', $data);
		$result = $this->db->affected_rows();
		if ($result > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Rubah Data anggota!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Rubah Data anggota!</div>');
		}
		redirect('admin/anggota');
	}
	public function data_penimbang()
	{
		$balita = $this->db->get_where('balita', ['nama' => $this->input->post('nama_balita')])->row_array();
		$data = [
			'bb' => $this->input->post('bb'),
			'tb' => $this->input->post('tb'),
			'keluhan' => $this->input->post('keluhan'),
			'kd_balita' => $balita['kd_balita'],
		];
		$this->db->where('kd_penimbang', $this->input->post('kd_penimbang'));
		$this->db->update('penimbangan', $data);
		$result = $this->db->affected_rows();
		if ($result > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Rubah Data Penimbangan!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Rubah Data Penimbangan!</div>');
		}
		redirect('admin/data_penimbang');
	}
	public function konfirmasi()
	{
		$data = [
			'status_bayar' => 'lunas',
			'tgl_bayar' => date('Y-m-d')
		];
		$this->db->where('kd_pmt', $this->input->post('kd_pmt'));
		$this->db->update('status_pmt', $data);
		$result = $this->db->affected_rows();
		if ($result > 0) {
			$this->db->join('jadwal', 'status_pmt.kd_jadwal=jadwal.kd_jadwal');
			$pmt = $this->db->get_where('status_pmt', ['kd_pmt' => $this->input->post('kd_pmt')])->row_array();
			$kas_pmt = [
				'kd_pmt' => $pmt['kd_pmt'],
				'nominal_masuk' => $pmt['kas_PMT'] * $pmt['jml_balita'],
				'nominal_keluar' => 0
			];
			$this->db->insert('kas_pmt', $kas_pmt);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pembayaran Berhasil Dikonfirmasi!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pembayaran Gagal Dikonfirmasi!</div>');
		}
		redirect('admin/pmt');
	}
	public function data_imunisasi()
	{
		$data = [
			'jenis_imunisasi' => $this->input->post('jenis_imunisasi'),
			'keterangan' => $this->input->post('keterangan'),
		];
		$this->db->where('kd_imunisasi', $this->input->post('kd_imunisasi'));
		$this->db->update('imunisasi', $data);
		$result = $this->db->affected_rows();
		if ($result > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Merubah Data imunisasi!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Merubah Data imunisasi!</div>');
		}
		redirect('admin/imunisasi');
	}
	public function pmt()
	{
		$data = [
			'status_bayar' => $this->input->post('status_bayar')
		];
		$this->db->where('kd_pmt', $this->input->post('kd_pmt'));
		$this->db->update('status_pmt', $data);
		$result = $this->db->affected_rows();
		if ($result > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Merubah Data PMT!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Merubah Data PMT!</div>');
		}
		redirect('admin/pmt');
	}
	public function user_balita()
	{
		$nik = $this->input->post('nik');
		$data = [
			'nama' => $this->input->post('nama'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tgl_lahir' => $this->input->post('tgl_lahir')
		];
		$this->db->set($data);
		$this->db->where('nik', $nik);
		$this->db->update('balita');
		$result = $this->db->affected_rows();
		if ($result > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Merubah Data Balita!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Merubah Data Balita!</div>');
		}
		redirect('akun/balita');
	}
	public function hadir()
	{
		$kd_kehadiran = $this->input->post('kd_kehadiran');
		$data = [
			'keterangan' => $this->input->post('keterangan'),
			'status' => "hadir"
		];
		$this->db->set($data);
		$this->db->where('kd_kehadiran', $kd_kehadiran);
		$this->db->update('kehadiran');
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
		$kd_kehadiran = $this->input->post('kd_kehadiran');
		$data = [
			'keterangan' => $this->input->post('keterangan'),
			'status' => "tidak hadir"
		];
		$this->db->set($data);
		$this->db->where('kd_kehadiran', $kd_kehadiran);
		$this->db->update('kehadiran');
		$result = $this->db->affected_rows();
		if ($result > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Input Tidak Hadir!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Gagal Input Tidak Hadir!</div>');
		}
		redirect('admin');
	}
	public function kehadiran_bidan()
	{
		$status = $this->input->post('status_kehadiran');
		if ($status) {
			$data = [
				'status_kehadiran' => $status,
				'keterangan' => $this->input->post('keterangan')
			];
			$this->db->set($data);
			$this->db->where('kd_jadwal', $this->input->post('kd_jadwal'));
			$this->db->where('kd_bidan', $this->session->userdata('kd_bidan'));
			$this->db->update('kehadiran_bidan');
			$result = $this->db->affected_rows();
			if ($result > 0) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Input Tidak Hadir!</div>');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Gagal Input Tidak Hadir!</div>');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Belum Memilih Status Kehadiran!</div>');
		}
		redirect('bidan');
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