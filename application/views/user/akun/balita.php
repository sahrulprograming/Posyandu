<!-- Begin page -->
<div id="wrapper">
    <div class="content-page">
        <div class="card-box">
            <?php if ($balita) : ?>
                <table id="datatable" class="table table-bordered dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>Nama balita</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Nama orang tua</th>
                            <th>Bidan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($balita as $balita) : ?>
                            <tr>
                                <td><?= $balita['nama_balita']; ?></td>
                                <td class="text-center"><?= $balita['tgl_lahir']; ?></td>
                                <td class="text-center"><?= $balita['jenis_kelamin']; ?></td>
                                <td><?= $balita['nama_orang_tua']; ?></td>
                                <td><?= $balita['nama_bidan']; ?></td>
                                <td class="aksi">
                                    <button class="btn btn-success waves-effect waves-light width-xm" data-toggle="modal" data-target="#detail<?= $balita['kd_balita']; ?>">Detail</button>
                                    <button class="btn btn-primary waves-effect waves-light width-xm" data-toggle="modal" data-target="#ubah<?= $balita['kd_balita']; ?>">Ubah</button>
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
                                                <input type="text" class="form-control" value="<?= $balita['nik']; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Nama balita</label>
                                                <input type="text" class="form-control" value="<?= $balita['nama_balita']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Jenis Kelamin</label>
                                                <input type="text" class="form-control" value="<?= $balita['jenis_kelamin']; ?>">
                                            </div>
                                            <?php $penimbangan = cek_penimbangan($balita['kd_balita']) ?>
                                            <div class="form-group">
                                                <label for="">Berat Badan</label>
                                                <input type="text" class="form-control" value="<?= $penimbangan['bb']; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Tinggi Badan</label>
                                                <input type="text" class="form-control" value="<?= $penimbangan['tb']; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Keluhan Terakhir</label>
                                                <textarea type="text" class="form-control" readonly><?= $penimbangan['keluhan']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end Modal Detail-->


                            <!-- Modal ubah-->
                            <div class=" modal fade" id="ubah<?= $balita['kd_balita']; ?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header border-bottom-0">
                                            <h4 class="modal-title">Ubah Data balita</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body p-3">
                                            <?= form_open_multipart("ubah/user_balita"); ?>
                                            <input class="form-control form-white" type="hidden" name="kd_balita" value="<?= $balita['kd_balita']; ?>" readonly>
                                            <!-- NIK -->
                                            <div class="form-group">
                                                <label class="control-label">Nik</label>
                                                <input class="form-control form-white" placeholder="masukan nik" type="number" name="nik" value="<?= $balita['nik']; ?>">
                                            </div>
                                            <!-- NAMA -->
                                            <div class="form-group">
                                                <label class="control-label">Nama</label>
                                                <input class="form-control form-white" placeholder="masukan nama" type="text" name="nama" value="<?= $balita['nama_balita']; ?>">
                                            </div>
                                            <!-- Jenis Kelamin -->
                                            <div class="form-group">
                                                <label class="control-label">Jenis kelamin</label>
                                                <select class="custom-select" id="inputGroupSelect01" name="jenis_kelamin">
                                                    <option selected><?= $balita['jenis_kelamin']; ?></option>
                                                    <option value="P">Perempuan</option>
                                                    <option value="L">Laki - Laki</option>
                                                </select>
                                            </div>
                                            <!-- tanggal Lahir -->
                                            <div class="form-group">
                                                <label class="control-label">Tanggal Lahir</label>
                                                <input class="form-control form-white" type="date" name="tgl_lahir" value="<?= $balita['tgl_lahir']; ?>">
                                            </div>
                                            <!-- Nama Ortu -->
                                            <div class="form-group">
                                                <label class="control-label">Nama orang tua</label>
                                                <input class="form-control form-white" type="text" name="nama_ortu" value="<?= $balita['nama_orang_tua']; ?>" readonly>
                                            </div>
                                            <!-- Nama Bidan -->
                                            <div class="form-group">
                                                <label class="control-label">Nama Bidan Perawat</label>
                                                <input class="form-control form-white" type="text" name="nama_bidan" value="<?= $balita['nama_bidan']; ?>" readonly>
                                            </div>
                                            <div class="text-right">
                                                <!-- Tombol Batal -->
                                                <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Batal</button>
                                                <!-- Tombol Ubah -->
                                                <button type="submit" class="btn btn-primary ml-1 waves-effect waves-light save-category">Ubah</button>
                                            </div>
                                            </form>
                                        </div>
                                        <!-- Akhir modal body-->
                                    </div>
                                    <!-- Akhir modal content -->
                                </div>
                            </div>
                            <!-- end Modal -->
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <h3 class="text-center">Ada Belum Mendaftarkan Balita</h3>
            <?php endif; ?>
        </div>
    </div>
</div>