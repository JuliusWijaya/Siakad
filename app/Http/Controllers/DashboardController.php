<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Dosen;
use App\Models\jurusan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $title   = 'Dashboard';
        $jurusan = jurusan::all();
        $dosen   = Dosen::all();
        $user    = User::all();
        $mhs     = Mahasiswa::all();
        $post    = Post::where('user_id', Auth::id())->count();

        return view('dashboards.index', [
            'title'      => $title,
            'jurusans'   => $jurusan,
            'dosen'      => $dosen,
            'user'       => $user,
            'mahasiswa'  => $mhs,
            'post'       => $post,
        ]);
    }
}