<div class="section">
    <div class="container mt-2 mb-2 ">
        <div class="card border-info mt-2">
            <div class="card-body">
                <?php foreach ($detail as $dt): ?>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="<?=base_url('assets/upload/' . $dt->gambar)?>" width="400px" height="300px" alt="">
                        </div>
                        <div class="col-md-6">
                            <table class="table">
                                <tr>
                                    <td>Tipe rumah :</td>
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
                                    <td> <?=$dt->deskripsi?></td>
                                </tr>
                                <tr>
                                    <td>Ukuran : </td>
                                    <td> <?=$dt->ukuran?> </td>
                                </tr>
                                <tr>
                                    <td>Warna :</td>
                                    <td> <?=$dt->warna?> </td>
                                </tr>
                                <tr>
                                    <td>Alamat Rumah : </td>
                                    <td> <?=$dt->alamat_rumah?> </td>
                                </tr>
                                <tr>
                                    <td>Harga : </td>
                                    <td>Rp. <?= number_format($dt->harga, 0, ',', '.') ?>/bulan </td>
                                </tr>
                                <tr>
                                    <td>Status : </td>
                                    <td> <?php if ($dt->status == 1) {
                                    echo " <span class='badge badge-info p-1'> Tersedia </span>";
                                } else {
                                    echo "<span class='badge badge-danger p-1'> Tidak tersedia </span>";
                                }
                                ?>
                                </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                    <?php
                                        if ($dt->status == 0) {
                                            echo "<span style='color: red; font-weight: bold;'>Sedang Disewa</span>";
                                        } else {
                                            if ($this->session->userdata('id_customer')) {
                                                echo anchor('transaksi/sewa/tambah_sewa/' . $dt->id_rumah, '<button class="btn btn-info">Sewa rumah</button> ');
                                            } else {
                                                echo anchor('customer_auth/login', '<button class="btn btn-info">Sewa rumah</button> ');
                                            }
                                        }
                                        ?>
                                        <a class="btn btn-warning" href=" <?=base_url('customer/dashboard');?>  ">Kembali</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>