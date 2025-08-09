<?php
// app/Models/TransaksiModel.php
namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table      = 'transaksi';
    protected $primaryKey = 'transaksi_id';
   protected $allowedFields = [
    'anak_id',
    'payment_type',
    'payment_method',
    'periode',
    'wa_konfirmasi',
    'bukti',
    'verifikasi',
    'verifikasipada',
    'verifikasioleh',
    'transaksi_nominal',
    'transaksi_tanggal',
    'transaksi_jenis' // if you have it
    ];
    protected $useAutoIncrement = true;
    protected $useTimestamps = true; 
    protected $useSoftDeletes   = true;
}
