@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="content pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <x-card>
                        <x-slot name="title" class="text-primary">Laporan Dosen</x-slot>
                        <table class="table table-bordered mt-5">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NAMA</th>
                                    <th>ALAMAT</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dosens as $dosen)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $dosen->nama }}</td>
                                        <td>{{ $dosen->alamat }}</td>
                                        <td>
                                            <a href="/print/dosen/{{ $dosen->slug }}" target="_blank" class="btn btn-success btn-sm">
                                                Print
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </x-card>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection