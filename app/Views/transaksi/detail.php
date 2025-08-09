<?php echo view('header'); ?>

<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Detail Transaksi</h5>
        <a class="btn btn-light btn-sm" href="<?= base_url('transaksi') ?>">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-7">
                <h6 class="mb-3">Informasi Umum</h6>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Student's Name:</strong>
                        <span><?= esc($transaksi['anak_kelompok']) ?> -- <?= esc($transaksi['anak_nama']) ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Payment Type:</strong>
                        <span><?= esc($transaksi['payment_type']) ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Payment Period:</strong>
                        <span>
                            <?php
                            $date_format = 'F Y';
                            $date = new DateTime($transaksi['periode']);
                            echo $date->format($date_format);
                            ?>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Nominal:</strong>
                        <span>Rp <?= number_format($transaksi['transaksi_nominal'], 0, ',', '.') ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Payment Method:</strong>
                        <span><?= esc($transaksi['payment_method']) ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Tanggal:</strong>
                        <span>
                            <?php
                            $date_format = 'd F Y';
                            $date = new DateTime($transaksi['transaksi_tanggal']);
                            echo $date->format($date_format);
                            ?>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Status:</strong>
                        <span>
                            <?php if ($transaksi['verifikasi'] == 1): ?>
                                <span class="badge bg-success">Verified</span>
                            <?php else: ?>
                                <span class="badge bg-danger">Not Verified</span>
                            <?php endif; ?>
                        </span>
                    </li>
                </ul>
            </div>
            <div class="col-md-5 d-flex flex-column align-items-center">
                <h6 class="mb-3">Bukti Transaksi</h6>
                <?php if (!empty($transaksi['bukti'])): ?>
                    <div class="card shadow-sm p-2 text-center">
                        <img src="<?= base_url('uploads/bukti/' . $transaksi['bukti']) ?>"
                             class="img-fluid rounded"
                             style="max-height: 300px; cursor:pointer;"
                             onclick="showImageModal('<?= base_url('uploads/bukti/' . $transaksi['bukti']) ?>')">
                        <small class="mt-2 text-muted">Click to enlarge</small>
                    </div>
                <?php else: ?>
                    <p class="text-muted">No proof of payment available.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="card-footer d-flex justify-content-end">
        <?php if ($transaksi['verifikasi'] == 0): ?>
            <a href="<?= base_url() ?>transaksi/mark/<?= $transaksi['transaksi_id'] ?>" class="btn btn-success me-2">
                <i class="fas fa-check-circle"></i> Mark Verified
            </a>
        <?php else: ?>
            <a href="<?= base_url() ?>transaksi/unmark/<?= $transaksi['transaksi_id'] ?>" class="btn btn-warning me-2">
                <i class="fas fa-times-circle"></i> Unmark
            </a>
        <?php endif; ?>
    </div>
</div>

<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body p-0 text-center">
                <img id="modalImage" src="" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</div>

<script>
    function showImageModal(src) {
        document.getElementById('modalImage').src = src;
        var myModal = new bootstrap.Modal(document.getElementById('imageModal'));
        myModal.show();
    }
</script>

<?php echo view('footer'); ?>