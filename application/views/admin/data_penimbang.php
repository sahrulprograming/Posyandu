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
                            <h4 class="page-title">Data penimbangan</h4>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <div>
                                        <button type="button" class="btn btn-success waves-effect waves-light width-xm mb-3" data-toggle="modal" data-target="#tambah">Tambah data</button>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th width="20%">Nama Balita</th>
                                                <th width="10%">jenis kelamin</th>
                                                <th width="10%">tanggal Lahir</th>
                                                <th width="5%">Berat Badan</th>
                                                <th width="5%">Tinggi badan</th>
                                                <th width="20%">Tanggal timbang</th>
                                                <th width="30%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($penimbang as $penimbang) : ?>
                                                <tr>
                                                    <td><?= $penimbang['nama']; ?></td>
                                                    <td class="text-center"><?= $penimbang['jenis_kelamin']; ?></td>
                                                    <!-- Format Tanggal Dari (YYYY-MM-DD) Ke (DD-MM-YYYY) -->
                                                    <?php $arr = explode('-', $penimbang['tanggal']);
                                                    $tgl_lahir = $arr[2] . '-' . $arr[1] . '-' . $arr[0]; ?>
                                                    <td><?= $tgl_lahir; ?></td>
                                                    <td><?= $penimbang['bb']; ?></td>
                                                    <td><?= $penimbang['tb']; ?></td>
                                                    <!-- Format Tanggal Dari (YYYY-MM-DD) Ke (DD-MM-YYYY) -->
                                                    <?php $arr = explode('-', $penimbang['tanggal']);
                                                    $tanggal = $arr[2] . '-' . $arr[1] . '-' . $arr[0]; ?>
                                                    <td><?= $tanggal; ?></td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-success waves-effect waves-light width-xm" data-toggle="modal" data-target="#detail<?= $penimbang['kd_penimbang']; ?>">Detail</button>
                                                        <button type="button" class="btn btn-primary waves-effect waves-light width-xm" data-toggle="modal" data-target="#ubah<?= $penimbang['kd_penimbang']; ?>">ubah</button>
                                                        <button type="button" class="btn btn-danger waves-effect waves-light width-xm" data-toggle="modal" data-target="#hapus<?= $penimbang['kd_penimbang']; ?>">hapus</button>
                                                    </td>
                                                </tr>



                                                <!-- Awal Detail Modal Dialog -->
                                                <div class=" modal fade" id="detail<?= $penimbang['kd_penimbang']; ?>" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header border-bottom-0">
                                                                <h4 class="modal-title">Detail Data penimbang</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body p-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">Keluhan</label>
                                                                    <textarea class="form-control form-white" placeholder="Ada Keluhan?" type="text" name="keluhan"><?= $penimbang['keluhan']; ?></textarea>
                                                                </div>
                                                                <div class="text-right">
                                                                    <!-- Tombol Close -->
                                                                    <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                            <!-- Akhir modal body-->
                                                        </div>
                                                        <!-- Akhir modal content -->
                                                    </div>
                                                </div>
                                                <!-- Akhir Detail modal dialog-->


                                                <!-- Awal ubah penimbang  Modal Dialog -->
                                                <div class=" modal fade" id="ubah<?= $penimbang['kd_penimbang']; ?>" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header border-bottom-0">
                                                                <h4 class="modal-title">Ubah Data penimbang</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body p-3">
                                                                <?= form_open_multipart("ubah/data_penimbang"); ?>
                                                                <!-- Mengambil Data kd Penimbang -->
                                                                <div class="form-group">
                                                                    <input class="form-control" type="hidden" name="kd_penimbang" value="<?= $penimbang['kd_penimbang']; ?>">
                                                                </div>
                                                                <!-- Nama Balita -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Nama balita</label>
                                                                    <?php $data_balita = $this->admin_model->data_balita(); ?>
                                                                    <select class="custom-select" id="inputGroupSelect01" name="nama_balita">
                                                                        <option selected value="<?= $penimbang['nama']; ?>"><?= $penimbang['nama']; ?></option>
                                                                        <?php foreach ($data_balita as $balita) : ?>
                                                                            <option value="<?= $balita['nama']; ?>"><?= $balita['nama']; ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                                <!-- Berat Badan -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Berat Badan</label>
                                                                    <input class="form-control form-white" placeholder="Masukan Berat Badan" type="number" name="bb" value="<?= $penimbang['bb']; ?>">
                                                                </div>
                                                                <!-- Tinggi Badan -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Tinggi Badan</label>
                                                                    <input class="form-control form-white" placeholder="Masukan Tinggi Badan" type="number" name="tb" value="<?= $penimbang['tb']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Keluhan</label>
                                                                    <textarea class="form-control form-white" placeholder="Ada Keluhan?" type="text" name="keluhan"><?= $penimbang['keluhan']; ?></textarea>
                                                                </div>
                                                                <div class="text-right">
                                                                    <!-- Tombol Batal -->
                                                                    <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Batal</button>
                                                                    <!-- Tombol Ubah -->
                                                                    <button type="submit" class="btn btn-success ml-1 waves-effect waves-light save-category">Ubah</button>
                                                                </div>

                                                                </form>
                                                            </div>
                                                            <!-- Akhir modal body-->
                                                        </div>
                                                        <!-- Akhir modal content -->
                                                    </div>
                                                </div>

                                                <!-- Awal Hapus Modal Dialog -->
                                                <div class="modal fade" id="hapus<?= $penimbang['kd_penimbang']; ?>" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header border-bottom-0">
                                                                <h4 class="modal-title">Hapus data penimbang</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body p-3">
                                                                <h5>Yakin ingin menghapus?</h5>
                                                                <?= form_open_multipart("hapus/data_penimbang"); ?>
                                                                <div class="mb-3">
                                                                    <input type="hidden" class="form-control" id="kd_penimbang" name="kd_penimbang" value="<?= $penimbang['kd_penimbang'] ?> ">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="nama" class="col-form-label">Data Penimbang Balita :</label>
                                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $penimbang['nama'] ?>" readoly>
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
                                                    <h4 class="modal-title">Tambah Data penimbang</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body p-3">
                                                    <?= form_open_multipart("insert/penimbang"); ?>
                                                    <!-- NIK -->
                                                    <div class="form-group">
                                                        <label class="control-label">Nama balita</label>
                                                        <?php $data_balita = $this->admin_model->data_balita(); ?>
                                                        <select class="custom-select" id="inputGroupSelect01" name="nama_balita">
                                                            <option selected>Pilih</option>
                                                            <?php foreach ($data_balita as $balita) : ?>
                                                                <option value="<?= $balita['nama']; ?>"><?= $balita['nama']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <!-- Berat Badan -->
                                                    <div class="form-group">
                                                        <label class="control-label">Berat Badan</label>
                                                        <input class="form-control form-white" placeholder="Masukan Berat Badan" type="number" name="bb">
                                                    </div>
                                                    <!-- Tinggi Badan -->
                                                    <div class="form-group">
                                                        <label class="control-label">Tinggi Badan</label>
                                                        <input class="form-control form-white" placeholder="Masukan Tinggi Badan" type="number" name="tb">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Keluhan</label>
                                                        <textarea class="form-control form-white" placeholder="Ada Keluhan?" type="text" name="keluhan"></textarea>
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