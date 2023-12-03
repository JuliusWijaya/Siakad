@extends('layouts.utils')

@section('content')
<div class="container">
    <div class="row">
        <table>
            <tr>
                <td>
                    <img src="{{ public_path('/dist/img/logo.png') }}" alt="logo lp3i" width="120" height="120">
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
                @foreach($jurusans as $datas)
                <tr>
                    <td class="border border-info">{{ $loop->iteration }}</td>
                    <td class="border border-info">{{ $datas->id_jurusan }}</td>
                    <td class="border border-info">{{ $datas->nama_jurusan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection