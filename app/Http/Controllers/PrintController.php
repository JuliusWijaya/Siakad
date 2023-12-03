<?php

namespace App\Http\Controllers;

use App\Models\jurusan;
use App\Models\Mahasiswa;
use App\Models\Wali;
use App\Models\Dosen;
use App\Models\User;
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

        return $pdf->stream('jurusan.pdf');
    }

    public function printPdf($slug)
    {
        $mhs = Mahasiswa::where('slug', $slug)->first();
        $data = [
            'data'   => 'Mahasiswa PDF',
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

    public function printUser()
    {
        $user = User::latest()->get();
        $data = [
            'data'  => 'User',
            'title' => 'User LP3I',
            'users' => $user
        ];

        $pdf = PDF::loadView('users.print', $data);
        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream('user.pdf');
    }
}