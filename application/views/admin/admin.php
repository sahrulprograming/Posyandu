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
                            <h4 class="page-title">Data admin</h4>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <div>
                                        <button type="button" class="btn btn-success waves-effect waves-light width-xm mb-3" data-toggle="modal" data-target="#tambah">Tambah Admin</button>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th width="30%">NAMA</th>
                                                <th width="50%">ALAMAT</th>
                                                <th width="10%">NOMER HP</th>
                                                <th width="10%">AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($admin as $admin) : ?>
                                                <tr>
                                                    <td><?= $admin['nama']; ?></td>
                                                    <td><?= $admin['alamat']; ?></td>
                                                    <td><?= $admin['no_tlpn']; ?></td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-danger waves-effect waves-light width-xm" data-toggle="modal" data-target="#hapus<?= $admin['kd_admin']; ?>">hapus</button>
                                                    </td>
                                                </tr>

                                                <!-- Awal Hapus Modal Dialog -->
                                                <div class="modal fade" id="hapus<?= $admin['kd_admin']; ?>" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header border-bottom-0">
                                                                <h4 class="modal-title">Hapus data admin</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body p-3">
                                                                <h5>Yakin ingin menghapus?</h5>
                                                                <?= form_open_multipart("hapus/admin"); ?>
                                                                <div class="mb-3">
                                                                    <input type="hidden" class="form-control" id="kd_admin" name="kd_admin" value="<?= $admin['kd_admin'] ?> " readoly>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="nama" class="col-form-label">admin Brnama :</label>
                                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $admin['nama'] ?>" readoly>
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
                                                    <h4 class="modal-title">Tambah admin</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body p-3">
                                                    <?= form_open_multipart("insert/admin"); ?>
                                                    <!-- NIK -->
                                                    <div class="form-group">
                                                        <label class="control-label">NIK</label>
                                                        <input class="form-control form-white" placeholder="masukan nik" type="number" name="nik">
                                                    </div>
                                                    <!-- NAMA -->
                                                    <div class="form-group">
                                                        <label class="control-label">Nama</label>
                                                        <input class="form-control form-white" placeholder="masukan nama" type="text" name="nama" required>
                                                    </div>
                                                    <!-- No Telp -->
                                                    <div class="form-group">
                                                        <label class="control-label">Alamat</label>
                                                        <textarea class="form-control form-white" placeholder="Alamat" type="text" name="alamat"></textarea>
                                                    </div>
                                                    <!-- No Telp -->
                                                    <div class="form-group">
                                                        <label class="control-label">No Telp</label>
                                                        <input class="form-control form-white" placeholder="masukan tlp" type="number" name="no_tlpn">
                                                    </div>
                                                    <!-- Email -->
                                                    <div class="form-group">
                                                        <label class="control-label">Email</label>
                                                        <input class="form-control form-white" placeholder="email" type="text" name="email">
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