<?php
$pmt = [];
$tanggal = "Pilih";
$pilih = 'pilih';
$judul = "";
if (isset($_POST['tanggal'])) {
    $tanggal = $_POST['tanggal'];
}
if (isset($_POST['pilih'])) {
    $pilih = $_POST['pilih'];
}
if (isset($_POST['pilih'])) {
    if ($_POST['pilih'] == 'lunas') {
        $menu = 'lunas';
        $pmt = $this->admin_model->data_pmt_lunas($tanggal);
        $judul = 'PMT Lunas';
    } elseif ($_POST['pilih'] == 'menunggu') {
        $menu = 'menunggu';
        $judul = 'PMT Menunggu Konfirmasi';
        $pmt = $this->admin_model->data_pmt_menunggu($tanggal);
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
                            <h4 class="page-title">Data PMT BAlita</h4>
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
                                                        <option value="menunggu">Tidak Hadir</option>
                                                        <option value="menunggu">Tanpa Keterangan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Pilih tanggal Jadwal</label>
                                                    <select class="custom-select" id="inputGroupSelect01" name="tanggal">
                                                        <option selected></option>
                                                        <?php $jadwal = $this->db->query("SELECT tanggal FROM jadwal")->result_array(); ?>
                                                        <?php foreach ($jadwal as $jadwal) : ?>
                                                            <?php $arr = explode('-', $jadwal['tanggal']);
                                                            $tanggal = $arr[2] . '-' . $arr[1] . '-' . $arr[0]; ?>
                                                            <option value="<?= $tanggal; ?>"><?= $tanggal; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light width-xm mb-3">Cari PMT</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>
                                    <?php if (isset($menu) == 'menunggu') : ?>
                                        <h4 class="text-center"><?= $judul; ?></h4>
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th width="20%">nama Orang Tua</th>
                                                    <th width="20%">Jumlah Balita</th>
                                                    <th width="20%">Nominal Total</th>
                                                    <th width="20%">Jatuh Tempo</th>
                                                    <th width="10%">Status</th>
                                                    <th width="30%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($pmt as $pmt) : ?>
                                                    <tr>
                                                        <td><?= $pmt['nama']; ?></td>
                                                        <?php $jumlah_balita = $this->admin_model->jumlah_balita($pmt['kd_ortu']) ?>
                                                        <td><?= $jumlah_balita; ?></td>
                                                        <td>Rp. <?= number_format($pmt['kas_PMT'] * $jumlah_balita, 0, ",", "."); ?></td>
                                                        <?php $arr = explode('-', $pmt['tanggal']);
                                                        $jatuh_tempo = $arr[2] . '-' . $arr[1] . '-' . $arr[0]; ?>
                                                        <td><?= $jatuh_tempo; ?></td>
                                                        <td>
                                                            <?php $status = $pmt['status_bayar'];
                                                            if ($status == 'menunggu') : ?>
                                                                <a href="#" class="btn btn-primary waves-effect waves-light width-xm"><?= $pmt['status_bayar']; ?></a>
                                                            <?php else : ?>
                                                                <a href="#" class="btn btn-success waves-effect waves-light width-xm"><?= $pmt['status_bayar']; ?></a>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?php if ($menu == 'menunggu') : ?>
                                                                <button type="button" class="btn btn-success waves-effect waves-light width-xm" data-toggle="modal" data-target="#konfirmasi<?= $pmt['kd_pmt']; ?>">Konfirmasi</button>
                                                            <?php else : ?>
                                                                <button type="button" class="btn btn-primary waves-effect waves-light width-xm" data-toggle="modal" data-target="#ubah<?= $pmt['kd_pmt']; ?>">Ubah</button>
                                                            <?php endif; ?>
                                                            <button type="button" class="btn btn-danger waves-effect waves-light width-xm" data-toggle="modal" data-target="#hapus<?= $pmt['kd_pmt']; ?>">hapus</button>
                                                        </td>
                                                    </tr>

                                                    <div name="modal dialog PMT">
                                                        <!-- Awal Konfirmasi Modal dialog -->
                                                        <div class="modal fade" id="konfirmasi<?= $pmt['kd_pmt']; ?>" tabindex="-1">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header border-bottom-0">
                                                                        <h4 class="modal-title">Konfirmasi pembayaran PMT</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body p-3">
                                                                        <h5>Yakin Sudah Bayar?</h5>
                                                                        <?= form_open_multipart("ubah/konfirmasi"); ?>
                                                                        <div class="mb-3">
                                                                            <input type="hidden" class="form-control" id="kd_pmt" name="kd_pmt" value="<?= $pmt['kd_pmt'] ?> " readoly>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="nama" class="col-form-label">Orang Tua:</label>
                                                                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $pmt['nama'] ?>" readoly>
                                                                        </div>
                                                                        <div class="text-right">
                                                                            <!-- Tombol Batal -->
                                                                            <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Batal</button>
                                                                            <!-- Tombol Ubah -->
                                                                            <button type="submit" class="btn btn-success ml-1 waves-effect waves-light save-category">Lunas</button>
                                                                        </div>
                                                                        </form>
                                                                    </div>
                                                                    <!-- Akhir modal body-->
                                                                </div>
                                                                <!-- Akhir modal content -->
                                                            </div>
                                                        </div>
                                                        <!-- Akhir Konfirmasi Modal Dialog -->


                                                        <!-- Awal Hapus -->
                                                        <div class="modal fade" id="hapus<?= $pmt['kd_pmt']; ?>" tabindex="-1">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header border-bottom-0">
                                                                        <h4 class="modal-title">Hapus pembayaran PMT</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body p-3">
                                                                        <h5>Yakin ingin Menghapus PMT?</h5>
                                                                        <?= form_open_multipart("hapus/pmt"); ?>
                                                                        <div class="mb-3">
                                                                            <input type="hidden" class="form-control" id="kd_pmt" name="kd_pmt" value="<?= $pmt['kd_pmt'] ?> " readoly>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="nama" class="col-form-label">Orang Tua:</label>
                                                                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $pmt['nama'] ?>" readoly>
                                                                        </div>
                                                                        <div class="text-right">
                                                                            <!-- Tombol Batal -->
                                                                            <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Batal</button>
                                                                            <!-- Tombol Ubah -->
                                                                            <button type="submit" class="btn btn-danger ml-1 waves-effect waves-light save-category">Hapus</button>
                                                                        </div>
                                                                        </form>
                                                                    </div>
                                                                    <!-- Akhir modal body-->
                                                                </div>
                                                                <!-- Akhir modal content -->
                                                            </div>
                                                        </div>
                                                        <!-- Akhir Hapus -->

                                                        <!-- Awal ubah -->
                                                        <div class="modal fade" id="ubah<?= $pmt['kd_pmt']; ?>" tabindex="-1">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header border-bottom-0">
                                                                        <h4 class="modal-title">Rubah pembayaran PMT</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body p-3">
                                                                        <?= form_open_multipart("ubah/pmt"); ?>
                                                                        <div class="mb-3">
                                                                            <input type="hidden" class="form-control" id="kd_pmt" name="kd_pmt" value="<?= $pmt['kd_pmt'] ?> " readoly>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="nama" class="col-form-label">Orang Tua</label>
                                                                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $pmt['nama'] ?>" readoly>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="nama" class="col-form-label">status_bayar</label>
                                                                            <select class="custom-select" id="inputGroupSelect01" name="status_bayar">
                                                                                <option selected><?= $pmt['status_bayar']; ?></option>
                                                                                <option value="lunas">Lunas</option>
                                                                                <option value="menunggu">Menunggu</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="text-right">
                                                                            <!-- Tombol Batal -->
                                                                            <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Batal</button>
                                                                            <!-- Tombol Ubah -->
                                                                            <button type="submit" class="btn btn-primary ml-1 waves-effect waves-light save-category">Ubah</button>
                                                                        </div>
                                                                        </form>
                                                                    </div>
                                                                    <!-- Akhir modal body-->
                                                                </div>
                                                                <!-- Akhir modal content -->
                                                            </div>
                                                        </div>
                                                        <!-- Akhir Rubah -->
                                                    </div>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    <?php endif; ?>
                                    <!-- Awal bayar_pmt Orang Tua -->
                                    <div class="  modal fade" id="bayar_pmt" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header border-bottom-0">
                                                    <h4 class="modal-title">Bayar PMT Balita</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body p-3">
                                                    <?= form_open_multipart("insert/ortu"); ?>
                                                    <div class="form-group">
                                                        <label class="control-label">Nama Orang Tua</label>
                                                        <select class="custom-select" id="inputGroupSelect01" name="nama_ortu">
                                                            <option selected><?= $ortu ?></option>
                                                        </select>
                                                        <div class="mb-3">
                                                            <label for="nama" class="col-form-label">Orang Tua:</label>
                                                            <input type="text" class="form-control" id="nama" name="nama" value="" readoly>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                                <!-- Akhir modal body-->
                                            </div>
                                            <!-- Akhir modal content -->
                                        </div>
                                    </div>
                                    <!-- Akhir bayar_pmt Orang Tua -->
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