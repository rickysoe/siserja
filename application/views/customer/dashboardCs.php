<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-...s8=" crossorigin="anonymous">

<div class="site-blocks-cover overlay mt-3" style="background-image: url(<?=base_url('assets/assets_shop')?>/images/gbr.jpeg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center">

            <div class="col-md-12" data-aos="fade-up" data-aos-delay="400">

                <div class="row mb-4">
                    <div class="flash-data" data-flashdata="<?=$this->session->flashdata('flash');?>">
                    </div>

                    <h1>Temukan Hunian Impianmu di Jakarta</h1>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="div">
    <?=$this->session->flashdata('flashh');?>
</div>

<div class="site-section" id="products-section">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-md-6 text-center">
                <h3 class="section-sub-title">Produk Populer</h3>
                <h2 class="section-title mb-3">Our Products</h2>
                <p>Nikmati Hunian yang Nyaman dengan Sewa Rumah Terbaik</p>
            </div>
        </div>
        <div class="row">
            <?php foreach ($rumah as $rm): ?>
                <div class="col-lg-4  mb-5">
                    <div class="card border-info shadow  h-300">
                        <div class="card-body border-info">
                            <div class="card-title">
                                <div class="product-item">
                                    <figure>
                                        <img src=" <?=base_url('assets/upload/' . $rm->gambar)?> " alt="Image" height="100px" width="300px" class="img-fluid" style="height: 200px;">
                                    </figure>
                                    <div class="px-4">
                                        <h3><a href="#"> <?php if ($rm->kode_type == "CLS") {
                                                                        echo "Cluster";
                                                                    } elseif ($rm->kode_type == "SCLS") {
                                                                        echo "Special Cluster";
                                                                    } elseif ($rm->kode_type == "NCLS") {
                                                                        echo "Non Cluster";
                                                                    }
                                                                    ?> </a></h3>
                                                        <p class="mb-2"><?=$rm->ukuran?> </p>
                                                        <p class="mb-3" style="color: red; font-size: medium;">Promo Terbatas!</p>
                                                        <p class="mb-2"> <del><?=number_format($rm->harga * 2, 0, ',', '.')?> </del> </p>
                                                        <p class="mb-4">Rp. <?=number_format($rm->harga, 0, ',', '.')?> / Bulan </p>
                                                        <p class="mb-4"> <?php if ($rm->status == 1) {
                                                                        echo " <span class='badge badge-info p-1'> Tersedia </span>";
                                                                    } else {
                                                                        echo "<span class='badge badge-danger p-1'> Tidak tersedia </span>";
                                                                    }
                                                                    ?> </p>
                                        <div>
                                        <a href="<?=base_url('customer/dashboard/detail_rumah/' . $rm->id_rumah);?>  " class="btn btn-info mr-1 ">Detail</a>
                                        <?php if ($rm->status == 1): ?>
                                                <?php if ($this->session->userdata('nama')): ?>
                                                    <a href="<?=base_url('transaksi/sewa/tambah_sewa/' . $rm->id_rumah);?>" class="btn btn-warning ml-1">Sewa</a>
                                                <?php else: ?>
                                                    <a href="<?=base_url('customer_auth/login');?>" class="btn btn-warning ml-1">Sewa</a>
                                                <?php endif;?>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>


<!-- footer -->
<div class="site-section bg-light" id="services-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">

                <h4 class="text text-info section-title mb-3">Connect with Us</h4>
            </div>
        </div>
        <div class="row align-items-stretch">
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
                <div class="unit-4 d-flex">
                    <div class="unit-4-icon mr-4"><span class="text-primary icon-pie_chart"></span></div>
                    <div>
                    <h3>Visit Our Office</h3>
                        <p><i class="fas fa-map-marker-alt"></i> Jl. U Raya No.99, Palmerah, Jakarta Barat</p>
                        <p><i class="far fa-clock"></i> Senin - Jumat : 08.00 - 17.00 WIB </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="unit-4 d-flex">
                    <div class="unit-4-icon mr-4"><span class="text-primary icon-backspace"></span></div>
                    <div>
                    <h3>24-Hour Contact</h3>
                    <p><i class="fas fa-phone"></i> <a href="tel:021888999">021-888999 (Call)</a></p>
                    <p><i class="fab fa-whatsapp"></i> <a href="https://wa.me/0812888999">0812888999 (Chat Only)</a></p>
                    <p><i class="far fa-envelope"></i> <a href="mailto:halo@siserja.com">halo@siserja.com</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="unit-4 d-flex">
                    <div class="unit-4-icon mr-4"><span class="text-primary icon-av_timer"></span></div>
                    <div>
                        <h3>Social Media</h3>
                        <p><a href="https://www.facebook.com/siserjaofficial"><i class="fab fa-facebook"></i> Facebook</a></p>
                        <p><a href="https://twitter.com/siserjaofficial"><i class="fab fa-twitter"></i> Twitter</a></p>
                        <p><a href="https://www.instagram.com/siserjaofficial"><i class="fab fa-instagram"></i> Instagram</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>