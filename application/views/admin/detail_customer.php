<div class="main-content">

    <div class="section">
        <div class="section-header">
            <h2 class="text-center">Detail Customer</h2>
        </div>
    </div>

    <?php foreach ($detail as $dt) : ?>


        <div class="card m-2 p-2">
            <div class="card-body">
                <div class="row m-2">
                    <div class="col-md-5">
                        <img width="220px" height="170px" src="<?= base_url('assets/img/gbr2.png') ?> ">
                    </div>
                    <div class="row"></div>
                    <div class="col-md-7">
                        <table class="table">
                            <tr>
                                <td>Nama </td>
                                <td>:</td>
                                <td> <?= $dt->nama; ?> </td>
                            </tr>
                             <tr>
                                <td>No Telpon</td>
                                <td>:</td>
                                <td> <?= $dt->no_telepon ?> </td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>:</td>
                                <td> <?= $dt->username ?> </td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin </td>
                                <td>:</td>
                                <td> <?= $dt->jenis_kelamin ?> </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td> <?= $dt->alamat ?> </td>
                            </tr>        
                            <tr>
                                <td>No KTP</td>
                                <td>:</td>
                                <td> <?= $dt->no_ktp ?> </td>
                            </tr>
                            <tr>
                                <td>Foto KTP</td>
                                <td>:</td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#previewModal">
                                        <img src="<?= base_url('assets/upload/foto_ktp_customer/' . $dt->foto_ktp) ?>" width="220px" height="170px">
                                    </a>
                                </td>
                            </tr>
                        </table>
                        <a href=" <?= base_url('admin/data_customer/update_customer/' . $dt->id_customer)  ?> " class="btn btn-warning"> Update </a>
                        <a href=" <?= base_url('admin/data_customer') ?> " class="btn btn-primary"> Kembali </a>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach ?>
</div>

<!-- Modal Foto KTP -->
<div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="previewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="previewModalLabel">Preview Foto KTP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="<?= base_url('assets/upload/foto_ktp_customer/' . $dt->foto_ktp) ?>" width="100%" height="auto">
            </div>
        </div>
    </div>
</div>
