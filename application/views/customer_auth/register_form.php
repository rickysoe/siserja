<body style="
    background: url('assets/img/cluster1.jpg');
    background-size: cover;">
    <div class="container">

        <!-- Flash message for successful registration -->
        <?php if ($this->session->flashdata('flash_success')) : ?>
            <div class="alert alert-success alert-dismissible fade show mt-4" role="alert" style="position: fixed; z-index: 9999; width: 30%; margin-left: 15%;">
                <?= $this->session->flashdata('flash_success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-8 mt-4 ">
                <div class="container">
                    <div class="card  my-4 mt-4 p-3" style="
                            background: rgba(255, 255, 255, .2);
                            box-shadow: 0 5px 15px rgba(0, 0, 0, .4);
                            ">
                        <div class="card-body p-0">
                         
                            <div class="container col-md-10 p-5">
                                     <!-- Flash message for username error -->
                                <?php if ($this->session->flashdata('flash_username')) : ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        Username sudah terdaftar!
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php endif; ?>
                                <div class="text-center">
                                    <h1 class="h4 text-gray-100 mb-4">Register</h1>
                                </div>
                                <form action="<?=base_url('register/daftar')?>" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Lengkap" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="no_telepon" name="no_telepon" placeholder="No Telpon" pattern="\d{10,}" title="Nomor telepon harus terdiri dari minimal 10 angka" oninput="validateNumberInput(this)" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" minlength="6" required>
                                    </div>
                                    <div class="form-group">
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                        <option value="" disabled selected>Jenis Kelamin</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat" rows="4" cols="10" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="no_ktp" name="no_ktp" placeholder="No KTP" pattern="[0-9]{16}" title="Nomor KTP harus terdiri dari 16 angka" oninput="validateNumberInput(this)" required>
                                    </div>
                                    <div class="form-group" style="background-color: white; padding: 5px;">
                                        <label for="foto_ktp" style="color: gray; ">Foto KTP (max. 2MB)</label>
                                        <input type="file" class="form-control-file" id="foto_ktp" name="foto_ktp"  style="background-color: white;" required>
                                    </div>            
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Register
                                    </button>
                                    <hr>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- user can only type number in no telpon & no ktp -->
    <script>
    function validateNumberInput(input) {
        input.value = input.value.replace(/\D/g, '');
    }
</script>