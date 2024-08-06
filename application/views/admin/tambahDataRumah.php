<div class="container-fluid">
    <div class="content-wrapper">
        <form action="<?=base_url('admin/data_rumah/proses_tambah_rumah');?>" method="POST" enctype="multipart/form-data">
            <div class="row bg-light">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="hidden" name="id" class="form-control">
                        <label>Kode Tipe</label>
                        <select name="kode_type" class="form-control" required>
                            <option value="" disabled selected> -- Pilih Tipe Rumah --</option>
                            <option value="CLS">CLS</option>
                            <option value="NCLS">NCLS</option>
                            <option value="SCLS">SCLS</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" required>
                        <?=form_error('deskripsi', '<div class="text-small text-danger">', '</div>')?>
                    </div>
                    
                    <div class="form-group">
                        <label>Ukuran</label>
                        <input type="text" name="ukuran" class="form-control" required>
                        <?=form_error('ukuran', '<div class="text-small text-danger">', '</div>')?>
                    </div>

                    <div class="form-group">
                        <label>Warna</label>
                        <input type="text" name="warna" class="form-control" required>
                        <?=form_error('warna', '<div class="text text-danger">', '</div>');?>
                    </div>

                    <div class="form-group">
                        <label>Alamat Rumah</label>
                        <input type="text" name="alamat_rumah" class="form-control" required>
                        <?=form_error('kode_type', '<div class="text text-danger">', '</div>');?>
                    </div>
              

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" required>
                            <option value="" disabled selected> -- Pilih Status --</option>
                            <option value="1">Tersedia</option>
                            <option value="0">Tidak Tersedia</option>
                        </select>
                        <?=form_error('status', '<div class="text text-danger">', '</div>');?>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" name="harga" class="form-control pb-1" oninput="formatCurrency(this)" required>
                        <?=form_error('harga', '<div class="text text-danger">', '</div>');?>
                    </div>
                    <div class="form-group">
                        <label>Denda</label>
                        <input type="text" name="denda" class="form-control pb-1" oninput="formatCurrency(this)" required>
                        <?=form_error('denda', '<div class="text text-danger">', '</div>');?>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Pembangunan</label>
                        <input type="text" name="jumlah_pembangunan" class="form-control pb-1" required>
                        <?=form_error('jumlah_pembangunan', '<div class="text text-danger">', '</div>');?>
                    </div>
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name="gambar" id="gambarInput" class="form-control pb-1" required>
                        <img id="gambarPreview" src="#" alt="Preview Gambar" style="max-width: 200px; display: none;">
                        <?=form_error('gambar', '<div class="text text-danger">', '</div>');?>
                    </div>
                    <button type="submit" class="btn btn-success mt-1 mb-4">Submit</button>
                    <button type="reset" class="btn btn-info mt-1 mb-4">Reset</button>
                </div>

                <div class="row">
                    <div class="col-md-6 mt-lg-5">
                        <div class="container">
                            <img width="500px" src=" <?=base_url('assets/img/gbr1.png')?> ">
                        </div>
                    </div>
                </div>
            </div>
        </form>


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


<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#gambarPreview').attr('src', e.target.result);
                $('#gambarPreview').css('display', 'block');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#gambarInput").change(function () {
        readURL(this);
    });
</script>