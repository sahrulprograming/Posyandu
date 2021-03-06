<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">
        <li class="dropdown notification-list">
            <a class="nav-link dr nav-user mr-0 waves-effect waves-light nav-link right-bar-toggle waves-effect waves-light" href="javascript:void(0);">
                <img src="<?= base_url('assets_posyandu/img/profile/' . $profile['foto']) ?>" alt="user-image" class="rounded-circle">
                <span class="pro-user-name ml-1">
                    <?= $profile['nama']; ?>
                </span>
            </a>
        </li>
    </ul>

    <ul class="list-unstyled menu-left mb-0">
        <li class="float-left">
            <a href="<?= base_url(); ?>" class="logo">
                <span class="logo-lg">
                    <img src="<?php echo base_url() . 'assets' ?>/images/logo-posyandu.png" alt="" height="50">
                </span>
            </a>
        </li>
        <li class="float-left">
            <a class="button-menu-mobile navbar-toggle">
                <div class="lines">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </a>
        </li>
    </ul>
</div>
<!-- end Topbar -->