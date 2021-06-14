<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{
        public function __construct()
        {
                parent::__construct();
                cek_status_login();
                $this->load->library('form_validation');
                $this->load->model('Akun_model', 'akun_model');
                $this->data_user = $this->akun_model->data_user();
                $this->balita = $this->data_user[0];
                $this->orang_tua = $this->data_user[1];
                $this->jumlah_balita = $this->akun_model->jumlah_balita();
                $this->jadwal = $this->akun_model->data_jadwal();
                $this->pmt = $this->akun_model->data_pmt();
                $this->kegiatan = $this->akun_model->data_kegiatan();
        }

        public function index()
        {
                $data['profile'] = $this->orang_tua;
                $data['kegiatan'] = $this->kegiatan;
                $data['title'] = 'Home | Posyandu';
                $this->load->view('template/header', $data);
                $this->load->view('template/topbar', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('user/akun/home', $data);
                $this->load->view('template/rightbar', $data);
                $this->load->view('template/footer');
        }
        public function orang_tua()
        {
                $data['profile'] = $this->orang_tua;
                $this->load->view('user/akun/orang_tua', $data);
        }
        public function edit_ortu()
        {
                $this->form_validation->set_rules('nama_lengkap', 'Nama_Lengkap', 'required|trim', [
                        'required' => 'Bidang ini wajib di isi'
                ]);
                $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
                        'required' => 'Bidang ini wajib di isi'
                ]);
                $this->form_validation->set_rules('nohp', 'Nohp', 'numeric|trim', [
                        'numeric' => 'Wajib berisi isi angka'
                ]);
                if ($this->form_validation->run() == false) {
                        $data['profile'] = $this->orang_tua;
                        $this->load->view('user/akun/orang_tua', $data);
                } else {
                        $nik = $this->input->post('nik');
                        $data = [
                                'nama' => $this->input->post('nama_lengkap'),
                                'alamat' => $this->input->post('alamat'),
                                'no_tlpn' => $this->input->post('no_tlpn')
                        ];
                        $this->db->set($data);
                        $this->db->where('nik', $nik);
                        $this->db->update('orang_tua');
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dirubah! </div>');
                        redirect('akun/orang_tua');
                }
        }

        public function balita()
        {
                $data['balita'] = $this->balita;
                $data['profile'] = $this->orang_tua;
                $data['title'] = 'Balita | Posyandu';
                $this->load->view('template/header', $data);
                $this->load->view('template/topbar', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('user/akun/balita', $data);
                $this->load->view('template/rightbar', $data);
                $this->load->view('template/footer');
        }

        public function jadwal_posyandu()
        {
                $data['jadwal'] = $this->jadwal;
                $data['title'] = 'Jadwal | Posyandu';
                $data['profile'] = $this->orang_tua;
                $data['jumlah_balita'] = $this->jumlah_balita;
                $this->load->view('template/header', $data);
                $this->load->view('template/topbar', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('user/akun/jadwal_posyandu', $data);
                $this->load->view('template/rightbar', $data);
                $this->load->view('template/footer');
        }
        public function pmt()
        {
                $data['pmt'] = $this->pmt;
                $data['jumlah_balita'] = $this->jumlah_balita;
                $data['profile'] = $this->orang_tua;
                $data['title'] = 'PMT | Posyandu';
                $this->load->view('template/header', $data);
                $this->load->view('template/topbar', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('user/akun/pmt', $data);
                $this->load->view('template/rightbar', $data);
                $this->load->view('template/footer');
        }
        public function edit_balita()
        {
                $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
                        'required' => 'Bidang ini wajib di isi'
                ]);
                $this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'required|trim', [
                        'required' => 'Bidang ini wajib di isi'
                ]);
                if ($this->form_validation->run() == false) {
                        $data['balita'] = $this->balita;
                        $data['profile'] = $this->orang_tua;
                        $this->load->view('user/akun/balita', $data);
                } else {
                        $this->akun_model->update_balita();
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dirubah! </div>');
                        redirect('akun/balita');
                }
        }
        public function kegiatanposyandu()
        {
                $data['title'] = 'Kegiatan | Posyandu';
                $data['kegiatan'] = $this->kegiatan;
                $data['profile'] = $this->orang_tua;
                $this->load->view('template/header', $data);
                $this->load->view('template/topbar', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('user/akun/kegiatan');
                $this->load->view('template/rightbar', $data);
                $this->load->view('template/footer');
        }
}
