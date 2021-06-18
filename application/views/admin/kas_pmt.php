<!-- Begin page -->
<div id="wrapper">

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
                            <h4 class="page-title">Data Kas PMT</h4>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <?= $this->session->flashdata('message'); ?>
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th>Total Kas PMT</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center">
                                                <td>Rp.<?= to_rupiah($total_kas); ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-danger waves-effect waves-light width-xm" data-toggle="modal" data-target="#kas_keluar">Tambah Kas Keluar</button>
                                                </td>
                                            </tr>

                                            <!-- Awal Hapus Modal Dialog -->
                                            <div class="modal fade" id="kas_keluar" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header border-bottom-0">
                                                            <h4 class="modal-title">KAS PMT Keluar</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body p-3">
                                                            <?= form_open_multipart("insert/kas_keluar"); ?>
                                                            <input type="hidden" class="form-control" id="kd_anggota" name="total_kas" value="<?= $total_kas; ?>" readoly>
                                                            <div class="mb-3">
                                                                <label for="nama" class="col-form-label">Masukan Nominal Keluar</label>
                                                                <input type="number" class="form-control" placeholder="Nominal Tanpa titik / Rp" id="nama" name="nominal_keluar">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="nama" class="col-form-label">Keterangan</label>
                                                                <textarea type="number" class="form-control" placeholder="Keterangan Kas Keluar" id="nama" name="keterangan"></textarea>
                                                            </div>
                                                            <div class="text-right">
                                                                <!-- Tombol Batal -->
                                                                <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Batal</button>
                                                                <!-- Tombol Ubah -->
                                                                <button type="submit" class="btn btn-danger ml-1 waves-effect waves-light save-category">Kas Kluar</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                        <!-- Akhir modal body-->
                                                    </div>
                                                    <!-- Akhir modal content -->
                                                </div>
                                            </div>
                                            <!-- Akhir Hapus Modal Dialog -->
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end card-box -->
                            </div>
                            <!-- end col -->
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <!-- end page title -->

            </div> <!-- container-fluid -->

        </div> <!-- content -->


    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
</div>
<!-- END wrapper -->