<div class="container-fluid">
    <div class="content-wrapper">
        <div class="card-title text-center">
            <div class="container ">
                <h4 class="text-center text-primary">Update Data</h4>
                <hr class="divider topbar-divider">
            </div>
        </div>
        <?php foreach ($rumah as $rm): ?>
            <form action="<?=base_url('admin/data_rumah/proses_update_rumah');?>" method="POST" enctype="multipart/form-data">
                <div class="row bg-light">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="hidden" name="id_rumah" class="form-control" value="<?=$rm->id_rumah?>">
                            <label>Kode Tipe</label>
                            <select name="kode_type" class="form-control" required>
                                <option value="CLS" <?=($rm->kode_type == 'CLS') ? 'selected' : ''?>>CLS</option>
                                <option value="NCLS" <?=($rm->kode_type == 'NCLS') ? 'selected' : ''?>>NCLS</option>
                                <option value="SCLS" <?=($rm->kode_type == 'SCLS') ? 'selected' : ''?>>SCLS</option>
                            </select>
                            <?=form_error('kode_type', '<div class="text-small text-danger">', '</div>')?>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" value="<?=$rm->deskripsi?>" required>
                            <?=form_error('deskripsi', '<div class="text-small text-danger">', '</div>')?>
                        </div>
                        <div class="form-group">
                            <label>Ukuran</label>
                            <input type="text" name="ukuran" class="form-control" value="<?=$rm->ukuran?>" required>
                            <?=form_error('ukuran', '<div class="text-small text-danger">', '</div>')?>
                        </div>
                        <div class="form-group">
                            <label>Alamat Rumah</label>
                            <input type="text" name="alamat_rumah" class="form-control"  value="<?=$rm->alamat_rumah?>" required>
                            <?=form_error('alamat_rumah', '<div class="text text-danger">', '</div>');?>
                        </div>
                        <div class="form-group">
                            <label>Warna</label>
                            <input type="text" name="warna" class="form-control" value="<?=$rm->warna?>" required>
                            <?=form_error('warna', '<div class="text text-danger">', '</div>');?>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control" required>
                                <option value="1" <?=($rm->status == "1") ? 'selected' : ''?>>Tersedia</option>
                                <option value="0" <?=($rm->status == "0") ? 'selected' : ''?>>Tidak Tersedia</option>
                            </select>
                            <?=form_error('status', '<div class="text text-danger">', '</div>');?>
                        </div>

                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" name="harga" class="form-control pb-1" value="<?=number_format($rm->harga)?>" oninput="formatCurrency(this)" required>
                            <?=form_error('harga', '<div class="text text-danger">', '</div>');?>
                        </div>
                        <div class="form-group">
                            <label>Denda</label>
                            <input type="text" name="denda" class="form-control pb-1" value="<?=number_format($rm->denda)?>" oninput="formatCurrency(this)" required>
                            <?=form_error('denda', '<div class="text text-danger">', '</div>');?>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Pembangunan</label>
                            <input type="text" name="jumlah_pembangunan" class="form-control pb-1" value="<?=$rm->jumlah_pembangunan?>" required>
                            <?=form_error('jumlah_pembangunan', '<div class="text text-danger">', '</div>');?>
                        </div>
                        <div class="form-group">
                            <label>Gambar Lama</label><br>
                            <?php if ($rm->gambar) { ?>
                                <img src="<?=base_url('assets/upload/'.$rm->gambar)?>" alt="Gambar Lama" width="200">
                                <input type="hidden" name="gambar_lama" value="<?=$rm->gambar?>">
                            <?php } else { ?>
                                <span>Tidak ada gambar lama</span>
                                <input type="hidden" name="gambar_lama" value="">
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label>Unggah Gambar Baru</label>
                            <input type="file" name="gambar" class="form-control pb-1">
                            <?=form_error('gambar', '<div class="text text-danger">', '</div>');?>
                        </div>

                        <button type="submit" class="btn btn-success mt-1 mb-4">Simpan</button>
                        <button type="button" class="btn btn-info mt-1 mb-4" onclick="location.href='<?=base_url('admin/data_rumah');?>'">Batal</button>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-lg-5">
                            <div class="container">
                                <img width="500px" src="<?=base_url('assets/img/gbr3.png')?>">
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        <?php endforeach;?>

    </div>
</div>

<script>
    function formatCurrency(input) {
        var value = input.value.replace(/\D/g, '');
        input.value = formatNumber(value);
    }

    function formatNumber(value) {
        return new Intl.NumberFormat('en-US').format(value);
    }
</script>
