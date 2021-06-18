<?php
$pmt = [];
$tanggal = "";
$pilih = 'pilih';
$judul = "";
$menu = "";
$tanggal_jadwal = "";
$total_kas = 0;
$jml_balita = "";
$nama_ortu = "pilih ortu";
$kd_ortu = "";
$kd_jadwal = "";

if (isset($_POST['tanggal'])) {
    $tanggal = $_POST['tanggal'];
}
if (isset($_POST['pilih'])) {
    if ($_POST['pilih'] == 'lunas') {
        $pilih = $_POST['pilih'];
        $menu = 'lunas';
        $judul = 'PMT Lunas';
        $pmt = $this->admin_model->data_pmt_lunas($tanggal);
        if (!$pmt) {
            $menu = NULL;
        }
    } elseif ($_POST['pilih'] == 'menunggu') {
        $pilih = $_POST['pilih'];
        $menu = 'menunggu';
        $judul = 'PMT Menunggu Konfirmasi';
        $pmt = $this->admin_model->data_pmt_menunggu($tanggal);
        if (!$pmt) {
            $menu = NULL;
        }
    } elseif ($_POST['pilih'] == 'bayar') {
        $menu = 'bayar';
        $nama_ortu = $_POST['nama_ortu'];
        $tanggal_jadwal = $_POST['tanggal_jadwal'];
        $ortu = get_kd_ortu($nama_ortu);
        if ($ortu) {
            $kd_ortu = $ortu['kd_ortu'];
            $jml_balita = $this->admin_model->jumlah_balita($kd_ortu);
            $jadwal = NULL;
            if (!$tanggal_jadwal == "") {
                $jadwal = nominal_kas($tanggal_jadwal);
                if ($jadwal) {
                    $kd_jadwal = $jadwal['kd_jadwal'];
                    $total_kas = $jadwal['kas_PMT'] * $jml_balita;
                }
            }
        }
    } else {
        $pilih = $_POST['pilih'];
        $menu = 'belum bayar';
        $judul = 'Belum Bayar PMT';
        if (!$tanggal) {
            $tanggal = "";
        }
        $data = $this->admin_model->data_pmt_belum_bayar($tanggal);
        if ($data) {
            $pmt = $data[0];
            $jadwal_belum_bayar = $data[1];
        } else {
            $menu = NULL;
        }
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
                            <h4 class="page-title">Data PMT Balita</h4>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <?= $this->session->flashdata('message'); ?>
                                    <div class="row mb-0">
                                        <div class="col-6 text center">
                                            <form method="POST">
                                                <div class="form-group">
                                                    <label class="control-label">Nama Orang Tua</label>
                                                    <select class="custom-select" id="inputGroupSelect01" name="nama_ortu">
                                                        <option selected><?= $nama_ortu; ?></option>
                                                        <?php $ortu = $this->db->query("SELECT nama FROM orang_tua")->result_array(); ?>
                                                        <?php foreach ($ortu as $ortu) : ?>
                                                            <option value="<?= $ortu['nama']; ?>"><?= $ortu['nama']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Pilih Jadwal</label>
                                                    <select class="custom-select" id="inputGroupSelect01" name="tanggal_jadwal">
                                                        <option selected><?= $tanggal_jadwal; ?></option>
                                                        <?php $jadwal = $this->db->get("jadwal")->result_array(); ?>
                                                        <?php foreach ($jadwal as $jadwal) : ?>
                                                            <option value="<?= tanggal_helper($jadwal['tanggal']); ?>"><?= tanggal_helper($jadwal['tanggal']); ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <button type="submit" name="pilih" value="bayar" class="btn btn-success waves-effect waves-light width-xm mb-3" data-toggle="modal" data-target="#bayar_pmt">Bayar PMT</button>
                                            </form>
                                        </div>
                                        <div class="col-6">
                                            <form method="POST">
                                                <div class="form-group">
                                                    <label class="control-label">Pilih Status</label>
                                                    <select class="custom-select" id="inputGroupSelect01" name="pilih">
                                                        <option selected><?= $pilih; ?></option>
                                                        <option value="lunas">Lunas</option>
                                                        <option value="menunggu">Menunggu</option>
                                                        <option value="belum bayar">belum bayar</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Pilih Jadwal</label>
                                                    <select class="custom-select" id="inputGroupSelect01" name="tanggal">
                                                        <option selected><?= $tanggal; ?></option>
                                                        <?php $jadwal = $this->db->get("jadwal")->result_array(); ?>
                                                        <?php foreach ($jadwal as $jadwal) : ?>
                                                            <option value="<?= tanggal_helper($jadwal['tanggal']); ?>"><?= tanggal_helper($jadwal['tanggal']); ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light width-xm mb-3">Cari PMT</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4"></div>
                                        <div class="col-4 text-center"><button type="buton" class="btn btn-primary waves-effect waves-light width-xm">CEK KAS PMT</button></div>
                                        <div class="col-4"></div>
                                    </div>
                                    <hr>
                                    <?php if ($menu === 'menunggu' or $menu === 'lunas') : ?>
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
                                                        <td><?= tanggal_helper($pmt['tanggal']); ?></td>
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
                                    <?php elseif ($menu === 'bayar') : ?>
                                        <div class="row">
                                            <div class="col">
                                                <div class="card text-white mb-3" style="max-width: 400px;">
                                                    <div class="card-header text-center">Bayar PMT</div>
                                                    <div class="card-body">
                                                        <table>
                                                            <tr>
                                                                <td width="100px">
                                                                    <label for="nama" class="col-form-label">Orang Tua</label>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama_ortu ?>" readoly>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="100px">
                                                                    <label for="nama" class="col-form-label">Tanggal Jadwal</label>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $tanggal_jadwal ?>" readoly>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="100px">
                                                                    <label for="nama" class="col-form-label">Jumlah Balita</label>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $jml_balita ?>" readoly>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="100px">
                                                                    <label for="nama" class="col-form-label">Total Kas PMT</label>
                                                                </td>
                                                                <td>
                                                                    <input type="text" value="<?php if (isset($total_kas)) {
                                                                                                    echo 'Rp.' . to_rupiah($total_kas);
                                                                                                } ?>" class="form-control" id="nama" name="nama" readoly>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <div class="text-right mr-2 mt-2">
                                                            <button type="submit" name="pilih" value="bayar" class="btn btn-success waves-effect waves-light width-xm mb-3" data-toggle="modal" data-target="#konfirmasibayar">Konfirmasi</button>
                                                        </div>
                                                        <div class="modal fade" id="konfirmasibayar" tabindex="-1">
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
                                                                        <?= form_open_multipart("insert/bayar_pmt"); ?>
                                                                        <div class="mb-3">
                                                                            <input type="hidden" class="form-control" id="kd_ortu" name="kd_ortu" value="<?= $kd_ortu ?> " readoly>
                                                                            <input type="hidden" class="form-control" id="kd_jadwal" name="kd_jadwal" value="<?= $kd_jadwal ?> " readoly>
                                                                            <input type="hidden" class="form-control" id="nominal" name="nominal" value="<?= $total_kas ?> " readoly>
                                                                            <input type="hidden" class="form-control" id="jml_balita" name="jml_balita" value="<?= $jml_balita ?> " readoly>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="nama" class="col-form-label">Orang Tua:</label>
                                                                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama_ortu ?>" readoly>
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php elseif ($menu == "belum bayar") : ?>
                                        <!-- Belum Bayar Masuk Ke Else -->
                                        <h4 class="text-center"><?= $judul; ?></h4>
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th width="20%">nama Orang Tua</th>
                                                    <th width="20%">Jumlah Balita</th>
                                                    <th width="20%">Nominal Total</th>
                                                    <th width="20%">Jatuh Tempo</th>
                                                    <th width="10%">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($pmt as $pmt) : ?>
                                                    <tr>
                                                        <td><?= $pmt['nama']; ?></td>
                                                        <?php $jumlah_balita = $this->admin_model->jumlah_balita($pmt['kd_ortu']) ?>
                                                        <td><?= $jumlah_balita; ?></td>
                                                        <td>Rp. <?= number_format($jadwal_belum_bayar['kas_PMT'] * $jumlah_balita, 0, ",", "."); ?></td>
                                                        <td><?= tanggal_helper($jadwal_belum_bayar['tanggal']) ?></td>
                                                        <td>
                                                            <a href="#" class="btn btn-danger waves-effect waves-light width-xm">Belum Bayar</a>
                                                        </td>
                                                    </tr>

                                                    <div name="modal dialog PMT">
                                                        <!-- Awal Hapus -->
                                                        <div class="modal fade" id="hapus" tabindex="-1">
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
                                                                            <input type="hidden" class="form-control" id="kd_pmt" name="kd_pmt" value="" readoly>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="nama" class="col-form-label">Orang Tua:</label>
                                                                            <input type="text" class="form-control" id="nama" name="nama" value="" readoly>
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
                                                    </div>
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