<?php $role = $this->session->userdata('role');
if (strtolower($role) == 'admin') {
    $kd_profile = $this->session->userdata('kd_admin');
} elseif (strtolower($role) == 'bidan') {
    $kd_profile = $this->session->userdata('kd_bidan');
} else {
    $kd_profile = $this->session->userdata('kd_ortu');
}

?>

<!-- Right Sidebar -->
<div class="right-bar">
    <div class="rightbar-title">
        <a href="javascript:void(0);" class="right-bar-toggle float-right">
            <i class="mdi mdi-close"></i>
        </a>
        <h5 class="m-0 text-white">Profile</h5>
    </div>
    <div class="slimscroll-menu">
        <!-- User box -->
        <div class="user-box">
            <div class="user-img">
                <img src="<?= base_url('assets_posyandu/img/profile/' . $profile['foto']) ?>" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid">
                <a href="javascript: void(0);" data-toggle="modal" data-target="#edit_profile" class="user-edit"><i class="mdi mdi-pencil"></i></a>
            </div>

            <h5><a href="javascript: void(0);"><?= $profile['nama']; ?></a> </h5>
            <p class="text-muted mb-0"><small><?= $this->session->userdata('role'); ?></small></p>
        </div>

        <!-- Settings -->
        <hr class="mt-0">
        <h5 class="pl-3">Pengaturan</h5>
        <hr class="mb-1">
        <div class="form-group">
            <label>email</label>
            <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?= $profile['email']; ?>" readonly>
        </div>
        <hr class="mb-1">
        <?= form_open_multipart('ubah/password') ?>
        <div class="form-group">
            <label>Password Lama</label>
            <input type="password" class="form-control" name="password_lama" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
        </div>
        <div class="form-group">
            <label>Password Baru</label>
            <input type="password" class="form-control" name="password_baru" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
        </div>
        <div class="form-group">
            <label>Password Konfiirmasi</label>
            <input type="password" class="form-control" name="password_konfirmasi" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
        </div>
        <div class="input-group-append float-right">
            <button class="btn btn-primary" type="submit">Rubah Password</button>
        </div>
        </form>
    </div>
    <!-- end .p-3-->
    <!-- Modal -->
    <div class="modal fade" id="edit_profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open_multipart('ubah/profile'); ?>
                <input type="hidden" name="kd_profile" value="<?= $kd_profile; ?>">
                <div class="modal-body">
                    <div class="card rounded mx-auto d-block" style="width: 5rem;">
                        <img class="card-img-top" src="<?= base_url('assets_posyandu/img/profile/' . $profile['foto']) ?>" alt="Card image cap">
                    </div>
                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Ubah Foto Profile </label>
                        <input class="form-control" type="file" id="formFileMultiple" name="foto" multiple>
                    </div>
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?= $profile['nik']; ?>" readonly>
                    </div>
                    <?php if (isset($profile['no_kk'])) : ?>
                        <div class="form-group">
                            <label>No KK</label>
                            <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?= $profile['no_kk']; ?>" readonly>
                        </div>
                    <?php endif ?>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?= $profile['nama']; ?>" name="nama">
                    </div>
                    <div class="form-group">
                        <label>email</label>
                        <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?= $profile['email']; ?>" name="email">
                    </div>
                    <div class="form-group">
                        <label>no tlpn</label>
                        <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?= $profile['no_tlpn']; ?>" name="no_tlpn">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" rows="4" name="alamat"><?= $profile['alamat']; ?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- end slimscroll-menu-->

<!-- /Right-bar -->