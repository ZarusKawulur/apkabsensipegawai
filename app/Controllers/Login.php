<?php

namespace App\Controllers;
use App\Models\KaryawanModel;
use App\Controllers\BaseController;
class Login extends BaseController
{
    public function index()
    {
        $session=session();
        if ($session->get('user_login')) {
            return redirect()->to('home');
        }
        return view('login');
    }
    
    public function login(){
        $UserModel = new \App\Models\UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if ($username == '' or $password == '') {
            $err = "Masukan Username dan Password";
        }
        if (empty($err)){
            $dataUser = $UserModel->select('user.*,karyawan.nama_karyawan,role.role')
            ->join('karyawan','user.id=karyawan.user_id','left')
            ->join('userrole','user.id=userrole.user_id','left')
            ->join('role','role.id=userrole.role_id','left')
            ->where("username", $username)->first();
            if ($dataUser['password'] !=md5($password))
            {
                $err = "Password tidak sesuai";
            }
        }
        if (empty($err)){

            $dataSesi = [
                'id' => $dataUser['id'],
                'username' => $dataUser['username'],
                'password' => $dataUser['password'],
                'nama_karyawan' =>$dataUser['nama_karyawan'],
                'akses' =>$dataUser['role'],
                'user_login' =>true
            ];
            session()->set($dataSesi);
            return redirect()->to('home');
        }
        if ($err) {
            session()->setFlashdata('username', $username);
            session()->setFlashdata('eror', $err);
            return redirect()->to("login");
        }

    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('login'));
    }
}
