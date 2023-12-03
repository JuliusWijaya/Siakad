@extends('layouts.utils')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-2">
            <table>
                <tr>
                    <td>
                        <img src="{{ public_path('/dist/img/logo.png') }}" class="img-fluid" width="120px" alt="Logo LP3I">
                    </td>
                    <td style="width: 10px"></td>
                    <td>
                        <h3 class="text-center mb-0">Mahasiswa LP3I</h3>
                        <p>Jl. Ir. H. Juanda No. KM 2</p>
                    </td>
                </tr>
            </table>
            <table class="table">
                <thead class="border border-info">
                    <tr>
                        <th class="border border-info">NIM</th>
                        <th class="border border-info">NAMA</th>
                        <th class="border border-info">KELAS</th>
                        <th class="border border-info">JURUSAN</th>
                        <th class="border border-info">JK</th>
                    </tr>
                </thead>
                <tbody class="border border-info">
                    <tr>
                        <td class="border border-info">{{ $mhs->nim }}</td>
                        <td class="border border-info">{{ $mhs->nama_mhs }}</td>
                        <td class="border border-info">{{ $mhs->kelas->name }}</td>
                        <td class="border border-info">{{ $mhs->jurusan->nama_jurusan }}</td>
                        <td class="border border-info">{{ $mhs->jk }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
