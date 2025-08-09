<?php echo view('header'); ?>

<?php if (session()->getFlashdata('message')): ?>
    <div class="alert alert-info">
        <?= session()->getFlashdata('message'); ?>
    </div>
<?php endif; ?>

<?php
// First day of this month
$date_begin = date('Y-m-01');
// Last day of this month
$date_end = date('Y-m-t');
?>


<div class="card">
    <div class="card-header">
        Export Transaksi
    </div>
    <div class="card-body">
        <div class="row">
          <div class="col-sm-12"> 
            <form method="GET" action="<?= base_url(); ?>transaksi/print">
              <label for="date_begin">Date Begin:</label>
              <input class="form-control" type="date" id="begin" name="begin" value="<?= $date_begin ?>">
              <br>
              <label for="date_end">Date End:</label>
              <input class="form-control" type="date" id="end" name="end" value="<?= $date_end ?>">
              <br>

              <button type="submit" class="btn btn-primary float-end">Submit</button>
          </form>
          </div>
        </div>
    </div>
</div>

<?php echo view('footer'); ?>