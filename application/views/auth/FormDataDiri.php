<?php


if ($this->session->userdata('notif')) {
    $notif = $this->session->userdata('notifikasi');
    echo "<script>

        alert('$notif')
    </script>";
}

$this->session->set_userdata('notif', true);
?>

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
    <link rel="shortcut icon" href="<?php echo base_url() . 'assets2' ?>/images/favicon.ico">

    <!-- App css -->
    <link href="<?php echo base_url() . 'assets2' ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'assets2' ?>/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'assets2' ?>/css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="authentication-bg authentication-bg-pattern d-flex align-items-center">

    <div class="home-btn d-none d-sm-block">
        <a href="<?= base_url('home'); ?>"><i class="fas fa-home h2 text-white"></i></a>
    </div>

    <div class="account-pages w-100 mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center mb-4">
                                <h1>Form Data Diri</h1>
                            </div>
                            <form action="<?= base_url('auth/form_data_diri'); ?>" method="post" class="pt-2">
                                <div class="form-group mb-3">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input class="form-control" type="text" id="nama_lengkap" name="nama_lengkap" placeholder="masukkan nama lengkap" value="<?= set_value('nama_lengkap'); ?>"><?= form_error('nama_lengkap', '<small class="text-danger">', '</small>'); ?>

                                </div>
                                <div class="form-group mb-3">
                                    <label for="NIK">NIK</label>
                                    <input class="form-control" type="number" id="nik" name="nik" placeholder="Masukkan NIK" value="<?= set_value('nik'); ?>">
                                    <?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class=" form-group mb-3">
                                    <label for="nkk">No Karu Keluarga</label>
                                    <input class="form-control" type="number" name="nkk" placeholder="Masukan No KK" value="<?= set_value('nkk'); ?>">
                                    <?= form_error('nkk', '<small class="text-danger">', '</small>'); ?>
                                </div>

                                <div class=" form-group mb-3">
                                    <label for="alamat">Alamat</label>
                                    <input class="form-control" type="text" name="alamat" placeholder="masukkan alamat" value="<?= set_value('alamat'); ?>">
                                    <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class=" form-group mb-3">
                                    <label for="nohp">No Hanphone</label>
                                    <input class="form-control" type="number" name="nohp" placeholder="Masukkan No Hanphone" value=" <?= set_value('nohp'); ?>">
                                    <?= form_error('nohp', '<small class="text-danger">', '</small>'); ?>
                                </div>


                                <div class="form-group mb-2 text-center">
                                    <button class="btn btn-success btn-block" type="submit">Tambahkan</button>
                                </div>
                            </form>
                            <?= form_open_multipart("auth/logout"); ?>
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-success btn-block" type="submit">Logout</button>
                            </div>
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