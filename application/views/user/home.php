<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Posyandu Mawar 20</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Coderthemes" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('assets_tinta/img/logo-posyandu.png') ?>">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo base_url() . 'hompage' ?>/css/bootstrap.min.css" type="text/css">

    <!--Material Icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'hompage' ?>/css/materialdesignicons.min.css" />

    <!-- pe-7 Icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'hompage' ?>/css/pe-icon-7-stroke.css" />

    <!-- owl carousel css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'hompage' ?>/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'hompage' ?>/css/owl.theme.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'hompage' ?>/css/owl.transitions.css">

    <!-- Custom  sCss -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'hompage' ?>/css/style.css" />

</head>

<body>

    <!--Navbar Start-->
    <nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky sticky-dark">
        <div class="container-fluid">
            <!-- LOGO -->
            <a class="logo text-uppercase" href="index.html">
                <img src="<?= base_url('assets_tinta') ?>/img/logo-posyandu.png" alt="" class="logo-light" height="50" />
                <img src="<?= base_url('assets_tinta') ?>/img/logo-posyandu.png" alt="" class="logo-dark" height="50" />
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mx-auto navbar-center" id="mySidenav">
                    <li class="nav-item">
                        <a href="" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#visi_misi" class="nav-link">Visi Misi</a>
                    </li>
                    <li class="nav-item">
                        <a href="#kegiatan" class="nav-link">Kegiatan</a>
                    </li>
                    <li class="nav-item">
                        <a href="#features" class="nav-link">kader</a>
                    </li>
                </ul>
                <div>
                    <a href="<?= base_url('auth/login'); ?>">
                        <button class="btn btn-sm btn-primary btn-rounded navbar-btn mr-1">Login</button>
                    </a>
                </div>
                <div>
                    <a href="<?= base_url('auth/registrasi'); ?>">
                        <button class="btn btn-sm btn-primary btn-rounded navbar-btn">Daftar</button>
                    </a>
                </div>
            </div>
        </div>

    </nav>
    <!-- Navbar End -->


    <!-- home start -->
    <section class="bg-home bg-gradient" id="home">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="home-title text-white">
                        <h4 class="mb-3 text-white-50">Discover Greeva Today</h4>
                        <h1 class="text-white mb-4">Make your site amazing & unique with Greeva</h1>
                        <p class="text-white-50 mb-5">Greeva is a fully featured premium Landing template built on top of awesome Bootstrap 4.3.1, modern web technology HTML5, CSS3 and jQuery. </p>

                    </div>
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="home-img mt-0 mt-lg-0">
                        <img src="<?= base_url('assets_tinta/img/family.png') ?>" alt="" class="img-fluid mx-auto d-block">
                    </div>
                </div>
            </div>
            <!-- row end -->
        </div>
        <!-- container-fluid end -->
        <div class="bg-pattern-effect">
            <img src="<?php echo base_url() . 'hompage' ?>/images/bg-pattern.png" alt="">
        </div>
    </section>
    <!-- home end -->

    <!-- Awal Pelayanan -->
    <section class="section" id="services">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="title text-center mb-5">
                        <h3 class="mb-3">The theme is fully responsive and easy to customize</h3>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam eaque ipsa quae</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="card services-box">
                        <div class="card-body p-4">
                            <div class="services-icon mb-3">
                                <i class="pe-7s-display1 h3 mt-0"></i>
                            </div>
                            <h4 class="mb-3">Bootstrap UI based</h4>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem doloremque.</p>
                            <a href="#" class="text-primary">Learn more <i class="mdi mdi-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row end -->
        </div>
        <!-- container-fluid end -->
    </section>
    <!-- akhir Pelayanan -->

    <!-- Awal Visi Misi -->
    <section class="section bg-light" id="visi_misi">
        <div class="bg-overlay"></div>

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="title text-center mb-5">
                        <h5 class="text-primary small-title">Posyandu Mawar 20</h5>
                        <h3>Visi</h3>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="title text-center mb-5">
                        <h5 class="text-primary small-title">Posyandu Mawar 20</h5>
                        <h3>Misi</h3>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque.</p>
                    </div>
                </div>
            </div>
            <!-- row end -->
        </div>
        <!-- container-fluid end -->
    </section>
    <!-- Akhir Visi Misi -->

    <!-- Awal Foto Kegiatan -->
    <section class="section" id="kegiatan">
        <div class="container-fluid">
            <div class="row justify-content-center ">
                <div class="col-lg-5">
                    <div class="title text-center mb-3">
                        <h3>Foto Kegiatan Posyandu Mawar 20</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($kegiatan as $kegiatan) : ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="demo-box text-center card p-2">
                            <!-- Button trigger modal -->
                            <a href="" class="text-dark" data-toggle="modal" data-target="#keterangan<?= $kegiatan['kd_kegiatan']; ?>">
                                <div class="position-relative demo-content">
                                    <div class="demo-img">
                                        <img src="<?= base_url('assets_tinta') ?>/img/kegiatan/<?= $kegiatan['foto_kegiatan']; ?>" alt="" class="img-fluid mx-auto d-block rounded">
                                    </div>
                                    <div class="demo-overlay">
                                        <div class="overlay-icon">
                                            <i class="pe-7s-expand1 h1 text-white"></i>
                                        </div>
                                    </div>
                                    <div class="card-body p-1">
                                        <h4><?= $kegiatan['judul']; ?></h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="keterangan<?= $kegiatan['kd_kegiatan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"><?= $kegiatan['judul']; ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="demo-img img-thumbnail">
                                        <img src="<?= base_url('assets_tinta') ?>/img/kegiatan/<?= $kegiatan['foto_kegiatan']; ?>" alt="" class="img-fluid mx-auto d-block rounded">
                                    </div>
                                    <h1 class="text-center"><?= $kegiatan['judul']; ?></h1>
                                    <div class="container mt-3">
                                        <?= $kegiatan['keterangan']; ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- row end -->
            <div class="row">
                <div class="col-12">
                    <div class="text-center mt-4">
                        <button class="btn btn-primary btn-rounded">Lebih Lanjut<i class="mdi mdi-arrow-right ml-1"></i></button>
                    </div>
                </div>
            </div>
            <!-- row end -->

        </div>
        <!-- container-fluid end -->
    </section>
    <!-- Akhir Foto Kegiatan -->
    <div class="footer-alt py-1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        2021 &copy; Posyandu by <a href="">Tinta Nodanti</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Javascript -->
    <script src="<?php echo base_url() . 'hompage' ?>/js/jquery.min.js"></script>
    <script src="<?php echo base_url() . 'hompage' ?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() . 'hompage' ?>/js/jquery.easing.min.js"></script>
    <script src="<?php echo base_url() . 'hompage' ?>/js/scrollspy.min.js"></script>

    <!-- owl-carousel -->
    <script src="<?php echo base_url() . 'hompage' ?>/js/owl.carousel.min.js"></script>

    <!-- custom js -->
    <script src="<?php echo base_url() . 'hompage' ?>/js/app.js"></script>

    <!-- App js -->
    <script src="<?php echo base_url() . 'assets' ?>/js/app.min.js"></script>
</body>

</html>