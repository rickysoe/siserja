<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-md-7">

            <div class="card " style="margin-top: 115px;">
                <div class="card-header">

                    <h4> Invoice Pembayaran</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <?php foreach ($transaksi as $dt): ?>
                            <tr>
                                <td>Nama Penyewa</td>
                                <td>:</td>
                                <td> <?=$dt->nama?> </td>
                            </tr>
                            <tr>
                                <td>Tipe Rumah</td>
                                <td>:</td>
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
                                <td>Deskripsi</td>
                                <td>:</td>
                                <td> <?=$dt->deskripsi?> </td>
                            </tr>
                            <tr>
                                <td>Ukuran</td>
                                <td>:</td>
                                <td> <?=$dt->ukuran?> </td>
                            </tr>
                            <tr>
                                <td>Warna</td>
                                <td>:</td>
                                <td> <?=$dt->warna?> </td>
                            </tr>
                            <tr>
                                <td>Alamat Rumah</td>
                                <td>:</td>
                                <td> <?=$dt->alamat_rumah?> </td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td>:</td>
                                <td>Rp. <?=number_format($dt->harga, 0, ',', '.')?>/bulan</td>
                            </tr>
                            <tr>
                                <td>Tanggal mulai sewa</td>
                                <td>:</td>
                                <td> <?=$dt->tgl_sewa?> </td>
                            </tr>
                            <tr>
                                <td>Tanggal selesai </td>
                                <td>:</td>
                                <td> <?=$dt->tanggal_selesai?> </td>
                            </tr>
                            <tr>
                                <td>Durasi Sewa </td>
                                <td>:</td>
                                <td>
                                <?php
                                    $tgl_mulai = new DateTime($dt->tgl_sewa);
                                    $tgl_selesai = new DateTime($dt->tanggal_selesai);

                                    $durasi = $tgl_mulai->diff($tgl_selesai);

                                    $bulan = $durasi->y * 12 + $durasi->m;
                                    $hari = $durasi->d;

                                    echo $bulan . ' Bulan ' . $hari . ' Hari';
                                ?>
                                </td>
                            </tr>
                            <tr>
                            <td>Jumlah Pembayaran</td>
                            <td>:</td>
                            <td>
                            <?php
                                $mulai = new DateTime($dt->tgl_sewa);
                                $selesai = new DateTime($dt->tanggal_selesai);
                                $selisih = $selesai->diff($mulai);

                                $bulan = $selisih->m; // Menghitung jumlah bulan
                                $hari = $selisih->d; // Menghitung jumlah hari

                                $harga_sewa_per_bulan = $dt->harga; // Harga sewa per bulan dari $dt

                                $jumlah_pembayaran = ($bulan * $harga_sewa_per_bulan) + ($hari * ($harga_sewa_per_bulan / 30)); // Jumlah pembayaran untuk bulan dan hari

                                echo '<button class="badge-pill badge-info"> Rp. ' . number_format($jumlah_pembayaran, 0, ',', '.') . '</button>';
                            ?>
                            </td>
                            <tr>
                                <td></td>
                                <td></td>
                                <td> <a href="<?=base_url('customer/transaksi/print_invoice/' . $dt->id_booking)?>" class="btn btn-info mt-3">Print Invoice</a> </td>
                            </tr>
                    </table>
                </div>
            <?php endforeach;?>
            </div>
        </div>
        <div class="col-md-4 " style="margin-top: 117px;">
            <div class="card border-secondary">
                <div class="card-header alert alert-secondary p-1 text-center">
                    <p>Pembayaran</p>
                </div>
                <div class="card-body p-3">
                    <p>Silahkan melakukan pembayaran untuk transaksi yang Anda lakukan. Nomor rekening resmi sebagai berikut:</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> BCA 658949888 a.n <br>PT. SISERJA Proptech</li>
                        <li class="list-group-item"> Mandiri 585666477 a.n <br>PT. SISERJA Proptech</li>
                        <li class="list-group-item"> BNI 151515478 a.n. <br>PT. SISERJA Proptech</li>
                    </ul>
                    <?php if (empty($dt->bukti_pembayaran)) {?>
                        <button type="submit" class="btn btn-sm btn-outline-info mt-2" data-toggle="modal" data-target="#exampleModal" style=" color: blue;"> Upload Bukti Pembayaran </button>

                    <?php } elseif ($dt->status_pembayaran == '0') {?>
                        <button type="submit" class="btn btn-sm btn-outline-info mt-2" style=" color: blue;"> Menunggu Konfirmasi </button>
                    <?php } elseif ($dt->status_pembayaran == '1') {?>
                        <button type="submit" class="btn btn-sm btn-outline-info mt-2" style=" color: blue;">Transaksi Sukses </button>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="#exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Masukan Bukti Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=base_url('customer/transaksi/pembayaran_aksi')?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <label>Upload Bukti</label>
                    <input type="hidden" name="id_booking" class="form-control" value="<?=$dt->id_booking?>">
                    <input type="file" name="bukti_pembayaran" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning text text-light">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>