
<?php echo view('header'); ?>


  <div class="row mb-4">
    <!-- Menu 1 -->

    <!-- Menu 2 -->
    <div class="col-md-4">
      <div class="card shadow-sm text-center border-primary">
        <div class="card-body">
          <h5 class="card-title mb-3">👥 Student Data</h5>
          <h1 class="display-5 text-primary"><?= $anak; ?></h1>
          <p class="text-muted">Total Students</p>
          <p class="card-text">Manage student records efficiently.</p>
          <a href="identitasanak" class="btn btn-primary mt-2">Open</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card shadow-sm text-center border-primary">
        <div class="card-body">
          <h5 class="card-title mb-3">💳 Transaksi</h5>
          <h1 class="display-5 text-primary"><?= $transaksi; ?></h1>
          <p class="text-muted">Total Transaction</p>
          <p class="card-text">Manage Transaction efficiently.</p>
          <a href="transaksi" class="btn btn-primary mt-2">Open</a>
          <a href="transaksi/front" class="btn btn-warning mt-2">Report</a>
        </div>
      </div>
    </div>

  </div>


<?php echo view('footer'); ?>