<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Posyandu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->

    <!-- App css -->
    <link href="<?php echo base_url() . 'assets2' ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'assets2' ?>/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'assets2' ?>/css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- Navigation Bar-->
    <header id="topnav">


        <?php $this->load->view('user/akun/topbar') ?>

        <?php $this->load->view('user/akun/sidebar') ?>
        <!-- end navbar-custom -->

    </header>
    <!-- End Navigation Bar-->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="wrapper">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="page-title-alt-bg"></div>
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">

                    </ol>
                </div>
                <h4 class="page-title">Profil Orang Tua</h4>
            </div>
            <?= $this->session->flashdata('message'); ?>
            <!-- end page title -->
            <div class="row">
                <div class="modal fade" id="add-category" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header border-bottom-0">
                                <h4 class="modal-title">Ubah profile</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body p-3">
                                <?= form_open_multipart('akun/edit_ortu'); ?>
                                <div class="form-group">
                                    <label class="control-label">Ubah Nama</label>
                                    <input class="form-control form-white" type="text" name="nama_lengkap" value="<?= $orang_tua['nama']; ?>">
                                    <?= form_error('nama_lengkap', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Ubah NIK</label>
                                    <input class="form-control form-white" type="text" name="nik" value="<?= $orang_tua['nik']; ?>" readonly>
                                    <?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Ubah Nomor Kartu Keluarga</label>
                                    <input class="form-control form-white" type="text" name="nkk" value="<?= $orang_tua['no_kk']; ?>" readonly>
                                    <?= form_error('nkk', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Alamat</label>
                                    <input class="form-control form-white" type="text" name="alamat" value="<?= $orang_tua['alamat']; ?>">
                                    <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">No Telpon</label>
                                    <input class="form-control form-white" type="text" name="no_tlpn" value="<?= $orang_tua['no_tlpn']; ?>">
                                    <?= form_error('nohp', '<small class="text-danger">', '</small>'); ?>
                                </div>

                                <div class="text-right">
                                    <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary ml-1 waves-effect waves-light save-category">Save</button>
                                    <?= form_close() ?>
                                </div>
                            </div> <!-- end modal body-->
                        </div> <!-- end modal content -->
                    </div> <!-- end modal dialog-->
                </div>



                <div class="col-md-12">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <a href="#" data-toggle="modal" data-target="#add-category" class="btn btn-lg font-16 btn-primary btn-block waves-effect m-t-20 waves-light">
                                        Ubah profile
                                    </a>
                                    <table width="200000" class="table mt-4 table-centered">
                                        <tr>
                                            <th style="width: 10%">Nama : <?= $orang_tua['nama']; ?></th>
                                        </tr>

                                        <tr>
                                            <th style="width: 10%">Nik : <?= $orang_tua['nik']; ?></th>

                                        </tr>
                                        <tr>
                                            <th style="width: 10%">Nomor Kartu Keluarga : <?= $orang_tua['no_kk']; ?></th>

                                        </tr>
                                        <tr>
                                            <th style="width: 10%">Alamat : <?= $orang_tua['alamat']; ?></th>

                                        </tr>
                                        <tr>
                                            <th style="width: 10%">No.Tlpn : <?= $orang_tua['no_tlpn']; ?></th>

                                        </tr>
                                    </table>
                                </div> <!-- end table-responsive -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->


                    </div>

                </div>
            </div>
        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

    <?php $this->load->view('user/akun/footer') ?>

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>


    <!-- Vendor js -->
    <script src="<?php echo base_url() . 'assets2' ?>/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="<?php echo base_url() . 'assets2' ?>/js/app.min.js"></script>

</body>

</html>