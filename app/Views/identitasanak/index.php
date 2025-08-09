<?php echo view('header'); ?>


<div class="card">
    <div class="card-header">
        Student List <a class="btn btn-primary btn-sm float-end" href="<?= base_url('identitasanak/create') ?>">Add New</a>
    </div>

        <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('success') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

    <div class="card-body">
        <table id="usersTable" class="display" style="font-size: 12px; width: 100%;">
          <thead>
            <tr>
              <!-- <th>ID</th> -->
              <th>Student ID</th>
              <th>Name</th>
              <th>Action</th>
            </tr>
          </thead>
        </table>
    </div>
</div>

 <script>
  $(document).ready(function() {
    $('#usersTable').DataTable({
     
      processing: true,
      serverSide: true,

      ajax: {
        url: "<?= site_url('identitasanak/data') ?>",
        type: "POST"
      },
      columns: [
        { data: 'anak_nis' },
        { data: 'anak_nama' },
        {
          data: null,
          orderable: false,
          render: function(data, type, row) {
            return `
              
                 <a class="btn btn-warning btn-sm" href="<?= base_url('identitasanak/edit/') ?>${row.anak_id}">Edit</a> |
               <a class="btn btn-primary btn-sm" href="<?= base_url('identitasanak/print/') ?>${row.anak_id}">Print</a> |
                <a class="btn btn-danger btn-sm ml-5" href="<?= base_url('identitasanak/delete/') ?>${row.anak_id}" onclick="return confirm('Delete?')">Delete</a>
      
            `;
          }
        }
      ]
    });
  });
</script>

<?php echo view('footer'); ?>