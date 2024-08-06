<div class="container-fluid">
    <div class="content-wrapper">
        <form action=" <?= base_url('admin/data_customer/proses_tambah_customer'); ?> " method="POST" enctype="multipart/form-data">
            <div class="row bg-light">
                <div class="col-md-6">

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                        <?= form_error('nama', '<div class="text-small text-danger">', '</div>') ?>
                    </div>
                    <div class="form-group">
                        <label>No Telpon</label>
                        <input type="text" name="no_telepon" class="form-control" required oninput="validatePhoneNumber(event)">
                        <?= form_error('no_telepon', '<div class="text-small text-danger">', '</div>') ?>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                        <?= form_error('username', '<div class="text-small text-danger">', '</div>') ?>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" minlength="6" required>
                        <?= form_error('password', '<div class="text-small text-danger">', '</div>') ?>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin">
                            <option value="" disabled selected>--Silahkan Pilih Jenis Kelamin--</option>
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                        <?= form_error('jenis_kelamin', '<div class="text text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" rows="4" cols="10" class="form-control" required></textarea>
                        <?= form_error('alamat', '<div class="text text-danger">', '</div>'); ?>
                    </div>
                   <div class="form-group">
                        <label>No KTP</label>
                        <input type="text" name="no_ktp" class="form-control" required oninput="validateKTP(event)">
                        <?= form_error('no_ktp', '<div class="text-small text-danger">', '</div>') ?>
                    </div>
                    <div class="form-group">
                        <label>Foto KTP (max. 2MB)</label>
                        <input type="file" name="foto_ktp" id="foto_ktp" class="form-control-file" accept="image/*" required>
                        <?= form_error('foto_ktp', '<div class="text-small text-danger">', '</div>') ?>
                        <div id="preview_ktp"></div>
                    </div>

                    <button type="submit" class="btn btn-success mt-1 mb-4">simpan</button>
                    <button type="reset" class="btn btn-info mt-1 mb-4">reset</button>
                </div>

                <div class="row">
                    <div class="col-md-6 mt-lg-5">
                        <div class="container">
                            <img width="500px" src=" <?= base_url('assets/img/gbr1.png') ?> ">
                        </div>
                    </div>
                </div>
            </div>
        </form>


    </div>
</div>


<script>
    document.getElementById('foto_ktp').addEventListener('change', function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var preview = document.createElement('img');
            preview.src = reader.result;
            preview.style.maxWidth = '200px';
            document.getElementById('preview_ktp').innerHTML = '';
            document.getElementById('preview_ktp').appendChild(preview);
        }
        reader.readAsDataURL(event.target.files[0]);
    });

    function validatePhoneNumber(event) {
        var input = event.target.value;
        var numbersOnly = input.replace(/\D/g, '');
        event.target.value = numbersOnly;
        if (numbersOnly.length < 10) {
            event.target.setCustomValidity("Nomor telepon harus memiliki panjang minimal 10 digit angka.");
        } else {
            event.target.setCustomValidity("");
        }
    }

    function validateKTP(event) {
        var input = event.target.value;
        var numbersOnly = input.replace(/\D/g, '');
        event.target.value = numbersOnly;
        if (numbersOnly.length < 16) {
            event.target.setCustomValidity("Nomor KTP harus memiliki panjang minimal 16 digit angka.");
        } else {
            event.target.setCustomValidity("");
        }
    }
</script>



