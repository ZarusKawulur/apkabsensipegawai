<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data =[
            'judul' => 'Home | AbsensiKaryawan',
            'coba' => ['satu','dua','tiga']
            ];
        return view('/Admin/dashboard/home', $data);
    }
}
