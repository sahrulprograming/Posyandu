<?php
ini_set('date.timezone', 'Asia/Jakarta');
function membuat_kode($role)
{
    $ci = get_instance();
    switch (strtolower($role)) {
        case 'admin':
            $kd_role = 1;
            $admin = $ci->db->query("SELECT kd_admin FROM admin ORDER BY `kd_admin` DESC LIMIT 1")->row_array();
            if ($admin) {
                $tahun = strval(substr($admin['kd_admin'], 1, 2));
                $admin_ke = strval(substr($admin['kd_admin'], 3));
                if ($tahun === date('y')) {
                    $kode = $kd_role . $tahun . $admin_ke;
                    $kode = (int)$kode + 1;
                } else {
                    $tahun = (int)$tahun + 1;
                    $kode = $kd_role . $tahun . "0001";
                }
            } else {
                $tahun = date('y');
                $admin_ke = "0001";
                $kode = $kd_role . $tahun . $admin_ke;
            }
            break;
        case 'bidan':
            $kd_role = 4;
            $bidan = $ci->db->query("SELECT kd_bidan FROM bidan ORDER BY `kd_bidan` DESC LIMIT 1")->row_array();
            if ($bidan) {
                $tahun = strval(substr($bidan['kd_bidan'], 1, 2));
                $bidan_ke = strval(substr($bidan['kd_bidan'], 3));
                if ($tahun === date('y')) {
                    $kode = $kd_role . $tahun . $bidan_ke;
                    $kode = (int)$kode + 1;
                } else {
                    $tahun = date('y');
                    $kode = $kd_role . $tahun . "0001";
                }
            } else {
                $tahun = date('y');
                $bidan_ke = "0001";
                $kode = $kd_role . $tahun . $bidan_ke;
            }
            break;
        case 'anggota':
            $kd_role = 3;
            $anggota = $ci->db->query("SELECT kd_anggota FROM anggota ORDER BY `kd_anggota` DESC LIMIT 1")->row_array();
            if ($anggota) {
                $tahun = strval(substr($anggota['kd_anggota'], 1, 2));
                $anggota_ke = strval(substr($anggota['kd_anggota'], 3));
                if ($tahun === date('y')) {
                    $kode = $kd_role . $tahun . $anggota_ke;
                    $kode = (int)$kode + 1;
                } else {
                    $tahun = date('y');
                    $kode = $kd_role . $tahun . "0001";
                }
            } else {
                $tahun = date('y');
                $anggota_ke = "0001";
                $kode = $kd_role . $tahun . $anggota_ke;
            }
            break;
        case 'balita':
            $kd_role = 5;
            $balita = $ci->db->query("SELECT kd_balita FROM balita ORDER BY `kd_balita` DESC LIMIT 1")->row_array();
            if ($balita) {
                $tahun = strval(substr($balita['kd_balita'], 1, 2));
                $balita_ke = strval(substr($balita['kd_balita'], 3));
                if ($tahun === date('y')) {
                    $kode = $kd_role . $tahun . $balita_ke;
                    $kode = (int)$kode + 1;
                } else {
                    $tahun = date('y');
                    $kode = $kd_role . $tahun . "0001";
                }
            } else {
                $tahun = date('y');
                $balita_ke = "0001";
                $kode = $kd_role . $tahun . $balita_ke;
            }
            break;
        case 'orang_tua':
            $kd_role = 2;
            $orang_tua = $ci->db->query("SELECT kd_ortu FROM orang_tua ORDER BY `kd_ortu` DESC LIMIT 1")->row_array();
            if ($orang_tua) {
                $tahun = strval(substr($orang_tua['kd_ortu'], 1, 2));
                $orang_tua_ke = strval(substr($orang_tua['kd_ortu'], 3));
                if ($tahun === date('y')) {
                    $kode = $kd_role . $tahun . $orang_tua_ke;
                    $kode = (int)$kode + 1;
                } else {
                    $tahun = date('y');
                    $kode = $kd_role . $tahun . "0001";
                }
            } else {
                $tahun = date('y');
                $orang_tua_ke = "0001";
                $kode = $kd_role . $tahun . $orang_tua_ke;
            }
            break;
        default:
            return false;
            break;
    }

    return (int)$kode;
}



function cek_status_login()
{
    $ci = get_instance();
    if (!$ci->session->userdata('role')) {
        redirect('auth/login');
    } else {
        $role = $ci->session->userdata('role');
        $menu = $ci->uri->segment(1);

        $querymenu = $ci->db->get_where('controller_access', ['controller' => $menu])->row_array();

        $controller = $querymenu['controller'];

        $access = $ci->db->get_where('controller_access', ['role' => $role, 'controller' => $controller])->num_rows();
        if ($access < 1) {
            redirect('auth/login');
        }
        if (strtolower($role) == 'user') {
            $orang_tua = $ci->db->get_where('orang_tua', ['kd_ortu' => $ci->session->userdata('kd_ortu')])->row_array();
            if ($orang_tua['nik'] == 0) {
                redirect('auth/form_data_diri');
            }
        }
    }
}
function cek_penimbangan($kd_balita)
{
    $ci = get_instance();
    $data_balita = $ci->db->query("SELECT * from penimbangan where kd_balita = $kd_balita ORDER BY kd_penimbang DESC LIMIT 1")->row_array();
    if (!$data_balita) {
        $data_balita = [
            'bb' => "belum di timbang",
            'tb' => "belum di ukur",
            'keluhan' => "belum konsultasi",
            'tanggal' => "belum datang",
        ];
    }
    return $data_balita;
}
function antrian($kd_jadwal)
{
    $ci = get_instance();
    $result = $ci->db->get_where('kehadiran', ['kd_jadwal' => $kd_jadwal, 'kd_ortu' => $ci->session->userdata('kd_ortu')])->row_array();
    return $result;
}

function tanggal_helper($tanggal)
{
    $arr = explode('-', $tanggal);
    $tanggal = $arr[2] . '-' . $arr[1] . '-' . $arr[0];
    return $tanggal;
}
function get_kd_ortu($nama_ortu)
{
    $ci = get_instance();
    $ci->db->select('kd_ortu');
    $ci->db->from('orang_tua');
    $ci->db->where('nama', $nama_ortu);
    $data = $ci->db->get()->row_array();
    if ($data) {
        return $data['kd_ortu'];
    }
}
function get_jadwal($tanggal_jadwal)
{
    $tanggal_jadwal = tanggal_helper($tanggal_jadwal);
    $ci = get_instance();
    $ci->db->select('*');
    $ci->db->from('jadwal');
    $ci->db->where('tanggal', $tanggal_jadwal);
    $data = $ci->db->get()->row_array();
    return $data;
}
function to_rupiah($nominal)
{
    return number_format($nominal, 0, ",", ".");
}
function get_nama_ortu($kd_ortu)
{
    $ci = get_instance();
    $ci->db->select('*');
    $ci->db->from('orang_tua');
    $ci->db->where('kd_ortu', $kd_ortu);
    $data = $ci->db->get()->row_array();
    return $data['nama'];
}
function jam_helper($jam)
{
    $arr = explode(':', $jam);
    $jam = $arr[0] . ':' . $arr[1] . " WIB";
    return $jam;
}
function cek_jadwal_sekarang()
{
    $ci = get_instance();
    $jadwal = $ci->db->get_where('jadwal', ['tanggal' => date("Y-m-d")])->num_rows();
    return $jadwal;
}
function format_nohp($nomer)
{
    if ($nomer[0] === "0") {
        $nomer = substr($nomer, 1);
        $nomer = substr_replace($nomer, "62", 0, 0);
        return $nomer;
    } else {
        return $nomer;
    }
}

function nohp_admin()
{
    $ci = get_instance();
    $admin = $ci->db->query("SELECT no_tlpn FROM admin LIMIT 1")->row_array();
    $nomer = $admin['no_tlpn'];
    return format_nohp($nomer);
}


function jumlah_balita_pmt($kd_pmt)
{
    $ci = get_instance();
    $kd_ortu = $ci->session->userdata('kd_ortu');
    $pmt = $ci->db->get_where('status_pmt', ['kd_ortu' => $kd_ortu, 'kd_pmt' => $kd_pmt])->row_array();
    $jumlah_balita = $pmt['jml_balita'];
    return $jumlah_balita;
}

function tanggal_format($tanggal)
{
    $arr = explode('-', $tanggal);
    $date = $arr[2] . '-' . $arr[1] . '-' . $arr[0];
    return $date;
}

function kehadiran_bidan($kd_jadwal)
{
    $ci = get_instance();
    $kd_bidan = $ci->session->userdata('kd_bidan');
    $bidan = $ci->db->get_where('kehadiran_bidan', ['kd_jadwal' => $kd_jadwal, 'kd_bidan' => $kd_bidan])->row_array();
    if ($bidan) {
        return $bidan['status_kehadiran'];
    }
}

function daftar_bidan_hadir($kd_jadwal)
{
    $ci = get_instance();
    $data = $ci->db->query("SELECT `bidan`.`nama` FROM `kehadiran_bidan` LEFT JOIN `bidan` ON `kehadiran_bidan`.`kd_bidan` = `bidan`.`kd_bidan` WHERE `kehadiran_bidan`.`kd_jadwal` = $kd_jadwal")->result_array();
    return $data;
}
