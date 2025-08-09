<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Formulir Data Anak</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 14px;
      margin: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }
    td {
      vertical-align: top;
      padding: 6px;
      border: 1px solid #000;
    }
    .section-title {
      font-weight: bold;
      background-color: #f0f0f0;
      border: none;
    }
    .label {
      width: 40%;
      font-weight: bold;
    }
    .photo {
      max-width: 150px;
      max-height: 150px;
    }
  </style>
</head>
<body>

    <!-- <img src="<?php echo base_url() ?>/assets/img/kop.jpg" style="max-width: 100%;"> -->

  <h2 style="text-align:center;">Student Data</h2>

 <table>
  <tr><td colspan="2" class="section-title">A. Child's Identity</td></tr>
  <tr><td class="label">1. Student Number / NIS:</td><td><?= $anak->anak_nis ?></td></tr>
  <tr><td class="label">2. Full Name:</td><td><?= $anak->anak_nama ?></td></tr>
  <tr><td class="label">3. Nickname:</td><td><?= $anak->anak_panggilan ?></td></tr>
  <tr><td class="label">4. Gender:</td><td><?= $anak->anak_jk ?></td></tr>
  <tr><td class="label">5a. Place of Birth:</td><td><?= $anak->anak_tempat ?></td></tr>
  <tr><td class="label">5b. Date of Birth:</td><td><?= $anak->anak_ttl ?></td></tr>
  <tr><td class="label">6. Religion:</td><td><?= $anak->anak_agama ?></td></tr>
  <tr><td class="label">7. Nationality:</td><td><?= $anak->anak_kewarganegaraan ?></td></tr>
  <tr><td class="label">8. Child number (among siblings):</td><td><?= $anak->anak_ke ?></td></tr>
  <tr><td class="label">9. Family status:</td><td><?= $anak->anak_status ?></td></tr>
  <tr><td class="label">10. Daily language:</td><td><?= $anak->anak_bahasa ?></td></tr>
  <tr><td class="label">11. Full Address:</td><td><?= $anak->anak_alamat ?></td></tr>

  <tr><td colspan="2" class="section-title">B. Parent/Guardian Information</td></tr>
  <tr><td class="label">1. Father's Name:</td><td><?= $anak->anak_ayahnama ?></td></tr>
  <tr><td class="label">2. Father's Education:</td><td><?= $anak->anak_ayahsekolah ?></td></tr>
  <tr><td class="label">3. Father's Occupation:</td><td><?= $anak->anak_ayahkerja ?></td></tr>
  <tr><td class="label">4. Mother's Name:</td><td><?= $anak->anak_ibunama ?></td></tr>
  <tr><td class="label">5. Mother's Education:</td><td><?= $anak->anak_ibusekolah ?></td></tr>
  <tr><td class="label">6. Mother's Occupation:</td><td><?= $anak->anak_ibukerja ?></td></tr>
  <tr><td class="label">7. Guardian's Name (if any):</td><td><?= $anak->anak_wali ?></td></tr>
  <tr><td class="label">8. Relationship with the child:</td><td><?= $anak->anak_hubungan ?></td></tr>
  <tr><td class="label">9. Parent/Guardian Address:</td><td><?= $anak->anak_alamatortu ?></td></tr>
  <tr><td class="label">10. Parent/Guardian Phone Number:</td><td><?= $anak->anak_hportu ?></td></tr>

  <tr><td colspan="2" class="section-title">C. Health and Development</td></tr>
  <tr><td class="label">1. Blood Type:</td><td><?= $anak->anak_darah ?></td></tr>
  <tr><td class="label">2. Weight upon enrollment in PAUD:</td><td><?= $anak->anak_berat ?></td></tr>
  <tr><td class="label">2. Height upon enrollment in PAUD:</td><td><?= $anak->anak_tinggi ?></td></tr>
  <tr><td class="label">3. Health History:</td><td><?= $anak->anak_rawayat ?></td></tr>
  <tr><td class="label">4. Immunization Status:</td><td><?= $anak->anak_imunisasi ?></td></tr>
  <tr><td class="label">5. Speech and motor development:</td><td><?= $anak->anak_bicara ?></td></tr>
  <tr><td class="label">6. Special Conditions:</td><td><?= $anak->anak_kondisi ?></td></tr>

  <tr><td colspan="2" class="section-title">D. Admission & Exit Information</td></tr>
  <tr><td class="label">1. Date of Admission to PAUD:</td><td><?= $anak->anak_tanggalmasuk ?></td></tr>
  <tr><td class="label">2. Age at Admission:</td><td><?= $anak->anak_usiamasuk ?></td></tr>
  <tr><td class="label">3. Previous Playgroup:</td><td><?= $anak->anak_kelompok ?></td></tr>
  <tr><td class="label">4. Date of Leaving:</td><td><?= $anak->anak_tanggalkeluar ?></td></tr>
  <tr><td class="label">5. Reason for Leaving:</td><td><?= $anak->anak_alasan ?></td></tr>
  <tr><td class="label">6. Continued to:</td><td><?= $anak->anak_melanjutkan ?></td></tr>

  <tr><td colspan="2" class="section-title">E. Special Notes</td></tr>
  <tr><td class="label">1. Achievements / Awards:</td><td><?= $anak->anak_prestasi ?></td></tr>
  <tr><td class="label">2. Development during PAUD:</td><td><?= $anak->anak_perkembangan ?></td></tr>
  <tr><td class="label">3. Teacher's Notes:</td><td><?= $anak->anak_catatan ?></td></tr>
  <tr><td class="label">4. Child's Photo:</td><td>
    <?php if (!empty($anak->anak_foto)): ?>
      <img src="<?= base_url('uploads/foto/' . $anak->anak_foto) ?>" alt="Child Photo" class="photo">
    <?php else: ?>
      (No photo available)
    <?php endif; ?>
  </td></tr>
</table>


</body>
</html>
