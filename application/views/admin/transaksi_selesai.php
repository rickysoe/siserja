<div class="main-content">
    <div class="section">
        <div class="section-header">
            <div class="card m-3">
                <div class="card-header">
                    <h4 class="text text-center text-primary">Transaksi Selesai</h4>
                </div>

                <div class="card-body my-3">
                    <form action="<?= base_url('admin/transaksi/transaksi_selesai_aksi') ?>" method="POST">
                        <?php foreach ($transaksi as $tr) : ?>
                            <input type="hidden" name="id_booking" value="<?= $tr->id_booking ?>">
                            <input type="hidden" name="id_rumah" value="<?= $tr->id_rumah ?>">

                            <div class="form-group">
                                <label>Tanggal Selesai</label>
                                <input type="date" name="tanggal_selesai" class="form-control" value="<?= $tr->tanggal_selesai ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Tanggal Checkout</label>
                                <input type="date" name="tgl_checkout" class="form-control" value="<?= $tr->tgl_checkout ?>" onchange="calculatePenalty(this)" required>
                            </div>

                            <div class="form-group">
                                <label>Denda Per Hari</label>
                                <input type="text" name="denda" class="form-control" value="<?= number_format($tr->denda, 0, ',', '.') ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Total Denda *(pastikan penyewa sudah membayar denda)</label>
                                <input type="text" name="total_denda" id="total_denda" class="form-control" value="<?= number_format($tr->total_denda, 0, ',', '.') ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Status Pengembalian Kunci</label>
                                <select name="status_pengembalian" class="form-control" required>
                                    <option value="" disabled selected>--Pilih Status Pengembalian Kunci--</option>
                                    <option value="Kembali" <?= ($tr->status_pengembalian == 'Kembali') ? 'selected' : '' ?>>Kembali</option>
                                    <option value="Belum Kembali" <?= ($tr->status_pengembalian == 'Belum Kembali') ? 'selected' : '' ?>>Belum Kembali</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Status Sewa</label>
                                <select name="status_sewa" class="form-control" required>
                                    <option value="" disabled selected>--Pilih Status Sewa--</option>
                                    <option value="Selesai" <?= ($tr->status_sewa == 'Selesai') ? 'selected' : '' ?>>Selesai</option>
                                    <option value="Belum Selesai" <?= ($tr->status_sewa == 'Belum Selesai') ? 'selected' : '' ?>>Belum Selesai</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        <?php endforeach ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function calculatePenalty(input) {
        var tglSelesai = new Date("<?= $tr->tanggal_selesai ?>");
        var tglPengembalian = new Date(input.value);
        var selisihHari = Math.floor((tglPengembalian - tglSelesai) / (1000 * 60 * 60 * 24));
        var dendaPerHari = <?= $tr->denda ?>;
        var totalDenda = selisihHari > 0 ? selisihHari * dendaPerHari : 0;

        document.getElementById('total_denda').value = totalDenda.toLocaleString('id-ID');
    }
</script>

