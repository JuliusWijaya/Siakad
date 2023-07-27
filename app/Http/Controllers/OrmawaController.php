<?php

namespace App\Http\Controllers;

use App\Models\Ormawa;
use Illuminate\Http\Request;

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

    public function edit()
    {
        $title = "Edit Ormawa";

        return view('ormawa.edit', [
            'title'     => $title,
        ]);
    }

    public function destroy(Ormawa $ormawa)
    {
        Ormawa::destroy($ormawa->id);

        alert()->success('Success', 'Ormawa Successfully Delete');

        return redirect('/ormawa');
    }
}
