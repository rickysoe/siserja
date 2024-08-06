
<div class="section my-5 p-5 ">
    <div class="container mt-5 mb-2 ">
        <div class="card border-info my-4 mt-4">
            <div class="card-body">
                <div class="div">
                    <?=$this->session->flashdata('flashh');?>
                </div>
                <div class="div">
                    <?=$this->session->flashdata('flashhh');?>
                </div>
                <div class="div">
                    <?=$this->session->flashdata('flash');?>
                </div>
                <?php if ($message): ?>
                    <p><?=$message?></p>
                <?php else: ?>
                    <!-- Display transaction data here -->
                <?php foreach ($transaksi as $dt): ?>
                    <div class="row">
                        <div class="col-md-6 my-2">
                            <img src="<?=base_url('assets/upload/' . $dt->gambar)?>" width="400px" height="300px" alt="">
                        </div>
                        <hr>
                        <div class="col-md-6 my-2">
                            <table class="table">
                                <tr>
                                    <td>Nama Penyewa :</td>
                                    <td> <?=$dt->nama?> </td>
                                </tr>
                                <tr>
                                    <td>Tipe Rumah : </td>
                                    <td> <?php if ($dt->kode_type == "CLS") {
                                            echo "Cluster";
                                        } elseif ($dt->kode_type == "SCLS") {
                                            echo "Special Cluster";
                                        } elseif ($dt->kode_type == "NCLS") {
                                            echo "Non Cluster";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Deskripsi : </td>
                                    <td> <?=$dt->deskripsi?> </td>
                                </tr>
                                <tr>
                                    <td>Ukuran : </td>
                                    <td> <?=$dt->ukuran?> </td>
                                </tr>
                                <tr>
                                    <td>Warna : </td>
                                    <td> <?=$dt->warna?> </td>
                                </tr>
                                <tr>
                                    <td>Alamat Rumah : </td>
                                    <td> <?=$dt->alamat_rumah?> </td>
                                </tr>
                                <tr>
                                    <td>Harga : </td>
                                    <td>Rp. <?=number_format($dt->harga, 0, ',', '.')?>/bulan </td>
                                </tr>
                                <tr>
                                    <td>
                                    <?php if ($dt->status_pembayaran == 1 && $dt->status_sewa == 'Selesai') { ?>
                                        <td><button class="btn btn-success">Transaksi dan Sewa Selesai</button></td>
                                    <?php } else { ?>
                                        <a href="<?=base_url('customer/transaksi/pembayaran/' . $dt->id_booking)?>" class="btn btn-warning">Cek Pembayaran</a>
                                        <td><a href="<?=base_url('customer/dashboard')?>" class="btn btn-info">Kembali</a></td>
                                    <?php } ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
            </div>
        </div>
    </div>
</div>


