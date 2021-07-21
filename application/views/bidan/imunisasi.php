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
                            <h4 class="page-title">Data imunisasi</h4>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <?= $this->session->flashdata('message'); ?>
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th width="20%">Nama Balita</th>
                                                <th width="10%">jenis kelamin</th>
                                                <th width="10%">tanggal Lahir</th>
                                                <th width="10%">Jenis Imunisasi</th>
                                                <th width="20%">Tanggal Imunisasi</th>
                                                <th width="30%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($imunisasi as $imunisasi) : ?>
                                                <tr>
                                                    <td><?= $imunisasi['nama']; ?></td>
                                                    <td class="text-center"><?= $imunisasi['jenis_kelamin']; ?></td>
                                                    <!-- Format Tanggal Dari (YYYY-MM-DD) Ke (DD-MM-YYYY) -->
                                                    <?php $arr = explode('-', $imunisasi['tgl_lahir']);
                                                    $tgl_lahir = $arr[2] . '-' . $arr[1] . '-' . $arr[0]; ?>
                                                    <td><?= $tgl_lahir; ?></td>
                                                    <td><?= $imunisasi['jenis_imunisasi']; ?></td>

                                                    <!-- Format Tanggal Dari (YYYY-MM-DD) Ke (DD-MM-YYYY) -->
                                                    <?php $arr = explode('-', $imunisasi['tanggal']);
                                                    $tanggal = $arr[2] . '-' . $arr[1] . '-' . $arr[0]; ?>
                                                    <td><?= $tanggal; ?></td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-success waves-effect waves-light width-xm" data-toggle="modal" data-target="#detail<?= $imunisasi['kd_imunisasi']; ?>">Detail</button>
                                                    </td>
                                                </tr>



                                                <!-- Awal Detail Modal Dialog -->
                                                <div class=" modal fade" id="detail<?= $imunisasi['kd_imunisasi']; ?>" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header border-bottom-0">
                                                                <h4 class="modal-title">Detail Data imunisasi</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body p-3">
                                                                <div class="row">
                                                                    <div class="col-5"><label>KETERANGAN</label></div>
                                                                    <div class="col-1 text-right">:</div>
                                                                    <div class="col-6"><label><?= $imunisasi['keterangan']; ?></label></div>
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
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>

                                    <!-- Awal Tambah  Modal Dialog -->
                                    <div class=" modal fade" id="tambah" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header border-bottom-0">
                                                    <h4 class="modal-title">Tambah Data imunisasi</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body p-3">
                                                    <?= form_open_multipart("insert/data_imunisasi"); ?>
                                                    <!-- Nama Balita -->
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
                                                        <label class="control-label">Jenis Imunisasi</label>
                                                        <input class="form-control form-white" placeholder="Masukan Jenis Imunisasi" type="text" name="jenis_imunisasi">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Keterangan</label>
                                                        <textarea class="form-control form-white" placeholder="Keterangan Imunisasi" type="text" name="keterangan"></textarea>
                                                    </div>
                                                    <div class="text-right">
                                                        <!-- Tombol Batal -->
                                                        <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Batal</button>
                                                        <!-- Tombol Ubah -->
                                                        <button type="submit" class="btn btn-success ml-1 waves-effect waves-light save-category">Tambah</button>
                                                    </div>
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