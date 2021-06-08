<!-- Begin page -->
<div id="wrapper">
    <div class="content-page">
        <?php foreach ($pmt as $pmt) : ?>
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
                    <tr>
                        <td>1234567898765432</td>
                        <td>123</td>
                        <td>123</td>
                        <td>112</td>
                        <td class="aksi">
                            <a href="#" class="badge btn-success" data-toggle="modal" data-target="#exampleModalCenter<?= $orang_tua['kd_id']; ?>">Detail</a>
                        </td>
                        <td class="aksi">
                            <a href="#" class="badge btn-success">LUNAS</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php endforeach; ?>
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