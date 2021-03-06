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
                            <h4 class="page-title">Data Balita</h4>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <div>
                                        <button type="button" class="btn btn-success waves-effect waves-light width-xm mb-3" data-toggle="modal" data-target="#tambah">Tambah balita</button>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th width="23%">Nama Balita</th>
                                                <th width="2%">jenis kelamin</th>
                                                <th width="10%">tanggal Lahir</th>
                                                <th width="15%">Nama Orang tua</th>
                                                <th width="15%">Bidan Perawat</th>
                                                <th width="35%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($balita as $balita) : ?>
                                                <tr>
                                                    <td><?= $balita['nama_balita']; ?></td>
                                                    <td class="text-center"><?= $balita['jenis_kelamin']; ?></td>
                                                    <td><?= $balita['tgl_lahir']; ?></td>
                                                    <td><?= $balita['nama_orang_tua']; ?></td>
                                                    <td><?= $balita['nama_bidan']; ?></td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-success waves-effect waves-light width-xm" data-toggle="modal" data-target="#detail<?= $balita['kd_balita']; ?>">Detail</button>
                                                        <button type="button" class="btn btn-primary waves-effect waves-light width-xm" data-toggle="modal" data-target="#ubah_balita<?= $balita['kd_balita']; ?>">ubah</button>
                                                        <button type="button" class="btn btn-danger waves-effect waves-light width-xm" data-toggle="modal" data-target="#hapus<?= $balita['kd_balita']; ?>">hapus</button>
                                                    </td>
                                                </tr>



                                                <!-- Awal Detail Modal Dialog -->
                                                <div class=" modal fade" id="detail<?= $balita['kd_balita']; ?>" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header border-bottom-0">
                                                                <h4 class="modal-title">Detail Data Balita</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body p-3">
                                                                <div class="row">
                                                                    <div class="col-5">
                                                                        <label>NIK</label>
                                                                    </div>
                                                                    <div class="col-1 text-right">
                                                                        :
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label><?= $balita['nik']; ?></label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-5">
                                                                        <label>NAMA</label>
                                                                    </div>
                                                                    <div class="col-1 text-right">
                                                                        :
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label><?= $balita['nama_balita']; ?></label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-5">
                                                                        <label>JENIS KELAMIN</label>
                                                                    </div>
                                                                    <div class="col-1 text-right">
                                                                        :
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label><?= $balita['jenis_kelamin']; ?></label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-5">
                                                                        <label>TANGGAL LAHIR</label>
                                                                    </div>
                                                                    <div class="col-1 text-right">
                                                                        :
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label><?= $balita['tgl_lahir']; ?></label>
                                                                    </div>
                                                                </div>
                                                                <!-- Query ke database Cek Data penimbang kd_balita -->
                                                                <?php
                                                                $data_balita = cek_penimbangan($balita['kd_balita']);
                                                                ?>
                                                                <div class="row">
                                                                    <div class="col-5">
                                                                        <label>BERAT BADAN</label>
                                                                    </div>
                                                                    <div class="col-1 text-right">
                                                                        :
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label><?= $data_balita['bb']; ?></label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-5">
                                                                        <label>TINGGI BADAN</label>
                                                                    </div>
                                                                    <div class="col-1 text-right">
                                                                        :
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label><?= $data_balita['tb']; ?></label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-5">
                                                                        <label>KELUHAN</label>
                                                                    </div>
                                                                    <div class="col-1 text-right">
                                                                        :
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label><?= $data_balita['keluhan']; ?></label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-5">
                                                                        <label>NAMA ORANG TUA</label>
                                                                    </div>
                                                                    <div class="col-1 text-right">
                                                                        :
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label><?= $balita['nama_orang_tua']; ?></label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-5">
                                                                        <label>NAMA BIDAN PERAWAT</label>
                                                                    </div>
                                                                    <div class="col-1 text-right">
                                                                        :
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label><?= $balita['nama_bidan']; ?></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Akhir modal body-->
                                                        </div>
                                                        <!-- Akhir modal content -->
                                                    </div>
                                                </div>
                                                <!-- Akhir Detail modal dialog-->


                                                <!-- Awal ubah balita  Modal Dialog -->
                                                <div class=" modal fade" id="ubah_balita<?= $balita['kd_balita']; ?>" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header border-bottom-0">
                                                                <h4 class="modal-title">Ubah Data balita</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body p-3">
                                                                <?= form_open_multipart("ubah/balita"); ?>
                                                                <input class="form-control form-white" type="hidden" name="kd_balita" value="<?= $balita['kd_balita']; ?>" readonly>
                                                                <!-- NIK -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Nik</label>
                                                                    <input class="form-control form-white" placeholder="masukan nik" type="number" name="nik" value="<?= $balita['nik']; ?>">
                                                                </div>
                                                                <!-- NAMA -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Nama</label>
                                                                    <input class="form-control form-white" placeholder="masukan nama" type="text" name="nama" value="<?= $balita['nama_balita']; ?>">
                                                                </div>
                                                                <!-- Jenis Kelamin -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Jenis kelamin</label>
                                                                    <select class="custom-select" id="inputGroupSelect01" name="jenis_kelamin">
                                                                        <option selected><?= $balita['jenis_kelamin']; ?></option>
                                                                        <option value="P">Perempuan</option>
                                                                        <option value="L">Laki - Laki</option>
                                                                    </select>
                                                                </div>
                                                                <!-- tanggal Lahir -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Tanggal Lahir</label>
                                                                    <input class="form-control form-white" type="date" name="tgl_lahir" value="<?= $balita['tgl_lahir']; ?>">
                                                                </div>
                                                                <!-- Nama Ortu -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Nama orang tua</label>
                                                                    <?php
                                                                    $ortu_sekarang = $balita['nama_orang_tua'];
                                                                    $orang_tua = $this->db->query("SELECT nama FROM orang_tua WHERE nama != '$ortu_sekarang'")->result_array();
                                                                    ?>
                                                                    <select class="custom-select" id="inputGroupSelect01" name="nama_ortu">
                                                                        <option selected><?= $balita['nama_orang_tua']; ?></option>
                                                                        <?php foreach ($orang_tua as $orang_tua) : ?>
                                                                            <option value="<?= $orang_tua['nama']; ?>"><?= $orang_tua['nama']; ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                                <!-- Nama Bidan -->
                                                                <div class="form-group">
                                                                    <label class="control-label">Nama Bidan Perawat</label>
                                                                    <?php
                                                                    $bidan_sekarang = $balita['nama_bidan'];
                                                                    $bidan = $this->db->query("SELECT nama From bidan WHERE nama != '$bidan_sekarang'")->result_array();
                                                                    ?>
                                                                    <select class="custom-select" id="inputGroupSelect01" name="nama_bidan">
                                                                        <option selected value="<?= $balita['nama_bidan']; ?>"><?= $balita['nama_bidan']; ?></option>
                                                                        <?php foreach ($bidan as $bidan) : ?>
                                                                            <option value="<?= $bidan['nama']; ?>"><?= $bidan['nama']; ?></option>
                                                                        <?php endforeach; ?>
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
                                                <!-- Akhir ubah_balita  modal dialog-->

                                                <!-- Awal Hapus Modal Dialog -->
                                                <div class="modal fade" id="hapus<?= $balita['kd_balita']; ?>" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header border-bottom-0">
                                                                <h4 class="modal-title">Hapus data balita</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body p-3">
                                                                <h5>Yakin ingin menghapus?</h5>
                                                                <?= form_open_multipart("hapus/balita"); ?>
                                                                <div class="mb-3">
                                                                    <input type="hidden" class="form-control" id="kd_balita" name="kd_balita" value="<?= $balita['kd_balita'] ?> " readoly>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="nama" class="col-form-label">balita :</label>
                                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $balita['nama_balita'] ?>" readoly>
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
                                                    <h4 class="modal-title">Ubah Data balita</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body p-3">
                                                    <?= form_open_multipart("insert/balita"); ?>
                                                    <!-- NIK -->
                                                    <div class="form-group">
                                                        <label class="control-label">NIK</label>
                                                        <input class="form-control form-white" placeholder="masukan nik" type="number" name="nik" required>
                                                    </div>
                                                    <!-- NAMA -->
                                                    <div class="form-group">
                                                        <label class="control-label">Nama</label>
                                                        <input class="form-control form-white" placeholder="masukan nama" type="text" name="nama" required>
                                                    </div>
                                                    <!-- Jenis Kelamin -->
                                                    <div class="form-group">
                                                        <label for="">Jenis Kelamin</label>
                                                        <select class="custom-select" id="inputGroupSelect01" name="jenis_kelamin">
                                                            <option selected>Pilih</option>
                                                            <option value="P">Perempuan</option>
                                                            <option value="L">Laki - Laki</option>
                                                        </select>
                                                    </div>
                                                    <!-- No Telp -->
                                                    <div class="form-group">
                                                        <label class="control-label">Tanggal Lahir</label>
                                                        <input class="form-control form-white" placeholder="masukan tlp" type="date" name="tgl_lahir" required>
                                                    </div>
                                                    <!-- Orang Tua -->
                                                    <div class="form-group">
                                                        <label class="control-label">Nama orang tua</label>
                                                        <?php
                                                        $orang_tua = $this->db->query("SELECT nama FROM orang_tua")->result_array();
                                                        ?>
                                                        <select class="custom-select" id="inputGroupSelect01" name="nama_ortu">
                                                            <option selected>Pilih</option>
                                                            <?php foreach ($orang_tua as $orang_tua) : ?>
                                                                <option value="<?= $orang_tua['nama']; ?>"><?= $orang_tua['nama']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <!-- Bidan -->
                                                    <div class="form-group">
                                                        <label class="control-label">Bidan Perawat</label>
                                                        <?php $bidan = $this->db->query("SELECT nama From bidan")->result_array();

                                                        ?>
                                                        <select class="custom-select" id="inputGroupSelect01" name="nama_bidan">
                                                            <option selected>Pilih</option>
                                                            <?php foreach ($bidan as $bidan) : ?>
                                                                <option value="<?= $bidan['nama']; ?>"><?= $bidan['nama']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
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