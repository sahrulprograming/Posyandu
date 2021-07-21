<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Admin</li>

                <li>
                    <?php $menu = $this->db->get_where('sub_menu', ['id_menu' => 1])->result_array(); ?>

                    <?php foreach ($menu as $menu) : ?>
                        <?php $url = $menu['url'] ?>
                <li>
                    <a href="<?= base_url($url); ?>">
                        <i class="<?= $menu['icon'] ?>"></i>
                        <span> <?= $menu['judul']; ?> </span>
                    </a>
                </li>
            <?php endforeach; ?>
            </li>
            <li>
                <a href="javascript: void(0);">
                    <i class="fas fa-caret-square-down"></i>
                    <span> More </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li>
                        <i class="fas fa-calendar-alt"></i>
                        <a href="<?= base_url('admin/jadwal'); ?>" class="d-inline-block">Jadwal Posyandu</a>
                    </li>
                    <li>
                        <i class="fas fa-users-cog"></i>
                        <a href="<?= base_url('admin/tambah_admin'); ?>" class="d-inline-block">Tambah Admin</a>
                    </li>
                    <li>
                        <i class="fas fa-user-friends"></i>
                        <a href="<?= base_url('admin/anggota'); ?>" class="d-inline-block">Anggota Posyandu</a>
                    </li>
                    <li>
                        <i class="fas fa-calendar-check"></i>
                        <a href="<?= base_url('admin/kegiatan'); ?>" class="d-inline-block">Kegiatan Posyandu</a>
                    </li>
                    <li>
                        <i class="fas fa-book"></i>
                        <a href="<?= base_url('admin/laporan_posyandu'); ?>" class="d-inline-block">Laporan Posyandu</a>
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