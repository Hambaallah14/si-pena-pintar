
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header">
                <div class="d-flex justify-content-between">
                    <div class="logo">
                        <a href="<?=base_url();?>">dashboard<img src="<?=base_url();?>assets/images/si-pena-pintar-logo.png" style="width:100%;height:auto;" srcset=""></a>
                    </div>
                    <div class="toggler">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            </div>

            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-title">Menu</li>
                
                    <li class="sidebar-item active">
                        <a href="<?=base_url();?>dashboard" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <?php if($akses_login == "admin"){ ?>
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Input Data</span>
                        </a>

                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="<?=base_url();?>peserta">Peserta</a>
                            </li>

                            <li class="submenu-item ">
                                <a href="<?=base_url();?>widyaiswara">Widyaiswara</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="<?=base_url();?>penceramah">Penceramah</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="<?=base_url();?>pendamping">Pendamping</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="<?=base_url();?>mata_pelajaran">Mata Pelajaran</a>
                            </li>
                        </ul>
                    </li>
                    <?php } ?>

                   
                    <?php if($akses_login == "admin"){ ?>
                    <li class="sidebar-item  ">
                        <a href="<?=base_url();?>bagi_kelompok" class='sidebar-link'>
                            <i class="bi bi-people-fill"></i>
                            <span>Pembagian Kelompok</span>
                        </a>
                    </li>
                    <?php } ?>
                    
                    <?php if($akses_login == "admin"){ ?>
                    <li class="sidebar-item  ">
                        <a href="<?=base_url();?>pengampu_materi" class='sidebar-link'>
                            <i class="bi bi-book-half"></i>
                            <span>Pengampu Materi</span>
                        </a>
                    </li>
                    <?php } ?>

                    <li class="sidebar-item  ">
                        <a href="<?=base_url();?>jadwal" class='sidebar-link'>
                            <i class="bi bi-calendar-event-fill"></i>
                            <span>Jadwal</span>
                        </a>
                    </li>

                    <?php if($akses_login == "admin"){ ?>
                        <li class="sidebar-item  ">
                        <a href="<?=base_url();?>pengaturan" class='sidebar-link'>
                            <i class="bi bi-gear-fill"></i>
                            <span>Pengaturan</span>
                        </a>
                    </li>
                    <?php } ?>

                    <!-- <li class="sidebar-title">Forms &amp; Tables</li> -->
                
                    
                
                    <li class="sidebar-item  ">
                        <a href="<?=base_url();?>login/logout" class='sidebar-link'>
                            <i class="bi bi-box-arrow-left"></i>
                            <span>Keluar</span>
                        </a>
                    </li>
                </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div> <!-- END SIDEBAR -->

    <div id="main" class="layout-navbar">
        <header class="mb-3">
            <nav class="navbar navbar-expand navbar-light ">
                <div class="container-fluid">
                    <a href="#" class="burger-btn d-block d-xl-none">
                        <i class="bi bi-justify fs-3"></i>
                    </a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="dropdown ms-auto">
                            <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="user-menu d-flex">
                                    <div class="user-name text-end me-3">
                                        <h6 class="mb-0 text-gray-600"><?=$user[0]['nama']?></h6>
                                        <p class="mb-0 text-sm text-gray-600"><?= $id_user; ?></p>
                                    </div>
                                    <div class="user-img d-flex align-items-center">
                                        <div class="avatar avatar-md">
                                            <img src="<?=base_url();?>assets/images/logo-provsu.png">
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                                <li>
                                    <h6 class="dropdown-header"><?=$user[0]['nama']?></h6>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="icon-mid bi bi-person me-2"></i> Profil Saya
                                    </a>
                                </li>   
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?=base_url();?>login/logout">
                                        <i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>