<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\jurusan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;


class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $title     = 'Dashboard Mahasiswa';
        $mahasiswa = Mahasiswa::latest()->filters(request(['keyword']))->get();

        return view('mhs.index', [
            'title'      => $title,
            'mahasiswa'  => $mahasiswa
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusans = jurusan::all();
        $dosens   = Dosen::all();
        $title = 'Create Mahasiswa';

        return view('mhs.create', compact('jurusans', 'dosens', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nim'        => 'required|unique:mahasiswas',
            'nama_mhs'   => 'required|max:50',
            'jk'         => 'required',
            'jurusan'    => 'required',
            'no_hp'      => 'required|max:13',
            'alamat'     => 'required',
            'dosen_id'   => 'required'
        ]);

        Mahasiswa::create($validatedData);

        return redirect('/mahasiswa')->with('success', 'Mahasiswa Baru Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $jurusans = jurusan::all();
        $dosens   = Dosen::all();
        $title    = 'Edit Mahasiswa';
        $jenis    = '';

        if ($mahasiswa->jk == 'Laki-laki') {
            $jenis = 'Perempuan';
        }

        if ($mahasiswa->jk == 'Perempuan') {
            $jenis = 'Laki-laki';
        }

        return view('mhs.edit', compact('mahasiswa', 'title', 'jenis', 'jurusans', 'dosens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim'       => 'required|max:9',
            'nama_mhs'  => 'required|max:50',
            'jk'        => 'required',
            'jurusan'   => 'required|max:35',
            'no_hp'     => 'required|max:13',
            'alamat'    => 'required|max:50',
            'dosen_id'  => 'required'
        ]);

        $mahasiswa->fill($request->post())->save();

        return redirect('/mahasiswa')->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        Mahasiswa::destroy($mahasiswa->id);

        return redirect('/mahasiswa')->with('success', 'Mahasiswa Berhasil Didelete');
    }
}