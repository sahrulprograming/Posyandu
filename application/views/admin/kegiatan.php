<!-- Begin page -->
<div id="wrapper">
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
            </div> <!-- container-fluid -->

        </div>

        <!-- content -->
        <section class="section" id="demos">
            <div class="container-fluid">
                <div class="row justify-content-center ">
                    <div class="col-lg-5">
                        <div class="title text-center mb-3">
                            <h3>Kegiatan Posyandu Mawar 20</h3>
                        </div>
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#posting">
                    Posting kegiatan
                </button>

                <!-- Modal -->
                <div class="modal fade" id="posting" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <?= form_open_multipart("admin/upload_kegiatan"); ?>
                            <div class="modal-header">
                                <h5 class="modal-title" id="posting">Posting kegiatan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="formFileSm" class="form-label">Pilih Gambar</label>
                                    <input class="form-control form-control-sm" id="formFileSm" name="gambar" type="file">
                                </div>
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul Kegiatan</label>
                                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul">
                                    <?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                                    <?= form_error('keterangan', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Uploud</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($kegiatan as $kegiatan) : ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="demo-box text-center card p-2">
                                <a href="#" class="text-dark">
                                    <div class="position-relative demo-content">
                                        <div class="demo-img">
                                            <img src="<?= base_url('assets_tinta') ?>/img/kegiatan/<?= $kegiatan['foto_kegiatan']; ?>" alt="" class="img-fluid mx-auto d-block rounded">
                                        </div>
                                        <div class="demo-overlay">
                                            <div class="overlay-icon">
                                                <i class="pe-7s-expand1 h1 text-white"></i>
                                            </div>
                                        </div>
                                        <div class="card-body p-1">
                                            <div class="services-icon">
                                                <i class="pe-7s-display1 h3 mt-0"></i>
                                            </div>
                                            <h4><?= $kegiatan['judul']; ?></h4>
                                            <!-- Button trigger modal -->
                                            <a href="#" class="text-primary" data-toggle="modal" data-target="#keterangan<?= $kegiatan['kd_kegiatan']; ?>">Selengkapnya <i class="mdi mdi-arrow-right ml-1"></i></a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="keterangan<?= $kegiatan['kd_kegiatan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle"><?= $kegiatan['judul']; ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?= $kegiatan['keterangan']; ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- row end -->
                <div class="row">
                    <div class="col-12">
                        <div class="text-center mt-4">
                            <button class="btn btn-primary btn-rounded">Lebih Lanjut<i class="mdi mdi-arrow-right ml-1"></i></button>
                        </div>
                    </div>
                </div>
                <!-- row end -->

            </div>
            <!-- container-fluid end -->
        </section>
    </div>
    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
</div>