@extends('layouts.utils')

@section('content')
<div class="container">
    <div class="row">
        <table>
            <tr>
                <td>
                    <img src="{{ public_path('/img/1.png') }}" alt="logo lp3i" width="120" height="120">
                </td>
                <td style="width: 10px"></td>
                <td>
                    <h3 class="text-center mb-0">{{ $title }}</h3>
                    <p>Jl. Ir. H. Juanda No. KM 2</p>
                </td>
            </tr>
        </table>
    </div>

    <table class="table">
        <thead class="border border-info">
            <tr>
                <th class="border border-info">NO</th>
                <th class="border border-info">NID</th>
                <th class="border border-info">NAMA</th>
                <th class="border border-info">TGL LAHIR</th>
                <th class="border border-info">ALAMAT</th>
                <th class="border border-info">MAHASISWA</th>
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
                <td class="border border-info">
                    {{ (isset($item->nama_mhs)) ? $item->nama_mhs : 'Belum Ada Mahasiswa' }}
                </td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
