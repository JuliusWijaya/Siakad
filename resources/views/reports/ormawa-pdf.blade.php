@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="content pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <x-card>
                        <x-slot name="title" class="text-primary">Laporan Ormawa</x-slot>
                        <table class="table table-bordered mt-5">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NAMA</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ormawas as $ormawa)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $ormawa->name }}</td>
                                        <td>
                                            <a href="/print/ormawa/{{ $ormawa->id }}" target="_blank" class="btn btn-success btn-sm">
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