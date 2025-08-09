<?php 

namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Models\IdentitasanakModel;
use App\Libraries\DataTable;
use App\Libraries\Whatsapp;
use DB;


class Transaksi extends BaseController
{
    public $db;

    public function __construct()
    {
      $this->db = \Config\Database::connect();
    }

       public function index()
    {
      
        return view('transaksi/index');
    }

    public function create()
    {
         // $model = new VaOwnerModel();
        $IdentitasanakModel = new IdentitasanakModel();
       // $data['va_owner'] = $model->find($id);
        $data['anggota'] = $IdentitasanakModel
            ->select('*')
            ->where('deleted_at', null)
            ->findAll();

        return view('transaksi/form', $data);
    }

    public function store()
{
    $model = new TransaksiModel();

    // 1. Get all the POST data from the form
    $data = $this->request->getPost();

    // 2. Combine the month and year into a single 'periode' field
    $month = $this->request->getPost('month');
    $year = $this->request->getPost('year');
    $data['periode'] = $year . '-' . $month;

    // Proses upload foto
    $foto = $this->request->getFile('bukti');
    if ($foto && $foto->isValid() && !$foto->hasMoved()) {
        $newName = $foto->getRandomName();
        $foto->move('uploads/bukti', $newName);
        $data['bukti'] = $newName;
    }

    $model->insert($data);

    return redirect()->to('/transaksi');
}

    public function edit($id)
    {
        
        $IdentitasanakModel = new IdentitasanakModel();
        $data['anggota'] = $IdentitasanakModel->findAll();

        $TransaksiModel = new TransaksiModel();
        $data['transaksi'] = $TransaksiModel->find($id); // For edit

        return view('transaksi/form', $data);
    }

    public function detail($id){
        $TransaksiModel = new TransaksiModel();
        $data['transaksi'] = $TransaksiModel
        ->join('identitasanak','identitasanak.anak_id = transaksi.anak_id')
        ->find($id); // For edit

        return view('transaksi/detail', $data);
    }

    public function update($id)
{
    $model = new TransaksiModel();

    // 1. Get the raw POST data from the form
    $data = $this->request->getPost();

    // 2. Combine the month and year into a single 'periode' field
    $month = $this->request->getPost('month');
    $year = $this->request->getPost('year');
    $data['periode'] = $year . '-' . $month;

    // Ambil data lama
    $old = $model->find($id);

    // Proses upload foto
    $foto = $this->request->getFile('bukti');
    if ($foto && $foto->isValid() && !$foto->hasMoved()) {
        $newName = $foto->getRandomName();
        $foto->move('uploads/bukti', $newName);
        $data['bukti'] = $newName;

        // Hapus foto lama kalau ada
        if (!empty($old['bukti']) && file_exists('uploads/bukti/' . $old['bukti'])) {
            unlink('uploads/bukti/' . $old['bukti']);
        }
    } else {
        // Kalau tidak upload baru, tetap pakai foto lama
        if (!empty($old['bukti'])) {
            $data['bukti'] = $old['bukti'];
        }
    }

    $model->update($id, $data);

    return redirect()->to('/transaksi');
}

    public function delete($id)
    {
        $model = new TransaksiModel();
        $model->delete($id);
        return redirect()->to('/transaksi');
    }

    public function mark($id){
        $model = new TransaksiModel();

        // Find the record by its ID
        $transaksi = $model->find($id);

        // Check if the record exists
        if ($transaksi) {
            // Update the 'verifikasi' column to 1
            $data = [
                'verifikasi' => 1,
            ];

            // Save the updated data
            $model->update($id, $data);
        }

        return redirect()->to('/transaksi/detail/'.$id);
    }

    public function unmark($id){
          $model = new TransaksiModel();

        // Find the record by its ID
        $transaksi = $model->find($id);

        // Check if the record exists
        if ($transaksi) {
            // Update the 'verifikasi' column to 1
            $data = [
                'verifikasi' => 0,
            ];

            // Save the updated data
            $model->update($id, $data);
        }

        return redirect()->to('/transaksi/detail/'.$id);
    }

    //custom
    public function data(){
        $db = db_connect();

            $builder = $db->table('transaksi')->select('transaksi.*, identitasanak.anak_nama')
            ->join('identitasanak', 'identitasanak.anak_id = transaksi.anak_id')
            ->where('transaksi.deleted_at', null)
            ->groupBy('transaksi_id');
    

        // Columns to apply search on
        $columns = ['transaksi_id','transaksi_nominal','transaksi_tanggal','verifikasi'];
        // $columns =  [];
        $dt = new DataTable($builder, $columns);
        $result = $dt->generate();

        return $this->response->setJSON($result);

    }

     public function send_konfirmasi($id){
        $builder = $this->db->table('transaksi')->select('*')
          ->where('transaksi_id',$id)
          ->join('va_owner','transaksi.transaksi_va = va_owner.va_owner_va')
          ->join('dishub_anggota','dishub_anggota.anggota_id = va_owner.va_owner_anggotaid')
          ->join('dishub_titpargrup','dishub_titpargrup.titpargrup_anggotaid = dishub_anggota.anggota_id')
          ->join('dishub_titpar','dishub_titpargrup.titpargrup_titparid = dishub_titpar.titpar_id')
          ->get()->getResult();

        $wa = new Whatsapp();
         setlocale(LC_TIME, 'id_ID.utf8'); // Use Indonesian locale
        $tanggal = strftime('%e %B %Y', strtotime($builder[0]->transaksi_tanggal));
        $keterangan = substr($builder[0]->titpar_namatempat, 0, 30);
       

        $result = $wa->sendMessage($builder[0]->va_owner_hp, $builder[0]->anggota_nama,$builder[0]->transaksi_nominal,$tanggal,$builder[0]->titpar_namatempat,$builder[0]->transaksi_id);
        // return $this->response->setJSON($result);

            if ($result) {
                session()->setFlashdata('message', $result);
            } else {
                session()->setFlashdata('message', $result);
            }

            return redirect()->to('/transaksi');
    }

    public function invoice($id){
 $TransaksiModel = new TransaksiModel();
        $data['transaksi'] = $TransaksiModel
        ->join('identitasanak','identitasanak.anak_id = transaksi.anak_id')
        ->find($id); // For edit

        return view('transaksi/invoice', $data);
    }

    public function front(){
          return view('transaksi/front');
    }

    public function print(){
        $date_begin = $this->request->getGet('begin') ?? date('Y-m-01');
        $date_end   = $this->request->getGet('end') ?? date('Y-m-t');

        // Get data
        $db = \Config\Database::connect();
        $builder = $db->table('transaksi');
        $builder->select('
            transaksi_id,
            identitasanak.anak_id,
            identitasanak.anak_nama,
            transaksi_nominal,
            payment_type,
            periode,
            payment_method,
            transaksi_tanggal,
            wa_konfirmasi,
            bukti,
            verifikasi,
            verifikasipada,
            verifikasioleh
        ');
        $builder->join('identitasanak','identitasanak.anak_id = transaksi.anak_id');
        $builder->where('DATE(transaksi_tanggal) >=', $date_begin);
        $builder->where('DATE(transaksi_tanggal) <=', $date_end);
        $builder->where('transaksi.deleted_at',null);
        $builder->orderBy('transaksi_tanggal', 'DESC');

        $query = $builder->get();
        $transactions = $query->getResult();

        return view('transaksi/print',['transactions' => $transactions]);
    }


}
