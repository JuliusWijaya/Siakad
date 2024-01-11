<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Wali;
use App\Models\Mahasiswa;
use App\Exports\ExportWali;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class WaliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Dashboard Wali';
        $walis = Wali::with('mahasiswa.jurusan')->latest()->filter(request(['search']))->paginate(5);
        $rank = $walis->firstItem();

        return view('walis.index', [
            'title'      => $title,
            'walis'      => $walis,
            'rank'       => $rank,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('walis.create', [
            'title'     => 'Create Wali'
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
            'mahasiswa_id' => 'required|unique:walis',
            'nama_wali'    => 'required|max:50',
            'slug'         => 'required|unique:walis',
            'umur'         => 'required',
            'pekerjaan'    => 'required'
        ]);

        Wali::create($validatedData);

        return redirect('/admin/wali')->with('success', 'Wali baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $slug = SlugService::createSlug(Wali::class, 'slug', $request->nama_wali);

        return response()->json(['slug' => $slug]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Wali $wali)
    {
        $title     = 'Edit Wali';
        $mahasiswa = Mahasiswa::all();

        return view('walis.edit', [
            'title'     => $title,
            'wali'      => $wali,
            'mahasiswa' => $mahasiswa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wali $wali)
    {
        $request->validate([
            'mahasiswa_id'  => 'required',
            'nama_wali'     => 'required|max:50',
            'slug'          => 'max:50',
            'umur'          => 'required',
            'pekerjaan'     => 'required'
        ]);

        Wali::where('id', $wali->id)
            ->update([
                'mahasiswa_id'  => $request->mahasiswa_id,
                'nama_wali'     => $request->nama_wali,
                'slug'          => Str::slug($request->nama_wali),
                'umur'          => $request->umur,
                'pekerjaan'     => $request->pekerjaan,
            ]);

        return redirect('/admin/wali')->with('success', 'Wali Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wali $wali)
    {
        Wali::destroy($wali->id);

        return redirect('/admin/wali')->with('success', 'Wali Berhasil Didelete');
    }

    public function export()
    {
        return Excel::download(new ExportWali, 'wali.xlsx');
    }

    public function getData($id)
    {
        $datas = Wali::findOrFail($id);
        return response()->json(['datas' => $datas, 'status' => 200]);
    }

    public function exportPdf()
    {
        $value = request('search');
        if ($value) {
            $wali = Wali::where('id', $value)->first();
            $data  = [
                'data'  => str('Wali ')->append($wali->nama_wali),
                'wali'  => $wali
            ];

            $pdf = PDF::loadView('walis.print', $data);
            $pdf->setPaper('A4', 'potrait');
            return $pdf->stream($data['data'] . '.pdf');
        }
    }

    public function autocomplete(Request $request)
    {
        $data = Mahasiswa::select("nama_mhs as value", "id")
            ->where('nama_mhs', 'LIKE', '%' . $request->get('search') . '%')
            ->get();

        return response()->json($data);
    }
}