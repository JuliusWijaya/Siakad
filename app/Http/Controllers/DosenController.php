<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Exports\ExportDosen;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Dashboard Dosen';

        return view('dosens.index', [
            'title'     => $title,
            'dosens'    => Dosen::latest()->filters(request(['search']))->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Dosen';

        return view('dosens.create', [
            'title' => $title
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
        $request->validate([
            'nid'        => 'required|max:9|unique:dosens',
            'nama'       => 'required|max:50',
            'slug'       => 'max:50',
            'tgl_lahir'  => 'required',
            'alamat'     => 'required'
        ]);

        Dosen::create([
            'nid'       => $request->nid,
            'nama'      => $request->nama,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat'    => $request->alamat
        ]);

        return redirect('/dosen')->with('success', 'Dosen Baru Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dosen $dosen)
    {
        $title = 'Details Dosen';

        return view('dosens.details', [
            'title'  => $title,
            'dosen'  => $dosen
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dosen $dosen)
    {
        $title = 'Edit Dosen';

        return view('dosens.edit', compact('dosen', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dosen $dosen)
    {
        $request->validate([
            'nid'       => 'required|max:10',
            'nama'      => 'required|max:50',
            'slug'      => 'max:50',
            'tgl_lahir' => 'required',
            'alamat'    => 'required|max:50'
        ]);

        Dosen::where('id', $dosen->id)
            ->update([
                'nid'       => $request->nid,
                'nama'      => $request->nama,
                'tgl_lahir' => $request->tgl_lahir,
                'alamat'    => $request->alamat
            ]);

        return redirect('/dosen')->with('success', 'Dosen Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dosen $dosen)
    {
        Dosen::destroy($dosen->id);

        return redirect('/dosen')->with('success', 'Dosen Berhasil DiHapus');
    }

    public function exportExcel()
    {
        return Excel::download(new ExportDosen, 'dosen.xlsx');
    }

    // Untuk mengupdate slug sekali action
    public function massUpdate()
    {
        $dosen = Dosen::all();

        collect($dosen)->map(function ($item) {
            $item->slug = Str::slug($item->nama, '-');

            $item->save();
        });
    }
}