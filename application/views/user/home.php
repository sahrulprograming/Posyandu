<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Greeva - Bootstrap 4 Landing Page Tamplate</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Coderthemes" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url() . 'hompage' ?>/images/favicon.ico">

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
                <img src="<?php echo base_url() . 'hompage' ?>/images/logo-light.png" alt="" class="logo-light" height="24" />
                <img src="<?php echo base_url() . 'hompage' ?>/images/logo-dark.png" alt="" class="logo-dark" height="24" />
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mx-auto navbar-center" id="mySidenav">

                    <li class="nav-item">
                        <a href="#services" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#features" class="nav-link">Visi Misi</a>
                    </li>
                    <li class="nav-item">
                        <a href="#demos" class="nav-link">Informasi</a>
                    </li>

                </ul>
                <a href="/posyandu/index.php/login">
                    <button class="btn btn-sm btn-primary btn-rounded navbar-btn">Login</button></a>

            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- home start -->
    <section class="bg-home bg-gradient" id="home">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5">
                    <div class="home-title text-white">
                        <h4 class="mb-3 text-white-50">Discover Greeva Today</h4>
                        <h1 class="text-white mb-4">Make your site amazing & unique with Greeva</h1>
                        <p class="text-white-50 mb-5">Greeva is a fully featured premium Landing template built on top of awesome Bootstrap 4.3.1, modern web technology HTML5, CSS3 and jQuery. </p>
                        <div class="search-form mt-4">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Email">
                                <button type="submit" class="btn btn-primary btn-rounded"><i class="mdi mdi-arrow-right"></i></button>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="home-img mt-5 mt-lg-0">
                        <img src="<?php echo base_url() . 'hompage' ?>/images/home-img.png" alt="" class="img-fluid mx-auto d-block">
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



    <!-- Services start -->
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
                <div class="col-lg-4 col-sm-6">
                    <div class="card services-box">
                        <div class="card-body p-4">
                            <div class="services-icon mb-3">
                                <i class="pe-7s-notebook h3 mt-0"></i>
                            </div>
                            <h4 class="mb-3">Quality Code</h4>
                            <p>Et harum quidem rerum facilis est et expedita distinctio nam soluta nobis est.</p>
                            <a href="#" class="text-primary">Learn more <i class="mdi mdi-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card services-box">
                        <div class="card-body p-4">
                            <div class="services-icon mb-3">
                                <i class="pe-7s-exapnd2 h3 mt-0"></i>
                            </div>
                            <h4 class="mb-3">Easy to customize</h4>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis.</p>
                            <a href="#" class="text-primary">Learn more <i class="mdi mdi-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card services-box">
                        <div class="card-body p-4">
                            <div class="services-icon mb-3">
                                <i class="pe-7s-science h3 mt-0"></i>
                            </div>
                            <h4 class="mb-3">Creative Design</h4>
                            <p>Itaque earum rerum hic tenetur a sapiente delectus ut aut reiciendis maiores alias..</p>
                            <a href="#" class="text-primary">Learn more <i class="mdi mdi-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card services-box">
                        <div class="card-body p-4">
                            <div class="services-icon mb-3">
                                <i class="pe-7s-headphones h3 mt-0"></i>
                            </div>
                            <h4 class="mb-3">Awesome Support</h4>
                            <p>Ut enim ad minima veniam, quis nostrum delectus ullam corporis suscipit.</p>
                            <a href="#" class="text-primary">Learn more <i class="mdi mdi-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card services-box">
                        <div class="card-body p-4">
                            <div class="services-icon mb-3">
                                <i class="pe-7s-phone h3 mt-0"></i>
                            </div>
                            <h4 class="mb-3">Responsive Layouts</h4>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur odit aut fugit.</p>
                            <a href="#" class="text-primary">Learn more <i class="mdi mdi-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row end -->
        </div>
        <!-- container-fluid end -->
    </section>
    <!-- Services end -->

    <!-- Features start -->
    <section class="section bg-light" id="features">
        <div class="bg-overlay"></div>

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="title text-center mb-5">
                        <h5 class="text-primary small-title">Greeva</h5>
                        <h3>Ultra Features</h3>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque.</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-5">
                    <div class="features-img">
                        <img src="<?php echo base_url() . 'hompage' ?>/images/features/img-1.png" alt="" class="img-fluid mx-auto d-block">
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="mt-5 mt-lg-0">
                        <h4 class="mb-3">It will be as simple as occidental in fact</h4>

                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam veritatis et</p>
                        <p>Itaque earum rerum hic tenetur a sapiente delectus ut aut</p>
                        <div class="mb-4">
                            <p><i class="mdi mdi-checkbox-marked-outline text-primary mr-2 h6"></i> Bootstrap v4.3.1</p>
                            <p><i class="mdi mdi-checkbox-marked-outline text-primary mr-2 h6"></i> Sass Support</p>
                            <p><i class="mdi mdi-checkbox-marked-outline text-primary mr-2 h6"></i> Responsive Layouts</p>
                        </div>
                        <div class="pt-2">
                            <a href="#" class="btn btn-primary btn-rounded">Learn more <i class="mdi mdi-arrow-right ml-1"></i></a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-center pt-5 mt-5">

                <div class="col-lg-5">
                    <div>
                        <h4 class="mb-3">If several languages coalesce of the result</h4>

                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam veritatis et</p>
                        <p>Itaque earum rerum hic tenetur a sapiente delectus ut aut</p>
                        <div class="mb-4">
                            <p><i class="mdi mdi-checkbox-marked-outline text-primary mr-2 h6"></i> Bootstrap v4.3.1</p>
                            <p><i class="mdi mdi-checkbox-marked-outline text-primary mr-2 h6"></i> Sass Support</p>
                            <p><i class="mdi mdi-checkbox-marked-outline text-primary mr-2 h6"></i> Responsive Layouts</p>
                        </div>
                        <div class="pt-2">
                            <a href="#" class="btn btn-primary btn-rounded">Learn more <i class="mdi mdi-arrow-right ml-1"></i></a>
                        </div>

                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="features-img mt-5 mt-lg-0">
                        <img src="<?php echo base_url() . 'hompage' ?>/images/features/img-2.png" alt="" class="img-fluid mx-auto d-block">
                    </div>
                </div>
            </div>
            <!-- row end -->
        </div>
        <!-- container-fluid end -->
    </section>
    <!-- Features end -->

    <!-- available demos start -->
    <section class="section" id="demos">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="title text-center mb-5">
                        <h5 class="text-primary small-title">Layouts</h5>
                        <h3>Available Demos</h3>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque.</p>
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
                                <div class="overlay-content">
                                    <h5 class="font-16 m-0">Light Layouts</h5>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="demo-box text-center card p-2">
                        <a href="#" class="text-dark">
                            <div class="position-relative demo-content">
                                <div class="demo-img">
                                    <img src="<?php echo base_url() . 'hompage' ?>/images/demo/demo-2.jpg" alt="" class="img-fluid mx-auto d-block rounded">
                                </div>
                                <div class="demo-overlay">
                                    <div class="overlay-icon">
                                        <i class="pe-7s-expand1 h1 text-white"></i>
                                    </div>
                                </div>
                                <div class="overlay-content">
                                    <h5 class="font-16 m-0">Dark Leftbar & Light Topbar</h5>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="demo-box text-center card p-2">
                        <a href="#" class="text-dark">
                            <div class="position-relative demo-content">
                                <div class="demo-img">
                                    <img src="<?php echo base_url() . 'hompage' ?>/images/demo/demo-3.jpg" alt="" class="img-fluid mx-auto d-block rounded">
                                </div>
                                <div class="demo-overlay">
                                    <div class="overlay-icon">
                                        <i class="pe-7s-expand1 h1 text-white"></i>
                                    </div>
                                </div>
                                <div class="overlay-content">
                                    <h5 class="font-16 m-0">Dark Layouts</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="demo-box text-center card p-2">
                        <a href="#" class="text-dark">
                            <div class="position-relative demo-content">
                                <div class="demo-img">
                                    <img src="<?php echo base_url() . 'hompage' ?>/images/demo/demo-4.jpg" alt="" class="img-fluid mx-auto d-block rounded">
                                </div>
                                <div class="demo-overlay">
                                    <div class="overlay-icon">
                                        <i class="pe-7s-expand1 h1 text-white"></i>
                                    </div>
                                </div>
                                <div class="overlay-content">
                                    <h5 class="font-16 m-0">RTL Layout</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="demo-box text-center card p-2">
                        <a href="#" class="text-dark">
                            <div class="position-relative demo-content">
                                <div class="demo-img">
                                    <img src="<?php echo base_url() . 'hompage' ?>/images/demo/demo-5.jpg" alt="" class="img-fluid mx-auto d-block rounded">
                                </div>
                                <div class="demo-overlay">
                                    <div class="overlay-icon">
                                        <i class="pe-7s-expand1 h1 text-white"></i>
                                    </div>
                                </div>
                                <div class="overlay-content">
                                    <h5 class="font-16 m-0">Horizontal Layouts</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="demo-box text-center card p-2">
                        <a href="#" class="text-dark">
                            <div class="position-relative demo-content">
                                <div class="demo-img">
                                    <img src="<?php echo base_url() . 'hompage' ?>/images/demo/demo-6.jpg" alt="" class="img-fluid mx-auto d-block rounded">
                                </div>
                                <div class="demo-overlay">
                                    <div class="overlay-icon">
                                        <i class="pe-7s-expand1 h1 text-white"></i>
                                    </div>
                                </div>
                                <div class="overlay-content">
                                    <h5 class="font-16 m-0">Landing Page</h5>
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
                        <button class="btn btn-primary btn-rounded">More Demos <i class="mdi mdi-arrow-right ml-1"></i></button>
                    </div>
                </div>
            </div>
            <!-- row end -->

        </div>
        <!-- container-fluid end -->
    </section>
    <!-- available demos end -->

    <!-- testimonial start -->
    <section class="section bg-light" id="clients">
        <div class="bg-left-shape-overlay"></div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="title text-center mb-5">
                        <h5 class="text-primary small-title">Clients</h5>
                        <h3>What our Users Says</h3>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque.</p>
                    </div>
                </div>
            </div>
            <!-- row end -->
            <div class="row">
                <div class="col-lg-12">
                    <div id="owl-demo" class="owl-carousel owl-theme testimonial">
                        <div class="item testi-box">
                            <div class="card">
                                <div class="card-body">
                                    <p class="mb-5">Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar. </p>

                                    <div class="testi-img float-left mr-3">
                                        <img src="<?php echo base_url() . 'hompage' ?>/images/users/img-1.png" alt="" class="rounded-shape avatar-md">
                                    </div>
                                    <h5 class="font-16 mb-1 pt-1">Robert Kelley</h5>
                                    <p class="mb-0"> - Greeva User</p>
                                </div>
                            </div>
                        </div>
                        <div class="item testi-box">
                            <div class="card">
                                <div class="card-body">
                                    <p class="mb-5">Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this pronunciation and more common words.</p>

                                    <div class="testi-img float-left mr-4">
                                        <img src="<?php echo base_url() . 'hompage' ?>/images/users/img-2.png" alt="" class="rounded-shape avatar-md">
                                    </div>
                                    <h5 class="font-16 mb-1 pt-1">Joseph Smith</h5>
                                    <p class="mb-0"> - Greeva User</p>
                                </div>
                            </div>
                        </div>
                        <div class="item testi-box">
                            <div class="card">
                                <div class="card-body">
                                    <p class="mb-5">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium eaque ipsa quae ab illo inventore veritatis et</p>

                                    <div class="testi-img float-left mr-4">
                                        <img src="<?php echo base_url() . 'hompage' ?>/images/users/img-3.png" alt="" class="rounded-shape avatar-md">
                                    </div>
                                    <h5 class="font-16 mb-1 pt-1">David Mitchell</h5>
                                    <p class="mb-0"> - Greeva User</p>
                                </div>
                            </div>
                        </div>
                        <div class="item testi-box">
                            <div class="card">
                                <div class="card-body">
                                    <p class="mb-5">If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual new common language will be more simple and regular.</p>

                                    <div class="testi-img float-left mr-4">
                                        <img src="<?php echo base_url() . 'hompage' ?>/images/users/img-1.png" alt="" class="rounded-shape avatar-md">
                                    </div>
                                    <h5 class="font-16 mb-1 pt-1">Edward Davis</h5>
                                    <p class="mb-0"> - Greeva User</p>
                                </div>
                            </div>
                        </div>
                        <div class="item testi-box">
                            <div class="card">
                                <div class="card-body">
                                    <p class="mb-5">Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar. </p>

                                    <div class="testi-img float-left mr-4">
                                        <img src="<?php echo base_url() . 'hompage' ?>/images/users/img-2.png" alt="" class="rounded-shape avatar-md">
                                    </div>
                                    <h5 class="font-16 mb-1 pt-1">John Marcial</h5>
                                    <p class="mb-0"> - Greeva User</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- owl-carousel end -->
                </div>
            </div>
            <!-- row end -->

            <div class="row mt-5 pt-4">
                <div class="col-lg-3 col-sm-6">
                    <div class="client-images">
                        <img src="<?php echo base_url() . 'hompage' ?>/images/clients/1.png" alt="logo-img" class="mx-auto img-fluid d-block">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="client-images">
                        <img src="<?php echo base_url() . 'hompage' ?>/images/clients/2.png" alt="logo-img" class="mx-auto img-fluid d-block">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="client-images">
                        <img src="<?php echo base_url() . 'hompage' ?>/images/clients/3.png" alt="logo-img" class="mx-auto img-fluid d-block">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="client-images">
                        <img src="<?php echo base_url() . 'hompage' ?>/images/clients/4.png" alt="logo-img" class="mx-auto img-fluid d-block">
                    </div>
                </div>
            </div>
            <!-- row end -->
        </div>
        <!-- container-fluid end -->
    </section>
    <!-- testimonial end -->

    <!-- pricing start -->
    <section class="section bg-gradient pb-0" id="pricing">
        <div class="bg-pattern-effect">
            <img src="<?php echo base_url() . 'hompage' ?>/images/bg-pattern-2.png" alt="">
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="title text-center mb-5">
                        <h5 class="text-white-50 small-title">Pricing</h5>
                        <h3 class="text-white">Choose your plan</h3>
                        <p class="text-white-50">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque.</p>
                    </div>
                </div>
            </div>
            <!-- row end -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="text-center text-md-left">
                                        <div class="mb-5">
                                            <i class="pe-7s-helm h1"></i>
                                        </div>
                                        <div>
                                            <h5 class="font-18">Free</h5>
                                            <p class="mb-4 mb-md-0">Sed ut perspiciatis</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="text-center">
                                        <p>Customer support</p>
                                        <p>Free Updates</p>
                                        <p>1 Domain</p>
                                        <p class="mb-4 mb-md-0">24 x 7 Support</p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="text-md-right text-center">
                                        <h3><sup><small>$</small></sup>00</h3>
                                        <p class="mb-5">Per License</p>
                                        <div>
                                            <a href="#" class="btn btn-success btn-rounded">Purchase Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="text-center text-md-left">
                                        <div class="mb-5">
                                            <i class="pe-7s-box2 h1"></i>
                                        </div>
                                        <div>
                                            <h5 class="font-18">Single</h5>
                                            <p class="mb-4 mb-md-0">Sed ut perspiciatis</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="text-center">
                                        <p>Customer support</p>
                                        <p>Free Updates</p>
                                        <p>1 Domain</p>
                                        <p class="mb-4 mb-md-0">24 x 7 Support</p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="text-md-right text-center">
                                        <h3><sup><small>$</small></sup>24</h3>
                                        <p class="mb-5">Per License</p>
                                        <div>
                                            <a href="#" class="btn btn-success btn-rounded">Purchase Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="text-center text-md-left">
                                        <div class="mb-5">
                                            <i class="pe-7s-photo-gallery h1"></i>
                                        </div>
                                        <div>
                                            <h5 class="font-18">Multiple</h5>
                                            <p class="mb-4 mb-md-0">Sed ut perspiciatis</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="text-center">
                                        <p>Customer support</p>
                                        <p>Free Updates</p>
                                        <p>1 Domain</p>
                                        <p class="mb-4 mb-md-0">24 x 7 Support</p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="text-md-right text-center">
                                        <h3><sup><small>$</small></sup>120</h3>
                                        <p class="mb-5">Per License</p>
                                        <div>
                                            <a href="#" class="btn btn-success btn-rounded">Purchase Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="text-center text-md-left">
                                        <div class="mb-5">
                                            <i class="pe-7s-shield h1"></i>
                                        </div>
                                        <div>
                                            <h5 class="font-18">Extended</h5>
                                            <p class="mb-4 mb-md-0">Sed ut perspiciatis</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="text-center">

                                        <p>Customer support</p>
                                        <p>Free Updates</p>
                                        <p>1 Domain</p>
                                        <p class="mb-4 mb-md-0">24 x 7 Support</p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="text-md-right text-center">
                                        <h3><sup><small>$</small></sup>999</h3>
                                        <p class="mb-5">Per License</p>
                                        <div>
                                            <a href="#" class="btn btn-success btn-rounded">Purchase Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end row -->
        </div>
        <!-- container-fluid end -->
    </section>
    <!-- pricing end -->

    <!-- contact us start -->
    <section class="section pb-lg-0" id="contact">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="title text-center mb-4">
                        <h5 class="text-primary small-title">Contact</h5>
                        <h3>Get in Touch</h3>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque.</p>
                    </div>
                </div>
            </div>
            <!-- row end -->
            <div class="row align-items-end">
                <div class="col-lg-6">
                    <div class="contact-img d-none d-lg-block">
                        <img src="<?php echo base_url() . 'hompage' ?>/images/contact-us.svg" alt="" class="img-fluid mx-auto d-block">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card contact-form mb-lg-0">
                        <div class="custom-form p-5">

                            <div id="message"></div>
                            <form method="post" action="php/contact.php" name="contact-form" id="contact-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="name" id="name" type="text" class="form-control" placeholder="Enter your name...">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="email" id="email" type="email" class="form-control" placeholder="Enter your email...">
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea name="comments" id="comments" rows="4" class="form-control" placeholder="Enter your message..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row">
                                    <div class="col-lg-12 text-right">
                                        <input type="submit" id="submit" name="send" class="submitBnt btn btn-primary btn-rounded" value="Send Message">
                                        <div id="simple-msg"></div>
                                    </div>
                                </div>
                                <!-- end row -->
                            </form>
                        </div>
                        <!-- end custom-form -->

                    </div>
                </div>

            </div>
            <!-- row end -->
        </div>
        <!-- container-fluid end -->
    </section>
    <!-- contact us end -->

    <!-- footer start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-3">
                        <img src="<?php echo base_url() . 'hompage' ?>/images/logo-light.png" alt="" height="20">
                    </div>
                    <p>Bootstrap 4 Landing Page Template</p>
                    <div class="pt-1">
                        <div class="float-left mr-2">
                            <i class="pe-7s-phone h4 text-white"></i>
                        </div>
                        <p class="text-white-50 overflow-hidden">(123) 456-7890</p>
                    </div>
                    <div>
                        <div class="float-left mr-2">
                            <i class="pe-7s-mail h4 text-white"></i>
                        </div>
                        <p class="text-white-50 overflow-hidden mb-0">example@abc.com</p>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-list">
                        <p class="text-white mb-3">About</p>
                        <ul class="list-unstyled footer-list">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Features</a></li>
                            <li><a href="#">Faq</a></li>
                            <li><a href="#">Clients</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-list">
                        <p class="text-white mb-3">Social</p>
                        <ul class="list-unstyled footer-list">
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Behance</a></li>
                            <li><a href="#">Dribbble</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-list">
                        <p class="text-white mb-3">Resources</p>
                        <ul class="list-unstyled footer-list">
                            <li><a href="#">Help & Support</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-list">
                        <p class="text-white mb-3">More Info</p>
                        <ul class="list-unstyled footer-list">
                            <li><a href="#">For Marketing</a></li>
                            <li><a href="#">For CEOs</a></li>
                            <li><a href="#">For Agencies</a></li>
                            <li><a href="#">Our Apps</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- row end -->
        </div>
        <!-- container-fluid end -->
    </footer>
    <!-- footer end -->

    <div class="footer-alt py-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="mb-0">2019 © Greeva. Design by <a href="" class="text-white">Coderthemes</a></p>
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
</body>

</html>