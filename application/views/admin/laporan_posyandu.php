<?php
$laporan = [];
$tanggal = "";
$pilih = 'pilih';
$judul = "";
$menu = "";
if (isset($_POST['tanggal'])) {
    $tanggal = $_POST['tanggal'];
}
if (isset($_POST['pilih'])) {
    $pilih = $_POST['pilih'];
}
if (isset($_POST['pilih'])) {
    if ($_POST['pilih'] == 'hadir') {
        $menu = 'hadir';
        $laporan = $this->admin_model->laporan_posyandu("hadir", $tanggal);
        $judul = 'laporan Hadir';
    } elseif ($_POST['pilih'] == 'tidak hadir') {
        $menu = 'tidak hadir';
        $judul = 'laporan Tidak Hadir';
        $laporan = $this->admin_model->laporan_posyandu("tidak hadir", $tanggal);
    } elseif ($_POST['pilih'] == 'tanpa keterangan') {
        $menu = 'tanpa keterangan';
        $judul = 'laporan Tanpa Keterangan';
        $result = $this->admin_model->absen_tanpa_keterangan($tanggal);
        $laporan = $result[0];
        $jadwal = $result[1];
    }
}
?>


<!-- Begin page -->
<div id="wrapper">

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Greeva</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                    <li class="breadcrumb-item active">Starter</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Data Laporan Kehadiran</h4>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-5 text center">
                                        </div>
                                        <div class="col-2"></div>
                                        <div class="col-5">
                                            <form method="POST">
                                                <div class="form-group">
                                                    <label class="control-label">Pilih Status</label>
                                                    <select class="custom-select" id="inputGroupSelect01" name="pilih">
                                                        <option selected><?= $pilih; ?></option>
                                                        <option value="hadir">Hadir</option>
                                                        <option value="tidak hadir">Tidak Hadir</option>
                                                        <option value="tanpa keterangan">Tanpa Keterangan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Pilih tanggal Jadwal</label>
                                                    <select class="custom-select" id="inputGroupSelect01" name="tanggal">
                                                        <option selected><?= $tanggal; ?></option>
                                                        <?php $jadwal = $this->db->query("SELECT tanggal FROM jadwal")->result_array(); ?>
                                                        <?php foreach ($jadwal as $jadwal) : ?>
                                                            <?php $arr = explode('-', $jadwal['tanggal']);
                                                            $tanggal = $arr[2] . '-' . $arr[1] . '-' . $arr[0]; ?>
                                                            <option value="<?= $tanggal; ?>"><?= $tanggal; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light width-xm mb-3">Cari laporan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>
                                    <?php if ($menu == 'hadir' or $menu == 'tidak hadir') : ?>
                                        <h4 class="text-center"><?= $judul; ?></h4>
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th width="20%">Nama Orang Tua</th>
                                                    <th width="20%">Tanggal Posyandu</th>
                                                    <th width="20%">Status</th>
                                                    <th width="40%">Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($laporan as $laporan) : ?>
                                                    <tr>
                                                        <td><?= get_nama_ortu($laporan['kd_ortu']); ?></td>
                                                        <td class="text-center"><?= $laporan['tanggal']; ?></td>
                                                        <td class="text-center">
                                                            <?php $status = $laporan['status'];
                                                            if ($status == 'hadir') : ?>
                                                                <a href="#" class="btn btn-success waves-effect waves-light width-xm"><?= $laporan['status']; ?></a>
                                                            <?php else : ?>
                                                                <a href="#" class="btn btn-danger waves-effect waves-light width-xm"><?= $laporan['status']; ?></a>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="text-center"><?= $laporan['keterangan_kehadiran']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    <?php elseif ($menu == 'tanpa keterangan') : ?>
                                        <h4 class="text-center">Laporan Tidak Hadir Tanpa Keterangan</h4>
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th width="30%">Nama Orang Tua</th>
                                                    <th width="20%">Tanggal Posyandu</th>
                                                    <th width="20%">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($laporan as $laporan) : ?>
                                                    <tr>
                                                        <td><?= $laporan['nama']; ?></td>
                                                        <td class="text-center"><?= $jadwal['tanggal']; ?></td>
                                                        <td class="text-center">
                                                            <a href="#" class="btn btn-danger waves-effect waves-light width-xm">Tidak Hadir</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    <?php endif; ?>



                                </div>
                            </div>
                            <!-- end card-box -->
                        </div>
                        <!-- end col -->
                    </div>
                </div>
            </div>
            <!-- end row -->
            <!-- end page title -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->


</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->
<!-- END wrapper -->