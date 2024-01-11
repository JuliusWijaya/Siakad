<?php

namespace App\Http\Controllers;

use App\Models\Ormawa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrmawaController extends Controller
{
    public function index()
    {
        $ormawas = Ormawa::with('mahasiswa')->get();

        return view('ormawa.index', [
            'title'     => 'Dashboard Ormawa',
            'ormawas'   => $ormawas,
        ]);
    }

    public function create()
    {
        $title = 'Create Mahasiswa';

        return view('ormawa.create', [
            'title'     => $title,
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name'  => 'required',
        ]);

        Ormawa::create($validateData);
        alert()->success('Success', 'New Ormawa Successfully Added');
        return redirect('/ormawa');
    }

    public function edit(Ormawa $ormawa)
    {
        $title = "Edit Ormawa";

        return view('ormawa.edit', [
            'title'     => $title,
            'ormawa'    => $ormawa,
        ]);
    }

    public function update(Request $request, Ormawa $ormawa)
    {
        $validateData = $request->validate([
            'name' => 'required',
        ]);

        Ormawa::where('id', $ormawa->id)
            ->update($validateData);

        alert()->success('Success', 'Ormawa Successfully Update');

        return redirect('/ormawa');
    }

    public function destroy(Ormawa $ormawa)
    {
        // Cek apakah ormawa memiliki data relasi dengan mahasiswa
        if ($ormawa->mahasiswa()->count()) {
            alert()->error('Failed', 'Failed deleted ormawa');
            return back();
        }

        // Menghapus ormawa yang tidak memiliki data relasi dengan mahasiswa
        Ormawa::destroy($ormawa->id);
        alert()->success('Success', 'Ormawa Successfully Delete');
        return back();
    }

    public function report()
    {
        $title    = 'Laporan Ormawa';
        $ormawas  = Ormawa::latest()->get();
        return view('reports.ormawa-pdf', compact('title', 'ormawas'));
    }

    public function exportPdf($id)
    {
        $ormawa = Ormawa::where('id', $id)->first();
        $data = [
            'data'     => str('Ormawa ')->append($ormawa->name),
            'title'    => 'Ormawa Politeknik LP3I',
            'ormawa'   => $ormawa
        ];

        $pdf = PDF::loadView('ormawa.print', $data);
        $pdf->setPaper('A4', 'potrait');

        return $pdf->stream($data['data'] . '.pdf');
    }
}