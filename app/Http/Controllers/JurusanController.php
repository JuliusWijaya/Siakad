<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exports\ExportJurusan;
use Maatwebsite\Excel\Facades\Excel;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusans = Jurusan::with('mahasiswa')->latest()->search(request(['search']))->paginate(5);

        return view('jurusans.index', [
            'jurusans' => $jurusans,
            'title'    => 'Dashboard Jurusan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Jurusan';
        return view('jurusans.create', ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'jurusan'    => 'required|unique:jurusans',
            'nama_jurusan'  => 'required|max:50',
            'slug'          => 'max:50',
        ]);

        Jurusan::create([
            'jurusan'       => $request->jurusan,
            'nama_jurusan'  => $request->nama_jurusan,
            'slug'          => Str::slug($request->nama_jurusan, '-'),
        ]);

        alert()->success('Success', 'New Major Successfully Added');
        return redirect('/jurusan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Jurusan $jurusan)
    {
        return view('jurusans.show', [
            'details' => $jurusan,
            'title'   => 'Details Jurusan'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Jurusan $jurusan)
    {
        $title = 'Edit Jurusan';
        return view('jurusans.edit', compact('jurusan', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        $request->validate([
            'jurusan'       => 'required|max:18',
            'nama_jurusan'  => 'required|max:50',
        ]);

        jurusan::where('id', $jurusan->id)
            ->update([
                'jurusan'       => $request->jurusan,
                'nama_jurusan'  => $request->nama_jurusan,
                'slug'          => Str::slug($request->nama_jurusan, '-'),
            ]);

        alert()->success('Success', $jurusan->nama_jurusan . ' Successfully Has Been Edit');
        return redirect('/jurusan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jurusan $jurusan)
    {
        Jurusan::destroy($jurusan->id);
        alert()->success('Success', 'Jurusan ' . $jurusan->nama_jurusan . ' Has Been Delete');
        return redirect('/jurusan');
    }

    public function export()
    {
        return Excel::download(new ExportJurusan, 'jurusan.xlsx');
    }
}