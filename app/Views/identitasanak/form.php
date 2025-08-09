<?php echo view('header'); ?>

<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Identitas Anak</h5>
        <a class="btn btn-danger btn-sm" href="<?= base_url('identitasanak') ?>">
            <i class="fas fa-times-circle"></i> Cancel
        </a>
    </div>
    <div class="card-body">
        <form action="<?= base_url('identitasanak/store') ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="anak_id" value="<?= $exist['anak_id'] ?? '' ?>">

            <div class="row">
                <div class="col-md-6">

                    <h5 class="mb-3 mt-4"><b>A. Child Identity</b></h5>
                    <hr>
                    <div class="mb-3">
                        <label class="form-label">Student ID (NIS)</label>
                        <input type="text" class="form-control" name="anak_nis" required value="<?= $exist['anak_nis'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="anak_nama" required value="<?= $exist['anak_nama'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nickname</label>
                        <input type="text" class="form-control" name="anak_panggilan" value="<?= $exist['anak_panggilan'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gender</label>
                        <select class="form-control" name="anak_jk">
                            <option value="">-- Select --</option>
                            <option value="Laki-laki" <?= ($exist['anak_jk'] ?? '') == 'Laki-laki' ? 'selected' : '' ?>>Male</option>
                            <option value="Perempuan" <?= ($exist['anak_jk'] ?? '') == 'Perempuan' ? 'selected' : '' ?>>Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Place of Birth</label>
                        <input type="text" class="form-control" name="anak_tempat" value="<?= $exist['anak_tempat'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" name="anak_ttl" value="<?= $exist['anak_ttl'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Religion</label>
                        <select class="form-control" name="anak_agama">
                            <option value="">-- Select --</option>
                            <option value="Islam" <?= ($exist['anak_agama'] ?? '') == 'Islam' ? 'selected' : '' ?>>Islam</option>
                            <option value="Kristen" <?= ($exist['anak_agama'] ?? '') == 'Kristen' ? 'selected' : '' ?>>Christian</option>
                            <option value="Katolik" <?= ($exist['anak_agama'] ?? '') == 'Katolik' ? 'selected' : '' ?>>Catholic</option>
                            <option value="Budha" <?= ($exist['anak_agama'] ?? '') == 'Budha' ? 'selected' : '' ?>>Buddhist</option>
                            <option value="Hindu" <?= ($exist['anak_agama'] ?? '') == 'Hindu' ? 'selected' : '' ?>>Hindu</option>
                            <option value="Other" <?= ($exist['anak_agama'] ?? '') == 'Other' ? 'selected' : '' ?>>Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Citizenship</label>
                        <select class="form-control" name="anak_kewarganegaraan">
                            <option value="">-- Select --</option>
                            <option value="WNI" <?= ($exist['anak_kewarganegaraan'] ?? '') == 'WNI' ? 'selected' : '' ?>>Indonesian Citizen (WNI)</option>
                            <option value="WNA" <?= ($exist['anak_kewarganegaraan'] ?? '') == 'WNA' ? 'selected' : '' ?>>Foreign Citizen (WNA)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Child Number (e.g., 1st child)</label>
                        <input type="text" class="form-control" name="anak_ke" value="<?= $exist['anak_ke'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Child’s Status in the Family</label>
                        <select class="form-control" name="anak_status">
                            <option value="">-- Select --</option>
                            <option value="Anak Kandung" <?= ($exist['anak_status'] ?? '') == 'Anak Kandung' ? 'selected' : '' ?>>Biological Child</option>
                            <option value="Anak Tiri" <?= ($exist['anak_status'] ?? '') == 'Anak Tiri' ? 'selected' : '' ?>>Stepchild</option>
                            <option value="Anak Angkat" <?= ($exist['anak_status'] ?? '') == 'Anak Angkat' ? 'selected' : '' ?>>Adopted Child</option>
                            <option value="Cucu" <?= ($exist['anak_status'] ?? '') == 'Cucu' ? 'selected' : '' ?>>Grandchild</option>
                            <option value="Keponakan" <?= ($exist['anak_status'] ?? '') == 'Keponakan' ? 'selected' : '' ?>>Niece/Nephew</option>
                            <option value="Saudara Kandung" <?= ($exist['anak_status'] ?? '') == 'Saudara Kandung' ? 'selected' : '' ?>>Sibling</option>
                            <option value="Saudara Sepupu" <?= ($exist['anak_status'] ?? '') == 'Saudara Sepupu' ? 'selected' : '' ?>>Cousin</option>
                            <option value="Anak Asuh" <?= ($exist['anak_status'] ?? '') == 'Anak Asuh' ? 'selected' : '' ?>>Foster Child</option>
                            <option value="Lainnya" <?= ($exist['anak_status'] ?? '') == 'Lainnya' ? 'selected' : '' ?>>Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Daily Language</label>
                        <select class="form-control" name="anak_bahasa">
                            <option value="">-- Select --</option>
                            <option value="Indonesia" <?= ($exist['anak_bahasa'] ?? '') == 'Indonesia' ? 'selected' : '' ?>>Indonesian</option>
                            <option value="English" <?= ($exist['anak_bahasa'] ?? '') == 'English' ? 'selected' : '' ?>>English</option>
                            <option value="Jawa" <?= ($exist['anak_bahasa'] ?? '') == 'Jawa' ? 'selected' : '' ?>>Javanese</option>
                            <option value="Sunda" <?= ($exist['anak_bahasa'] ?? '') == 'Sunda' ? 'selected' : '' ?>>Sundanese</option>
                            <option value="Madura" <?= ($exist['anak_bahasa'] ?? '') == 'Madura' ? 'selected' : '' ?>>Madurese</option>
                            <option value="Bugis" <?= ($exist['anak_bahasa'] ?? '') == 'Bugis' ? 'selected' : '' ?>>Buginese</option>
                            <option value="Batak" <?= ($exist['anak_bahasa'] ?? '') == 'Batak' ? 'selected' : '' ?>>Batak</option>
                            <option value="Other" <?= ($exist['anak_bahasa'] ?? '') == 'Other' ? 'selected' : '' ?>>Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <textarea class="form-control" name="anak_alamat"><?= $exist['anak_alamat'] ?? '' ?></textarea>
                    </div>

                    <h5 class="mb-3 mt-4"><b>C. Health and Development</b></h5>
                    <hr>
                    <div class="mb-3">
                        <label class="form-label">Blood Type</label>
                        <select class="form-control" name="anak_darah">
                            <option value="">-- Select --</option>
                            <option value="A" <?= ($exist['anak_darah'] ?? '') == 'A' ? 'selected' : '' ?>>A</option>
                            <option value="B" <?= ($exist['anak_darah'] ?? '') == 'B' ? 'selected' : '' ?>>B</option>
                            <option value="AB" <?= ($exist['anak_darah'] ?? '') == 'AB' ? 'selected' : '' ?>>AB</option>
                            <option value="O" <?= ($exist['anak_darah'] ?? '') == 'O' ? 'selected' : '' ?>>O</option>
                            <option value="Tidak Tahu" <?= ($exist['anak_darah'] ?? '') == 'Tidak Tahu' ? 'selected' : '' ?>>Don't Know</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Weight</label>
                        <input type="text" class="form-control" name="anak_berat" value="<?= $exist['anak_berat'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Height</label>
                        <input type="text" class="form-control" name="anak_tinggi" value="<?= $exist['anak_tinggi'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Medical History</label>
                        <input type="text" class="form-control" name="anak_rawayat" value="<?= $exist['anak_rawayat'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Immunization</label>
                        <input type="text" class="form-control" name="anak_imunisasi" value="<?= $exist['anak_imunisasi'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Speaking Ability</label>
                        <select class="form-control" name="anak_bicara">
                            <option value="">-- Select --</option>
                            <option value="Lancar" <?= ($exist['anak_bicara'] ?? '') == 'Lancar' ? 'selected' : '' ?>>Fluent</option>
                            <option value="Kurang Lancar" <?= ($exist['anak_bicara'] ?? '') == 'Kurang Lancar' ? 'selected' : '' ?>>Not Fluent</option>
                            <option value="Tidak Bisa" <?= ($exist['anak_bicara'] ?? '') == 'Tidak Bisa' ? 'selected' : '' ?>>Unable to Speak</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Special Conditions</label>
                        <select class="form-control" name="anak_kondisi">
                            <option value="">-- Select --</option>
                            <option value="Tidak Ada" <?= ($exist['anak_kondisi'] ?? '') == 'Tidak Ada' ? 'selected' : '' ?>>None</option>
                            <option value="ABK" <?= ($exist['anak_kondisi'] ?? '') == 'ABK' ? 'selected' : '' ?>>Special Needs (ABK)</option>
                            <option value="Speech Delay" <?= ($exist['anak_kondisi'] ?? '') == 'Speech Delay' ? 'selected' : '' ?>>Speech Delay</option>
                            <option value="Lainnya" <?= ($exist['anak_kondisi'] ?? '') == 'Lainnya' ? 'selected' : '' ?>>Others</option>
                        </select>
                    </div>

                </div>

                <div class="col-md-6">

                    <h5 class="mb-3 mt-4"><b>B. Parent / Guardian Data</b></h5>
                    <hr>
                    <div class="mb-3">
                        <label class="form-label">Father’s Name</label>
                        <input type="text" class="form-control" name="anak_ayahnama" value="<?= $exist['anak_ayahnama'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Father’s Education</label>
                        <select class="form-control" name="anak_ayahsekolah">
                            <option value="">-- Select --</option>
                            <option value="Tidak Sekolah" <?= ($exist['anak_ayahsekolah'] ?? '') == 'Tidak Sekolah' ? 'selected' : '' ?>>No Schooling</option>
                            <option value="SD" <?= ($exist['anak_ayahsekolah'] ?? '') == 'SD' ? 'selected' : '' ?>>Primary School</option>
                            <option value="SMP" <?= ($exist['anak_ayahsekolah'] ?? '') == 'SMP' ? 'selected' : '' ?>>Junior High School</option>
                            <option value="SMA/SMK" <?= ($exist['anak_ayahsekolah'] ?? '') == 'SMA/SMK' ? 'selected' : '' ?>>High School/Vocational</option>
                            <option value="D1/D2/D3" <?= ($exist['anak_ayahsekolah'] ?? '') == 'D1/D2/D3' ? 'selected' : '' ?>>Diploma (D1/D2/D3)</option>
                            <option value="S1" <?= ($exist['anak_ayahsekolah'] ?? '') == 'S1' ? 'selected' : '' ?>>Bachelor’s Degree</option>
                            <option value="S2" <?= ($exist['anak_ayahsekolah'] ?? '') == 'S2' ? 'selected' : '' ?>>Master’s Degree</option>
                            <option value="S3" <?= ($exist['anak_ayahsekolah'] ?? '') == 'S3' ? 'selected' : '' ?>>Doctorate</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Father’s Occupation</label>
                        <select class="form-control" name="anak_ayahkerja">
                            <option value="">-- Select --</option>
                            <option value="Tidak Bekerja" <?= ($exist['anak_ayahkerja'] ?? '') == 'Tidak Bekerja' ? 'selected' : '' ?>>Unemployed</option>
                            <option value="Petani" <?= ($exist['anak_ayahkerja'] ?? '') == 'Petani' ? 'selected' : '' ?>>Farmer</option>
                            <option value="Buruh" <?= ($exist['anak_ayahkerja'] ?? '') == 'Buruh' ? 'selected' : '' ?>>Laborer</option>
                            <option value="Karyawan Swasta" <?= ($exist['anak_ayahkerja'] ?? '') == 'Karyawan Swasta' ? 'selected' : '' ?>>Private Employee</option>
                            <option value="Wiraswasta" <?= ($exist['anak_ayahkerja'] ?? '') == 'Wiraswasta' ? 'selected' : '' ?>>Entrepreneur</option>
                            <option value="PNS" <?= ($exist['anak_ayahkerja'] ?? '') == 'PNS' ? 'selected' : '' ?>>Civil Servant</option>
                            <option value="TNI/Polri" <?= ($exist['anak_ayahkerja'] ?? '') == 'TNI/Polri' ? 'selected' : '' ?>>Military/Police</option>
                            <option value="Lainnya" <?= ($exist['anak_ayahkerja'] ?? '') == 'Lainnya' ? 'selected' : '' ?>>Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mother’s Name</label>
                        <input type="text" class="form-control" name="anak_ibunama" value="<?= $exist['anak_ibunama'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mother’s Education</label>
                        <select class="form-control" name="anak_ibusekolah">
                            <option value="">-- Select --</option>
                            <option value="Tidak Sekolah" <?= ($exist['anak_ibusekolah'] ?? '') == 'Tidak Sekolah' ? 'selected' : '' ?>>No Schooling</option>
                            <option value="SD" <?= ($exist['anak_ibusekolah'] ?? '') == 'SD' ? 'selected' : '' ?>>Primary School</option>
                            <option value="SMP" <?= ($exist['anak_ibusekolah'] ?? '') == 'SMP' ? 'selected' : '' ?>>Junior High School</option>
                            <option value="SMA/SMK" <?= ($exist['anak_ibusekolah'] ?? '') == 'SMA/SMK' ? 'selected' : '' ?>>High School/Vocational</option>
                            <option value="D1/D2/D3" <?= ($exist['anak_ibusekolah'] ?? '') == 'D1/D2/D3' ? 'selected' : '' ?>>Diploma (D1/D2/D3)</option>
                            <option value="S1" <?= ($exist['anak_ibusekolah'] ?? '') == 'S1' ? 'selected' : '' ?>>Bachelor’s Degree</option>
                            <option value="S2" <?= ($exist['anak_ibusekolah'] ?? '') == 'S2' ? 'selected' : '' ?>>Master’s Degree</option>
                            <option value="S3" <?= ($exist['anak_ibusekolah'] ?? '') == 'S3' ? 'selected' : '' ?>>Doctorate</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mother’s Occupation</label>
                        <select class="form-control" name="anak_ibukerja">
                            <option value="">-- Select --</option>
                            <option value="Tidak Bekerja" <?= ($exist['anak_ibukerja'] ?? '') == 'Tidak Bekerja' ? 'selected' : '' ?>>Unemployed</option>
                            <option value="Petani" <?= ($exist['anak_ibukerja'] ?? '') == 'Petani' ? 'selected' : '' ?>>Farmer</option>
                            <option value="Buruh" <?= ($exist['anak_ibukerja'] ?? '') == 'Buruh' ? 'selected' : '' ?>>Laborer</option>
                            <option value="Karyawan Swasta" <?= ($exist['anak_ibukerja'] ?? '') == 'Karyawan Swasta' ? 'selected' : '' ?>>Private Employee</option>
                            <option value="Wiraswasta" <?= ($exist['anak_ibukerja'] ?? '') == 'Wiraswasta' ? 'selected' : '' ?>>Entrepreneur</option>
                            <option value="PNS" <?= ($exist['anak_ibukerja'] ?? '') == 'PNS' ? 'selected' : '' ?>>Civil Servant</option>
                            <option value="TNI/Polri" <?= ($exist['anak_ibukerja'] ?? '') == 'TNI/Polri' ? 'selected' : '' ?>>Military/Police</option>
                            <option value="Lainnya" <?= ($exist['anak_ibukerja'] ?? '') == 'Lainnya' ? 'selected' : '' ?>>Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Guardian’s Name</label>
                        <input type="text" class="form-control" name="anak_wali" value="<?= $exist['anak_wali'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Guardian’s Relationship to the Child</label>
                        <select class="form-control" name="anak_hubungan">
                            <option value="">-- Select --</option>
                            <option value="Kakek" <?= ($exist['anak_hubungan'] ?? '') == 'Kakek' ? 'selected' : '' ?>>Grandfather</option>
                            <option value="Nenek" <?= ($exist['anak_hubungan'] ?? '') == 'Nenek' ? 'selected' : '' ?>>Grandmother</option>
                            <option value="Paman" <?= ($exist['anak_hubungan'] ?? '') == 'Paman' ? 'selected' : '' ?>>Uncle</option>
                            <option value="Bibi" <?= ($exist['anak_hubungan'] ?? '') == 'Bibi' ? 'selected' : '' ?>>Aunt</option>
                            <option value="Lainnya" <?= ($exist['anak_hubungan'] ?? '') == 'Lainnya' ? 'selected' : '' ?>>Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Parent’s Address</label>
                        <textarea class="form-control" name="anak_alamatortu"><?= $exist['anak_alamatortu'] ?? '' ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Parent’s Phone Number</label>
                        <input type="text" class="form-control" name="anak_hportu" value="<?= $exist['anak_hportu'] ?? '' ?>">
                    </div>

                    <h5 class="mb-3 mt-4"><b>D. Enrollment & Exit Data</b></h5>
                    <hr>
                    <div class="mb-3">
                        <label class="form-label">Date of Admission</label>
                        <input type="date" class="form-control" name="anak_tanggalmasuk" value="<?= $exist['anak_tanggalmasuk'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Age at Admission</label>
                        <input type="text" class="form-control" name="anak_usiamasuk" value="<?= $exist['anak_usiamasuk'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Group/Class</label>
                        <input type="text" class="form-control" name="anak_kelompok" value="<?= $exist['anak_kelompok'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date of Leaving</label>
                        <input type="date" class="form-control" name="anak_tanggalkeluar" value="<?= $exist['anak_tanggalkeluar'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Reason for Leaving</label>
                        <input type="text" class="form-control" name="anak_alasan" value="<?= $exist['anak_alasan'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Continued to</label>
                        <input type="text" class="form-control" name="anak_melanjutkan" value="<?= $exist['anak_melanjutkan'] ?? '' ?>">
                    </div>

                </div>
            </div>

            <h5 class="mb-3 mt-4"><b>E. Special Notes & Photo</b></h5>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Achievements</label>
                        <textarea class="form-control" name="anak_prestasi"><?= $exist['anak_prestasi'] ?? '' ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Child's Development</label>
                        <textarea class="form-control" name="anak_perkembangan"><?= $exist['anak_perkembangan'] ?? '' ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Notes</label>
                        <textarea class="form-control" name="anak_catatan"><?= $exist['anak_catatan'] ?? '' ?></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Photo</label><br>
                        <?php if (!empty($exist['anak_foto'])): ?>
                            <img src="<?= base_url('uploads/foto/' . $exist['anak_foto']) ?>" class="img-thumbnail mb-2" style="max-width: 150px;"><br>
                        <?php endif; ?>
                        <input type="file" name="anak_foto" accept="image/*" class="form-control">
                    </div>
                </div>
            </div>
            
            <div class="card-footer d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Save
                </button>
            </div>
        </form>
    </div>
</div>

<?php echo view('footer'); ?>