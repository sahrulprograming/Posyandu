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
                            <h4 class="page-title">Data Balita</h4>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <div>
                                        <button type="button" class="btn btn-success waves-effect waves-light width-xm mb-3" data-toggle="modal" data-target="#tambah">Tambah balita</button>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th width="20%">Nama Balita</th>
                                                <th width="10%">jenis kelamin</th>
                                                <th width="10%">tanggal Lahir</th>
                                                <th width="15%">Nama Orang tua</th>
                                                <th width="15%">Bidan Perawat</th>
                                                <th width="30%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($balita as $balita) : ?>
                                                <tr>
                                                    <td><?= $balita['nama_balita']; ?></td>
                                                    <td><?= $balita['jenis_kelamin']; ?></td>
                                                    <td><?= $balita['tgl_lahir']; ?></td>
                                                    <td><?= $balita['nama_orang_tua']; ?></td>
                                                    <td><?= $balita['nama_bidan']; ?></td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-success waves-effect waves-light width-xm" data-toggle="modal" data-target="#detail<?= $balita['kd_balita']; ?>">Detail</button>
                                                        <button type="button" class="btn btn-primary waves-effect waves-light width-xm" data-toggle="modal" data-target="#ubah_balita<?= $balita['kd_balita']; ?>">ubah</button>
                                                        <button type="button" class="btn btn-danger waves-effect waves-light width-xm" data-toggle="modal" data-target="#hapus<?= $balita['kd_balita']; ?>">hapus</button>
                                                    </td>
                                                </tr>



                                                <!-- Awal  Detail Modal Dialog -->
                                                <div class=" modal fade" id="detail<?= $balita['kd_balita']; ?>" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header border-bottom-0">
                                                                <h4 class="modal-title">Detail Data Balita</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body p-3">
                                                                <?= form_open_multipart("admin/ubah_balita"); ?>
                                                                <input class="form-control form-white" type="hidden" name="kd_balita" value="<?= $balita['kd_balita']; ?>" readonly>
                                                                <!-- NIK -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Nik</label>
                                                                    <input class="form-control form-white" placeholder="masukan nik" type="number" name="nik" value="<?= $balita['nik']; ?>" readonly>
                                                                </div>
                                                                <!-- NAMA -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Nama</label>
                                                                    <input class="form-control form-white" placeholder="masukan nama" type="text" name="nama" value="<?= $balita['nama_balita']; ?>" readonly>
                                                                </div>
                                                                <!-- Jenis Kelamin -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Jenis kelamin</label>
                                                                    <input class="form-control form-white" placeholder="Jenis Kelamin" type="text" name="jenis_kelamin" value="<?= $balita['jenis_kelamin']; ?>" readonly>
                                                                </div>
                                                                <!-- tanggal Lahir -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Tanggal Lahir</label>
                                                                    <input class="form-control form-white" placeholder="masukan tlp" type="text" name="tgl_lahir" value="<?= $balita['tgl_lahir']; ?>" readonly>
                                                                </div>
                                                                <!-- Berat Badan -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Berat Badan</label>
                                                                    <input class="form-control form-white" placeholder="bb" type="text" name="bb" value="<?= $balita['bb']; ?> Kg" readonly>
                                                                </div>
                                                                <!-- Tinggi Badan -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Tinggi Badan</label>
                                                                    <input class="form-control form-white" placeholder="tb" type="text" name="tb" value="<?= $balita['tb']; ?> Cm" readonly>
                                                                </div>
                                                                <!-- Keluhan -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Keluhan</label>
                                                                    <textarea class="form-control form-white" placeholder="Keluhan" type="text" name="keluhan" readonly><?= $balita['keluhan']; ?></textarea>
                                                                </div>
                                                                <!-- Nama Ortu -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Nama orang tua</label>
                                                                    <input class="form-control form-white" placeholder="nama_orang_tua" type="text" name="nama_orang_tua" value="<?= $balita['nama_orang_tua']; ?>" readonly>
                                                                </div>
                                                                <!-- Nama Bidan -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Nama Bidan Perawat</label>
                                                                    <input class="form-control form-white" placeholder="nama_bidan" type="text" name="nama_bidan" value="<?= $balita['nama_bidan']; ?>" readonly>
                                                                </div>

                                                                <div class="text-right">
                                                                    <!-- Tombol Close -->
                                                                    <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                                                                </div>

                                                                </form>
                                                            </div>
                                                            <!-- Akhir modal body-->
                                                        </div>
                                                        <!-- Akhir modal content -->
                                                    </div>
                                                </div>
                                                <!-- Akhir Detail modal dialog-->


                                                <!-- Awal ubah_balita  Modal Dialog -->
                                                <div class=" modal fade" id="ubah_balita<?= $balita['kd_balita']; ?>" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header border-bottom-0">
                                                                <h4 class="modal-title">Ubah Data balita</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body p-3">
                                                                <?= form_open_multipart("ubah/balita"); ?>
                                                                <input class="form-control form-white" type="hidden" name="kd_balita" value="<?= $balita['kd_balita']; ?>">
                                                                <!-- NIK -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Nik</label>
                                                                    <input class="form-control form-white" placeholder="masukan nik" type="text" name="nik" value="<?= $balita['nik']; ?>">
                                                                </div>
                                                                <!-- NAMA -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Nama</label>
                                                                    <input class="form-control form-white" placeholder="masukan nama" type="text" name="nama" value="<?= $balita['nama_balita']; ?>">
                                                                </div>
                                                                <!-- No Telp -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Alamat</label>
                                                                    <textarea class="form-control form-white" placeholder="Alamat" type="text" name="alamat"><?= $balita['nama_bidan']; ?></textarea>
                                                                </div>
                                                                <!-- No Telp -->
                                                                <div class="form-group">
                                                                    <label class="control-label">No Telp</label>
                                                                    <input class="form-control form-white" placeholder="masukan tlp" type="text" name="no_tlpn" value="<?= $balita['bb']; ?>">
                                                                </div>
                                                                <!-- Email -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Email</label>
                                                                    <input class="form-control form-white" placeholder="email" type="text" name="email" value="<?= $balita['tb']; ?>">
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
                                                <!-- Akhir ubah_balita  modal dialog-->


                                                <!-- Awal Hapus Modal Dialog -->
                                                <div class="modal fade" id="hapus<?= $balita['kd_balita']; ?>" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header border-bottom-0">
                                                                <h4 class="modal-title">Hapus data balita</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body p-3">
                                                                <h5>Yakin ingin menghapus?</h5>
                                                                <?= form_open_multipart("hapus/balita"); ?>
                                                                <div class="mb-3">
                                                                    <input type="hidden" class="form-control" id="kd_balita" name="kd_balita" value="<?= $balita['kd_balita'] ?> " readoly>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="nama" class="col-form-label">balita :</label>
                                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $balita['nama_balita'] ?>" readoly>
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
                                                <!-- Akhir Hapus Modal Dialog -->
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>

                                    <!-- Awal Tambah  Modal Dialog -->
                                    <div class=" modal fade" id="tambah" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header border-bottom-0">
                                                    <h4 class="modal-title">Ubah Data balita</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body p-3">
                                                    <?= form_open_multipart("insert/balita"); ?>
                                                    <!-- NIK -->
                                                    <div class="form-group">
                                                        <label class="control-label">Nik</label>
                                                        <input class="form-control form-white" placeholder="masukan nik" type="number" name="nik" required>
                                                    </div>
                                                    <!-- NAMA -->
                                                    <div class="form-group">
                                                        <label class="control-label">Nama</label>
                                                        <input class="form-control form-white" placeholder="masukan nama" type="text" name="nama" required>
                                                    </div>
                                                    <!-- No Telp -->
                                                    <div class="form-group">
                                                        <label class="control-label">Alamat</label>
                                                        <textarea class="form-control form-white" placeholder="Alamat" type="text" name="alamat" required></textarea>
                                                    </div>
                                                    <!-- No Telp -->
                                                    <div class="form-group">
                                                        <label class="control-label">No Telp</label>
                                                        <input class="form-control form-white" placeholder="masukan tlp" type="number" name="no_tlpn" required>
                                                    </div>
                                                    <!-- Email -->
                                                    <div class="form-group">
                                                        <label class="control-label">Email</label>
                                                        <input class="form-control form-white" placeholder="email" type="text" name="email" required>
                                                    </div>
                                                    <div class="text-right">
                                                        <!-- Tombol Batal -->
                                                        <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Batal</button>
                                                        <!-- Tombol Ubah -->
                                                        <button type="submit" class="btn btn-success ml-1 waves-effect waves-light save-category">Tambah</button>
                                                    </div>

                                                    </form>
                                                </div>
                                                <!-- Akhir modal body-->
                                            </div>
                                            <!-- Akhir modal content -->
                                        </div>
                                    </div>
                                    <!-- Akhir Tambah  modal dialog-->
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
</div>
<!-- END wrapper -->