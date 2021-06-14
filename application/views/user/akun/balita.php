<!-- Begin page -->
<div id="wrapper">
    <div class="content-page">
        <div class="card-box">
            <table id="datatable" class="table table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>Nama balita</th>
                        <th>Nama orang tua</th>
                        <th>Bidan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($balita as $balita) : ?>
                        <?php $bidan = $this->akun_model->cek_bidan($balita['kd_bidan']); ?>
                        <tr>
                            <td><?= $balita['nama']; ?></td>
                            <td><?= $profile['nama']; ?></td>
                            <td><?= $bidan['nama']; ?></td>
                            <td class="aksi">
                                <a href="#" class="badge btn-success" data-toggle="modal" data-target="#detail<?= $balita['kd_balita']; ?>">Detail</a>
                                <a href="#" class="badge btn-primary" data-toggle="modal" data-target="#edit<?= $balita['kd_balita']; ?>">Edit</a>
                                <a href="#" class="badge btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <!-- Modal Detail-->
                        <div class="modal fade" id="detail<?= $balita['kd_balita']; ?>">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">NIK</label>
                                            <input type="text" class="form-control" value="<?php if (isset($balita['nik'])) {
                                                                                                echo $balita['nik'];
                                                                                            }; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama balita</label>
                                            <input type="text" class="form-control" value="<?= $balita['nama']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Jenis Kelamin</label>
                                            <input type="text" class="form-control" value="<?= $balita['jenis_kelamin']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Berat Badan</label>
                                            <input type="text" class="form-control" value="<?php if (isset($balita['bb'])) {
                                                                                                echo $balita['bb'];
                                                                                            }; ?> kg" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tinggi Badan</label>
                                            <input type="text" class="form-control" value="<?php if (isset($balita['tb'])) {
                                                                                                echo $balita['tb'];
                                                                                            }; ?> cm" readonly>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end Modal Detail-->


                        <!-- Modal Edit-->
                        <div class="modal fade" id="edit<?= $balita['kd_balita']; ?>">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?= form_open_multipart("ubah/balita"); ?>
                                        <div class="form-group">
                                            <label for="">NIK</label>
                                            <input type="text" class="form-control" value="<?= $balita['nik']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama balita</label>
                                            <input type="text" class="form-control" value="<?= $balita['nama']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Jenis Kelamin</label>
                                            <select class="custom-select" id="inputGroupSelect01">
                                                <option selected><?= $balita['jenis_kelamin']; ?></option>
                                                <option value="L">Laki - Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Berat Badan</label>
                                            <input type="text" class="form-control" value="<?php if (isset($balita['bb'])) {
                                                                                                echo $balita['bb'];
                                                                                            }; ?>  kg" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tinggi Badan</label>
                                            <input type="text" class="form-control" value="<?php if (isset($balita['tb'])) {
                                                                                                echo $balita['tb'];
                                                                                            }; ?>  cm" readonly>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
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
</div>