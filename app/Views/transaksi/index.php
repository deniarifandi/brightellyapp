<?php echo view('header'); ?>

<?php if (session()->getFlashdata('message')): ?>
    <div class="alert alert-info">
        <?= session()->getFlashdata('message'); ?>
    </div>
<?php endif; ?>

<div class="card">
    <div class="card-header">
        Daftar Transaksi <a class="btn btn-primary btn-sm float-end" href="<?= base_url('transaksi/create') ?>">Add New</a>
    </div>
    <div class="card-body">
        <table id="usersTable" class="display" style="font-size: 12px; width: 100%;">
          <thead>
            <tr>
              <th>ID</th>
              <th>Murid</th>
              <th>Nominal</th>
              <th>Periode Pembayaran</th>
              <th>Tanggal Transaksi</th>
              <th>Status</th>
              <th>Verification</th>
              <th>Action</th>
            </tr>
          </thead>
        </table>
    </div>
</div>

<script>
    const userRole = <?= session()->get('role') ?? 3; ?>; // Default to 3 if not logged in
</script>

 <script>
  $(document).ready(function() {
    $('#usersTable').DataTable({
       
      processing: true,
      serverSide: false,
      order: [[0, 'asc']],
      ajax: {
        url: "<?= site_url('transaksi/data') ?>",
        type: "POST"
      },
      columns: [
        { data: 'transaksi_id' },
        { data: 'anak_nama' },
        { data: 'transaksi_nominal',
          render: $.fn.dataTable.render.number(',', '.', 0, 'Rp ') 
        },
         {
          data: 'periode',
          render: function (data, type, row) {
            if (!data) return '';
            const parts = data.split('-');
            const year = parts[0];
            const month = parts[1];
            const monthNames = [
              '', 'January', 'February', 'March', 'April', 'May', 'June',
              'July', 'August', 'September', 'October', 'November', 'December'
            ];
            return `${year} ${monthNames[parseInt(month, 10)]}`;
          }
        },
        {
        data: 'transaksi_tanggal',
        render: function (data, type, row) {
          if (type === 'display' || type === 'filter') {
            const date = new Date(data);
            return date.toLocaleDateString('en-GB', {
              day: '2-digit',
              month: 'short',
              year: 'numeric'
            }); // e.g., "08 Sep 2024"
          }
          return data; // raw date for sorting
        }},
        {
             orderable: false,
    data: 'verifikasi', // DataTables will sort based on the value of this key (1 or 0)
    render: function(data, type, row) {
        // 'data' here will be 1 or 0
        if (data == 1) {
            return '<span class="badge bg-success">Verified</span>';
        } else {
            return '<span class="badge bg-danger">Waiting Verification</span>';
        }
    },
    // This makes sure DataTables knows what type of data it's sorting.
    // In this case, it's a number.
    type: 'num',
},
       {
    data: null,
    orderable: false,
    render: function(data, type, row) {
        // Check the 'verifikasi' status for the invoice button
        const invoiceButton = row.verifikasi == 1 ?
            `<a class="btn btn-success btn-sm" href="<?= base_url('transaksi/invoice/') ?>${row.transaksi_id}">Invoice</a>` :
            `<a class="btn btn-secondary btn-sm disabled" href="#" aria-disabled="true">Invoice</a>`;

        // Conditionally show the verification button based on the user's role
        let verificationButton = '';
        if (userRole < 3) {
            verificationButton = `<a class="btn btn-primary btn-sm" href="<?= base_url('transaksi/detail/') ?>${row.transaksi_id}">Verification</a>`;
        }

        return `
            ${invoiceButton}
            ${verificationButton}
        `;
    }
},
        {
          data: null,
          orderable: false,
          render: function(data, type, row) {
           // If the transaction is verified (verifikasi == 1)
        if (row.verifikasi == 1) {
            return `
                <a class="btn btn-secondary btn-sm disabled" href="#" aria-disabled="true">Edit</a>
                <a class="btn btn-secondary btn-sm disabled ml-5" href="#" aria-disabled="true">Delete</a>
            `;
        }

        // If the transaction is NOT verified (verifikasi == 0)
        return `
            <a class="btn btn-warning btn-sm" href="<?= base_url('transaksi/edit/') ?>${row.transaksi_id}">Edit</a>
            <a class="btn btn-danger btn-sm ml-5" href="<?= base_url('transaksi/delete/') ?>${row.transaksi_id}" onclick="return confirm('Delete?')">Delete</a>
        `;
          }
        }

      ]
    });
  });
</script>



<?php echo view('footer'); ?>