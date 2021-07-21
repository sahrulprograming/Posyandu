<?php ini_set('date.timezone', 'Asia/Jakarta');
?>
<!-- Begin page -->
<div id="wrapper">
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
            </div> <!-- container-fluid -->

        </div>

        <section class="section bg-gradient pb-0" id="pricing">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="title text-center m-3">
                            <h3 class="text-white">Jadwal Posyandu</h3>
                        </div>
                    </div>
                </div>
                <?= $this->session->flashdata('message'); ?>
                <!-- row end -->
                <div class="row">
                    <?php $role = $this->session->userdata('role'); ?>
                    <?php foreach ($jadwal as $jadwal) : ?>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body p-4">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="text-md-left text-center">
                                                <p>Tempat</p>
                                                <p><?= $jadwal['tempat']; ?></p>
                                                <p><?= $jadwal['keterangan']; ?></p>
                                                <p><?= $jadwal['jam_mulai']; ?> - <?= $jadwal['jam_selesai']; ?></p>
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="text-center">
                                                <h4>Tanggal</h4>
                                                <p class="mb-1"><?= tanggal_helper($jadwal['tanggal']); ?></p>
                                                <?php $kehadiran = kehadiran_bidan($jadwal['kd_jadwal']); ?>
                                                <?php if ($kehadiran) :  ?>
                                                    <?php switch ($kehadiran):
                                                        case "hadir": ?>
                                                            <div class="btn btn-success btn-rounded">Bisa Hadir</div>
                                                            <a href="#" data-toggle="modal" data-target="#ubah<?= $jadwal['kd_jadwal']; ?>" class="d-block mt-1">UBAH</a>
                                                        <?php
                                                            break;
                                                        case "tidak hadir": ?>
                                                            <div class="btn btn-danger btn-rounded">Tidak Hadir</div>
                                                            <a href="#" data-toggle="modal" data-target="#ubah<?= $jadwal['kd_jadwal']; ?>" class="d-block mt-1">UBAH</a>
                                                            <?php
                                                            break;
                                                            ?>
                                                    <?php endswitch; ?>
                                                <?php else : ?>
                                                    <?php if ($jadwal['tanggal'] == date('Y-m-d') && $jadwal['jam_mulai'] <= date("H:i:s") && $jadwal['jam_selesai'] >= date("H:i:s")) : ?>
                                                        <div class="d-inline-block mr-2">
                                                            <?= form_open_multipart("insert/bidan_hadir"); ?>
                                                            <input type="hidden" name="kd_jadwal" value="<?= $jadwal['kd_jadwal']; ?>">
                                                            <button type="submit" class="btn btn-primary btn-rounded">Hadir</button>
                                                            </form>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <button type="button" class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#tidak_hadir<?= $jadwal['kd_jadwal']; ?>">Tidak Hadir</button>
                                                        </div>
                                                    <?php elseif ($jadwal['tanggal'] > date('Y-m-d') || ($jadwal['tanggal'] === date('Y-m-d') && $jadwal['jam_mulai'] > date("H:i:s"))) : ?>
                                                        <div class=" btn btn-secondary btn-rounded">Belum Mulai
                                                        </div>
                                                    <?php else : ?>
                                                        <div class="btn btn-danger btn-rounded">Sudah Selesai</div>
                                                    <?php endif; ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Konfirmasi Tidak Hadir -->
                        <div class="modal fade" id="tidak_hadir<?= $jadwal['kd_jadwal']; ?>" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header border-bottom-0">
                                        <h4 class="modal-title">Konfirmasi Tidak Hadir</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body p-3">
                                        <?= form_open_multipart("insert/bidan_tidak_hadir"); ?>
                                        <input type="hidden" class="form-control" name="kd_jadwal" value="<?= $jadwal['kd_jadwal'] ?>" readoly>
                                        <div class="mb-3">
                                            <label for="nama" class="col-form-label">Keterangan</label>
                                            <textarea type="text" class="form-control" placeholder="Masukan Keterangan Tidak Hadir" id="keterangan" name="keterangan"></textarea>
                                        </div>
                                        <div class="text-right">
                                            <!-- Tombol Batal -->
                                            <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Batal</button>
                                            <!-- Tombol Ubah -->
                                            <button type="submit" class="btn btn-danger ml-1 waves-effect waves-light save-category">Tidak Hadir</button>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- Akhir modal body-->
                                </div>
                                <!-- Akhir modal content -->
                            </div>
                        </div>

                        <!-- Ubah Kehadiran -->
                        <div class="modal fade" id="ubah<?= $jadwal['kd_jadwal']; ?>" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header border-bottom-0">
                                        <h4 class="modal-title">Ubah Kehadiran</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body p-3">
                                        <?= form_open_multipart("ubah/kehadiran_bidan"); ?>
                                        <input type="hidden" class="form-control" name="kd_jadwal" value="<?= $jadwal['kd_jadwal'] ?>" readoly>
                                        <div class="form-group">
                                            <label class="control-label">Status Kehadiran</label>
                                            <select class="custom-select" id="inputGroupSelect01" name="status_kehadiran">
                                                <option selected>pilih</option>
                                                <option value="hadir">Hadir</option>
                                                <option value="tidak hadir">Tidak Hadir</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama" class="col-form-label">Keterangan</label>
                                            <textarea type="text" class="form-control" placeholder="Masukan Keterangan" id="keterangan" name="keterangan"></textarea>
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
                    <?php endforeach; ?>
                </div>
                <!-- end row -->
            </div>

            <!-- container-fluid end -->
        </section>
        <!-- pricing end -->
    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>