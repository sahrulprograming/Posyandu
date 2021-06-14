<?php
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
    return $data_balita;
}
function antrian($kd_jadwal)
{
    $ci = get_instance();
    $result = $ci->db->get_where('antrian', ['kd_jadwal' => $kd_jadwal, 'kd_ortu' => $ci->session->userdata('kd_ortu')])->row_array();
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
    $ci->db->select('*');
    $ci->db->from('orang_tua');
    $ci->db->where('nama', $nama_ortu);
    $data = $ci->db->get()->row_array();
    return $data;
}
function nominal_kas($tanggal_jadwal)
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
