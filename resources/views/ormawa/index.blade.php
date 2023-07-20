@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
            <h2 class="text-center p-3">Ormawa LP3I</h2>
            <div>
                <a href="#" class="btn btn-primary btn-sm mb-3">Add Ormawa</a>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAME</th>
                        <th>ANGGOTA</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ormawas as $ormawa)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $ormawa->name }}</td>
                            <td>
                                @foreach ($ormawa->mahasiswa as $item)
                                   - {{ $item->nama_mhs }} <br>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection