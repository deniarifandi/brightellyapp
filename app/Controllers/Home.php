<?php

namespace App\Controllers;

use App\Libraries\DataTable;


class Home extends BaseController
{
    public function index(): string
    {

       $db = \Config\Database::connect();
        $builder = $db->table('identitasanak')->where('deleted_at', null);
        $count = $builder->countAllResults();

        // Count all active transactions (where deleted_at is null)
        $builder = $db->table('transaksi')->where('deleted_at', null);
        $count2 = $builder->countAllResults();

        return view('dashboard',['anak' => $count, 'transaksi' => $count2]);

    }
}
