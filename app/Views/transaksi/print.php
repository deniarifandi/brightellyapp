

<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    table, th, td {
        border: 1px solid black;
    }
    th, td {
        padding: 5px;
        text-align: left;
    }
</style>

<h2 style="text-align: center;">Transaction Report</h2>
<?php 
$beginString = $_GET['begin'];
$endString = $_GET['end'];
$beginDate = strtotime($beginString);
$endDate = strtotime($endString);
?>

<h3 style="text-align: center;"><?= date('d F Y', $beginDate) ?> - <?= date('d F Y', $endDate) ?></h3>
<br>

<button onclick="exportToExcel('tableRekap', 'Transaction Report')">Export to Excel</button>
<br>
<br>
<table id="tableRekap" border="1" cellpadding="5" style="font-size:12px">
    <thead>
        <tr>
            <th>ID</th>
            <th>Anak ID</th>
            <th>Nominal</th>
            <th>Payment Type</th>
            <th>Periode</th>
            <th>Payment Method</th>
            <th>Tanggal Transaksi</th>
            <th>Verifikasi</th>
            <!-- <th>Verifikasi Pada</th>
            <th>Verifikasi Oleh</th> -->
        </tr>
    </thead>
    <tbody>
        <?php foreach ($transactions as $t): ?>
        <tr>
            <td><?= esc($t->transaksi_id) ?></td>
            <td><?= esc($t->anak_nama) ?></td>
            <td>Rp <?= number_format($t->transaksi_nominal, 0, ',', '.') ?></td>
            <td><?= esc($t->payment_type) ?></td>
            <td>
                <?php
                // Create a DateTime object from the YYYY-MM string
                $date = new DateTime($t->periode);

                // Format the date to show the full month name and year
                echo $date->format('F Y');
                ?>
            </td>
            <td><?= esc($t->payment_method) ?></td>
           <td>
                <?php
                // Create a DateTime object from the database string
                $date = new DateTime($t->transaksi_tanggal);

                // Format the date to "Day Month Year"
                echo $date->format('d F Y');
                ?>
            </td>
            <td><?= $t->verifikasi == 1 ? 'Verified' : 'Waiting Verification' ?></td>
          
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script>
function exportToExcel(tableID, filename = '') {
    const table = document.getElementById(tableID);
    const workbook = XLSX.utils.table_to_book(table, {sheet: "Sheet1"});
    XLSX.writeFile(workbook, filename ? filename + ".xlsx" : "export.xlsx");
}
</script>
