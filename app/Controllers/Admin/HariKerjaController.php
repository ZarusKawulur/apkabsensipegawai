<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class HariKerjaController extends BaseController
{
    protected $hari;
    protected $jam;
    public function __construct() {
        $this->hari = new \App\Models\HariKerjaModel();
        $this->jam = new \App\Models\HariKerjaModel();
    }
    public function index()
    {
        $data=[
            "judul" => "Hari Kerja",
            "haris"=> $this->hari->findAll(),
            'cek'=> $this->hari->where('tanggal', date('Y-m-d').'waktu', date('H:i:s'))->first()
        ];
        // dd($data);
        return view('admin/hari_kerja/data', $data);
    }

    public function open()
    {
        $data = [
            'waktu' => date('H:i:s'),
            'tanggal'=> date('Y-m-d')
        ];
        $this->hari->insert($data);
        return redirect()->to(base_url('hari'));
    }
}
