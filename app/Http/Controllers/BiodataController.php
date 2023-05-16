<?php

namespace App\Http\Controllers;


use App\Models\jurusan;
use Illuminate\Http\Request;


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
        // Cara Pertama
        // Memanggil Model
        // $jurusan = new jurusan();

        // $jurusan->nik    = $request->nik;
        // $jurusan->nama   = $request->nama;


        // $jurusan->save();

        // Cara Kedua
        // Validasi Input
        $request->validate([
            'id_jurusan'    => 'required|unique:jurusans',
            'nama_jurusan'  => 'required|max:50',
        ]);

        jurusan::create([
            'id_jurusan'    => $request->id_jurusan,
            'nama_jurusan'  => $request->nama_jurusan,
        ]);

        return redirect('/jurusan')->with('status', 'Jurusan Baru Berhasil Di Simpan!');
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

        // Cara Pertama
        // $mi21a = mi21a::find($mi21a->id);
        // $mi21a->nik    = $request->nik;
        // $mi21a->nama   = $request->nama;
        // $mi21a->alamat = $request->alamat;
        // $mi21a->agama  = $request->agama;

        // $mi21a->save();

        // Validasi Ketika User Lupa Input
        $request->validate([
            'id_jurusan'    => 'required|max:18',
            'nama_jurusan'  => 'required|max:50',
        ]);

        // Cara Kedua
        jurusan::where('id', $jurusan->id)
            ->update([
                'id_jurusan'    => $request->id_jurusan,
                'nama_jurusan'  => $request->nama_jurusan,
            ]);

        return redirect('/jurusan')->with('status', 'Jurusan ' . $jurusan->nama_jurusan . ' Berhasil Di Edit');
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

        return redirect('/jurusan')->with('status', 'Jurusan ' . $jurusan->nama_jurusan . ' Berhasil Di Hapus');
    }
}
