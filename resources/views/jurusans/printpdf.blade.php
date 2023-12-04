@extends('layouts.utils')

@section('content')
<div class="container">
    <div class="row">
        <table>
            <tr>
                <td>
                    <img src="{{ public_path('/dist/img/logo.png') }}" alt="logo lp3i" width="120">
                </td>
                <td style="width: 10px"></td>
                <td>
                    <h3 class="text-center mb-0">{{ $title }}</h3>
                    <p>Jl. Ir. H. Juanda No. KM 2</p>
                </td>
            </tr>
        </table>
    </div>
    <div class="table-responsive mt-2">
        <table class="table">
            <thead class="border border-info">
                <tr class="text-center">
                    <th class="border border-info">NO</th>
                    <th class="border border-info">ID JURUSAN</th>
                    <th class="border border-info">NAMA JURUSAN</th>
                </tr>
            </thead>
            <tbody class="border border-info"> 
                <tr>
                    <td class="border border-info">{{ $jurusan->id }}</td>
                    <td class="border border-info">{{ $jurusan->jurusan }}</td>
                    <td class="border border-info">{{ $jurusan->nama_jurusan }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection