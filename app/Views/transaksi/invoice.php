<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice #<?= esc($transaksi['transaksi_id']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9I2PkPKZ5UEV2o5l3xM7hXyE3d45Lh5i5c0eFmE4yP7N0X+cQ00l8H5r" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* This is for the print version */
        @media print {
    /* Hide non-essential elements */
    .d-print-none, .print-button, .sidebar, .footer {
        display: none !important;
    }

    /* Adjust margins and padding */
    body {
        margin: 0.5cm !important;
        padding: 0 !important;
    }

    /* Prevent large gaps */
    .large-section {
        margin: 0 !important;
        padding: 0 !important;
    }
}
    </style>
</head>
<body>

<div class="container my-5">
    <div class="row mb-5">
        <div class="col-6">
            <h1 class="display-4">INVOICE</h1>
            <p class="lead">#<?= esc($transaksi['transaksi_id']) ?></p>
        </div>
        <div class="col-6 text-end">
            <h5>Bright Elly School</h5>
            <address>
                Jl. Danau Toba No.140 Blok.E4A<br> 
                Madyopuro, Kec. Kedungkandang, Kota Malang, <br>
                Jawa Timur <br>
                Email:  brightellyschool@gmail.com
            </address>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-6">
            <h6>Student Details</h6>
            <ul class="list-unstyled">
                <li><strong>Name:</strong> <?= esc($transaksi['anak_nama']) ?></li>
                <li><strong>Class:</strong> <?= esc($transaksi['anak_kelompok']) ?></li>
            </ul>
        </div>
        <div class="col-6 text-end">
            <h6>Invoice Details</h6>
            <ul class="list-unstyled">
                <li><strong>Date:</strong>
                    <?php
                    $date = new DateTime($transaksi['transaksi_tanggal']);
                    echo $date->format('d F Y');
                    ?>
                </li>
                <li><strong>Status:</strong>
                    <?php if ($transaksi['verifikasi'] == 1): ?>
                        <span class="badge bg-success">Verified</span>
                    <?php else: ?>
                        <span class="badge bg-danger">Not Verified</span>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th class="text-center">#</th>
                        <th>Description</th>
                        <th class="text-end">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1</td>
                        <td>
                            Payment for **<?= esc($transaksi['payment_type']) ?>**
                            for the period of
                            <?php
                            $date = new DateTime($transaksi['periode']);
                            echo $date->format('F Y');
                            ?>
                        </td>
                        <td class="text-end">Rp <?= number_format($transaksi['transaksi_nominal'], 0, ',', '.') ?></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="2" class="text-end">Total Amount</th>
                        <th class="text-end">Rp <?= number_format($transaksi['transaksi_nominal'], 0, ',', '.') ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-6">
            <h6>Payment Method:</h6>
            <p><?= esc($transaksi['payment_method']) ?></p>
        </div>
        <div class="col-6 text-end">
            <p class="mb-5">Best regards,</p>
            <p>_______________________</p>
            <p>Admin</p>
        </div>
    </div>

    <hr class="my-4 d-print-none">

    <div class="row d-print-none">
        <div class="col-12 text-center">
            <button class="btn btn-primary" onclick="window.print()">
                <i class="fas fa-print"></i> Print Invoice
            </button>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>