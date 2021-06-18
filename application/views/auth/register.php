<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?= $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('assets_tinta/img/logo-sm.png') ?>">

    <!-- App css -->
    <link href="<?php echo base_url() . 'assets2' ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'assets2' ?>/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'assets2' ?>/css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="authentication-bg authentication-bg-pattern d-flex align-items-center">

    <div class="home-btn d-none d-sm-block">
        <a href="<?= base_url(); ?>"><i class="fas fa-home h2 text-white"></i></a>
    </div>

    <div class="account-pages w-100 mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <h1>Pendaftaran Akun</h1>
                            </div>
                            <form action="<?= base_url('auth/registrasi'); ?>" method="post" class="">
                                <div class="form-group mb-3">
                                    <label for="email">Nama</label>
                                    <input class="form-control" type="text" id="nama" name="nama" placeholder="masukkan nama" value="<?= set_value('nama'); ?>"><?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input class="form-control" type="text" id="email" name="email" placeholder="masukkan email" value="<?= set_value('email'); ?>"><?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" name="password" placeholder="Masukkan Password">
                                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Konfirmasi Password</label>
                                    <input class="form-control" type="password" name="password2" placeholder="masukkan Konfirmasi Password">
                                    <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                                </div>


                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-success btn-block" type="submit">Daftar</button>
                                </div>

                            </form>
                            <br>

                            <div class="form-group mb-0 text-center">
                                <a href="<?= base_url('Auth/login'); ?>" class="btn btn-success btn-block">
                                    Batal
                                </a>

                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
    </div>
    <!-- end page -->

    <!-- Vendor js -->
    <script src="<?php echo base_url() . 'assets2' ?>/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="<?php echo base_url() . 'assets2' ?>/js/app.min.js"></script>

</body>

</html>