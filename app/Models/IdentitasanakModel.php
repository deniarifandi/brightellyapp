<?php

namespace App\Models;

use CodeIgniter\Model;

class IdentitasanakModel extends Model
{
    protected $table = 'identitasanak';
    protected $primaryKey = 'anak_id';
    protected $allowedFields = [
        'murid_id',
        'anak_nis',
        'anak_nama',
        'anak_panggilan',
        'anak_jk',
        'anak_tempat',
        'anak_ttl',
        'anak_agama',
        'anak_kewarganegaraan',
        'anak_ke',
        'anak_status',
        'anak_bahasa',
        'anak_alamat',
        'anak_ayahnama',
        'anak_ayahsekolah',
        'anak_ayahkerja',
        'anak_ibunama',
        'anak_ibusekolah',
        'anak_ibukerja',
        'anak_wali',
        'anak_hubungan',
        'anak_alamatortu',
        'anak_hportu',
        'anak_darah',
        'anak_berat',
        'anak_tinggi',
        'anak_rawayat',
        'anak_imunisasi',
        'anak_bicara',
        'anak_kondisi',
        'anak_tanggalmasuk',
        'anak_usiamasuk',
        'anak_kelompok',
        'anak_tanggalkeluar',
        'anak_alasan',
        'anak_melanjutkan',
        'anak_prestasi',
        'anak_perkembangan',
        'anak_catatan',
        'anak_foto'
    ];

    protected $useAutoIncrement = true;
    protected $useTimestamps = true; 
    protected $useSoftDeletes   = true;
}
