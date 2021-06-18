<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">user</li>

                <li>
                    <?php $menu = $this->db->get_where('sub_menu', ['id_menu' => $this->session->userdata('id_menu')])->result_array(); ?>
                    <?php foreach ($menu as $m) : ?>
                        <?php $url = $m['url'] ?>
                <li>
                    <a href="<?= base_url($url); ?>">
                        <i class="<?= $m['icon'] ?>"></i>
                        <span> <?= $m['judul']; ?> </span>
                    </a>
                </li>
            <?php endforeach; ?>
            </li>
            <li>
                <a href="javascript: void(0);">
                    <i class="dripicons-mail"></i>
                    <span> Informasi </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li>
                        <a href="<?= base_url('akun/Kegiatanposyandu'); ?>">Kegiatan Posyandu</a>
                    </li>
                    <li>
                        <a href="<?= base_url('akun/kader_posyandu'); ?>">Kader-Kader Posyandu</a>
                    </li>
                </ul>
            </li>
            <li class="has-submenu">
                <a href="<?= base_url('Auth/logout'); ?>">
                    <i class="fas fa-sign-out-alt"></i>
                    logout
                </a>
            </li>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->