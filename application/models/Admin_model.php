<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function data_admin()
    {
        $role = $this->session->userdata('role');
        if (strtolower($role) == 'admin') {
            $data_login = $this->db->get_where('admin', ['kd_admin' => $this->session->userdata('kd_admin')])->row_array();
        } else {
            $data_login = $this->db->get_where('bidan', ['kd_bidan' => $this->session->userdata('kd_bidan')])->row_array();
        }
        return $data_login;
    }
    public function jadwal_hari_ini()
    {
        $sql = "SELECT * FROM `kehadiran` JOIN jadwal ON `kehadiran`.`kd_jadwal` = `jadwal`.`kd_jadwal` WHERE `kehadiran`.`status` = 'dalam antrian'";
        $result = $this->db->query($sql)->result_array();
        return $result;
    }
    public function posting_kegiatan($data, $nama_gambar)
    {
        $value = [
            'judul' => $data['judul'],
            'foto_kegiatan' => $nama_gambar,
            'keterangan' => $data['keterangan']
        ];
        $this->db->insert('kegiatan', $value);
    }
    public function data_ortu()
    {
        $data_ortu = $this->db->get('orang_tua')->result_array();
        return $data_ortu;
    }
    public function data_bidan()
    {
        $data_bidan = $this->db->get('bidan')->result_array();
        return $data_bidan;
    }
    public function profile_balita()
    {
        $this->db->select('`balita`.`nama` AS `nama_balita`,
        `orang_tua`.`nama` AS `nama_orang_tua`,
        `bidan`.`nama` AS `nama_bidan`,
        `balita`.`nik`,
        `balita`.`tgl_lahir`,
        `balita`.`jenis_kelamin`,
        `balita`.`kd_balita`');
        $this->db->from('relasi_balita');
        $this->db->join('orang_tua', 'relasi_balita.kd_ortu = orang_tua.kd_ortu', 'left');
        $this->db->join('balita', 'relasi_balita.kd_balita = balita.kd_balita', 'left');
        $this->db->join('bidan', 'relasi_balita.kd_bidan = bidan.kd_bidan', 'left');
        $profile_balita = $this->db->get()->result_array();
        return $profile_balita;
    }
    public function data_penimbang()
    {
        $this->db->select('*');
        $this->db->from('penimbangan');
        $this->db->join('balita', 'penimbangan.kd_balita = balita.kd_balita', 'left');
        $profile_balita = $this->db->get()->result_array();
        return $profile_balita;
    }
    public function data_balita()
    {
        $this->db->select('nama');
        $this->db->from('balita');
        $data_balita = $this->db->get()->result_array();
        return $data_balita;
    }
    public function data_jadwal()
    {
        $this->db->select('*');
        $this->db->from('jadwal');
        $this->db->order_by('kd_jadwal', 'DESC');
        $data_jadwal = $this->db->get()->result_array();
        return $data_jadwal;
    }
    public function data_admin_all()
    {
        return $this->db->get('admin')->result_array();
    }
    public function data_anggota()
    {
        $this->db->select('*');
        $this->db->from('anggota');
        $anggota = $this->db->get()->result_array();
        return $anggota;
    }
    public function data_pmt_menunggu($tanggal = "")
    {
        if ($tanggal == "") {
            $data = $this->db->query("SELECT tanggal FROM jadwal ORDER BY kd_jadwal DESC LIMIT 1")->row_array();
            if ($data) {
                $tanggal = tanggal_helper($data['tanggal']);
            } else {
                $tanggal = "00-00-0000";
            }
        }
        $tanggal = tanggal_helper($tanggal);
        $jadwal = $this->db->query("SELECT kd_jadwal FROM jadwal WHERE tanggal = '$tanggal' ORDER BY kd_jadwal DESC LIMIT 1")->row_array();
        if ($jadwal) {
            $this->db->where('jadwal.kd_jadwal', $jadwal['kd_jadwal']);
            $this->db->select('*');
            $this->db->from('status_pmt');
            $this->db->join('orang_tua', 'status_pmt.kd_ortu = orang_tua.kd_ortu', 'left');
            $this->db->join('jadwal', 'status_pmt.kd_jadwal = jadwal.kd_jadwal', 'left');
            $this->db->where('status_bayar', 'menunggu');
            $pmt_menunggu = $this->db->get()->result_array();
            return $pmt_menunggu;
        } else {
            return false;
        }
    }
    public function data_pmt_lunas($tanggal = "")
    {
        if ($tanggal == "") {
            $data = $this->db->query("SELECT tanggal FROM jadwal ORDER BY kd_jadwal DESC LIMIT 1")->row_array();
            if ($data) {
                $tanggal = tanggal_helper($data['tanggal']);
            } else {
                $tanggal = "00-00-0000";
            }
        }
        $tanggal = tanggal_helper($tanggal);
        $jadwal = $this->db->query("SELECT kd_jadwal FROM jadwal WHERE tanggal = '$tanggal' ORDER BY kd_jadwal DESC LIMIT 1")->row_array();
        if ($jadwal) {
            $this->db->where('jadwal.kd_jadwal', $jadwal['kd_jadwal']);
            $this->db->select('*');
            $this->db->from('status_pmt');
            $this->db->join('orang_tua', 'status_pmt.kd_ortu = orang_tua.kd_ortu', 'left');
            $this->db->join('jadwal', 'status_pmt.kd_jadwal = jadwal.kd_jadwal', 'left');
            $this->db->where('status_bayar', 'lunas');
            $pmt_lunas = $this->db->get()->result_array();
            return $pmt_lunas;
        } else {
            return false;
        }
    }
    public function data_pmt_belum_bayar($tanggal)
    {
        if ($tanggal == "") {
            $data = $this->db->query("SELECT * FROM jadwal ORDER BY kd_jadwal DESC LIMIT 1")->row_array();
            if ($data) {
                $tanggal = tanggal_helper($data['tanggal']);
                $kd_jadwal = $data['kd_jadwal'];
            } else {
                $tanggal = '00-00-0000';
            }
        }
        $tanggal = tanggal_helper($tanggal);
        $jadwal = $this->db->query("SELECT * FROM jadwal WHERE tanggal = '$tanggal' ORDER BY kd_jadwal DESC LIMIT 1")->row_array();
        if ($jadwal) {
            $kd_jadwal = $jadwal['kd_jadwal'];
            $pmt_belum_bayar =  $this->db->query("SELECT * FROM `orang_tua` WHERE NOT `kd_ortu` = ANY (SELECT `kd_ortu` FROM `status_pmt` WHERE kd_jadwal = $kd_jadwal) AND status = 'aktif' ")->result_array();
            return [$pmt_belum_bayar, $jadwal];
        } else {
            return false;
        }
    }
    public function jumlah_balita($kd_ortu)
    {
        $this->db->select('*');
        $this->db->from('relasi_balita');
        $this->db->where('kd_ortu', $kd_ortu);
        $jumlah_balita = $this->db->get()->num_rows();
        return $jumlah_balita;
    }
    public function data_kas_pmt()
    {
        $this->db->select('*');
        $this->db->from('kas_pmt');
        $data_pmt = $this->db->get()->result_array();
        return $data_pmt;
    }
    public function data_imunisasi()
    {
        $this->db->select('*');
        $this->db->from('imunisasi');
        $this->db->join('balita', 'imunisasi.kd_balita = balita.kd_balita', 'left');
        $imunisasi_balita = $this->db->get()->result_array();
        return $imunisasi_balita;
    }
    public function laporan_posyandu($status, $tanggal)
    {
        if ($tanggal == "") {
            $data = $this->db->query("SELECT * FROM jadwal ORDER BY kd_jadwal DESC LIMIT 1")->row_array();
            if ($data) {
                $tanggal = tanggal_helper($data['tanggal']);
            } else {
                $tanggal = '00-00-0000';
            }
        }
        $tanggal = tanggal_helper($tanggal);

        $this->db->select('kehadiran.kd_kehadiran,
                            kehadiran.kd_jadwal,
                            kehadiran.kd_ortu, 
                            jadwal.tanggal,
                            kehadiran.status,
                            kehadiran.keterangan as keterangan_kehadiran,
                            jadwal.jam_mulai,
                            jadwal.jam_selesai,
                            jadwal.tempat,
                            jadwal.keterangan as keterangan_jadwal ');
        $this->db->from('kehadiran');
        $this->db->join('jadwal', 'kehadiran.kd_jadwal = jadwal.kd_jadwal');
        $this->db->where('status', $status);
        $this->db->where('jadwal.tanggal', $tanggal);
        $result = $this->db->get()->result_array();
        return $result;
    }
    public function absen_tanpa_keterangan($tanggal)
    {
        if ($tanggal == "") {
            $jadwal = $this->db->query("SELECT * FROM jadwal ORDER BY kd_jadwal DESC LIMIT 1")->row_array();
            if ($jadwal) {
                $kd_jadwal = $jadwal['kd_jadwal'];
            } else {
                $kd_jadwal = 0;
            }
        } else {
            $tanggal = tanggal_helper($tanggal);
            $jadwal = $this->db->query("SELECT * FROM jadwal WHERE tanggal = '$tanggal' ORDER BY kd_jadwal DESC LIMIT 1")->row_array();
            if ($jadwal) {
                $kd_jadwal = $jadwal['kd_jadwal'];
            } else {
                $kd_jadwal = 0;
            }
        }
        $result = $this->db->query("SELECT nama,kd_ortu FROM `orang_tua`
                                WHERE kd_ortu NOT IN (SELECT kd_ortu FROM kehadiran WHERE kd_jadwal = $kd_jadwal)")->result_array();
        return [$result, $jadwal];
    }
    public function data_kas()
    {
        $this->db->select("SUM(nominal_masuk) - SUM(nominal_keluar) AS `total`");
        $this->db->from('kas_pmt');
        $kas = $this->db->get()->row_array();
        return $kas['total'];
    }
}
