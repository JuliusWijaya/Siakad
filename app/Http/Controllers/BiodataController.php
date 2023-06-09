<?php

namespace App\Http\Controllers;


use App\Models\jurusan;
use App\Exports\ExportJurusan;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusans = jurusan::latest()->search(request(['search']))->paginate(5);

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
            'id_jurusan'    => 'required|unique:jurusans',
            'nama_jurusan'  => 'required|max:50',
            'slug'          => 'max:50',
        ]);

        jurusan::create([
            'id_jurusan'    => $request->id_jurusan,
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
    public function show(jurusan $jurusan)
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
    public function edit(jurusan $jurusan)
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
    public function update(Request $request, jurusan $jurusan)
    {
        $request->validate([
            'id_jurusan'    => 'required|max:18',
            'nama_jurusan'  => 'required|max:50',
        ]);

        jurusan::where('id', $jurusan->id)
            ->update([
                'id_jurusan'    => $request->id_jurusan,
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
    public function destroy(jurusan $jurusan)
    {
        jurusan::destroy($jurusan->id);

        alert()->success('Success', 'Jurusan ' . $jurusan->nama_jurusan . ' Has Been Delete');

        return redirect('/jurusan');
    }

    public function export()
    {
        return Excel::download(new ExportJurusan, 'jurusan.xlsx');
    }
}