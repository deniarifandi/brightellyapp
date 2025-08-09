<?php 

namespace App\Controllers;

use App\Models\IdentitasanakModel;
use App\Libraries\DataTable;
use DB;

class IdentitasanakController extends BaseController
{
    protected $IdentitasanakModel;

    public function __construct()
    {
        $this->IdentitasanakModel = new IdentitasanakModel();
    }

    public function index()
    {
        $data['owners'] = $this->IdentitasanakModel
        ->select('*')
            ->where('deleted_at', null)
            ->findAll();
        return view('identitasanak/index', $data);
    }

    public function create()
    {
       
        return view('identitasanak/form');
    }

    public function store()
    {
         $db = \Config\Database::connect();
    $builder = $db->table('identitasanak');

    $id = $this->request->getPost('anak_id'); // used for checking existence

    // Build data array
    $data = [
        'murid_id'               => $this->request->getPost('anak_id'),
        'anak_nis'               => $this->request->getPost('anak_nis'),
        'anak_nama'              => $this->request->getPost('anak_nama'),
        'anak_panggilan'         => $this->request->getPost('anak_panggilan'),
        'anak_jk'                => $this->request->getPost('anak_jk'),
        'anak_tempat'                => $this->request->getPost('anak_tempat'),
        'anak_ttl'               => $this->request->getPost('anak_ttl'),
        'anak_agama'             => $this->request->getPost('anak_agama'),
        'anak_kewarganegaraan'   => $this->request->getPost('anak_kewarganegaraan'),
        'anak_ke'                => $this->request->getPost('anak_ke'),
        'anak_status'            => $this->request->getPost('anak_status'),
        'anak_bahasa'            => $this->request->getPost('anak_bahasa'),
        'anak_alamat'            => $this->request->getPost('anak_alamat'),
        'anak_ayahnama'          => $this->request->getPost('anak_ayahnama'),
        'anak_ayahsekolah'       => $this->request->getPost('anak_ayahsekolah'),
        'anak_ayahkerja'         => $this->request->getPost('anak_ayahkerja'),
        'anak_ibunama'           => $this->request->getPost('anak_ibunama'),
        'anak_ibusekolah'        => $this->request->getPost('anak_ibusekolah'),
        'anak_ibukerja'          => $this->request->getPost('anak_ibukerja'),
        'anak_wali'              => $this->request->getPost('anak_wali'),
        'anak_hubungan'          => $this->request->getPost('anak_hubungan'),
        'anak_alamatortu'        => $this->request->getPost('anak_alamatortu'),
        'anak_hportu'            => $this->request->getPost('anak_hportu'),
        'anak_darah'             => $this->request->getPost('anak_darah'),
        'anak_berat'             => $this->request->getPost('anak_berat'),
        'anak_tinggi'             => $this->request->getPost('anak_tinggi'),
        'anak_rawayat'           => $this->request->getPost('anak_rawayat'),
        'anak_imunisasi'         => $this->request->getPost('anak_imunisasi'),
        'anak_bicara'            => $this->request->getPost('anak_bicara'),
        'anak_kondisi'           => $this->request->getPost('anak_kondisi'),
        'anak_tanggalmasuk'      => $this->request->getPost('anak_tanggalmasuk'),
        'anak_usiamasuk'         => $this->request->getPost('anak_usiamasuk'),
        'anak_kelompok'          => $this->request->getPost('anak_kelompok'),
        'anak_tanggalkeluar'     => $this->request->getPost('anak_tanggalkeluar'),
        'anak_alasan'            => $this->request->getPost('anak_alasan'),
        'anak_melanjutkan'       => $this->request->getPost('anak_melanjutkan'),
        'anak_prestasi'          => $this->request->getPost('anak_prestasi'),
        'anak_perkembangan'      => $this->request->getPost('anak_perkembangan'),
        'anak_catatan'           => $this->request->getPost('anak_catatan'),
    ];

      $foto = $this->request->getFile('anak_foto');

    // Handle image upload
       // Only process upload if a file was submitted
    if ($foto && $foto->isValid() && !$foto->hasMoved()) {
        $newName = $foto->getRandomName();
        $foto->move('uploads/foto', $newName);
        $data['anak_foto'] = $newName;

        // Optional: delete old photo
        // $old = $this->db->table('bukuinduk')->getWhere(['anak_id' => $id])->getRowArray();
        if (!empty($old['anak_foto']) && file_exists('uploads/foto/' . $old['anak_foto'])) {
            unlink('uploads/foto/' . $old['anak_foto']);
        }
    }

    // Check if record exists
    $exists = $builder->where('anak_id', $id)->get()->getRowArray();

    if ($exists) {
        $success = $builder->where('anak_id', $id)->update($data);
        $message = $success ? 'Data updated successfully!' : 'Failed to update data.';
    } else {
        $success = $builder->insert($data);
        $message = $success ? 'Data saved successfully!' : 'Failed to save data.';
    }

    session()->setFlashdata('message', $message);
    return redirect()->to('/identitasanak');
    }

    public function edit($id)
    {
       
        $db = \Config\Database::connect();
        $exist = $db->table('identitasanak')->where('anak_id', $id)->get()->getRowArray();

        // print_r($exist);
        return view('identitasanak/form',['exist' => $exist]);
    }

    public function update($id)
    {
        $this->IdentitasanakModel->update($id, $this->request->getPost());
        return redirect()->to('/va-owner');
    }

    public function delete($id)
    {
        $this->IdentitasanakModel->delete($id);
        return redirect()->to('/identitasanak');
    }

    //custom
    public function data(){
        $db = db_connect();
        $builder = $db->table('identitasanak')
        ->select('*')
        ->where('deleted_at', null);
    

        // Columns to apply search on
        $columns = ['anak_id'];
        // $columns =  [];
        $dt = new DataTable($builder, $columns);
        $result = $dt->generate();

        return $this->response->setJSON($result);
    }

    public function print($id)
        {

            $db = \Config\Database::connect();
            $builder = $db->table('identitasanak');
            $data['identitasanak'] = $builder->where('anak_id', $id)->get()->getRow();

           if (empty($data['identitasanak'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Data anak tidak ditemukan.");
        }
            // print_r($data);

            return view('identitasanak/print', ['anak' => $data['identitasanak']]);
        }

}
