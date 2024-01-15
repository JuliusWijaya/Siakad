<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Ormawa;
use App\Models\jurusan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Exports\ExportMahasiswa;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\MahasiswaRequest;
use Barryvdh\DomPDF\Facade\Pdf;


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
        $jurusans = jurusan::select('id', 'nama_jurusan')->orderBy('jurusan', 'asc')->get();
        $ormawas  = Ormawa::select('id', 'name')->orderBy('name', 'asc')->get();
        $dosens   = dosen::select('id', 'nama')->orderBy('nama', 'asc')->get();
        $kelas    = Kelas::select('id', 'name')->orderBy('name', 'asc')->get();
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
        if (isset($request->ormawa_id)) {
            $mhs->ormawa()->sync($validatedData['ormawa_id']);
        }
        alert()->success('Success', 'New Students Successfully Added');
        return redirect()->route('students.index');
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
        $slug->load('ormawa', 'kelas.dosen');

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
    public function edit(Mahasiswa $student)
    {
        $student = Mahasiswa::where('slug', $student->slug)->first();
        $jurusans = jurusan::select('id', 'nama_jurusan')->orderBy('jurusan', 'asc')->get();
        $dosens   = dosen::select('id', 'nama')->orderBy('nama', 'asc')->get();
        $kelas    = Kelas::select('id', 'name')->orderBy('name', 'asc')->get();
        $ormawas  = Ormawa::select('id', 'name')->orderBy('name', 'asc')->get();
        $title    = 'Edit Mahasiswa';
        $jenis    = '';

        if ($student->jk == 'Laki-laki') {
            $jenis = 'Perempuan';
        }

        if ($student->jk == 'Perempuan') {
            $jenis = 'Laki-laki';
        }

        return view('mhs.edit', compact('student', 'title', 'jenis', 'jurusans', 'dosens', 'kelas', 'ormawas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MahasiswaRequest $request, Mahasiswa $student)
    {
        $validatedData = $request->validated();
        $student->fill($validatedData)->save();
        (isset($request->ormawa_id)) ? $student->ormawa()->sync($request->ormawa_id) : false;
        alert()->success('Success', $student->nama_mhs . ' Successfully Has Been Edit');
        return redirect('/admin/students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $student)
    {
        Mahasiswa::destroy($student->id);
        alert()->success('Success', $student->nama_mhs . ' Has Been Delete');
        return redirect('/admin/students');
    }

    public function exportExcel()
    {
        return Excel::download(new ExportMahasiswa, 'mahasiswa.xlsx');
    }

    public function exportPdf($slug)
    {
        $mhs = Mahasiswa::where('slug', $slug)->first();
        $data = [
            'data'   => str($mhs->nim)->append('_' . $mhs->nama_mhs . '_' . $mhs->jurusan->nama_jurusan),
            'mhs'    => $mhs
        ];

        $pdf = PDF::loadView('mhs.print', $data);
        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream($data['data'] . '.pdf');
    }
}