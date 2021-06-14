<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Greeva - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url().'assets'?>/images/favicon.ico">

        <!-- App css -->
        <link href="<?php echo base_url().'assets'?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'assets'?>/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'assets'?>/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

           <?php $this->load->view('admin/topbar') ?>

           <?php $this->load->view('admin/sidebar') ?>


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
                                    <h4 class="page-title">Starter</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title">Ubah bidan </h4>
                                   
        
                                    <form class="form-horizontal" method="post" action="/posyandu/index.php/ubah/Ubahbidan/<?= $bidan['kd_bidan'] ?>"  >
                                        <div class="form-group">
                                                        <label class="control-label">Nama</label>
                                                        <input class="form-control form-white" placeholder="masukan nama" value="<?= $bidan['nama'] ?>" type="text" name="nama"/>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label">Nik</label>
                                                        <input class="form-control form-white" placeholder="masukan nik" value="<?= $bidan['nik'] ?>" type="text" name="nik"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">alamat</label>
                                                        <input class="form-control form-white" placeholder="masukan alamat" value="<?= $bidan['alamat'] ?>" type="text" name="alamat"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">tlp</label>
                                                        <input class="form-control form-white" placeholder="masukan tlp" value="<?= $bidan['no_tlpn'] ?>" type="text" name="no_tlpn"/>
                                                    </div>
                                                    
        
                                              <button type="submit" class="btn btn-primary ml-1 waves-effect waves-light save-category" >Simpan</button>
                                    </form>
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                        </div>
                    </div> <!-- container-fluid -->

                </div> <!-- content -->

                <?php $this->load->view('admin/footer') ?>

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

       <?php $this->load->view('admin/right') ?>
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="<?php echo base_url().'assets'?>/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url().'assets'?>/js/app.min.js"></script>
        
    </body>
</html>