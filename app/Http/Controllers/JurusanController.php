<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exports\ExportJurusan;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

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
        $rank = $jurusans->firstItem();

        return view('jurusans.index', [
            'title'    => 'Dashboard Jurusan',
            'jurusans' => $jurusans,
            'rank'     => $rank,
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
            'jurusan'       => 'required|unique:jurusans',
            'nama_jurusan'  => 'required|max:50',
            'slug'          => 'max:50',
        ]);

        Jurusan::create([
            'jurusan'       => $request->jurusan,
            'nama_jurusan'  => $request->nama_jurusan,
            'slug'          => Str::slug($request->nama_jurusan, '-'),
        ]);

        alert()->success('Success', 'New Major Successfully Added');
        return back();
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
        return back();
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
        return redirect('/admin/jurusan');
    }

    public function exportExcel()
    {
        return Excel::download(new ExportJurusan, 'jurusan.xlsx');
    }

    public function report()
    {
        $title    = 'Laporan Jurusan';
        $jurusans = Jurusan::latest()->get();
        return view('reports.jurusan-pdf', compact('title', 'jurusans'));
    }

    public function exportPdf($slug)
    {
        $jurusan = jurusan::where('slug', $slug)->first();
        $data = [
            'data'     => str('Jurusan ')->append($jurusan->nama_jurusan),
            'title'    => 'Jurusan Politeknik LP3I',
            'jurusan'  => $jurusan
        ];

        $pdf = PDF::loadView('jurusans.printpdf', $data);
        $pdf->setPaper('A4', 'potrait');

        return $pdf->stream($data['data'] . '.pdf');
    }
}