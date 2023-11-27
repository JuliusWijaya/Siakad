<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\jurusan;
use App\Models\Mahasiswa;
use App\Exports\ExportMahasiswa;
use App\Http\Requests\MahasiswaRequest;
use App\Models\Ormawa;
use App\Models\Kelas;
use Maatwebsite\Excel\Facades\Excel;
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
        $mahasiswa = Mahasiswa::with('ormawa')->latest()->filters(request(['keyword']))->get();

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
        $ormawas  = Ormawa::all();
        $dosens   = dosen::all();
        $kelas    = Kelas::all();
        $title    = 'Create Mahasiswa';

        return view('mhs.create', compact('jurusans', 'ormawas', 'dosens', 'kelas', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MahasiswaRequest $request)
    {
        $validatedData = $request->validated();
        $mhs = Mahasiswa::create($validatedData);
        $mhs->ormawa()->sync($validatedData['ormawa_id']);
        alert()->success('Success', 'New Students Successfully Added');
        return redirect('/mahasiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $title    = 'Details Mahasiswa';
        $slug     = Mahasiswa::where('slug', $slug)->first();
        $slug->load('ormawa');

        return view('mhs.details', [
            'title'      => $title,
            'details'    => $slug,
        ]);
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
        $kelas    = Kelas::all();
        $ormawas  = Ormawa::all();
        $title    = 'Edit Mahasiswa';
        $jenis    = '';

        if ($mahasiswa->jk == 'Laki-laki') {
            $jenis = 'Perempuan';
        }

        if ($mahasiswa->jk == 'Perempuan') {
            $jenis = 'Laki-laki';
        }

        return view('mhs.edit', compact('mahasiswa', 'title', 'jenis', 'jurusans', 'dosens', 'kelas', 'ormawas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MahasiswaRequest $request, Mahasiswa $mahasiswa)
    {
        $validatedData = $request->validated();
        $mahasiswa->fill($validatedData)->save();
        (isset($request->ormawa_id)) ? $mahasiswa->ormawa()->sync($request->ormawa_id) : false;
        alert()->success('Success', $mahasiswa->nama_mhs . ' Successfully Has Been Edit');
        return redirect('/mahasiswa');
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
        alert()->success('Success', $mahasiswa->nama_mhs . ' Has Been Delete');
        return redirect('/mahasiswa');
    }

    public function exportExcel()
    {
        return Excel::download(new ExportMahasiswa, 'mahasiswa.xlsx');
    }
}