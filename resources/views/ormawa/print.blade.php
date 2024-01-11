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
                <th class="border border-info">NAMA</th>
                <th class="border border-info">ANGGOTA</th>
            </tr>
        </thead>
        <tbody class="border border-info">
            <tr>
                <td class="border border-info">{{ $ormawa->id }}</td>
                <td class="border border-info">{{ $ormawa->name }}</td>
                <td class="border border-info">
                    @forelse ($ormawa->mahasiswa as $item)
                     - {{ $item->nama_mhs }} <br>
                    @empty
                    <td class="border border-info">-</td>
                    @endforelse
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
