<!-- Begin page -->
<div id="wrapper">
    <div class="content-page">
        <table id="datatable" class="table table-bordered dt-responsive nowrap">
            <thead>
                <tr>
                    <th width="20%">Nama Orang Tua</th>
                    <th width="20%">Nominal Total</th>
                    <th width="20%">Jatuh Tempo</th>
                    <th width="20%">Tanggal Konfirmasi</th>
                    <th width="10%">Info</th>
                    <th width="10%">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pmt as $pmt) : ?>
                    <tr>
                        <?php
                        $arr = explode('-', $pmt['tanggal']);
                        $jatuh_tempo = $arr[2] . '-' . $arr[1] . '-' . $arr[0];
                        $arr = explode('-', $pmt['tgl_bayar']);
                        $konfirmasi = $arr[2] . '-' . $arr[1] . '-' . $arr[0];
                        if ($konfirmasi == '00-00-0000') {
                            $konfirmasi = "";
                        }
                        ?>
                        <td><?= $pmt['nama']; ?></td>
                        <td class="text-center">Rp. <?= to_rupiah($pmt['kas_PMT'] * jumlah_balita_pmt($pmt['kd_pmt'])); ?></td>
                        <td class="text-center"><?= $jatuh_tempo; ?></td>
                        <td class="text-center"><?= $konfirmasi; ?></td>
                        <td class="aksi">
                            <a href="#" class="btn-info btn-sm" data-toggle="modal" data-target="#detail<?= $pmt['kd_pmt']; ?>">Detail</a>
                        </td>
                        <td>
                            <?php $status = $pmt['status_bayar'];
                            if ($status == 'menunggu') : ?>
                                <a href="#" class="btn-primary btn-sm text-white"><?= $pmt['status_bayar']; ?></a>
                            <?php else : ?>
                                <a href="#" class="btn-success btn-sm text-white"><?= $pmt['status_bayar']; ?></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="detail<?= $pmt['kd_pmt']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-5"><label>KAS PMT</label></div>
                                        <div class="col-1 text-right">:</div>
                                        <div class="col-6"><label>Rp. <?= number_format($pmt['kas_PMT']); ?></label></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5"><label>JUMLAH BALITA</label></div>
                                        <div class="col-1 text-right">:</div>
                                        <div class="col-6"><label><?= jumlah_balita_pmt($pmt['kd_pmt']); ?></label></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5"><label>TOTAL PMT</label></div>
                                        <div class="col-1 text-right">:</div>
                                        <div class="col-6"><label><?= to_rupiah($pmt['kas_PMT'] * jumlah_balita_pmt($pmt['kd_pmt'])); ?></label></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <?php $status = $pmt['status_bayar'];
                                        if ($status == 'menunggu') : ?>
                                            <a href="#" class="btn-primary btn-sm text-white"><?= $pmt['status_bayar']; ?></a>
                                        <?php else : ?>
                                            <a href="#" class="btn-success btn-sm text-white"><?= $pmt['status_bayar']; ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end Modal -->
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->