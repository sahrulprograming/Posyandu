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
                                                        <button type="button" class="btn btn-info waves-effect waves-light width-xm" data-toggle="modal" data-target="#detail<?= $balita['kd_balita']; ?>">Detail</button>
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