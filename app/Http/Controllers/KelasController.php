<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Dosen;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::withCount('mahasiswa')->latest()->paginate(5);
        $kelas->load('mahasiswa', 'dosen');
        $rank = $kelas->firstItem();
        $dosens = Dosen::pluck('nama', 'id');

        return view('kelas.index', [
            'title'  => 'Dashboard Kelas',
            'kelas'  => $kelas,
            'rank'   => $rank,
            'dosens' => $dosens,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Mahasiswa';

        return view('kelas.create', [
            'title' => $title,
        ]);
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
            'name'      => 'required|max:30',
            'dosen_id'  => 'required',
        ]);

        Kelas::create($validatedData);
        alert()->success('Success', 'New Class Successfully Added');
        return back();
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
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        return response()->json([
            'status'    => 200,
            'data'      => $kelas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $idKelas = Kelas::findOrFail($request->kelas_id);
        $validatedData = $request->validate([
            'name'   => 'required|max:30',
        ]);

        if ($idKelas) {
            $idKelas->fill($validatedData)->save();
            alert()->success('Success', 'Class Successfully Update');
            return redirect('/admin/classes');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $class)
    {
        // Cek apakah kelas sudah memiliki data relasi
        if ($class->mahasiswa()->count()) {
            alert()->error('Failed', 'Failed deleted class ' . $class->name);
            return back();
        }
        // Menghapus kelas yang belum memiliki data relasi
        $class->delete();
        alert()->success('Success', 'Class Successfully Deleted');
        return redirect()->back();
    }
}