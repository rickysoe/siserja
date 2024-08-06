<div class="main-content">
    <div class="section">
        <div class="section-header">
            <div class="card m-3">
                <div class="card-header">
                    <h4 class="text text-center text-primary">Konfirmasi Pembayaran</h4>
                </div>

                <div class="card-body my-3">

                    <form action="<?= base_url('admin/transaksi/dl_pembayaran') ?>" method="POST">

                    <?php foreach ($pembayaran as $pmb) : ?>
                        <a href="<?= base_url('admin/transaksi/download_pembayaran/' . $pmb->id_booking); ?>" class="btn btn-primary" id="downloadBtn<?= $pmb->id_booking ?>">
                            <i class="fas fa-download"> Download bukti pembayaran</i>
                        </a>

                        <div class="custom-control custom-switch m-2">
                            <input type="hidden" name="id_booking" value="<?= $pmb->id_booking ?>">
                            <input type="checkbox" value="1" name="status_pembayaran" class="custom-control-input" id="customSwitch<?= $pmb->id_booking ?>" disabled <?= ($pmb->status_pembayaran == 1) ? 'checked' : '' ?>>
                            <label for="customSwitch<?= $pmb->id_booking ?>" class="custom-control-label">Konfirmasi</label>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submitBtn<?= $pmb->id_booking ?>" disabled <?= ($pmb->status_pembayaran == 1) ? 'disabled' : '' ?>>
                            <?= ($pmb->status_pembayaran == 1) ? 'Pembayaran sudah dikonfirmasi' : 'Konfirmasi' ?>
                        </button>

                        <script>
                            var downloadBtn<?= $pmb->id_booking ?> = document.getElementById('downloadBtn<?= $pmb->id_booking ?>');
                            var customSwitch<?= $pmb->id_booking ?> = document.getElementById('customSwitch<?= $pmb->id_booking ?>');
                            var submitBtn<?= $pmb->id_booking ?> = document.getElementById('submitBtn<?= $pmb->id_booking ?>');
                            var isSubmitted<?= $pmb->id_booking ?> = <?= ($pmb->status_pembayaran == 1) ? 'true' : 'false' ?>;

                            downloadBtn<?= $pmb->id_booking ?>.addEventListener('click', function() {
                                customSwitch<?= $pmb->id_booking ?>.disabled = false;
                            });

                            customSwitch<?= $pmb->id_booking ?>.addEventListener('change', function() {
                                submitBtn<?= $pmb->id_booking ?>.disabled = !this.checked;
                                if (isSubmitted<?= $pmb->id_booking ?>) {
                                    submitBtn<?= $pmb->id_booking ?>.innerText = 'Pembayaran sudah dikonfirmasi';
                                }
                            });
                        </script>
                    <?php endforeach ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>