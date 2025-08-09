<?php

namespace App\Controllers;

use App\Libraries\DataTable;
use App\Models\UserModel;


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

    public function login()
    {
        helper(['form']);
        echo view('login.php');
    }

    public function logout()
{
    $session = session();
    $session->destroy();
    return redirect()->to('/login');
}

    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $data = $model->where('username', $username)->first();

        if ($data) {
            $pass = $data['password'];
           // $verify_pass = password_verify($password, $pass);
            if ($password == $pass) {
                $ses_data = [
                    'user_id'       => $data['user_id'],
                    'username'      => $data['username'],
                    'role'          => $data['role'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/'); // Change to your desired dashboard route
            } else {
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Username not found');
            return redirect()->to('/login');
        }
    }


}
