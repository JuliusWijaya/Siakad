<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\jurusan;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $title   = 'Dashboard';
        $jurusan = jurusan::all();
        $dosen   = Dosen::all();
        $user    = User::all();
        $mhs     = Mahasiswa::all();

        return view('dashboards.index', [
            'title'      => $title,
            'jurusans'   => $jurusan,
            'dosen'      => $dosen,
            'user'       => $user,
            'mahasiswa'  => $mhs,
        ]);
    }
}