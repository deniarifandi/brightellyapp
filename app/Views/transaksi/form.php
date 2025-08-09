<?php echo view('header'); ?>

<div class="card">
    <div class="card-header">
        Record Transaction
        <a class="btn btn-danger btn-sm float-end" href="<?= base_url('transaksi') ?>">Cancel</a>
    </div>
    <div class="card-body">
        <div class="container mt-4">
            <h4 class="mb-4">
                <?= isset($transaksi) ? 'Update Transaction' : 'Record New Transaction' ?>
            </h4>

            <form action="<?= isset($transaksi)
                ? base_url('/transaksi/update/' . $transaksi['transaksi_id'])
                : base_url('/transaksi/store') ?>"
                method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <input type="hidden" name="transaksi_id" value="<?= $transaksi['transaksi_id'] ?? '' ?>">

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Student's Name</label>
                    <div class="col-sm-9">
                        <select name="anak_id" class="form-select select2" data-placeholder="-- Choose Student --" required>
                            <option></option>
                            <?php foreach ($anggota as $a): ?>
                                <option value="<?= esc($a['anak_id']) ?>"
                                    <?= (isset($transaksi['anak_id']) && $transaksi['anak_id'] == $a['anak_id']) ? 'selected' : '' ?>>
                                    <?= esc($a['anak_kelompok']) ?> -- <?= esc($a['anak_nama']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Payment Type</label>
                    <div class="col-sm-9">
                        <select name="payment_type" class="form-select" required>
                            <option value="">-- Choose Payment --</option>
                            <option value="SPP" <?= (isset($transaksi['payment_type']) && $transaksi['payment_type'] == 'SPP') ? 'selected' : '' ?>>SPP</option>
                            <option value="pangkal" <?= (isset($transaksi['payment_type']) && $transaksi['payment_type'] == 'pangkal') ? 'selected' : '' ?>>Uang Pangkal</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Payment Period</label>
                    <div class="col-sm-9 d-flex">
                        <?php
                            $selectedMonth = isset($transaksi['periode']) ? date('m', strtotime($transaksi['periode'])) : date('m');
                            $selectedYear = isset($transaksi['periode']) ? date('Y', strtotime($transaksi['periode'])) : date('Y');
                            $currentYear = date('Y');
                        ?>
                        <select name="month" class="form-select me-2" required>
                            <option value="">-- Choose Month --</option>
                            <?php for ($m = 1; $m <= 12; $m++): ?>
                                <option value="<?= str_pad($m, 2, '0', STR_PAD_LEFT) ?>"
                                    <?= ($selectedMonth == str_pad($m, 2, '0', STR_PAD_LEFT)) ? 'selected' : '' ?>>
                                    <?= date('F', mktime(0, 0, 0, $m, 10)) ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                        <select name="year" class="form-select" required>
                            <option value="">-- Choose Year --</option>
                            <?php for ($year = $currentYear - 5; $year <= $currentYear + 5; $year++): ?>
                                <option value="<?= $year ?>"
                                    <?= ($selectedYear == $year) ? 'selected' : '' ?>>
                                    <?= $year ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Nominal</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="text" id="transaksi_nominal" name="transaksi_nominal" autocomplete="off" class="form-control"
                                placeholder="0" required
                                value="<?= isset($transaksi['transaksi_nominal']) ? esc($transaksi['transaksi_nominal']) : '' ?>">
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Payment Method</label>
                    <div class="col-sm-9">
                        <select name="payment_method" class="form-select" required>
                            <option value="">-- Choose Payment Method --</option>
                            <option value="Tunai" <?= (isset($transaksi['payment_method']) && $transaksi['payment_method'] == 'Tunai') ? 'selected' : '' ?>>Tunai</option>
                            <option value="Transfer" <?= (isset($transaksi['payment_method']) && $transaksi['payment_method'] == 'Transfer') ? 'selected' : '' ?>>Transfer</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Date</label>
                    <div class="col-sm-9">
                        <input type="date" id="transaksi_tanggal" name="transaksi_tanggal" class="form-control" required
                            value="<?= isset($transaksi['transaksi_tanggal']) && $transaksi['transaksi_tanggal'] != '' ? esc($transaksi['transaksi_tanggal']) : date('Y-m-d') ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Proof of Payment</label>
                    <div class="col-sm-9">
                        <?php if (!empty($transaksi['bukti'])): ?>
                            <img src="<?= base_url('uploads/bukti/' . $transaksi['bukti']) ?>"
                                width="100" style="cursor:pointer"
                                onclick="showImageModal('<?= base_url('uploads/bukti/' . $transaksi['bukti']) ?>')">
                            <br><br>
                        <?php endif; ?>
                        <input type="file" class="form-control" name="bukti" accept="image/*">
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary"><?= isset($transaksi) ? 'Update' : 'Submit' ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body text-center">
                <img id="modalImage" src="" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        // Initialize select2 for the Student's Name dropdown only
        $('select[name="anak_id"]').select2({
            theme: 'bootstrap4',
            width: '100%',
            allowClear: true
        });

        // Initialize AutoNumeric for the nominal input
        new AutoNumeric('#transaksi_nominal', {
            digitGroupSeparator: '.',
            decimalCharacter: ',',
            decimalPlaces: 0,
            unformatOnSubmit: true
        });
    });

    function showImageModal(src) {
        document.getElementById('modalImage').src = src;
        var myModal = new bootstrap.Modal(document.getElementById('imageModal'));
        myModal.show();
    }
</script>

<?php echo view('footer'); ?>