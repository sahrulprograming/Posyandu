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
                <!-- row end -->
                <?php foreach ($jadwal as $jadwal) : ?>
                    <div class="row">
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
                                                <p class="mb-1"><?= $jadwal['tanggal']; ?></p>
                                                <div>
                                                    <a href="#" class="btn btn-success btn-rounded">Daftar</a>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="text-center">
                                                <h4>Rp.<?= number_format($jadwal['kas_pmt'], 0, ",", "."); ?></h4>
                                                <p class="mb-1">Uang Kas PMT</p>
                                                <div>
                                                    <a href="#" class="btn btn-success btn-rounded">Bayar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
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