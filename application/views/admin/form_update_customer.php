<div class="container-fluid">
    <div class="content-wrapper">

        <div class="card-title text-center">
            <div class="container ">
                <h4 class="text-center text-primary">Update Data Customer</h4>
                <hr class="divider topbar-divider">
            </div>
        </div>
        <?php foreach ($customer as $ct) : ?>
            <form action=" <?= base_url('admin/data_customer/proses_update_customer'); ?> " method="POST" enctype="multipart/form-data">
                <div class="row bg-light">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="hidden" name="id_customer" class="form-control" value="<?= $ct->id_customer ?>">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="<?= $ct->nama ?>" required>
                            <?= form_error('nama', '<div class="text-small text-danger">', '</div>') ?>
                        </div>
                        <div class="form-group">
                            <label>No Telpon</label>
                            <input type="text" name="no_telepon" id="no_telepon" class="form-control" value="<?= $ct->no_telepon ?>" required>
                            <?= form_error('no_telepon', '<div class="text text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value="<?= $ct->username ?>" required>
                            <?= form_error('username', '<div class="text-small text-danger">', '</div>') ?>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                <option value="" disabled selected>Jenis Kelamin</option>
                                <option value="Laki-Laki" <?= ($ct->jenis_kelamin == 'Laki-Laki') ? 'selected' : '' ?>>Laki-Laki</option>
                                <option value="Perempuan" <?= ($ct->jenis_kelamin == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
                            </select>
                        </div>           
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control" value="<?= $ct->alamat ?>" required>
                            <?= form_error('alamat', '<div class="text text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>No KTP</label>
                            <input type="text" name="no_ktp" id="no_ktp" class="form-control" value="<?= $ct->no_ktp ?>" required>
                            <?= form_error('no_ktp', '<div class="text text-danger">', '</div>'); ?>
                        </div>                   
                        <div class="form-group">
                            <label style="display: block; margin-top: 10px;">Foto KTP Lama</label>
                            <img src="<?= base_url('assets/upload/foto_ktp_customer/' . $ct->foto_ktp) ?>" alt="Foto KTP Lama" width="200">
                        </div>
                        <div class="form-group">
                            <label>Unggah Foto KTP Baru (max. 2MB)</label>
                            <input type="file" name="foto_ktp" id="foto_ktp" class="form-control-file" accept="image/*">
                            <?= form_error('foto_ktp', '<div class="text-small text-danger">', '</div>') ?>
                            <div id="preview_ktp"></div>
                        </div>

                        <button type="submit" class="btn btn-success mt-1 mb-4">Simpan</button>
                        <button type="button" class="btn btn-info mt-1 mb-4" onclick="location.href='<?= base_url('admin/data_customer'); ?>'">Batal</button>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-lg-5">
                            <div class="container">
                                <img width="500px" src=" <?= base_url('assets/img/gbr3.png') ?> ">
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        <?php endforeach; ?>

    </div>
</div>


<script>
    // Mendapatkan elemen input
    var inputNoTelepon = document.getElementById('no_telepon');
    var inputNoKTP = document.getElementById('no_ktp');

    // Mengatur atribut input agar hanya angka yang diperbolehkan
    inputNoTelepon.addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    inputNoKTP.addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    // Menambahkan validasi minimal digit
    inputNoTelepon.addEventListener('input', function() {
        if (this.value.length < 10) {
            this.setCustomValidity('No Telpon minimal 10 digit');
        } else {
            this.setCustomValidity('');
        }
    });

    inputNoKTP.addEventListener('input', function() {
        if (this.value.length < 16) {
            this.setCustomValidity('No KTP minimal 16 digit');
        } else {
            this.setCustomValidity('');
        }
    });
</script>
