@extends('layouts.utils')

@section('content')
<div class="container">
    <h2 class="text-center">{{ $title }}</h2>
    <table class="table">
        <thead class="border border-info">
            <tr>
                <th class="border border-info">NO</th>
                <th class="border border-info">NID</th>
                <th class="border border-info">NAMA</th>
                <th class="border border-info">TGL LAHIR</th>
                <th class="border border-info">ALAMAT</th>
                <th class="border border-info" colspan="2">MAHASISWA</th>
            </tr>
        </thead>
        <tbody class="border border-info">
            @foreach ($dosen as $datas)
            <tr>
                <td class="border border-info">{{ $loop->iteration }}</td>
                <td class="border border-info">{{ $datas->nid }}</td>
                <td class="border border-info">{{ $datas->nama }}</td>
                <td class="border border-info">{{ $datas->tgl_lahir }}</td>
                <td class="border border-info">{{ $datas->alamat }}</td>
                @foreach ($datas->mahasiswa as $item)
                <td class="border border-info">{{ $item->nama_mhs }}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
