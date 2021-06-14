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
                    <?php foreach ($jadwal as $jadwal) : ?>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body p-4">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="text-md-left text-center">
                                                <p>Tempat</p>
                                                <p><?= $jadwal['tempat']; ?></p>
                                                <p><?= $jadwal['jam_mulai']; ?> - <?= $jadwal['jam_selesai']; ?></p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="text-center">
                                                <h4>Tanggal</h4>
                                                <?php $arr = explode('-', $jadwal['tanggal']);
                                                $date = $arr[2] . '-' . $arr[1] . '-' . $arr[0];
                                                ?>
                                                <p class="mb-1"><?= $date; ?></p>
                                                <?php $antrian = antrian($jadwal['kd_jadwal']); ?>
                                                <?php if ($antrian) :  ?>
                                                    <h5>No antrian <br> <?= $antrian['no_antrian']; ?></h5>
                                                <?php else : ?>
                                                    <div>
                                                        <?= form_open_multipart("insert/antrian"); ?>
                                                        <input type="hidden" name="kd_jadwal" value="<?= $jadwal['kd_jadwal']; ?>">
                                                        <button type="submit" class="btn btn-success btn-rounded">Daftar</button>
                                                        </form>
                                                    </div>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="text-center">
                                                <h4>Rp.<?= number_format($jadwal['kas_PMT'] * $jumlah_balita, 0, ",", "."); ?></h4>
                                                <p class="mb-1">Uang Kas PMT</p>
                                                <?php $status = $this->akun_model->status_pmt($jadwal['kd_jadwal']);
                                                if ($status['status_bayar'] == "menunggu") :
                                                ?>
                                                    <button type="submit" class="btn btn-primary btn-rounded" name="bayar"><?= $status['status_bayar']; ?></button>
                                                <?php elseif ($status['status_bayar'] == 'lunas') : ?>
                                                    <button type="submit" class="btn btn-success btn-rounded" name="bayar"><?= $status['status_bayar']; ?></button>
                                                <?php else : ?>
                                                    <div>
                                                        <?= form_open_multipart("insert/status_pmt"); ?>
                                                        <input type="hidden" name="kd_jadwal" value="<?= $jadwal['kd_jadwal']; ?>">
                                                        <input type="hidden" name="kd_ortu" value="<?= $this->session->userdata('kd_ortu'); ?>">
                                                        <input type="hidden" name="status" value="menunggu">
                                                        <button type="submit" class="btn btn-success btn-rounded" name="bayar">Bayar</button>
                                                        </form>
                                                    </div>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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