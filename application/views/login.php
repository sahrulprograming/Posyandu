<?php
if ($this->session->userdata('notif')) {
    $notif = $this->session->userdata('notifikasi');
    echo "<script>

        alert('$notif')
    </script>" ;
}

$this->session->set_userdata('notif',true);
 ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url().'assets2/'?>images/favicon.ico">

        <!-- App css -->
        <link href="<?php echo base_url().'assets2/'?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'assets2/'?>css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'assets2/'?>css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg authentication-bg-pattern d-flex align-items-center">
<!-- 
        <div class="home-btn d-none d-sm-block">
            <a href="index.html"><i class="fas fa-home h2 text-white"></i></a>
        </div> -->
        
        <div class="account-pages w-100 mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">

                            <div class="card-body p-4">
                                
                                <div class="text-center mb-4">
                                    <h1>POSYANDU</h1>
                                </div>

                                <form action="/posyandu/index.php/login/inLogin" method="post" class="pt-2">

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">NIK</label>
                                        <input class="form-control" type="number" name="nik" id="emailaddress" required="" placeholder="Enter your email">
                                    </div>

                                    <div class="form-group mb-3">
                                        <a href="pages-recoverpassword.html" class="text-muted float-right"></a>
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" required="" name="password" id="password" placeholder="Enter your password">
                                    </div>


                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-success btn-block" type="submit"> Login </button>
                                    </div>

                                </form>

                                <div class="row mt-3">
                                    <div class="col-12 text-center">
                                        <p class="text-muted mb-0">Belum punya akun? <a href="/posyandu/index.php/login/registrasi" class="text-dark ml-1"><b>Daftar</b></a></p>
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
        <script src="<?php echo base_url().'assets2/'?>js/vendor.min.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url().'assets2/'?>js/app.min.js"></script>
        
    </body>
</html>