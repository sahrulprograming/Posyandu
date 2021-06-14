<?php
$pmt = [];
if (isset($_POST['pilih'])) {
    if ($_POST['pilih'] == 'lunas') {
        $menu = 'lunas';
        $pmt = $pmt_lunas;
    } elseif ($_POST['pilih'] == 'menunggu') {
        $menu = 'lunas';
        $pmt = $pmt_menunggu;
    }
}
?>


<!-- Begin page -->
<div id="wrapper">

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <form method="POST">
                    <!-- start page title -->
                    <div class="form-group">
                        <select class="custom-select" id="inputGroupSelect01" name="pilih">
                            <option selected>Pilih</option>
                            <option value="menunggu">menunggu</option>
                            <option value="lunas">lunas</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Coba</button>
                    </div>
                </form>
                <?php if (isset($menu) == 'lunas') : ?>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>

                                <th width="20%">Nama</th>
                                <th width="20%">Jumlah Balita</th>
                                <th width="20%">Nominal Total</th>
                                <th width="20%">Jatuh Tempo</th>
                                <th width="10%">Status</th>
                                <th width="30%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pmt as $pmt) : ?>
                                <tr>
                                    <td><?= $pmt['nama']; ?></td>
                                    <?php $jumlah_balita = $this->admin_model->jumlah_balita($pmt['kd_ortu']) ?>
                                    <td><?= $jumlah_balita; ?></td>
                                    <td>Rp. <?= number_format($pmt['kas_PMT'] * $jumlah_balita, 0, ",", "."); ?></td>
                                    <?php $arr = explode('-', $pmt['tanggal']);
                                    $jatuh_tempo = $arr[2] . '-' . $arr[1] . '-' . $arr[0]; ?>
                                    <td><?= $jatuh_tempo; ?></td>
                                    <td>
                                        <?php $status = $pmt['status_bayar'];
                                        if ($status == 'menunggu') : ?>
                                            <a href="#" class="btn btn-primary waves-effect waves-light width-xm"><?= $pmt['status_bayar']; ?></a>
                                        <?php else : ?>
                                            <a href="#" class="btn-success waves-effect waves-light width-xm"><?= $pmt['status_bayar']; ?></a>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-success waves-effect waves-light width-xm" data-toggle="modal" data-target="#konfirmasi<?= $pmt['kd_ortu']; ?>">Konfirmasi</button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light width-xm" data-toggle="modal" data-target="#hapus<?= $pmt['kd_ortu']; ?>">hapus</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif ?>
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