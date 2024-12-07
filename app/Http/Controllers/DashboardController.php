<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Datapenduduk;
use App\Models\Pengaduan;
use App\Models\Rt;
use App\Models\Rw;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
            return view('admin.index',[
                'berita'=> Berita::all()->count(),
                'datapenduduk'=> Datapenduduk::all()->count(),
                'rt'=> Rt::all()->count(),
            ]);
    }

    
}
