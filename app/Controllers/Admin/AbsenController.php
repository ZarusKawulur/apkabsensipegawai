<?php

namespace App\Controllers\Admin;
use App\Models\UserModel;
use App\Models\RoleModel;
use App\Models\UserRoleModel;
use App\Models\KaryawanModel;
use App\Models\AbsenModel;
use App\Controllers\BaseController;

class AbsenController extends BaseController
{

    protected $karyawanmodel;
    protected $user;
    protected $role;
    protected $userRole;
    protected $absen;
    protected $hari;

    public function __construct()
    {
        $this->karyawanmodel = new KaryawanModel();
        $this->user = new UserModel();
        $this->role = new RoleModel();
        $this->userRole = new UserRoleModel();
        $this->absen = new AbsenModel();
        $this->hari = new \App\Models\HariKerjaModel();
    }

    public function index()
    {
        // $karyawan = $this->karyawanModel->findAll();

        $data =[
        'judul' => 'Data Karyawan',
        'karyawan' => $this->karyawanmodel->findAll(),
        'hari_kerja'=> $this->hari->where('tanggal', date('Y-m-d'))->first()
        ];
        foreach ($data['karyawan'] as $key => $value) {
            $data['karyawan'][$key]['status']=$this->karyawanmodel->join('absen', 'absen.karyawan_id=karyawan.id')->join('hari_kerja', 'absen.hari_kerja_id=hari_kerja.id')
            ->where('karyawan.id', $value['id'])->where('hari_kerja.tanggal', date('Y-m-d'))->find();
        }
        return view('/Admin/absen/data', $data);
    }
    
    public function add($karyawan_id=null, $status=null, $hari_kerja_id=null)
    {
        $data = [
            'karyawan_id'=>$karyawan_id,
            'status'=>$status,
            'hari_kerja_id'=> $hari_kerja_id
        ];
        // dd($data);
        $this->absen->insert($data);
        return redirect()->to(base_url('absen'));
    }

    public function detail($id)
    {
        $data =
        [
            'judul' => 'Detail Karyawan',
            'karyawan' => $this->karyawanmodel->getKaryawan($id)
        ];
        
        return view('/Admin/Karyawan/detail', $data);
      
    }
   
    }

