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
        <section class="section" id="demos">
            <div class="container-fluid">
                <div class="row justify-content-center ">
                    <div class="col-lg-5">
                        <div class="title text-center mb-3">
                            <h3>Foto Kegiatan Posyandu Mawar 20</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="demo-box text-center card p-2">
                            <a href="#" class="text-dark">
                                <div class="position-relative demo-content">
                                    <div class="demo-img">
                                        <img src="<?php echo base_url() . 'hompage' ?>/images/demo/demo-1.jpg" alt="" class="img-fluid mx-auto d-block rounded">
                                    </div>
                                    <div class="demo-overlay">
                                        <div class="overlay-icon">
                                            <i class="pe-7s-expand1 h1 text-white"></i>
                                        </div>
                                    </div>
                                    <div class="card-body p-1">
                                        <div class="services-icon">
                                            <i class="pe-7s-display1 h3 mt-0"></i>
                                        </div>
                                        <h4>Bootstrap UI based</h4>
                                        <a href="#" class="text-primary">Selengkapnya <i class="mdi mdi-arrow-right ml-1"></i></a>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
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
        <!-- available demos end -->
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