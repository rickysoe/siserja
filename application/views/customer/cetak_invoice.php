<style>
    * {
        font-style: normal;
        text-align: center;
        margin: 10;
    }

    tr-td {
        text-align: center;

        justify-content: center;


    }

    table {
        text-align: center;
        justify-content: center;
    }
</style>
<table style="margin: 0 auto;">
    <?php foreach ($transaksi as $dt): ?>

        <p style="text-align: center; margin-top: 5px; "> Invoice Pembayaran</p>
        <div style="text-align: center; color: royalblue;">
            <h1>SISERJA</h1>
            <p>Sistem Informasi Sewa Rumah Jakarta</p>
        </div>
        <hr>
        <tr>
            <td>Nama penyewa</td>
            <td>:</td>
            <td> <?=$dt->nama?> </td>
        </tr>
        <tr>
            <td>Tipe rumah</td>
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
            <td> <?php
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
            <td>Jumlah Pembayaran </td>
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

                echo '<button style="color: royalblue;"> Rp. ' . number_format($jumlah_pembayaran, 0, ',', '.') . '</button>';
            ?>
    <?php endforeach?>
</table>
<script type="text/javascript">
    window.print();
</script>