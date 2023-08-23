<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::with('mahasiswa')->latest()->paginate(5);

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
            'name'       => 'required|max:30',
            'jumlah'     => 'required|max:80',
        ]);

        Kelas::create($validatedData);
        alert()->success('Success', 'New Class Successfully Added');
        return redirect('/kelas');
    }

    public function edit(Kelas $kelas)
    {
        return view('kelas.edit', [
            'title'     => 'Edit Kelas',
            'kelas'     => $kelas
        ]);
    }

    public function destroy(Kelas $kelas)
    {
        // Jika Berhasil Menghapus
        if ($kelas == $kelas) {
            Kelas::destroy($kelas->id);
            alert()->success('Success', 'Class Successfully Delete');
        } else {
            alert()->error('Error Delete', 'Class Cant Not Delete');
        }

        return redirect('/kelas');
    }
}