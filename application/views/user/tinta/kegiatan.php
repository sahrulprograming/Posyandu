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
        <link href="<?php echo base_url().'assets2'?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'assets2'?>/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'assets2'?>/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body>

        <!-- Navigation Bar-->
        <header id="topnav">


        <?php $this->load->view('user/topbar') ?>

            <?php $this->load->view('user/sidebar') ?>
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
                    <h4 class="page-title">Foto Kegiatan Posyandu Mawar 20</h4>
                </div> 
                <!-- end page title -->
                
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

        <?php $this->load->view('user/footer') ?>
        
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>
        

        <!-- Vendor js -->
        <script src="<?php echo base_url().'assets2'?>/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url().'assets2'?>/js/app.min.js"></script>
        
    </body>
</html>