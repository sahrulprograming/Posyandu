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
                            <h4 class="page-title">Data Orang Tua</h4>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <div>
                                        <button type="button" class="btn btn-success waves-effect waves-light width-xm mb-3" data-toggle="modal" data-target="#tambah">Tambah Orang Tua</button>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th width="20%">Nama</th>
                                                <th width="20%">NIK</th>
                                                <th width="20%">No KK</th>
                                                <th width="10%">Tlp</th>
                                                <th width="30%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($orang_tua as $orang_tua) : ?>
                                                <tr>
                                                    <td><?= $orang_tua['nama']; ?></td>
                                                    <td><?= $orang_tua['nik']; ?></td>
                                                    <td><?= $orang_tua['no_kk']; ?></td>
                                                    <td><?= $orang_tua['no_tlpn']; ?></td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-success waves-effect waves-light width-xm" data-toggle="modal" data-target="#detail<?= $orang_tua['kd_ortu']; ?>">Detail</button>
                                                        <button type="button" class="btn btn-primary waves-effect waves-light width-xm" data-toggle="modal" data-target="#ubah_ortu<?= $orang_tua['kd_ortu']; ?>">ubah</button>
                                                        <button type="button" class="btn btn-danger waves-effect waves-light width-xm" data-toggle="modal" data-target="#hapus<?= $orang_tua['kd_ortu']; ?>">hapus</button>
                                                    </td>
                                                </tr>



                                                <!-- Awal  Detail Modal Dialog -->
                                                <div class=" modal fade" id="detail<?= $orang_tua['kd_ortu']; ?>" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header border-bottom-0">
                                                                <h4 class="modal-title">Detail Data Orang Tua</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body p-3">
                                                                <?= form_open_multipart("admin/ubah_ortu"); ?>
                                                                <input class="form-control form-white" type="hidden" name="kd_ortu" value="<?= $orang_tua['kd_ortu']; ?>" readonly>
                                                                <!-- Nomer KK -->
                                                                <div class="form-group">
                                                                    <label class="control-label">No KK</label>
                                                                    <input class="form-control form-white" placeholder="masukan alamat" type="text" name="no_kk" value="<?= $orang_tua['no_kk']; ?>" readonly>
                                                                </div>
                                                                <!-- NIK -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Nik</label>
                                                                    <input class="form-control form-white" placeholder="masukan nik" type="text" name="nik" value="<?= $orang_tua['nik']; ?>" readonly>
                                                                </div>
                                                                <!-- NAMA -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Nama</label>
                                                                    <input class="form-control form-white" placeholder="masukan nama" type="text" name="nama" value="<?= $orang_tua['nama']; ?>" readonly>
                                                                </div>
                                                                <!-- No Telp -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Alamat</label>
                                                                    <textarea class="form-control form-white" placeholder="Alamat" type="text" name="alamat" readonly><?= $orang_tua['alamat']; ?></textarea>
                                                                </div>
                                                                <!-- No Telp -->
                                                                <div class="form-group">
                                                                    <label class="control-label">No Telp</label>
                                                                    <input class="form-control form-white" placeholder="masukan tlp" type="text" name="no_tlpn" value="<?= $orang_tua['no_tlpn']; ?>" readonly>
                                                                </div>
                                                                <!-- Email -->
                                                                <div class="form-group">
                                                                    <label class="control-label">email</label>
                                                                    <input class="form-control form-white" placeholder="email" type="text" name="email" value="<?= $orang_tua['email']; ?>" readonly>
                                                                </div>
                                                                <!-- Status Keaktifan User -->
                                                                <div class="form-group">
                                                                    <label for="">Status</label>
                                                                    <select class="custom-select" id="inputGroupSelect01" name="status" readonly>
                                                                        <option selected><?= $orang_tua['status']; ?></option>
                                                                    </select>
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


                                                <!-- Awal Ubah_ortu  Modal Dialog -->
                                                <div class=" modal fade" id="ubah_ortu<?= $orang_tua['kd_ortu']; ?>" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header border-bottom-0">
                                                                <h4 class="modal-title">Ubah Data Orang Tua</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body p-3">
                                                                <?= form_open_multipart("ubah/orang_tua"); ?>
                                                                <input class="form-control form-white" type="hidden" name="kd_ortu" value="<?= $orang_tua['kd_ortu']; ?>">
                                                                <!-- Nomer KK -->
                                                                <div class="form-group">
                                                                    <label class="control-label">No KK</label>
                                                                    <input class="form-control form-white" placeholder="masukan alamat" type="text" name="no_kk" value="<?= $orang_tua['no_kk']; ?>">
                                                                </div>
                                                                <!-- NIK -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Nik</label>
                                                                    <input class="form-control form-white" placeholder="masukan nik" type="text" name="nik" value="<?= $orang_tua['nik']; ?>">
                                                                </div>
                                                                <!-- NAMA -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Nama</label>
                                                                    <input class="form-control form-white" placeholder="masukan nama" type="text" name="nama" value="<?= $orang_tua['nama']; ?>">
                                                                </div>
                                                                <!-- No Telp -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Alamat</label>
                                                                    <textarea class="form-control form-white" placeholder="Alamat" type="text" name="alamat"><?= $orang_tua['alamat']; ?></textarea>
                                                                </div>
                                                                <!-- No Telp -->
                                                                <div class="form-group">
                                                                    <label class="control-label">No Telp</label>
                                                                    <input class="form-control form-white" placeholder="masukan tlp" type="text" name="no_tlpn" value="<?= $orang_tua['no_tlpn']; ?>">
                                                                </div>
                                                                <!-- Email -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Email</label>
                                                                    <input class="form-control form-white" placeholder="email" type="text" name="email" value="<?= $orang_tua['email']; ?>">
                                                                </div>
                                                                <!-- Status Keaktifan User -->
                                                                <div class="form-group">
                                                                    <label for="">Status</label>
                                                                    <select class="custom-select" id="inputGroupSelect01" name="status">
                                                                        <option selected><?= $orang_tua['status']; ?></option>
                                                                        <option value="prosess">prosess</option>
                                                                        <option value="aktif">aktif</option>
                                                                        <option value="non aktif">non aktif</option>
                                                                    </select>
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
                                                <!-- Akhir Ubah_ortu  modal dialog-->


                                                <!-- Awal Hapus Modal Dialog -->
                                                <div class="modal fade" id="hapus<?= $orang_tua['kd_ortu']; ?>" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header border-bottom-0">
                                                                <h4 class="modal-title">Hapus data Orang Tua</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body p-3">
                                                                <h5>Yakin ingin menghapus?</h5>
                                                                <?= form_open_multipart("hapus/ortu"); ?>
                                                                <div class="mb-3">
                                                                    <label for="nama" class="col-form-label">Kd Orang Tua:</label>
                                                                    <input type="text" class="form-control" id="kd_ortu" name="kd_ortu" value="<?= $orang_tua['kd_ortu'] ?> " readoly>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="nama" class="col-form-label">Orang Tua:</label>
                                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $orang_tua['nama'] ?>" readoly>
                                                                </div>
                                                                <div class="text-right">
                                                                    <!-- Tombol Batal -->
                                                                    <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Batal</button>
                                                                    <!-- Tombol Ubah -->
                                                                    <button type="submit" class="btn btn-primary ml-1 waves-effect waves-light save-category">Hapus</button>
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
                                    <!-- Awal Tambah Orang Tua -->
                                    <div class=" modal fade" id="tambah" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header border-bottom-0">
                                                    <h4 class="modal-title">Tambah Data Orang Tua</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body p-3">
                                                    <?= form_open_multipart("insert/ortu"); ?>
                                                    <!-- NO KK -->
                                                    <div class="form-group">
                                                        <label class="control-label">No KK</label>
                                                        <input class="form-control form-white" placeholder="masukan No KK" type="number" name="no_kk" required>
                                                    </div>
                                                    <!-- NIK -->
                                                    <div class="form-group">
                                                        <label class="control-label">NIK</label>
                                                        <input class="form-control form-white" placeholder="masukan NIK" type="number" name="nik" required>
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
                                    <!-- Akhir Tambah Orang Tua -->
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
</div>
<!-- END wrapper -->