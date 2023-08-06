<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::latest()->get();

        return view('kelas.index', [
            'title'  => 'Dashboard Kelas',
            'kelas'  => $kelas,
        ]);
    }

    public function create()
    {
        $title = 'Create Mahasiswa';

        return view('kelas.create', [
            'title' => $title,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'   => 'required|max:30',
        ]);

        Kelas::create($validatedData);
        alert()->success('Success', 'New Class Successfully Added');
        return redirect('/kelas');
    }
}