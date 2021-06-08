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
                                    <h4 class="page-title">Imunisasi</h4>
                                    <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                <a href="#" data-toggle="modal" data-target="#add-category" class="btn btn-lg font-16 btn-primary btn-block waves-effect m-t-20 waves-light">
                                                <i class="mdi mdi-plus-circle-outline"></i> Tambah Imunisasi
                                            </a>

                                            <div class="modal fade" id="add-category" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header border-bottom-0">
                                                <h4 class="modal-title">form Imunisasi</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body p-3">
                                                <form action="" method="post">
                                                    <div class="form-group">
                                                        <label class="control-label">Jenis Imunisasi</label>
                                                            <select class="form-control form-white">    
                                                                    <option>  BCG  </option>
                                                                    <option>  DTP  </option>
                                                                    <option>  Campak  </option>
                                                                    <option>  Cacar Air  </option>
                                                                    <option>  Obat Cacing  </option>
                                                                    <option>  Hepatitis B  </option>
                                                                    <option>  HIB  </option>
                                                                    <option>  Flu  </option>
                                                                    <option>  MMR  </option>
                                                                    <option>  PNEUM O kokus  </option>
                                                                    <option>  Volio  </option>
                                                                    <option>  Rotavirus  </option>
                                                            </select>

                                                        
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label">Tanggal</label>
                                                        <input class="form-control form-white" placeholder="masukan tanggal" type="text" name="tanggal"/>
                                                    </div>
                                                
        
                                                <div class="text-right">
                                                    <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary ml-1 waves-effect waves-light save-category" >Simpan</button>
                                                </div>

                                                </form>
                                            </div> <!-- end modal body-->
                                        </div> <!-- end modal content -->
                                    </div> <!-- end modal dialog-->
                                </div>
        
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                        <thead>
                                        <tr>
                                            <th>Jenis Imunisasi</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                            
                                        </tr>
                                        </thead>
                                        
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td> <a href=""><button type="button" class="btn btn-primary waves-effect waves-light width-md">ubah</button></a>

                                                <a href=""><button type="button" class="btn btn-success waves-effect waves-light width-md">Grafik</button> </a>
                                                </td>
                                            </tr>
                                        
        
                                        <tbody>
                                        
                                        </tbody>
                                    </table>
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                        </div> <!-- end row -->
        
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        
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

        <!-- datatable js -->
        <script src="<?php echo base_url().'assets'?>/libs/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url().'assets'?>/libs/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo base_url().'assets'?>/libs/datatables/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url().'assets'?>/libs/datatables/responsive.bootstrap4.min.js"></script>
        
        <script src="<?php echo base_url().'assets'?>/libs/datatables/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url().'assets'?>/libs/datatables/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo base_url().'assets'?>/libs/datatables/buttons.html5.min.js"></script>
        <script src="<?php echo base_url().'assets'?>/libs/datatables/buttons.flash.min.js"></script>
        <script src="<?php echo base_url().'assets'?>/libs/datatables/buttons.print.min.js"></script>

        <script src="<?php echo base_url().'assets'?>/libs/datatables/dataTables.keyTable.min.js"></script>
        <script src="<?php echo base_url().'assets'?>/libs/datatables/dataTables.select.min.js"></script>

        <!-- Datatables init -->
        <script src="<?php echo base_url().'assets'?>/js/pages/datatables.init.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url().'assets'?>/js/app.min.js"></script>
        
    </body>
</html>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        
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
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        
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