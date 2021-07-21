<!-- Begin page -->
<div id="wrapper">
    <div class="content-page">
        <div class="content">
            <section class="section">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="title text-center mb-5">
                                <h3 class="mb-3">Anggota Posyandu</h3>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <?php foreach ($anggota as $anggota) : ?>
                            <div class="col-lg-4 col-sm-6 text-center" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1500">
                                <div class=" card services-box">
                                    <div class="card-body p-4">
                                        <div class="services-icon mb-3">
                                            <img class="kader" src="<?= base_url('assets_posyandu/img/profile/' . $anggota['foto']); ?>" alt="Foto Kader Posyandu" width="200px">
                                        </div>
                                        <h4 class="mb-3"><?= $anggota['nama']; ?></h4>
                                        <p><?= $anggota['posisi']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- row end -->
                </div>
                <!-- container-fluid end -->
            </section>
        </div>
    </div>
</div>