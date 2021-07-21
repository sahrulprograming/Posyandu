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
                            <h4 class="page-title">Data jadwal</h4>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <div>
                                        <button type="button" class="btn btn-success waves-effect waves-light width-xm mb-3" data-toggle="modal" data-target="#tambah">Tambah jadwal</button>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th width="10%">Tanggal</th>
                                                <th width="15%">Tempat</th>
                                                <th width="10%">Jam Mulai</th>
                                                <th width="10%">Jam Selesai</th>
                                                <th width="15%">Keterangan</th>
                                                <th width="30%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($jadwal as $jadwal) : ?>
                                                <tr>
                                                    <td><?= $jadwal['tanggal']; ?></td>
                                                    <td class="text-center"><?= $jadwal['tempat']; ?></td>
                                                    <td><?= $jadwal['jam_mulai']; ?></td>
                                                    <td><?= $jadwal['jam_selesai']; ?></td>
                                                    <td><?= $jadwal['keterangan']; ?></td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-success waves-effect waves-light width-xm" data-toggle="modal" data-target="#detail<?= $jadwal['kd_jadwal']; ?>">Detail</button>
                                                        <button type="button" class="btn btn-primary waves-effect waves-light width-xm" data-toggle="modal" data-target="#ubah_jadwal<?= $jadwal['kd_jadwal']; ?>">ubah</button>
                                                        <button type="button" class="btn btn-danger waves-effect waves-light width-xm" data-toggle="modal" data-target="#hapus<?= $jadwal['kd_jadwal']; ?>">hapus</button>
                                                    </td>
                                                </tr>



                                                <!-- Awal Detail Modal Dialog -->
                                                <div class=" modal fade" id="detail<?= $jadwal['kd_jadwal']; ?>" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header border-bottom-0">
                                                                <h4 class="modal-title">Detail Data jadwal</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body p-3">
                                                                <!-- Nominal Kas PMT -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Nominal Kas PMT</label>
                                                                    <input class="form-control form-white" placeholder="Nominal kas PMT" type="text" name="kas_PMT" value="<?= $jadwal['kas_PMT']; ?>" readonly>
                                                                </div>
                                                                <!-- Tanggal Dibuat -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Dibuat Pada</label>
                                                                    <input class="form-control form-white" placeholder="masukan nik" type="date" name="tanggal" value="<?= $jadwal['dibuat_pada']; ?>" readonly>
                                                                </div>
                                                                <!-- Dibuat Oleh -->
                                                                <?php $admin = $this->db->get_where('admin', ['kd_admin' => $jadwal['kd_admin']])->row_array(); ?>
                                                                <div class="form-group">
                                                                    <label class="control-label">Dibuat Oleh</label>
                                                                    <input class="form-control form-white" placeholder="Tempat" type="text" name="tempat" value="<?= $admin['nama']; ?>" readonly>
                                                                </div>
                                                                <div class="text-right">
                                                                    <!-- Tombol Batal -->
                                                                    <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                            <!-- Akhir modal body-->
                                                        </div>
                                                        <!-- Akhir modal content -->
                                                    </div>
                                                </div>
                                                <!-- Akhir Detail modal dialog-->


                                                <!-- Awal ubah_jadwal  Modal Dialog -->
                                                <div class=" modal fade" id="ubah_jadwal<?= $jadwal['kd_jadwal']; ?>" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header border-bottom-0">
                                                                <h4 class="modal-title">Ubah Data jadwal</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body p-3">
                                                                <?= form_open_multipart("ubah/jadwal"); ?>
                                                                <input class="form-control form-white" type="hidden" name="kd_jadwal" value="<?= $jadwal['kd_jadwal']; ?>" required>
                                                                <!-- Tanggal -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Tanggal</label>
                                                                    <input class="form-control form-white" placeholder="masukan nik" type="date" name="tanggal" value="<?= $jadwal['tanggal']; ?>" required>
                                                                </div>
                                                                <!-- Tempat -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Tempat</label>
                                                                    <input class="form-control form-white" placeholder="Tempat" type="text" name="tempat" value="<?= $jadwal['tempat']; ?>" required>
                                                                </div>
                                                                <!-- Jam Mulai -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Jam Mulai</label>
                                                                    <input class="form-control form-white" placeholder="masukan tlp" type="time" name="jam_mulai" value="<?= $jadwal['jam_mulai']; ?>" required>
                                                                </div>
                                                                <!-- Jam Selesai -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Jam Selesai</label>
                                                                    <input class="form-control form-white" placeholder="masukan tlp" type="time" name="jam_selesai" value="<?= $jadwal['jam_selesai']; ?>" required>
                                                                </div>
                                                                <!-- Keterangan -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Keterangan</label>
                                                                    <input class="form-control form-white" placeholder="Keterangan Jadwal" type="text" name="keterangan" value="<?= $jadwal['keterangan']; ?>" required>
                                                                </div>
                                                                <!-- Nominal Kas PMT -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Nominal Kas PMT</label>
                                                                    <input class="form-control form-white" placeholder="Nominal kas PMT" type="text" name="kas_PMT" value="<?= $jadwal['kas_PMT']; ?>" required>
                                                                </div>
                                                                <div class="text-right">
                                                                    <!-- Tombol Batal -->
                                                                    <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Batal</button>
                                                                    <!-- Tombol Ubah -->
                                                                    <button type="submit" class="btn btn-success ml-1 waves-effect waves-light save-category">Ubah</button>
                                                                </div>

                                                                </form>
                                                            </div>
                                                            <!-- Akhir modal body-->
                                                        </div>
                                                        <!-- Akhir modal content -->
                                                    </div>
                                                </div>
                                                <!-- Akhir ubah_jadwal  modal dialog-->

                                                <!-- Awal Hapus Modal Dialog -->
                                                <div class="modal fade" id="hapus<?= $jadwal['kd_jadwal']; ?>" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header border-bottom-0">
                                                                <h4 class="modal-title">Hapus data jadwal</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body p-3">
                                                                <h5>Yakin ingin menghapus?</h5>
                                                                <?= form_open_multipart("hapus/jadwal"); ?>
                                                                <div class="mb-3">
                                                                    <input type="hidden" class="form-control" id="kd_jadwal" name="kd_jadwal" value="<?= $jadwal['kd_jadwal'] ?> " readoly>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="nama" class="col-form-label">jadwal Tanggal :</label>
                                                                    <input type="date" class="form-control" id="nama" name="nama" value="<?= $jadwal['tanggal'] ?>" readonly>
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
                                                    <h4 class="modal-title">Ubah Data jadwal</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body p-3">
                                                    <?= form_open_multipart("insert/jadwal"); ?>
                                                    <!-- Tanggal -->
                                                    <div class="form-group">
                                                        <label class="control-label">Tanggal</label>
                                                        <input class="form-control form-white" placeholder="masukan nik" type="date" name="tanggal" required>
                                                    </div>
                                                    <!-- Tempat -->
                                                    <div class="form-group">
                                                        <label class="control-label">Tempat</label>
                                                        <input class="form-control form-white" placeholder="Tempat" type="text" name="tempat" required>
                                                    </div>
                                                    <!-- Jam Mulai -->
                                                    <div class="form-group">
                                                        <label class="control-label">Jam Mulai</label>
                                                        <input class="form-control form-white" placeholder="masukan tlp" type="time" name="jam_mulai" required>
                                                    </div>
                                                    <!-- Jam Selesai -->
                                                    <div class="form-group">
                                                        <label class="control-label">Jam Selesai</label>
                                                        <input class="form-control form-white" placeholder="masukan tlp" type="time" name="jam_selesai" required>
                                                    </div>
                                                    <!-- Tempat -->
                                                    <div class="form-group">
                                                        <label class="control-label">Keterangan</label>
                                                        <input class="form-control form-white" placeholder="Keterangan Jadwal" type="text" name="keterangan" required>
                                                    </div>
                                                    <!-- Nominal Kas PMT -->
                                                    <div class="form-group">
                                                        <label class="control-label">Nominal Kas PMT</label>
                                                        <input class="form-control form-white" placeholder="Nominal kas PMT" type="text" name="kas_PMT" required>
                                                    </div>
                                                    <div class="text-right">
                                                        <input type="hidden" class="form-control form-white" name="dibuat_pada" value="<?= date("Y/m/d") ?>">
                                                        <input type="hidden" class="form-control form-white" name="kd_admin" value="<?= $this->session->userdata('kd_admin'); ?>">
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