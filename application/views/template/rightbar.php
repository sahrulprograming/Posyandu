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
                <img src="<?php echo base_url() . 'assets' ?>/images/users/avatar-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid">
                <a href="javascript:void(0);" class="user-edit"><i class="mdi mdi-pencil"></i></a>
            </div>

            <h5><a href="javascript: void(0);"><?= $orang_tua['nama']; ?></a> </h5>
            <p class="text-muted mb-0"><small><?= $this->session->userdata('role'); ?></small></p>
        </div>

        <!-- Settings -->
        <hr class="mt-0" />
        <h5 class="pl-3">Pengaturan</h5>
        <hr class="mb-1" />
        <div class="mb-1">
            <span>Nama</span>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?= $orang_tua['nama']; ?>">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">Rubah</button>
            </div>
        </div>
    </div>
    <!-- end .p-3-->

</div>
<!-- end slimscroll-menu-->

<!-- /Right-bar -->