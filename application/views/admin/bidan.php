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
                            <h4 class="page-title">Data Bidan</h4>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <div>
                                        <button type="button" class="btn btn-success waves-effect waves-light width-xm mb-3" data-toggle="modal" data-target="#tambah">Tambah Bidan</button>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th width="20%">Nama</th>
                                                <th width="20%">NIK</th>
                                                <th width="20%">Email</th>
                                                <th width="10%">No Tlp</th>
                                                <th width="30%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($bidan as $bidan) : ?>
                                                <tr>
                                                    <td><?= $bidan['nama']; ?></td>
                                                    <td><?= $bidan['nik']; ?></td>
                                                    <td><?= $bidan['email']; ?></td>
                                                    <td><?= $bidan['no_tlpn']; ?></td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-success waves-effect waves-light width-xm" data-toggle="modal" data-target="#detail<?= $bidan['kd_bidan']; ?>">Detail</button>
                                                        <button type="button" class="btn btn-primary waves-effect waves-light width-xm" data-toggle="modal" data-target="#ubah_bidan<?= $bidan['kd_bidan']; ?>">ubah</button>
                                                        <button type="button" class="btn btn-danger waves-effect waves-light width-xm" data-toggle="modal" data-target="#hapus<?= $bidan['kd_bidan']; ?>">hapus</button>
                                                    </td>
                                                </tr>



                                                <!-- Awal  Detail Modal Dialog -->
                                                <div class=" modal fade" id="detail<?= $bidan['kd_bidan']; ?>" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header border-bottom-0">
                                                                <h4 class="modal-title">Detail Data Orang Tua</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body p-3">
                                                                <?= form_open_multipart("admin/ubah_bidan"); ?>
                                                                <input class="form-control form-white" type="hidden" name="kd_bidan" value="<?= $bidan['kd_bidan']; ?>" readonly>
                                                                <!-- NIK -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Nik</label>
                                                                    <input class="form-control form-white" placeholder="masukan nik" type="text" name="nik" value="<?= $bidan['nik']; ?>" readonly>
                                                                </div>
                                                                <!-- NAMA -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Nama</label>
                                                                    <input class="form-control form-white" placeholder="masukan nama" type="text" name="nama" value="<?= $bidan['nama']; ?>" readonly>
                                                                </div>
                                                                <!-- No Telp -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Alamat</label>
                                                                    <textarea class="form-control form-white" placeholder="Alamat" type="text" name="alamat" readonly><?= $bidan['alamat']; ?></textarea>
                                                                </div>
                                                                <!-- No Telp -->
                                                                <div class="form-group">
                                                                    <label class="control-label">No Telp</label>
                                                                    <input class="form-control form-white" placeholder="masukan tlp" type="text" name="no_tlpn" value="<?= $bidan['no_tlpn']; ?>" readonly>
                                                                </div>
                                                                <!-- Email -->
                                                                <div class="form-group">
                                                                    <label class="control-label">email</label>
                                                                    <input class="form-control form-white" placeholder="email" type="text" name="email" value="<?= $bidan['email']; ?>" readonly>
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


                                                <!-- Awal ubah_bidan  Modal Dialog -->
                                                <div class=" modal fade" id="ubah_bidan<?= $bidan['kd_bidan']; ?>" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header border-bottom-0">
                                                                <h4 class="modal-title">Ubah Data Bidan</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body p-3">
                                                                <?= form_open_multipart("ubah/bidan"); ?>
                                                                <input class="form-control form-white" type="hidden" name="kd_bidan" value="<?= $bidan['kd_bidan']; ?>">
                                                                <!-- NIK -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Nik</label>
                                                                    <input class="form-control form-white" placeholder="masukan nik" type="text" name="nik" value="<?= $bidan['nik']; ?>">
                                                                </div>
                                                                <!-- NAMA -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Nama</label>
                                                                    <input class="form-control form-white" placeholder="masukan nama" type="text" name="nama" value="<?= $bidan['nama']; ?>">
                                                                </div>
                                                                <!-- No Telp -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Alamat</label>
                                                                    <textarea class="form-control form-white" placeholder="Alamat" type="text" name="alamat"><?= $bidan['alamat']; ?></textarea>
                                                                </div>
                                                                <!-- No Telp -->
                                                                <div class="form-group">
                                                                    <label class="control-label">No Telp</label>
                                                                    <input class="form-control form-white" placeholder="masukan tlp" type="text" name="no_tlpn" value="<?= $bidan['no_tlpn']; ?>">
                                                                </div>
                                                                <!-- Email -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Email</label>
                                                                    <input class="form-control form-white" placeholder="email" type="text" name="email" value="<?= $bidan['email']; ?>">
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
                                                <!-- Akhir ubah_bidan  modal dialog-->


                                                <!-- Awal Hapus Modal Dialog -->
                                                <div class="modal fade" id="hapus<?= $bidan['kd_bidan']; ?>" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header border-bottom-0">
                                                                <h4 class="modal-title">Hapus data Bidan</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body p-3">
                                                                <h5>Yakin ingin menghapus?</h5>
                                                                <?= form_open_multipart("hapus/bidan"); ?>
                                                                <div class="mb-3">
                                                                    <input type="hidden" class="form-control" id="kd_bidan" name="kd_bidan" value="<?= $bidan['kd_bidan'] ?> " readoly>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="nama" class="col-form-label">Bidan :</label>
                                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $bidan['nama'] ?>" readoly>
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
                                                    <h4 class="modal-title">Ubah Data Bidan</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body p-3">
                                                    <?= form_open_multipart("insert/bidan"); ?>
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