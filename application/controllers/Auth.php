<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model', 'auth_model');
    }
    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email wajib di isi',
            'valid_email' => 'Email yang anda masukkan tidak valid',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = "Posyandu | Login";
            $this->session->set_userdata('notif', false);
            $this->load->view('auth/login', $data);
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        // Mengambil data Email & password yang di input
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $data = $this->auth_model->cek_data_login($email);
        $orang_tua = $data[0];
        $admin = $data[1];
        $bidan = $data[2];
        $balita = $data[3];

        // Jika ada maka menjalankan Fungsi if ini
        if ($orang_tua or $admin or $bidan) {
            // cek pasword Sesuai yang Login 
            if (password_verify($password, $orang_tua['password'])) {
                $nik = $orang_tua['nik'];
                $data = [
                    'kd_ortu' => $orang_tua['kd_ortu'],
                    'role'  => 'User'
                ];
                $this->session->set_userdata($data);
                if ($nik == 0) {
                    redirect('auth/form_data_diri');
                } else {
                    redirect('akun');
                }
            } elseif (password_verify($password, $admin['password'])) {
                $data = [
                    'kd_admin' => $admin['kd_admin'],
                    'role'  => 'Admin'
                ];
                $this->session->set_userdata($data);
                redirect('admin');
            } elseif (password_verify($password, $bidan['password'])) {
                $data = [
                    'kd_bidan' => $bidan['kd_bidan'],
                    'role'  => 'Bidan'
                ];
                $this->session->set_userdata($data);
                redirect('bidan');
            }
            // Else Jika Password Salah
            else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah</div>');
                redirect('auth/login');
            }
        }
        // Else Jika email Tidak Ditemukan
        else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar</div>');
            redirect('auth/login');
        }
    }

    public function form_data_diri()
    {
        $this->form_validation->set_rules('nama_lengkap', 'Nama_Lengkap', 'required|trim', [
            'required' => 'Bidang ini wajib di isi'
        ]);
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric|trim|max_length[16]|is_unique[orang_tua.nik]', [
            'required' => 'Bidang ini wajib di isi',
            'numeric' => 'Wajib berisi isi angka',
            'is_unique' => 'NIK sudah terdaftar'
        ]);
        $this->form_validation->set_rules('nkk', 'NKK', 'required|numeric|trim', [
            'required' => 'Bidang ini wajib di isi',
            'numeric' => 'Wajib berisi isi angka'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Bidang ini wajib di isi'
        ]);
        $this->form_validation->set_rules('nohp', 'Nohp', 'required|numeric|trim', [
            'required' => 'Bidang ini wajib di isi',
            'numeric' => 'Wajib berisi isi angka'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = "Posyandu | Form data Diri";
            $this->session->set_userdata('notif', false);
            $this->load->view('auth/FormDataDiri', $data);
        } else {
            $kd_ortu = $this->session->userdata('kd_ortu');
            $this->auth_model->tambah_data_diri($kd_ortu);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
            redirect('akun');
        }
    }

    // Function Untuk Pendaftaran Akun dengan email
    public function registrasi()
    {
        // Validation email yang di input
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[orang_tua.email]', [
            'required' => 'Email wajib di isi',
            'valid_email' => 'Email yang anda masukkan tidak valid',
            'is_unique' => 'Email sudah terdaftar'
        ]);
        // Validation Password yang di input
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'min_length' => 'Password minimal 6 charackter',
            'required' => 'Bidang ini wajib di isi',
            'matches' => 'Password konfirmasi tidak sama!'
        ]);
        // Validation Password Konfirmasi yang di input
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|min_length[6]|matches[password]', [
            'matches' => 'Password konfirmasi tidak sama!',
            'required' => 'Bidang ini wajib di isi',
            'matches' => 'Password konfirmasi tidak sama!'
        ]);
        // Jika Validation Gagal maka Akan Refresh web
        if ($this->form_validation->run() == false) {
            $data['title'] = "Posyandu | Registrasi";
            $this->session->set_userdata('notif', false);
            $this->load->view('auth/register', $data);
        }
        // Jika Berhasil Validasi Maka Data di masukan ke database dan kembali ke Halaman Login
        else {
            $this->auth_model->tambah_user();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat Pendaftaran Berhasil. Silahkan Login!</div>');
            redirect('auth/login');
        }
    }

    // Function Logout Akan membersihakan Data session
    public function logout()
    {
        $this->session->unset_userdata('kd_ortu');
        $this->session->unset_userdata('kd_admin');
        $this->session->unset_userdata('kd_bidan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Logout</div>');
        redirect('auth/login');
    }
}
