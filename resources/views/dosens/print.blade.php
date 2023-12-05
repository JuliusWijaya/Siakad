@extends('layouts.utils')

@section('content')
<div class="container">
    <div class="row">
        <table>
            <tr>
                <td>
                    <img src="{{ public_path('/dist/img/logo.png') }}" class="img-fluid mb-3" alt="logo lp3i" width="120">
                </td>
                <td style="width: 10px"></td>
                <td>
                    <h5>{{ $title }}</h5>
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
            <tr>
                <td class="border border-info">{{ $dosen->id }}</td>
                <td class="border border-info">{{ $dosen->nid }}</td>
                <td class="border border-info">{{ $dosen->nama }}</td>
                <td class="border border-info">{{ $dosen->tgl_lahir }}</td>
                <td class="border border-info">{{ $dosen->alamat }}</td>
                @forelse ($dosen->mahasiswa as $item)
                <td class="border border-info">{{ $item->nama_mhs }}</td>
                @empty
                <td class="border border-info">-</td>
                @endforelse
            </tr>
        </tbody>
    </table>
</div>
@endsection
