<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	
	public function index()
	{
		$this->session->set_userdata('notif',false);
		$this->load->view('login');
	}

	public function index2()
	{
		$this->session->set_userdata('notif',true);
		$this->load->view('login');
	}

	public function registrasi($value='')
	{
		$this->session->set_userdata('notif',false);
        $this->load->view('user/daftar');
	}

	public function registrasi2($value='')
	{
		$this->session->set_userdata('notif',true);
        $this->load->view('user/daftar');
	}

	public function in_member($value='')
	{
		print_r($_POST);
		$nik = $_POST['nik'];
		$no_kk = $_POST['no_kk'];
		$no_tlpn = $_POST['no_tlpn'];

			//cek apakah nik telah terdaftar 
		$valnik = $this->model->ortu(" where nik = '$nik'");
		foreach ($valnik as $key => $vls) {
			$this->session->set_userdata('notif',true);
				$this->session->set_userdata('notifikasi','Nik sudah terdaftar');
			return redirect('/login/registrasi2');
		}

			//cek apakah KK telah terdaftar 
		$valkk = $this->model->ortu(" where no_kk = '$no_kk'");
		foreach ($valkk as $key => $vls) {
			$this->session->set_userdata('notif',true);
				$this->session->set_userdata('notifikasi','kk sudah terdaftar');
			return redirect('/login/registrasi2');
		}

			//cek apakah no tlp telah terdaftar 
		$valkk = $this->model->ortu(" where no_tlpn = '$no_tlpn'");
		foreach ($valkk as $key => $vls) {
			$this->session->set_userdata('notif',true);
				$this->session->set_userdata('notifikasi','no telephon sudah terdaftar');
			return redirect('/login/registrasi2');
		}


		if ($_POST['password'] != $_POST['password2']) {
			$this->session->set_userdata('notif',true);
				$this->session->set_userdata('notifikasi','Konfirmasi password anda salah');
			return redirect('/login/registrasi2');
		}

		

		for ($i=7; $i <=7 ; $i++) { 
			$kode = date('ym').rand(1000,9999);
			$valnik = $this->model->ortu(" where kd_ortu = '$kode'");
			foreach ($valnik as $key => $value) {
				$i=0;
			}
		}

		$insert = array(
			'kd_ortu' => $kode,
			'nik' => $_POST['nik'],
			'no_kk' => $_POST['no_kk'],
			'nama' => $_POST['nama'],
			'alamat' => $_POST['alamat'],
			'no_tlpn' => $_POST['no_tlpn'], 
			'password' => $_POST['password'], 
			'status' => 'proses'

			);
		$this->model->insert('orang_tua',$insert);
		return redirect('/login/');

	}

	public function inLogin($value='')
	{
		$kode = $_POST['nik'];
		$valnik = $this->model->ortu(" where nik = '$kode'");

		foreach ($valnik as $val) {
			if ($val['password'] == $_POST['password']) {
				
				$this->session->set_userdata('kd_ortu',$val['kd_ortu']);
			return redirect('/akun/');
			}
		}

		$this->session->set_userdata('notif',true);
				$this->session->set_userdata('notifikasi','NIK atau password anda salah');
			return redirect('/login/index2');
	}
}
