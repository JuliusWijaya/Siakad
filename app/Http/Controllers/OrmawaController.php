<?php

namespace App\Http\Controllers;

use App\Models\Ormawa;
use Illuminate\Http\Request;

class OrmawaController extends Controller
{
    public function index()
    {
        $ormawas = Ormawa::with('mahasiswa')->get();

        return view('ormawa.index', [
            'title'     => 'Dashboard Ormawa',
            'ormawas'   => $ormawas,
        ]);
    }
}
