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

                                        <div class="col-md-4">
                                            <div class="text-center">
                                                <h4>Tanggal</h4>
                                                <p class="mb-1"><?= tanggal_helper($jadwal['tanggal']); ?></p>
                                                <?php if (strtolower($role) != 'anggota') : ?>
                                                    <?php $antrian = antrian($jadwal['kd_jadwal']); ?>
                                                    <?php if ($antrian) :  ?>
                                                        <?php switch ($antrian['status']):
                                                            case "dalam antrian": ?>
                                                                <h5>No antrian <br> <?= $antrian['no_antrian']; ?></h5>
                                                                <div class="mt-2">
                                                                    <a href="javascript:;" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#cek_bidan<?= $jadwal['kd_jadwal']; ?>">Cek Bidan</a>
                                                                </div>
                                                            <?php
                                                                break;
                                                            case "hadir": ?>
                                                                <div class="btn btn-success btn-rounded">Hadir</div>
                                                            <?php
                                                                break;
                                                            case "tidak hadir": ?>
                                                                <div class="btn btn-danger btn-rounded">Tidak Hadir</div>
                                                                <?php
                                                                break;
                                                                ?>
                                                        <?php endswitch; ?>
                                                    <?php else : ?>
                                                        <?php if ($jadwal['tanggal'] == date('Y-m-d') && $jadwal['jam_mulai'] <= date("H:i:s") && $jadwal['jam_selesai'] >= date("H:i:s")) : ?>
                                                            <div>
                                                                <?= form_open_multipart("insert/antrian"); ?>
                                                                <input type="hidden" name="kd_jadwal" value="<?= $jadwal['kd_jadwal']; ?>">
                                                                <button type="submit" class="btn btn-primary btn-rounded">Antri</button>
                                                                </form>
                                                            </div>
                                                        <?php elseif ($jadwal['tanggal'] > date('Y-m-d') || ($jadwal['tanggal'] === date('Y-m-d') && $jadwal['jam_mulai'] > date("H:i:s"))) : ?>
                                                            <div class="btn btn-secondary btn-rounded">Belum Mulai</div>
                                                        <?php else : ?>
                                                            <div class="btn btn-danger btn-rounded">Sudah Selesai</div>
                                                        <?php endif; ?>
                                                    <?php endif ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="text-center">
                                                <?php if ($jumlah_balita > 0) : ?>
                                                    <h4>RP. <?= to_rupiah($jadwal['kas_PMT'] * $jumlah_balita)  ?></h4>
                                                <?php else : ?>
                                                    <h4>RP. <?= to_rupiah($jadwal['kas_PMT'])  ?></h4>
                                                <?php endif; ?>
                                                <p class="mb-1">Uang Kas PMT</p>
                                                <?php if (strtolower($role) != 'anggota') : ?>
                                                    <?php $status = $this->akun_model->status_pmt($jadwal['kd_jadwal']);
                                                    if ($status['status_bayar'] == "menunggu") :
                                                    ?>
                                                        <button type="submit" class="btn btn-primary btn-rounded" name="menunggu"><?= $status['status_bayar']; ?></button>
                                                        <p class="mt-2"><a href="https://api.whatsapp.com/send?phone=<?= nohp_admin(); ?>&text=Admin Saya ingin bayar PMT atas nama <?= $profile['nama']; ?>" class="tooltip-test" title="To Whatsapp">Hubungi Admin</a></p>
                                                    <?php elseif ($status['status_bayar'] == 'lunas') : ?>
                                                        <button type="submit" class="btn btn-success btn-rounded" name="lunas"><?= $status['status_bayar']; ?></button>
                                                    <?php else : ?>
                                                        <div>
                                                            <?= form_open_multipart("insert/status_pmt"); ?>
                                                            <input type="hidden" name="kd_jadwal" value="<?= $jadwal['kd_jadwal']; ?>">
                                                            <input type="hidden" name="kd_ortu" value="<?= $this->session->userdata('kd_ortu'); ?>">
                                                            <input type="hidden" name="status" value="menunggu">
                                                            <button type="submit" class="btn btn-primary btn-rounded" name="bayar">Bayar</button>
                                                            </form>
                                                        </div>
                                                    <?php endif ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="cek_bidan<?= $jadwal['kd_jadwal']; ?>" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header border-bottom-0">
                                        <h4 class="modal-title">Bidan Yang Hadir</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body p-3">
                                        <?php $bidan = daftar_bidan_hadir($jadwal['kd_jadwal']) ?>
                                        <ul class="list-group list-group-flush">
                                            <?php foreach ($bidan as $b) : ?>
                                                <li class="list-group-item"><?= $b['nama']; ?></li>
                                            <?php endforeach; ?>
                                        </ul>
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