<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Formulir Data Anak</title>
    <style>
        /* Base styles for screen view */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 40px;
            background-color: #f4f7f6;
            color: #333;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 15px;
        }
        .header h2 {
            margin: 0;
            color: #0056b3;
            font-size: 28px;
        }
        .section {
            margin-bottom: 25px;
        }
        .section-title {
            font-size: 18px;
            font-weight: bold;
            color: #555;
            padding-bottom: 5px;
            border-bottom: 1px solid #e0e0e0;
            margin-bottom: 15px;
        }
        .data-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 10px;
            margin-bottom: 10px;
        }
        .label {
            font-weight: 600;
            color: #666;
        }
        .value {
            color: #333;
        }
        .photo-container {
            text-align: center;
            margin-top: 20px;
            border-top: 1px solid #e0e0e0;
            padding-top: 20px;
        }
        .photo {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border: 3px solid #ddd;
            border-radius: 50%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        hr {
            border: 0;
            border-top: 1px solid #eee;
            margin: 30px 0;
        }
        .print-button-container {
            text-align: center;
            margin-top: 40px;
        }
        .print-button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
        }

        /* --- Print-specific styles --- */
        @media print {
            body {
                background-color: #ffffff;
                padding: 0;
                margin: 0;
            }
            .container {
                box-shadow: none;
                padding: 0;
            }
            /* Hide the print button when printing */
            .print-button-container {
                display: none;
            }
            .photo {
                border-radius: 0;
            }
            .header, hr {
                border-color: #000;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h2>Student Data Form</h2>
    </div>

    <div class="section">
        <h3 class="section-title">A. Child's Identity</h3>
        <div class="data-grid">
            <div class="label">1. Student Number / NIS:</div><div class="value"><?= $anak->anak_nis ?></div>
            <div class="label">2. Full Name:</div><div class="value"><?= $anak->anak_nama ?></div>
            <div class="label">3. Nickname:</div><div class="value"><?= $anak->anak_panggilan ?></div>
            <div class="label">4. Gender:</div><div class="value"><?= $anak->anak_jk ?></div>
            <div class="label">5. Place/Date of Birth:</div><div class="value"><?= $anak->anak_tempat ?>, <?= $anak->anak_ttl ?></div>
            <div class="label">6. Religion:</div><div class="value"><?= $anak->anak_agama ?></div>
            <div class="label">7. Nationality:</div><div class="value"><?= $anak->anak_kewarganegaraan ?></div>
            <div class="label">8. Child number:</div><div class="value"><?= $anak->anak_ke ?></div>
            <div class="label">9. Family status:</div><div class="value"><?= $anak->anak_status ?></div>
            <div class="label">10. Daily language:</div><div class="value"><?= $anak->anak_bahasa ?></div>
            <div class="label">11. Full Address:</div><div class="value"><?= $anak->anak_alamat ?></div>
        </div>
    </div>
    <hr>

    <div class="section">
        <h3 class="section-title">B. Parent/Guardian Information</h3>
        <div class="data-grid">
            <div class="label">1. Father's Name:</div><div class="value"><?= $anak->anak_ayahnama ?></div>
            <div class="label">2. Father's Education:</div><div class="value"><?= $anak->anak_ayahsekolah ?></div>
            <div class="label">3. Father's Occupation:</div><div class="value"><?= $anak->anak_ayahkerja ?></div>
            <div class="label">4. Mother's Name:</div><div class="value"><?= $anak->anak_ibunama ?></div>
            <div class="label">5. Mother's Education:</div><div class="value"><?= $anak->anak_ibusekolah ?></div>
            <div class="label">6. Mother's Occupation:</div><div class="value"><?= $anak->anak_ibukerja ?></div>
            <div class="label">7. Guardian's Name (if any):</div><div class="value"><?= $anak->anak_wali ?></div>
            <div class="label">8. Relationship with the child:</div><div class="value"><?= $anak->anak_hubungan ?></div>
            <div class="label">9. Parent/Guardian Address:</div><div class="value"><?= $anak->anak_alamatortu ?></div>
            <div class="label">10. Parent/Guardian Phone Number:</div><div class="value"><?= $anak->anak_hportu ?></div>
        </div>
    </div>
    <hr>

    <div class="section">
        <h3 class="section-title">C. Health and Development</h3>
        <div class="data-grid">
            <div class="label">1. Blood Type:</div><div class="value"><?= $anak->anak_darah ?></div>
            <div class="label">2. Weight upon enrollment in School:</div><div class="value"><?= $anak->anak_berat ?></div>
            <div class="label">3. Height upon enrollment in School:</div><div class="value"><?= $anak->anak_tinggi ?></div>
            <div class="label">4. Health History:</div><div class="value"><?= $anak->anak_rawayat ?></div>
            <div class="label">5. Immunization Status:</div><div class="value"><?= $anak->anak_imunisasi ?></div>
            <div class="label">6. Speech and motor development:</div><div class="value"><?= $anak->anak_bicara ?></div>
            <div class="label">7. Special Conditions:</div><div class="value"><?= $anak->anak_kondisi ?></div>
        </div>
    </div>
    <hr>

    <div class="section">
        <h3 class="section-title">D. Admission & Exit Information</h3>
        <div class="data-grid">
            <div class="label">1. Date of Admission to School:</div><div class="value"><?= $anak->anak_tanggalmasuk ?></div>
            <div class="label">2. Age at Admission:</div><div class="value"><?= $anak->anak_usiamasuk ?></div>
            <div class="label">3. Previous Playgroup:</div><div class="value"><?= $anak->anak_kelompok ?></div>
            <div class="label">4. Date of Leaving:</div><div class="value"><?= $anak->anak_tanggalkeluar ?></div>
            <div class="label">5. Reason for Leaving:</div><div class="value"><?= $anak->anak_alasan ?></div>
            <div class="label">6. Continued to:</div><div class="value"><?= $anak->anak_melanjutkan ?></div>
        </div>
    </div>
    <hr>

    <div class="section">
        <h3 class="section-title">E. Special Notes</h3>
        <div class="data-grid">
            <div class="label">1. Achievements / Awards:</div><div class="value"><?= $anak->anak_prestasi ?></div>
            <div class="label">2. Development during School:</div><div class="value"><?= $anak->anak_perkembangan ?></div>
            <div class="label">3. Teacher's Notes:</div><div class="value"><?= $anak->anak_catatan ?></div>
        </div>
    </div>

    <div class="photo-container">
        <h3 class="section-title">Child's Photo</h3>
        <?php if (!empty($anak->anak_foto)): ?>
            <img src="<?= base_url('uploads/foto/' . $anak->anak_foto) ?>" alt="Child Photo" class="photo">
        <?php else: ?>
            <p>(No photo available)</p>
        <?php endif; ?>
    </div>
</div>

<div class="print-button-container">
    <button class="print-button" onclick="window.print()">Print This Form</button>
</div>

</body>
</html>