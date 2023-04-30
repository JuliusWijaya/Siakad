<?php

namespace App\Http\Controllers;

use App\Models\jurusan;
use App\Models\Mahasiswa;
use App\Models\Wali;
use App\Models\Dosen;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function downloadPDF()
    {
        $jurusans = jurusan::latest()->limit(5)->get();
        $data = [
            'data'     => 'Jurusan PDF',
            'title'    => 'Jurusan Politeknik LP3I',
            'jurusans' => $jurusans
        ];

        $pdf = PDF::loadView('jurusans.printpdf', $data);
        $pdf->setPaper('A4', 'potrait');

        return $pdf->stream('biodata.pdf');
    }

    public function printPdf()
    {
        $mhs = Mahasiswa::latest()->limit(5)->get();
        $data = [
            'data'   => 'Mahasiswa PDF',
            'title'  => 'Mahasiswa LP3I',
            'mhs'    => $mhs
        ];

        $pdf = PDF::loadView('mhs.print', $data);
        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream('mahasiswa.pdf');
    }

    public function printWali()
    {
        $wali = Wali::latest()->limit(5)->get();
        $data = [
            'data'   => 'Wali PDF',
            'title'  => 'Wali Mahasiswa',
            'wali'   => $wali
        ];

        $pdf = PDF::loadView('walis.print', $data);
        $pdf->setPaper('A4', 'potrait');

        return $pdf->stream('wali.pdf');
    }

    public function printDosen()
    {
        $dosen = Dosen::latest()->limit(5)->get();
        $data  = [
            'data'  => 'Dosen PDF',
            'title' => 'Dosen LP3I',
            'dosen' => $dosen
        ];

        $pdf = PDF::loadView('dosens.print', $data);
        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream('dosen.pdf');
    }
}