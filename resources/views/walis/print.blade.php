@extends('layouts.utils')

@section('content')
<div class="container">
    <h2 class="text-center">{{ $title }}</h2>
    <div class="text-center">
        <table class="table">
            <thead class="border border-info">
                <tr>
                    <th class="border border-info">NO</th>
                    <th class="border border-info">MHS</th>
                    <th class="border border-info">JURUSAN</th>
                    <th class="border border-info">NAMA</th>
                    <th class="border border-info">UMUR</th>
                    <th class="border border-info">PEKERJAAN</th>
                </tr>
            </thead>
            <tbody class="border border-info">
                @foreach ($wali as $datas)
                <tr>
                    <td class="border border-info">{{ $loop->iteration }}</td>
                    <td class="border border-info">{{ $datas->mahasiswa->nama_mhs }}</td>
                    <td class="border border-info">{{ $datas->mahasiswa->jurusan }}</td>
                    <td class="border border-info">{{ $datas->nama_wali }}</td>
                    <td class="border border-info">{{ $datas->umur }}</td>
                    <td class="border border-info">{{ $datas->pekerjaan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
