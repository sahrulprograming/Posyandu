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
                            <h4 class="page-title">Antrian hari ini</h4>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <?= $this->session->flashdata('message'); ?>
                                    <?php if (isset($jadwal)) : ?>
                                        <h4 class="text-center"></h4>
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th width="5%">Antrian</th>
                                                    <th width="20%">Nama Orang Tua</th>
                                                    <th width="20%">Tanggal</th>
                                                    <th width="15%">Jam Mulai</th>
                                                    <th width="15%">Jam selesai</th>
                                                    <th width="25%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($jadwal as $jadwal) : ?>
                                                    <tr>
                                                        <td class="text-center"><button type="button" class="btn btn-info waves-effect waves-light width-xm"><?= $jadwal['no_antrian']; ?></button></td>
                                                        <td><?= get_nama_ortu($jadwal['kd_ortu']); ?></td>
                                                        <td class="text-center"><?= tanggal_helper($jadwal['tanggal']); ?></td>
                                                        <td class="text-center"><?= jam_helper($jadwal['jam_mulai']); ?></td>
                                                        <td class="text-center"><?= jam_helper($jadwal['jam_selesai']); ?></td>
                                                        <td class="text-center">
                                                            <button type="button" class="btn btn-primary waves-effect waves-light width-xm" data-toggle="modal" data-target="#hadir<?= $jadwal['no_antrian']; ?>">Hadir</button>
                                                            <button type="button" class="btn btn-danger waves-effect waves-light width-xm" data-toggle="modal" data-target="#tidak_hadir<?= $jadwal['no_antrian']; ?>">Tidak Hadir</button>
                                                        </td>
                                                    </tr>

                                                    <div nama="Pembungkus Modal Antrian">
                                                        <!-- Awal Konfirmasi Hadir -->
                                                        <div class="modal fade" id="hadir<?= $jadwal['no_antrian']; ?>" tabindex="-1">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header border-bottom-0">
                                                                        <h4 class="modal-title">Konfirmasi Kehadiran</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body p-3">
                                                                        <h5>Hadir?</h5>
                                                                        <?= form_open_multipart("insert/kehadiran"); ?>
                                                                        <input type="hidden" class="form-control" name="kd_jadwal" value="<?= $jadwal['kd_jadwal'] ?>" readoly>
                                                                        <input type="hidden" class="form-control" name="kd_ortu" value="<?= $jadwal['kd_ortu'] ?>" readoly>
                                                                        <input type="hidden" class="form-control" name="keterangan" value="" readoly>
                                                                        <div class="mb-3">
                                                                            <label for="nama" class="col-form-label">Nama Orang Tua:</label>
                                                                            <input type="text" class="form-control" id="nama" name="nama" value="<?= get_nama_ortu($jadwal['kd_ortu']); ?>" readoly>
                                                                        </div>
                                                                        <div class="text-right">
                                                                            <!-- Tombol Batal -->
                                                                            <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Batal</button>
                                                                            <!-- Tombol Ubah -->
                                                                            <button type="submit" class="btn btn-primary ml-1 waves-effect waves-light save-category">Konfirmasi</button>
                                                                        </div>
                                                                        </form>
                                                                    </div>
                                                                    <!-- Akhir modal body-->
                                                                </div>
                                                                <!-- Akhir modal content -->
                                                            </div>
                                                        </div>
                                                        <!-- Akhir Konfirmasi Hadir -->

                                                        <!-- Awal Konfirmasi Tidak Hadir -->
                                                        <div class="modal fade" id="tidak_hadir<?= $jadwal['no_antrian']; ?>" tabindex="-1">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header border-bottom-0">
                                                                        <h4 class="modal-title">Konfirmasi Tidak Hadir</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body p-3">
                                                                        <h5>Tidak Hadir?</h5>
                                                                        <?= form_open_multipart("insert/kehadiran"); ?>
                                                                        <input type="hidden" class="form-control" name="kd_jadwal" value="<?= $jadwal['kd_jadwal'] ?>" readoly>
                                                                        <input type="hidden" class="form-control" name="kd_ortu" value="<?= $jadwal['kd_ortu'] ?>" readoly>
                                                                        <div class="mb-3">
                                                                            <label for="nama" class="col-form-label">Nama Orang Tua</label>
                                                                            <input readoly type="text" class="form-control" name="nama" value="<?= get_nama_ortu($jadwal['kd_ortu']); ?>">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="nama" class="col-form-label">Keterangan Tidak Hadir</label>
                                                                            <textarea type="text" class="form-control" placeholder="Masukan Keterangan Tidak Hadir" id="keterangan" name="keterangan"></textarea>
                                                                        </div>
                                                                        <div class="text-right">
                                                                            <!-- Tombol Batal -->
                                                                            <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Batal</button>
                                                                            <!-- Tombol Ubah -->
                                                                            <button type="submit" class="btn btn-danger ml-1 waves-effect waves-light save-category">Konfirmasi</button>
                                                                        </div>
                                                                        </form>
                                                                    </div>
                                                                    <!-- Akhir modal body-->
                                                                </div>
                                                                <!-- Akhir modal content -->
                                                            </div>
                                                        </div>
                                                        <!-- Akhir Konfirmasi Tidak Hadir -->
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