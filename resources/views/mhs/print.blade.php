@extends('layouts.utils')

@section('content')
<div class="container">
    <h2 class="text-center">{{ $title }}</h2>
    <div class="text-center">
        <table class="table">
            <thead class="border border-info">
                <tr>
                    <th class="border border-info">NO</th>
                    <th class="border border-info">NIM</th>
                    <th class="border border-info">NAMA</th>
                    <th class="border border-info">JK</th>
                    <th class="border border-info">JURUSAN</th>
                    <th class="border border-info">NO HP</th>
                    <th class="border border-info">ALAMAT</th>
                </tr>
            </thead>
            <tbody class="border border-info">
                @foreach ($mhs as $datas)
                <tr>
                    <td class="border border-info">{{ $loop->iteration }}</td>
                    <td class="border border-info">{{ $datas->nim }}</td>
                    <td class="border border-info">{{ $datas->nama_mhs }}</td>
                    <td class="border border-info">{{ $datas->jk }}</td>
                    <td class="border border-info">{{ $datas->jurusan }}</td>
                    <td class="border border-info">{{ $datas->no_hp }}</td>
                    <td class="border border-info">{{ $datas->alamat }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
