<?php

namespace App\Controllers\Admin;
use App\Models\UserModel;
use App\Models\RoleModel;
use App\Models\UserRoleModel;
use App\Models\KaryawanModel;
use App\Controllers\BaseController;
class Karyawan extends BaseController
{

    protected $karyawanModel;
    protected $user;
    protected $role;
    protected $userRole;


    public function __construct()
    {
        $this->karyawanModel = new KaryawanModel();
        $this->user = new UserModel();
        $this->role = new RoleModel();
        $this->userRole = new UserRoleModel();
    }

    public function index()
    {
        // $karyawan = $this->karyawanModel->findAll();

        $data =[
        'judul' => 'Data Karyawan',
        'karyawan' => $this->karyawanModel->getKaryawan()
        ];

        return view('/Admin/karyawan/data', $data);
    }

    public function detail($id)
    {
        $data =
        [
            'judul' => 'Detail Karyawan',
            'karyawan' => $this->karyawanModel->getKaryawan($id)
        ];
        
        return view('/Admin/karyawan/detail', $data);
      
    }
    public function tambah()
    {

        $data = $this->request->getPost();
        if (count($data) > 0) {
            try {
                $dataUser = [
                    'username'=>$data['username'],
                    'password'=>md5($data['password'])
                ];
                $this->user->insert($dataUser);
                $user_id = $this->user->getInsertID();
                $dataUserRole = [
                    'user_id'=> $user_id,
                    'role_id'=> $data['role_id']
                ];
                $this->userRole->insert($dataUserRole);
                $data['user_id'] = $user_id;

                $this->karyawanModel->insert($data);

                session()->setFlashdata('pesan', 'Data berhasil ditambah.');

                return redirect()->to(base_url('karyawan'));
            } catch (\Throwable $th) {
                echo $th->getMessage();
            }
        } else {
            $data=
            [
                'judul' => 'Tambah Karyawan',
                'role' =>$this->role->findAll()
            ];
            return view('Admin/karyawan/tambah', $data);
        }
        }

        public function hapus($id=null)
        {
            $this->user->delete($id);
            return redirect()->to(base_url('karyawan'));
        }
    }

