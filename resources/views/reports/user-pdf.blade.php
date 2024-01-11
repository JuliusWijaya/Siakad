@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="content pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <x-card>
                        <x-slot name="title" class="text-primary">Laporan User</x-slot>
                        <table class="table table-bordered mt-5">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NAMA</th>
                                    <th>EMAIL</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a href="/print/user/{{ $user->id }}" target="_blank" class="btn btn-success btn-sm">
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