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
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <?= form_open_multipart("admin/upload_kegiatan"); ?>
                            <div class="modal-header">
                                <h5 class="modal-title" id="posting">Posting kegiatan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="gambar">
                                        <label class="custom-file-label" for="inputGroupFile01">Pilih Gambar</label>
                                    </div>
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
                                        <div class="row">
                                            <div class="col">
                                                <button class="btn btn-primary" data-toggle="modal" data-target="#ubah<?= $kegiatan['kd_kegiatan']; ?>">Ubah</button>
                                            </div>
                                            <div class="col">
                                            </div>
                                            <div class="col">

                                                <button class="btn btn-danger" data-toggle="modal" data-target="#hapus<?= $kegiatan['kd_kegiatan']; ?>">Hapus</button>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- Awal selengkapnya Modal -->
                        <div class="modal fade" id="keterangan<?= $kegiatan['kd_kegiatan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle"><?= $kegiatan['judul']; ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="demo-img img-thumbnail">
                                            <img src="<?= base_url('assets_tinta') ?>/img/kegiatan/<?= $kegiatan['foto_kegiatan']; ?>" alt="" class="img-fluid mx-auto d-block rounded">
                                        </div>
                                        <h1 class="text-center"><?= $kegiatan['judul']; ?></h1>
                                        <div class="container mt-3 text-center">
                                            <p>
                                                <?= $kegiatan['keterangan']; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir slengkapnya Modal -->

                        <!-- Awal Ubah Kegiatan -->
                        <div class="modal fade" id="ubah<?= $kegiatan['kd_kegiatan']; ?>" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header border-bottom-0">
                                        <h4 class="modal-title">Ubah data kegiatan</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body p-3">
                                        <?= form_open_multipart("ubah/kegiatan"); ?>
                                        <div class="mb-3">
                                            <input type="hidden" name="kd_kegiatan" value="<?= $kegiatan['kd_kegiatan']; ?>">
                                        </div>
                                        <div class="card rounded mx-auto d-block" style="width: 18rem;">
                                            <img class="card-img-top" src="<?= base_url('assets_tinta') ?>/img/kegiatan/<?= $kegiatan['foto_kegiatan']; ?>" alt="Card image cap">
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFileMultiple" class="form-label">Ubah Foto Kegiatan</label>
                                            <input class="form-control" type="file" id="formFileMultiple" name="foto_kegiatan" multiple>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama" class="col-form-label">Ubah Judul</label>
                                            <input type="text" class="form-control" id="judul" name="judul" value="<?= $kegiatan['judul'] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama" class="col-form-label">Ubah Judul</label>
                                            <textarea type="text" class="form-control" id="keterangan" name="keterangan" rows="8"><?= $kegiatan['keterangan'] ?></textarea>
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
                        <!-- Akhir Ubah Kegiatan -->
                        <!-- Awal Hapus Kegiatan Modal -->
                        <div class="modal fade" id="hapus<?= $kegiatan['kd_kegiatan']; ?>" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header border-bottom-0">
                                        <h4 class="modal-title">Hapus data kegiatan</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body p-3">
                                        <h5>Yakin ingin menghapus?</h5>
                                        <?= form_open_multipart("hapus/kegiatan"); ?>
                                        <div class="mb-3">
                                            <input type="hidden" name="kd_kegiatan" value="<?= $kegiatan['kd_kegiatan']; ?>">
                                            <input type="hidden" name="foto_kegiatan" value="<?= $kegiatan['foto_kegiatan']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama" class="col-form-label">kegiatan dengen Judul :</label>
                                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $kegiatan['judul'] ?>" readoly>
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
                        <!-- Akhir Hapus Kegiatan Modal -->
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