@extends('layouts.utils')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-12">
            <table>
                <tr>
                    <td>
                        <img src="{{ public_path('/dist/img/logo.png') }}" class="img-fluid mb-4" alt="logo lp3i" width="120">
                    </td>
                    <td style="width: 10px"></td>
                    <td>
                        <h5 class="text-center mb-0">Laporan Wali {{ $wali->nama_wali }}</h5>
                        <p>Jl. Ir. H. Juanda No. KM 2</p>
                    </td>
                </tr>
            </table>
    
            <table class="table">
                <thead class="border border-info">
                    <tr>
                        <th class="border border-info">NO</th>
                        <th class="border border-info">NAMA MHS</th>
                        <th class="border border-info">JURUSAN</th>
                        <th class="border border-info">NAMA</th>
                        <th class="border border-info">UMUR</th>
                        <th class="border border-info">PEKERJAAN</th>
                    </tr>
                </thead>
                <tbody class="border border-info">
                    <tr>
                        <td class="border border-info">{{ $wali->id }}</td>
                        <td class="border border-info">{{ $wali->mahasiswa->nama_mhs }}</td>
                        <td class="border border-info">{{ $wali->mahasiswa->jurusan->nama_jurusan }}</td>
                        <td class="border border-info">{{ $wali->nama_wali }}</td>
                        <td class="border border-info">{{ $wali->umur }}</td>
                        <td class="border border-info">{{ $wali->pekerjaan }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
