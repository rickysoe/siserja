<div class="section">
    <div class="container mt-2 mb-2">
        <div class="card border-info mt-2">
            <div class="card-body">
                <?php foreach ($detail as $dt): ?>
                    <form id="sewaForm" action="<?= base_url('transaksi/sewa/tambah_sewa_aksi') ?>" method="POST">
                        <div class="form-group">
                            <label>Harga sewa</label>
                            <input type="hidden" name="id_rumah" value="<?= $dt->id_rumah ?>">
                            <input type="text" name="harga" class="form-control" value="Rp. <?= number_format($dt->harga, 0, ',', '.')?>/bulan" readonly>
                        </div>
                        <div class="form-group">
                            <label hidden>Denda</label>
                            <input type="hidden" name="denda" class="form-control" value="Rp. <?= number_format($dt->denda, 0, ',', '.')?>/hari" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Sewa</label>
                            <input type="date" name="tgl_sewa" id="tglSewa" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Selesai</label>
                            <input type="date" name="tanggal_selesai" id="tanggalSelesai" class="form-control">
                            <div id="peringatan" class="text-danger" style="display: none;">Tanggal selesai harus berjarak minimal 1 bulan dari tanggal sewa.</div>
                        </div>
                        <button id="sewaButton" class="btn btn-info" disabled>Sewa</button>
                        <a href="<?= base_url('customer/dashboard') ?>" class="btn btn-warning text-light"> Kembali</a>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('tanggalSelesai').addEventListener('change', function() {
        var tglSewa = new Date(document.getElementById('tglSewa').value);
        var tglSelesai = new Date(this.value);
        var satuBulanSetelahSewa = new Date(tglSewa.getFullYear(), tglSewa.getMonth() + 1, tglSewa.getDate());

        if (tglSelesai >= satuBulanSetelahSewa) {
            document.getElementById('sewaButton').disabled = false;
            document.getElementById('peringatan').style.display = 'none';
        } else {
            document.getElementById('sewaButton').disabled = true;
            document.getElementById('peringatan').style.display = 'block';
        }
    });
</script>
