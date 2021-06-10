<!-- Begin page -->
<div id="wrapper">
    <div class="content-page">
        <table id="datatable" class="table table-bordered dt-responsive nowrap">
            <thead>
                <tr>
                    <th width="20%">Nama balita</th>
                    <th width="15%">Nominal</th>
                    <th width="15%">Jatuh Tempo</th>
                    <th width="15%">Tanggal Bayar</th>
                    <th width="15%">Aksi</th>
                    <th width="20%">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pmt as $pmt) : ?>
                    <tr>
                        <td><?= $pmt['nama']; ?></td>
                        <td><?= $pmt['kas_pmt']; ?></td>
                        <td><?= $pmt['tanggal']; ?></td>
                        <td><?= $pmt['tanggal_pembayaran']; ?></td>
                        <td class="aksi">
                            <a href="#" class="btn-info btn-sm" data-toggle="modal" data-target="#exampleModalCenter<?= $pmt['kd_pmt']; ?>">Detail</a>
                        </td>
                        <td class="aksi">
                            <a href="#" class="btn-success btn-sm text-white"><?= $pmt['status_pembayaran']; ?></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter<?= $orang_tua['kd_ortu']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- end Modal -->