@extends('layouts.utils')

@section('content')
<div class="container">
    <h3 class="text-center">{{ $title }}</h3>
    <div class="table-responsive">
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