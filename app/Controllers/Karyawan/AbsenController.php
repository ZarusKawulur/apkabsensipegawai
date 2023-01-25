<?php

namespace App\Controllers\Karyawan;

use App\Controllers\Admin\Karyawan;
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
        
        //  date_default_timezone_set('Asia/Jayapura');
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
        'judul' => 'Absen Karyawan',
        'karyawan' => $this->karyawanmodel->findAll(),
        'hari_kerja'=> $this->hari->where('tanggal', date('Y-m-d').'waktu', date('H:i:s'))->first(),
        'absen'=>$this->absen->findAll()
        ];
        foreach ($data['karyawan'] as $key => $value) {
            $data['karyawan'][$key]['status']=$this->karyawanmodel->join('absen', 'absen.karyawan_id=karyawan.id')->join('hari_kerja', 'absen.hari_kerja_id=hari_kerja.id')
            ->where('karyawan.id', $value['id'])->where('hari_kerja.tanggal', date('Y-m-d'))->find();
        }
        
        foreach ($data['karyawan'] as $key => $value) {
            $data['karyawan'][$key]['pulang']=$this->karyawanmodel->join('absen', 'absen.karyawan_id=karyawan.id')->join('hari_kerja', 'absen.hari_kerja_id=hari_kerja.id')
            ->where('karyawan.id', $value['id'])->where('hari_kerja.tanggal', date('Y-m-d'))->find();
        }
        foreach ($data['karyawan'] as $key => $value) {
            $data['karyawan'][$key]['datang']=$this->karyawanmodel->join('absen', 'absen.karyawan_id=karyawan.id')->join('hari_kerja', 'absen.hari_kerja_id=hari_kerja.id')
            ->where('karyawan.id', $value['id'])->where('hari_kerja.tanggal', date('Y-m-d'))->find();
        }
        return view('/absen/data', $data);
    }
    
    public function add($karyawan_id=null, $status=null, $hari_kerja_id=null,$pulang=null)
    {
        $data = [
            'karyawan_id'=>$karyawan_id,
            'status'=>$status,
            'datang'=>date('H:i:s'),
            'hari_kerja_id'=> $hari_kerja_id,
            'pulang'=>$pulang
        ];
        // dd($data);
        $this->absen->insert($data);
        return redirect()->to(base_url('absen/karyawan'));
    }
    public function pulang()
    {
        $data =[
            'karyawan' => $this->karyawanmodel->findAll(),
            'absen' => $this->absen->where('pulang', date('H:i:s'))->first()
        ];
        foreach ($data['karyawan'] as $key => $v) {
            $data['karyawan'][$key]['status']=$this->karyawanmodel->join('absen', 'pulang.karyawan_id=karyawan.id')->join('hari_kerja', 'absen.hari_kerja_id=hari_kerja.id')
            ->where('karyawan.id', $v['id'])->where('absen.pulang', date('H:i:s'))->find();
        }
        return view('/absen/data', $data);
    }
    public function addd($karyawan_id=null, $status=null, $hari_kerja_id=null)
    {
        $data = [
            'status'=>$status,
            'karyawan_id'=>$karyawan_id,
            'pulang'=>date('H:i:s'),
            'hari_kerja_id'=> $hari_kerja_id
        ];
        // dd($data);
        $this->absen->insert($data);
        return redirect()->to(base_url('absen/karyawan'));
    }
    }

