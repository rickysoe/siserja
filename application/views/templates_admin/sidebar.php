<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center " href="<?=base_url()?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-industry"></i>
                </div>
                <span class="sidebar-brand-text text-xs text-decoration-none  align-center" style="margin-left: 10px;"> SISERJA Corp
                    <br><sup>tbk</sup></span>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class=" nav-link" href="<?=base_url('admin/dashboard')?> ">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span class="text-light">Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                All Datas
            </div>

            <li class="nav-item">
                <a class="nav-link " href=" <?=base_url('admin/data_rumah')?> ">
                    <i class="fas fa-home"></i>
                    <span class="text-light ">Data Rumah</span></a>
            </li>

                   <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href=" <?=base_url('admin/data_customer')?> ">
                <i class="fas fa-user"></i>
                    <span>Data Customer</span></a>
            </li>

            <li class="nav-item">
                <a href="<?=base_url('admin/transaksi')?>" class="nav-link <?php if ($this->uri->segment(1) == 'admin/transaksi') {
                    echo "active";
                }?>">
                    <i class="fas fa-dollar-sign"></i>
                    <span>Data Transaksi</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href=" <?=base_url('admin/laporan')?> ">
                    <i class="fas fa-print"></i>
                    <span>Laporan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('admin_auth/logout')?>" onclick="confirmLogout(event)">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column bg-detail">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white  topbar mb-4 static-top ">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>           
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">    
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$this->session->userdata('nama_admin')?></span>
                                <img class="img-profile rounded-circle"
                                    src=" <?=base_url('assets/assets_admin/img/home.png')?> ">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

                                <a class="dropdown-item" href=" <?=base_url('admin_auth/ganti_password')?> ">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Ganti password
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?=base_url('admin_auth/logout')?>" onclick="confirmLogout(event)">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

    <script>
    function confirmLogout(e) {
        e.preventDefault(); 
        var result = confirm("Apakah Anda yakin ingin logout?");
        if (result) {
            window.location.href = "<?=base_url('customer_auth/logout')?>";
        }
    }
    </script>
