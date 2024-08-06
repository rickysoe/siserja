<!DOCTYPE html>
<html lang="en">

<head>
    <title>SISERJA (No.1 Marketplace Sewa Rumah di Jakarta)</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href=" <?=base_url('assets/assets_admin/img/home.png')?> ">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="<?=base_url('assets/assets_shop')?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/assets_shop')?>/css/jquery-ui.css">
    <link rel="stylesheet" href="<?=base_url('assets/assets_shop')?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/assets_shop')?>/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/assets_shop')?>/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/assets_shop')?>/css/jquery.fancybox.min.css">
    <link href="<?=base_url('assets/assets_admin')?>/js/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url('assets/assets_shop')?>/css/aos.css">
    <link rel="stylesheet" href="<?=base_url('assets/assets_shop')?>/css/style.css">
    
    <script>
    function confirmLogout(e) {
        e.preventDefault(); // Menghentikan tindakan default dari tombol Logout
        var result = confirm("Apakah Anda yakin ingin logout?");
        if (result) {
            window.location.href = "<?=base_url('customer_auth/logout')?>";
        }
    }
    </script>

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div class="site-wrap">
        <header class="site-navbar py-4 bg-white js-sticky-header site-navbar-target" role="banner">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-6 col-xl-2">
                        <h1 class="mb-0 "><a href="<?=base_url()?>" class="text-black mb-0">SISERJA<span class="text-info"></span> </a></h1>
                    </div>
                    <div class="col-12 col-md-10 d-none d-xl-block">
                        <nav class="site-navigation position-relative text-right" role="navigation">

                            <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                                <li><a href="<?=base_url('customer');?>" class="nav-link">Home</a></li>
                                <li><a href="<?=base_url('customer/dashboard/about')?>" class="nav-link">About</a></li>
                                <li><a href="<?=base_url('customer/transaksi ')?>" class="nav-link">Transaksi</a></li>
                                <li class="nav-item">
                                    <?php if ($this->session->userdata('nama')) {?>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Welcome <?=$this->session->userdata('nama')?>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                                <a class="dropdown-item" href="<?=base_url('customer_auth/ganti_password')?>">Ganti password</a>
                                                <a class="dropdown-item" href="<?=base_url('customer_auth/logout')?>" onclick="confirmLogout(event)"> Logout</a>
                                            </div>
                                        </div>
                                    <?php } else {?>
                                        <a href=" <?=base_url('customer_auth/login')?> " class="btn btn-secondary text-white"> <span>Login</span> </a>
                                    <?php }?>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>



