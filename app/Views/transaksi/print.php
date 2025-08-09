

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
            <th>Verifikasi Pada</th>
            <th>Verifikasi Oleh</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($transactions as $t): ?>
        <tr>
            <td><?= esc($t->transaksi_id) ?></td>
            <td><?= esc($t->anak_nama) ?></td>
            <td><?= esc($t->transaksi_nominal) ?></td>
            <td><?= esc($t->payment_type) ?></td>
            <td><?= esc($t->periode) ?></td>
            <td><?= esc($t->payment_method) ?></td>
            <td><?= esc($t->transaksi_tanggal) ?></td>
            <td><?= $t->verifikasi == 1 ? 'Verified' : 'Not Verified' ?></td>
            <td><?= esc($t->verifikasipada) ?></td>
            <td><?= esc($t->verifikasioleh) ?></td>
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
